#/bin/bash
IP=$1

NETW=`./nin.sh $1 | grep "RX bytes" -m 1`
#echo $NETW 
PROCS=`./procs.sh $1 | wc -l`
#echo $PROCS 
MEM=`./mem.sh $1 | grep Mem | awk '{print $3/$2 * 100.0}'`
#echo $MEM 
HDD=`./HDD.sh $1 | awk '{print $5}'`
#echo $HDD 
CPU=`./CPU.sh $1 | awk '{print $12}'`
#echo $CPU 

DB_USER='root'
DB_PASSWD=''
DB_NAME='peng'
TABLE='status'

mysql --user=$DB_USER --password=$DB_PASSWS $DB_NAME << EOF
UPDATE $TABLE  SET nin='$NETW', nout='$CPU', procs='$PROCS', ram='$MEM', hdd= '$HDD'  
WHERE  ip='$1';
EOF