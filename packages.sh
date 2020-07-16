#!/bin/bash

touch /etc/apt/sources.list.d/google-compute-engine.list
echo "deb https://packages.cloud.google.com/apt google-compute-engine-bionic-stable main"  > /etc/apt/sources.list.d/google-compute-engine.list
curl -fsSL  https://packages.cloud.google.com/apt/doc/apt-key.gpg | apt-key add -
apt-get update
apt-get -y install google-osconfig-agent


   
