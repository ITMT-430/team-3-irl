#!/bin/bash
sudo add-apt-repository ppa:cordova-ubuntu/ppa
sudo apt-get update
sudo apt-get install cordova-cli -y
sudo npm install -g cordova
sudo apt-get install git -y
cd /home/vagrant
if [ ! -d "/home/vagrant/irl" ]; then
	mkdir /home/vagrant/irl		
	git clone https://github.com/ITMT-430/irl.git
fi
git pull
