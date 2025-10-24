#!/bin/bash

echo "==================================="
echo "Railway Deployment Started"
echo "==================================="

# Set PORT default
PORT=${PORT:-8000}
echo "Using PORT: $PORT"

# Force SQLite if no DB_CONNECTION is set
if [ -z "$DB_CONNECTION" ]; then
    export DB_CONNECTION=sqlite
    echo "DB_CONNECTION not set, using SQLite"
fi

# Ensure database directory exists
mkdir -p storage/database
export DB_DATABASE=${DB_DATABASE:-storage/database/database.sqlite}

echo "Database Connection: $DB_CONNECTION"
echo "Database Path: $DB_DATABASE"

# Wait longer for database to be ready (for MySQL/PostgreSQL if configured)
echo "Waiting for database..."
for i in {1..30}; do
    echo "Attempt $i/30..."
    sleep 2
done

# Try to run migrations
echo "Attempting database migrations..."
php artisan migrate --force 2>&1 || {
    echo "⚠️  Database migration skipped"
}

# Try seeders (optional)
echo "Attempting database seeding..."
php artisan db:seed --force 2>&1 || {
    echo "⚠️  Database seeding skipped"
}

# Clear all caches (but don't cache config to avoid Railway issues)
echo "Clearing caches..."
php artisan config:clear 2>&1 || true
php artisan cache:clear 2>&1 || true
php artisan view:clear 2>&1 || true
php artisan route:clear 2>&1 || true

# Create storage link if it doesn't exist
echo "Creating storage link..."
php artisan storage:link 2>&1 || true

# Optimize without config:cache (prevents Railway deployment issues)
echo "Optimizing views and routes..."
php artisan view:cache 2>&1 || true
php artisan route:cache 2>&1 || true

# Set proper permissions
echo "Setting permissions..."
chmod -R 775 storage bootstrap/cache 2>&1 || true

# Start server
echo "==================================="
echo "Starting Laravel server on 0.0.0.0:$PORT"
echo "==================================="
exec php artisan serve --host=0.0.0.0 --port=$PORT
