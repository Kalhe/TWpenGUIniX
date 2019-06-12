#!/bin/bash

CMD="mpstat" 
IP=$1

VAR= `echo ssh andrei@$IP $CMD`
VAL=$VAR
echo "$VAR"