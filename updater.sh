#/bin/bash
DB_USER='root'
DB_PASSWD=''
DB_NAME='peng'
TABLE='status'

IPS=$(mysql -D$DB_NAME -u$DB_USER -se "SELECT ip FROM $TABLE")

read  -ra vars <<< $IPS
for i in "${vars[@]}"; do
	echo `./statscontroller.sh $i`
done