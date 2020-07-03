--Prework--

Remove the card from the PCMCIA slot.

If you have not already done so, enable your multiverse and universe repositories. If you do not know how, take a look here: https://help.ubuntu.com/community/Re...ositoriesHowto

Install ndiswrapper.

note: if you've already installed ndiswrapper in prior (most likely unsuccessful) attempts in making this card work, you will need to both remove the ndisgtk package, as well as remove the drivers from the Ndiswrapper module. See this post for instructions on how to remove previously loaded drivers: http://ubuntuforums.org/showpost.php...1&postcount=30
For Edgy, use this command.
Code:
sudo aptitude install ndiswrapper-common ndiswrapper-utils-1.8
For everything else, use this line instead:
Code:
sudo aptitude install ndiswrapper-common ndiswrapper-utils-1.9
also, please do NOT install the ndisgtk package because of this bug: https://launchpad.net/distros/ubuntu...per/+bug/59983

Prepare the windows driver.
1) Create a directory in your home folder called linksys:
Code:
cd
mkdir linksys
cd linksys
2) Download the Windows driver from Cisco.
Code:
http://homedownloads.cisco.com/downloads/driver/wpc54gv2_driver_utility_v2.02.zip
3) Extract the archive:
Code:
unzip wpc54g_v2_driver_utility_v2.02.zip&&cd WPC54Gv2_40826
4) Fix file naming convention problem (Linux is case sensitive and Windows is not, thus requiring this step)
Code:
mv tnet1130.sys TNET1130.sys
Code:
sed -e 's/tnet1130.sys/TNET1130.sys/' LSTINDS.INF > LSTINDS.new&& mv LSTINDS.new LSTINDS.INF
*note* the above command searches the file LSTINDS.INF for "tnet1130.sys" and replaces it with "TNET1130.sys". you are welcome to simply open LSTINDS.INF with your favorite text editor and make this change manually.

Load the driver into ndiswrapper module.
Code:
sudo ndiswrapper -i lsbcmnds.inf
sudo ndiswrapper -i LSTINDS.INF
sudo modprobe ndiswrapper
--Make the arrangement work at boot--

Blacklist the troublesome acx driver

*note* This step is not necessary for Karmic because the ACX module is not included in Karmic.
Code:
sudo modprobe -r acx
echo "blacklist acx" | sudo tee -a /etc/modprobe.d/blacklist
Make the ndiswrapper module load at boot
Code:
echo "ndiswrapper" | sudo tee -a /etc/modules
--Check your configuration--

Now insert your card and do the following
Code:
ndiswrapper -l
note: this is a lower case L, not an upper case i or the number one.

You should get output that looks something like this:
Code:
Installed drivers:
lsbcmnds                driver installed
lstinds         driver installed, hardware present
If not, you may need to go back and review some of the steps or take a look at the wiki here: https://help.ubuntu.com/community/Wi...ndiswrapper%29, or simply post in this thread and I will be more than happy to assist you.

If all has gone well up to this point, then you can open networking and configure your card. Congratulations, you now have a working wpc54g v2 card!
