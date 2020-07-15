#!/bin/bash

SUCCESS="[\e[32m ✔ \e[0m]"

if [ -d "storage/app/public/uploads" ] 
then
    rm -rf storage/app/public/uploads
    echo -e " ${SUCCESS} \e[32m Storage directory cleaned. \e[0m"
else
    echo -e " ${SUCCESS} \e[32m Storage already cleaned. \e[0m"
fi
