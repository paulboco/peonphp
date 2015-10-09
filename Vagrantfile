# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  # Create Base Box
  # config.vm.box = "hashicorp/precise32"
  # config.vm.network "private_network", ip: "192.168.33.10"
  # config.ssh.insert_key = false

  # Run Packaged Box
  config.vm.box = "lamp-php53"
  config.vm.hostname = "lamp53"
  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777", "fmode=666"]
  config.ssh.insert_key = false
  config.vm.provision "shell", inline: <<-SHELL
    # php.ini
    sudo sed -i -e 's|display_errors = Off|display_errors = On|g' /etc/php5/apache2/php.ini
    sudo service apache2 restart
  SHELL

end
