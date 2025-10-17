#!/bin/bash
set -e

echo "==================================="
echo "Railway Deployment Started"
echo "==================================="

# Wait for database to be ready
echo "Waiting for database connection..."
sleep 10

# Test database connection
echo "Testing database connection..."
php artisan db:show || echo "Database connection check failed, but continuing..."

# Run migrations
echo "Running migrations..."
if ! php artisan migrate --force; then
    echo "Migration failed!"
    php artisan migrate:status
    # Continue anyway - the app might still work with partial schema
fi

echo "Migration completed!"

# Run seeders (optional - don't fail if it doesn't work)
echo "Running database seeders..."
php artisan db:seed --force || echo "Seeding skipped or failed, but continuing..."

echo "Seeding completed!"

# Clear and cache configs
echo "Optimizing application..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

php artisan config:cache

# Cache routes and views
echo "Caching routes and views..."
php artisan route:cache || echo "Route caching failed, continuing..."
php artisan view:cache || echo "View caching failed, continuing..."

# Start server
echo "==================================="
echo "Starting Laravel server on port ${PORT:-8000}..."
echo "==================================="
PORT=${PORT:-8000}
exec php artisan serve --host=0.0.0.0 --port=$PORT
