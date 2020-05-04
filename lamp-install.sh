#!/bin/bash

# Update Package Index
apt update

# Install Apache2, MySQL, PHP
apt install apache2 mysql-server php php-mysql libapache2-mod-php php-cli

# Allow to run Apache on boot up
systemctl enable apache2

# Restart Apache Web Server
systemctl start apache2

# Adjust Firewall
ufw allow in "Apache Full"

# Allow Read/Write for Owner
chmod -R 0755 /var/www/html/

# Create info.php for testing php processing
rm /var/www/html/index.html

# copy app to apache2 
cp index.html insert.php /var/www/html/

#mysql
mysql -e "create database test; CREATE USER 'user'@'localhost' IDENTIFIED BY 'abc'; GRANT ALL PRIVILEGES ON *.* TO 'user'@'localhost' IDENTIFIED BY 'abc'; use test; CREATE TABLE persons (first_name varchar(20), last_name varchar(20), email varchar(20) ); "

