FROM wordpress:php8.2-fpm
RUN apt-get update && apt-get install -y nginx supervisor

# Copy nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Create supervisor config to run both nginx and php-fpm
RUN echo '[supervisord]\n\
nodaemon=true\n\
\n\
[program:php-fpm]\n\
command=php-fpm\n\
autostart=true\n\
autorestart=true\n\
\n\
[program:nginx]\n\
command=nginx -g "daemon off;"\n\
autostart=true\n\
autorestart=true' > /etc/supervisor/conf.d/supervisord.conf

# Remove default nginx config
RUN rm /etc/nginx/sites-enabled/default

CMD ["/usr/bin/supervisord"]