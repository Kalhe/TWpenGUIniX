#!/bin/bash

CMD="ps aux" 
IP=$1

VAR= `echo ssh andrei@$IP $CMD`
VAL=$VAR
echo "$VAR"


