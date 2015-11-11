# PHPUnit
echo "Installing PHPUnit"
wget --quiet https://phar.phpunit.de/phpunit-old.phar >/dev/null
chmod +x phpunit-old.phar
sudo mv phpunit-old.phar /usr/local/bin/phpunit
echo "alias phpunit='phpunit --colors'" >> /home/vagrant/.bash_aliases

# Database
echo "Droping database 'peon' if it already exists.";
mysql -uroot -proot -e "DROP DATABASE IF EXISTS peon";
echo "Creating new database 'peon'";
mysql -uroot -proot -e "CREATE DATABASE peon";
echo "Importing tables";
mysql -uroot -proot peon < /vagrant/database/mysql/peon.sql

# Base
echo "Setting color prompt"
echo "PS1='\[\e[1;36m\]\u \[\e[1;33m\]\w\$\[\e[0m\] '" >> /home/vagrant/.profile
echo "Creating peon aliases"
echo "alias peon='cd /vagrant/vendor/peon'" >> /home/vagrant/.profile
