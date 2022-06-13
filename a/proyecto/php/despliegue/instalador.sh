#!/bin/bash

BBDD=$BBDD
USERDB=$USERDB
PASSDB=$PASSDB
DATOS=""

mysqladmin -u $USERDB -p$USERDB create $BBDD
mysql -u $USERDB -p$USERDB $BBDD < $DATOS