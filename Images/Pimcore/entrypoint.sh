#!/bin/bash

DIR="/var/www/html/vendor"
if [ -d "$DIR" ]; then
    echo "Direactory already exists ${DIR}..."
else
    # Take action if $DIR exists. #
    echo "Installing config files in ${DIR}..."
    COMPOSER_MEMORY_LIMIT=-1 composer create-project pimcore/skeleton /var/www/html
    
fi

INSTALLER="/installer.yml"
if [ -f "$INSTALLER" ]; then
    echo "Installer already exists ${INSTALLER}..."
    mv -f /installer.yml /var/www/html/app/config/
    
    until mysql -h mariadb -u root -padmin123 -P 3306; do
        >&2 echo "Mariadb is unavailable - sleeping"
        sleep 1
    done
    
    >&2 echo "Mariadb is up - executing command"
    exec $(/var/www/html/vendor/bin/pimcore-install --admin-username admin --admin-password admin --no-interaction --ignore-existing-config && php-fpm -F -R)
    
    
else
    echo "Installer doesn't exists ${INSTALLER}..."
fi

php -v
