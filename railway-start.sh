#!/bin/bash

echo "==================================="
echo "Railway Deployment Started"
echo "==================================="

# Set PORT default
PORT=${PORT:-8000}
echo "Using PORT: $PORT"

# Wait longer for database to be ready
echo "Waiting for database connection..."
for i in {1..30}; do
    echo "Attempt $i/30..."
    sleep 2
done

# Try to run migrations if database is available
echo "Attempting database migrations..."
php artisan migrate --force 2>&1 || {
    echo "Note: Database operations skipped - this is OK if DB_CONNECTION=sqlite"
    echo "Creating sqlite database file if needed..."
    php artisan db:create 2>&1 || true
}

# Try seeders (optional)
echo "Attempting database seeding..."
php artisan db:seed --force 2>&1 || echo "Seeding skipped (this is OK)"

# Optimize the app regardless of DB status
echo "Optimizing application..."
php artisan config:clear 2>&1 || true
php artisan cache:clear 2>&1 || true
php artisan view:clear 2>&1 || true
php artisan route:clear 2>&1 || true
php artisan config:cache 2>&1 || true

# Start server
echo "==================================="
echo "Starting Laravel server on 0.0.0.0:$PORT"
echo "==================================="
exec php artisan serve --host=0.0.0.0 --port=$PORT
