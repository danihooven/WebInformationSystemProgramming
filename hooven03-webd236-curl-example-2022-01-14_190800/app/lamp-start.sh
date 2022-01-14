#!/bin/bash 

truncate -s 0 .apache2/log/*
#.mysql/run-mysqld.sh &
rm blog.db3
sqlite3 blog.db3 < blog.sql
.apache2/run-apache2.sh &

tail -f -v .apache2/log/*
#wait 
