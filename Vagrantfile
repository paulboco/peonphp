# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "lamp53"
  config.vm.hostname = "lamp53"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777", "fmode=666"]
  config.vm.provision "shell", inline: <<-SHELL
sudo apt-get -y install php5-xdebug
sudo sed -i -e 's|html_errors = Off|html_errors = On|g' /etc/php5/apache2/php.ini
sudo sed -i -e 's|AllowOverride None|AllowOverride All|g' /etc/apache2/sites-available/default
sudo service apache2 restart
echo "Droping database 'peon' if it already exists.";
mysql -uroot -proot -e "DROP DATABASE IF EXISTS peon";
echo "Creating new database $DB";
mysql -uroot -proot -e "create database peon";
mysql -uroot -proot peon < /vagrant/database/bondservants.sql
mysql -uroot -proot peon < /vagrant/database/users.sql
  SHELL

end
