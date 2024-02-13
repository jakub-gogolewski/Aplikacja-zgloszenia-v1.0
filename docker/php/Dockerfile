# Użyj oficjalnego obrazu PHP z FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Ustaw katalog roboczy
WORKDIR /var/www/html

# Update and install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    libzip-dev \
    libicu-dev

# Clean up APT cache to reduce image size
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install zip



# Ustaw prawa dostępu
RUN chown -R www-data:www-data /var/www/html

# W razie potrzeby zainstaluj Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer