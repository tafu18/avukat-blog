# Base image
FROM php:8.2-fpm

# Çalışma dizini oluştur
WORKDIR /var/www

# Gerekli paketleri yükle (Node.js ve npm dahil)
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*

# Composer yükle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# İzinleri ayarla (Laravel kurulumundan sonra tekrar ayarlamak gerekebilir ama şimdilik dursun)
# RUN chown -R www-data:www-data /var/www

# Başlatma komutu
CMD ["php-fpm"]
