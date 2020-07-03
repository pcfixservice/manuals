ank you for contacting the Google Cloud Platform Support team. My name is Sunny and I will be assisting you throughout this case. 
I understand that you are unable to permanently change your VM instance hostname to your own qualified domain name (FQDN) - ( gc-general-db02.dc.whitelabel.com.br ). 

I have carefully investigated this issue, and as per my findings, this is an expected behavior [1]. As explained in the following documentation, "hostname" 
is part of the default metadata entries [2] and it is not possible to manually edit any of the default metadata pairs. 

The Compute Engine product team are fully aware of this issue [3] and we are actively working on a user-modifiable hostname API feature which will allow you 
to change your VM instance hostname, but at this time, there’s no ETA however, I was able to confirm internally that this feature will be available within 
the next couple months in alpha release, please keep in mind that there's no preset date for the release as testing is still ongoing. 

For your convenience, I have also created a public issue tracker, hence all future updates including the launch of the 
user-modifiable hostname API alpha will be posted on the thread [4].

That being said, if you still wish to alter this process, there's a couple of workarounds available. 

1. You set that attribute for the file you do not want to change e.g. the hostname file, immutable. 
You can make the /etc directory including all its content immutable using the following command: 

$ sudo chattr -R +i /etc 

Or, set that attribute for the file you do not want to change which would be the host's file, using the following command. 

sudo chattr -i /etc/google_hostname.sh 

For more information on making files and directory immutable in Linux, you can see the following article [5] for more details. 

Alternatively, as suggested in our public doc [6] you can make static modifications in the resolv.conf file, 
several Linux distributions allow items to be prepended or appended to the DHCP policy" but I'm unable to confirm what impact this might have on the VM. 

I hope this was helpful. If this did not help or if you have any other questions or concerns about your issue, 
please do not hesitate to contact me by replying to this message. I will be more than happy to help at that time. 
