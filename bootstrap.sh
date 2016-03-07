#!/usr/bin/env bash

#apt-get update
apt-get install -y git
#git config --global user.name "thegeekkid"
#git config --global user.email brian@geekkidconsulting.com
#mkdir /home/vagrant/Documents
apt-get install -y curl
apt-get install -y zsh
sh -c "$(curl -fsSL https://raw.github.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"
git clone https://github.com/thegeekkid/zshconfig.git /BS-stuff/zshconfig
cd /BS-stuff/zshconfig
git checkout teamproject
cp zshrc ~/.zshrc
cp terminalparty.zsh-theme ~/.oh-my-zsh/themes/terminalparty.zsh-theme
