FROM php:8-fpm

# Set the working directory
WORKDIR /app

# Install base dependencies
RUN apt-get update \
    && \
    apt-get install -y \
      supervisor \
      nginx \
    && \
    apt-get clean

# Install composer and PHP Extensions
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions @composer \
    bcmath \
    gd \
    opcache \
    pcntl \
    zip

# Add the project files
COPY . /app

# Install composer dependencies
RUN composer install --no-interaction --no-scripts --no-progress --no-cache

# Configure nginx and create the SupervisorD configuration folder
RUN rm /etc/nginx/sites-enabled/* /etc/nginx/sites-available/* && \
    cp /app/docker/nginx/sites-enabled/* /etc/nginx/sites-enabled/ && \
    cp -f /app/docker/nginx/nginx.conf /etc/nginx/nginx.conf && \
    mkdir -p /etc/supervisor.d

# Allow Laravel to write to its required folders
RUN chown -R www-data:www-data \
    /app/storage \
    /app/bootstrap/cache

# By default log to STDOUT
ENV LOG_CHANNEL=stderr

ENTRYPOINT [ "/bin/sh", "/app/docker/entrypoints/app.sh" ]
