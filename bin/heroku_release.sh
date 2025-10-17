#!/usr/bin/env bash

# Disable automatic file synchronization
export LARAVEL_SKIP_AUTO_GENERATION=true

# Use production cache
export APP_ENV=production
export APP_DEBUG=false

# Set proper permissions
chmod -R 755 /app/storage
chmod -R 755 /app/bootstrap/cache

# Ensure directories exist
mkdir -p storage/app
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs

# Run migrations
php artisan migrate --force

# Seed the database if needed
php artisan db:seed --force

# Clear caches (optional, for fresh start)
php artisan config:cache
php artisan route:cache
php artisan view:cache
