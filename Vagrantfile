# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "lamp53-rc1"
  config.vm.hostname = "lamp53"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777", "fmode=666"]
  config.vm.provision "shell", inline: <<-SHELL
echo "Droping database 'peon' if it already exists.";
mysql -uroot -proot -e "DROP DATABASE IF EXISTS peon";
echo "Creating new database $DB";
mysql -uroot -proot -e "create database peon";
  SHELL

end
