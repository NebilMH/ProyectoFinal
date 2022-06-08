#!/bin/bash

USERDB="debianDB"
PASSDB="debianDB"
DATOS="bd.sql"
BBDD="proyecto"

mysqladmin -u $USERDB -p$USERDB create $BBDD
mysql -u $USERDB -p$USERDB $BBDD < $DATOS

sudo chown -R www-data:www-data /var/www/html/proyecto/
sudo shmod -R 775 /var/www/html/proyecto/
