#/bin/bash
DB_USER='phpmyadmin'
DB_PASSWD='pass'
DB_NAME='pengu'
TABLE='status'

IPS=$(mysql -D$DB_NAME -u$DB_USER -p$DB_PASSWD -se "SELECT ip FROM $TABLE")

read  -ra vars <<< $IPS
for i in "${vars[@]}"; do
	echo `./statscontroller.sh $i`
done
