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
php artisan migrate --force || {
    echo "Migration failed!"
    php artisan migrate:status
    exit 1
}

echo "Migration completed successfully!"

# Run seeders
echo "Running database seeders..."
php artisan db:seed --force || {
    echo "Seeding failed!"
    exit 1
}

echo "Seeding completed successfully!"

# Clear and cache configs
echo "Optimizing application..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

php artisan config:cache

# Start server
echo "==================================="
echo "Starting Laravel server..."
echo "==================================="
php artisan serve --host=0.0.0.0 --port=$PORT
php artisan route:cache
php artisan view:cache

echo "==================================="
echo "Starting Laravel Server"
echo "==================================="

# Start the server
exec php artisan serve --host=0.0.0.0 --port=$PORT
