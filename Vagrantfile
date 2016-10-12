# -*- mode: ruby -*-
# vi: set ft=ruby :

options = {
  :project => 'ayos',
  :aliases => ['admin', 'api'],
  :memory => "2048",
  :debug => false
}

Vagrant.configure(2) do |config|
  config.vm.box = "debian/jessie64"

  config.vm.network "private_network", ip: "10.10.10.10"
  config.ssh.forward_agent = true

  config.vm.synced_folder ".", "/vagrant", type: "nfs", mount_options: ['rw', 'vers=3', 'tcp']

  config.vm.define options[:project]
  config.vm.hostname = options[:project] + ".dev"

  if options[:aliases].any?
    config.hostsupdater.aliases = []
    for host in options[:aliases]
      config.hostsupdater.aliases.push(host + '.' + config.vm.hostname)
    end
  end

  config.vm.provider "virtualbox" do |vb|
    vb.name = options[:project]
    vb.memory = options[:memory]
  end

  config.vm.provision :ansible do |ansible|
    ansible.inventory_path = 'ansible/env/vagrant/inventory'
    ansible.playbook = 'ansible/vagrant.yml'
    ansible.host_key_checking = false
    ansible.extra_vars = {
      hostname: config.vm.hostname,
      root_db_password: "vagrant",
      db_user: "vagrant",
      db_pass: "vagrant",
      db_name: "vagrant",
      app_path: "/vagrant",
      composer_no_dev: "no",
      phpfpm_display_errors: "On"
    }
    ansible.verbose = options[:debug] ? 'vvv' : false
    ansible.limit = 'all'
  end
end