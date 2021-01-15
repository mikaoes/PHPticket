#!/bin/bash
# This script must be executed in the main directory of the repository

printf "recieved new ticket";
date=`date '+%F'`;
time=`date '+%H:%M:%S'`;

echo $1 >> Server/tmp.txt
echo $date >> Server/tmp.txt
echo $time >> Server/tmp.txt
echo $2 >> Server/tmp.txt
echo $3 >> Server/tmp.txt
echo $4 >> Server/tmp.txt
echo "open" >> Server/tmp.txt

php Server/RecievedPHP.php
