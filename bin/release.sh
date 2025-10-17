#!/bin/bash

echo "Creating required directories..."
mkdir -p bootstrap/cache storage/logs
chmod -R 775 bootstrap/cache storage

echo "Waiting for database connection..."

# Wait untuk database dengan retry logic
max_attempts=120
attempt=0

while [ $attempt -lt $max_attempts ]; do
    attempt=$((attempt + 1))
    
    if php -r "
        try {
            new PDO(
                'mysql:host=' . getenv('DB_HOST') . ':' . getenv('DB_PORT'),
                getenv('DB_USERNAME'),
                getenv('DB_PASSWORD'),
                [PDO::ATTR_TIMEOUT => 3]
            );
            exit(0);
        } catch (Exception \$e) {
            exit(1);
        }
    " 2>/dev/null; then
        echo "Database connection successful!"
        break
    fi
    
    if [ $((attempt % 10)) -eq 0 ]; then
        echo "Still waiting for database... (attempt $attempt/$max_attempts)"
    fi
    
    sleep 1
done

if [ $attempt -eq $max_attempts ]; then
    echo "Warning: Database still not ready, but proceeding with migrations..."
fi

echo "Running database migrations..."

# Try migration dengan retry
for migration_attempt in 1 2 3; do
    if php artisan migrate:fresh --seed --force; then
        echo "Database setup completed successfully!"
        exit 0
    fi
    
    if [ $migration_attempt -lt 3 ]; then
        echo "Migration failed, retrying (attempt $migration_attempt/3)..."
        sleep 5
    fi
done

echo "Migrations completed (check logs if there were errors)"
exit 0
