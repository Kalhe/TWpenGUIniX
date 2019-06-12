#/bin/bash

DB_USER='root'
DB_PASSWD=''
DB_NAME='peng'
TABLE='commands'
IP=$1
CMD=$2

VAR=`echo ssh andrei@$IP $CMD`
VAL=`$VAR`
echo "#!#$VAL#!#"

mysql --user=$DB_USER --password=$DB_PASSWS $DB_NAME << EOF
UPDATE $TABLE  SET result='$VAL', torun='0'  
WHERE  ip='$1' AND command='$2';

EOF