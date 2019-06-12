#/bin/bash
DB_USER='phpmyadmin'
DB_PASSWD='pass'
DB_NAME='pengu'
TABLE='commands'

CMD=$(mysql -D$DB_NAME -u$DB_USER -p$DB_PASSWD -se "SELECT ip,command FROM $TABLE WHERE torun='1'")

SEP=0

read  -ra vars <<< $CMD
for i in "${vars[@]}"; do
	if [ "$SEP" -eq 0 ];then
	SEP="1"
	IP=$i 
	else
	echo `./executor.sh $IP $i`
	SEP="0"
fi
done
