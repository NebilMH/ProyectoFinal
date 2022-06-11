#!/bin/bash

USERDB="debianDB"
PASSDB="debianDB"
DATOS="bd.sql"
BBDD="proyecto"

mysqladmin -u $USERDB -p$USERDB create $BBDD
mysql -u $USERDB -p$USERDB $BBDD < $DATOS