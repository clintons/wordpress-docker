#!/bin/bash
# Stop any existing NGINX instance to free port 80
pkill -9 nginx || true
# Start NGINX in the background
nginx &
# Start PHP-FPM
php-fpm
exec "$@"