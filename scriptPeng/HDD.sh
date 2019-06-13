#!/bin/bash

CMD="df /" 
IP=$1

VAR= `echo ssh andrei@$IP $CMD`
VAL=$VAR
echo "$VAR"
