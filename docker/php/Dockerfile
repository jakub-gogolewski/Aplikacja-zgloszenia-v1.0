# Użyj oficjalnego obrazu PHP z FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Ustaw katalog roboczy
WORKDIR /var/www/html

# Zainstaluj potrzebne pakiety i rozszerzenia PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install \
    pdo pdo_pgsql



# Ustaw prawa dostępu
RUN chown -R www-data:www-data /var/www/html

# W razie potrzeby zainstaluj Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer