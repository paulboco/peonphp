#!/bin/bash

#-------------------------------------------------------------------------------
# LAMP PHP v5.3.10
#-------------------------------------------------------------------------------

sudo apt-get update
sudo apt-get upgrade
sudo apt-get install git vim apache2 mysql-server libapache2-mod-auth-mysql php5-mysql
sudo mysql_install_db
sudo /usr/bin/mysql_secure_installation
sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt
sudo apt-get install php5-cgi php5-cli php5-curl php5-common php5-gd php5-mysql
sudo service apache2 restart