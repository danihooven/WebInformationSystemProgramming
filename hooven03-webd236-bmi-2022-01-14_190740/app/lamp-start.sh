#!/bin/bash

truncate -s 0 .apache2/log/*
.mysql/run-mysqld.sh &
.apache2/run-apache2.sh &

tail -f -v .apache2/log/*
#wait 
