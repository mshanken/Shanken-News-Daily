FROM wordpress:php7.3-fpm

MAINTAINER M. Shanken Communications <dev@mshanken.com>

# Set up our current directory
WORKDIR /var/www/html

# Write the snd theme into the themese dir
COPY . /var/www/html/wp-content/themes/Shanken-News-Daily/
