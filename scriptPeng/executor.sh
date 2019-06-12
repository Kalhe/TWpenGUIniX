#/bin/bash

DB_USER='phpmyadmin'
DB_PASSWD='pass'
DB_NAME='pengu'
TABLE='commands'
IP=$1
CMD=$2

VAR=`echo ssh andrei@$IP $CMD`
VAL=`$VAR`
echo "#!#$VAL#!#"

mysql --user=$DB_USER --password=$DB_PASSWD $DB_NAME << EOF
UPDATE $TABLE  SET result='$VAL', torun='0'  
WHERE  ip='$1' AND command='$2';

EOF
