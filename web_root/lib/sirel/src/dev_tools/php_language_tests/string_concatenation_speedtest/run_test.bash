#!/bin/bash


for i in `seq 1 200`;
do
        /usr/bin/time -p -a -o ./measuring_data.rb  php5 ./the_test.php 
done   

