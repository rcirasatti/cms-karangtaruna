#!/bin/bash
set -e

echo "🔄 Waiting for database to be ready..."

# Retry logic untuk menunggu database siap
for i in {1..60}; do
    if php artisan tinker --execute="DB::connection()->getPdo();" 2>/dev/null; then
        echo "✅ Database is ready!"
        break
    fi
    
    if [ $i -eq 60 ]; then
        echo "❌ Database connection timeout after 2 minutes"
        exit 1
    fi
    
    echo "⏳ Attempt $i/60 - retrying in 2 seconds..."
    sleep 2
done

echo "🚀 Running migrations..."
php artisan migrate:fresh --seed --force

echo "✅ Database setup complete!"
