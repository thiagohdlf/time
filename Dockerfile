FROM php:8.2-fpm

# Define os argumentos no docker-compose
ARG user
ARG uid

# Instala as depêndencias do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    npm \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Apaga o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install as extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria sistema de usuário para rodar Composer e Artisan comandos
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Seta diretorio de trabalho
WORKDIR /var/www

USER $user
