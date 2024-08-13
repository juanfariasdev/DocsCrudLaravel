# Usando a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias para o Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos do projeto para o container
COPY . /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Ajusta as permissões para o diretório completo
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Ajusta as permissões das pastas storage e bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configura o Apache para servir o diretório public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Define o ServerName para evitar o aviso
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Instala as dependências do Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Expõe a porta 80
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
