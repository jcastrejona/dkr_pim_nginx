#!/bin/bash
docker build --no-cache -t pimcore:latest ./images/Pimcore
docker build --no-cache -t mariadb:latest ./images/Mariadb
docker build --no-cache -t nginx:latest ./images/Nginx