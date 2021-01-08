FROM wordpress:latest

MAINTAINER M. Shanken Communications <dev@mshanken.com>

# Write the snd theme into the themes dir
COPY . /usr/src/wordpress/wp-content/themes/Shanken-News-Daily/

# Install composer devs onto the container
RUN  cp /usr/src/wordpress/wp-content/themes/Shanken-News-Daily/composer.json /usr/src/wordpress/composer.json && \
     cd /usr/src/wordpress && \
     curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer && \
     composer install --no-dev --no-interaction --optimize-autoloader --prefer-dist
