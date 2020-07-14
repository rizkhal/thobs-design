#!/bin/bash

SUCCESS="[\e[32m ✔ \e[0m]"

cd storage/app/public/uploads/project

rm -rf *

cd ../../../../../

echo -e " ${SUCCESS} \e[32m Storage directory cleaned. \e[0m"
