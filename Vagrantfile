# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "lamp53"
  config.vm.hostname = "lamp53"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777", "fmode=666"]

  # set auto_update to false, if you do NOT want to check the correct
  # additions version when booting this machine
  config.vbguest.auto_update = false

  # do NOT download the iso file from a webserver
  config.vbguest.no_remote = true

  config.vm.provision "shell", inline: <<-SHELL
echo "Installing PHPUnit"
wget --quiet https://phar.phpunit.de/phpunit-old.phar >/dev/null
chmod +x phpunit-old.phar
sudo mv phpunit-old.phar /usr/local/bin/phpunit
echo "alias phpunit='phpunit --colors'" >> /home/vagrant/.bash_aliases
echo "Droping database 'peon' if it already exists.";
mysql -uroot -proot -e "DROP DATABASE IF EXISTS peon";
echo "Creating new database 'peon'";
mysql -uroot -proot -e "CREATE DATABASE peon";
echo "Importing tables";
mysql -uroot -proot peon < /vagrant/database/mysql/peon.sql
  SHELL

end
