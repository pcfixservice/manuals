<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type="text/css">
#wrapper{
word-wrap: break-word;
font-family: sans-serif;
font-size: 95%;
font-style: italic;

text-align: justify;
       width: 1043px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 15px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
        box-shadow: 0 0 15px rgba(0,0,0,.2);
border­radius: 100px;
padding: 10px;

}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>
<u></u>
<p><font size="6"></font></p>


<FONT SIZE="6"><font color="red">MODPROBE</font></FONT>...modprobe - high level handling of loadable modules


<font color="red">Kernel module commands and files:</font>

<font color="blue">lsmod</font>	Lists kernel modules that are currently loaded in /proc/modules,  along with their sizes and the number of times each one is used.


<font color="blue">modinfo</font>	Returns information about a specified module, including its attributes and their values.
<font color="blue">modprobe</font>      Loads a specified kernel module and any other modules on which it's dependent.
<font color="blue">hdparm</font>	Returns information about hard drives.
<font color="blue">sg_scan</font>	Scans the SCSI bus for devices connected to the controller.
<font color="blue">hwinfo</font>	Provides an overview of a system's hardware configuration.
<font color="blue">lsusb</font>	Returns information about the USB devices connected to a computer.
<font color="blue">lspci</font>	Returns information about the PCI devices connected to a computer.

In addition to commands, you can use specific files to configure kernel modules.

File	Description
<font color="blue">/proc</font> conntains a hierarchy of folders provide information about the system hardware and running processes.
<font color="blue">/sys</font>	Provides information about the installed hardware.
<font color="blue">/etc/modprobe.conf</font>	Loads specified modules when the computer starts up.





El programa modprobe es un comando de administración del sistema en Linux hecho para la gestión (visualización,
inclusión o exclusión) de módulos cargables al kernel. Módulo es la palabra que hay en Linux para referirse al 
tipo de software que hace el mismo truco que los drivers de Windows.

Durante el arranque del sistema modprobe típicamente revisa el contenido de tres objetos del sistema de archivos de Linux:

<font color="magenta">*</font>  /lib/modules/`uname -r`  Módulos del kernel y archivos relacionados para el kernel en uso.
<font color="magenta">*</font>  /etc/modules que contiene la lista de módulos opcionales que deben cargarse al kernel por omisión y
<font color="magenta">*</font>  /etc/modprobe.d/blacklist list  de módulos que no deben cargarse al kernel bajo ninguna circunstancia
<font color="magenta">*</font>  /var/log/dmesg  log file for kernel messages (ubuntu, Linux Mint and Derivates)



<FONT SIZE="6"><font color="red">OPTIONS</font></FONT></P>

<font color="blue"># modprobe -h</font>      used in ubuntu Linux version 3.19.0-32-generic

<font color="green">Usage:
	modprobe [options] [-i] [-b] modulename
	modprobe [options] -a [-i] [-b] modulename [modulename...]
	modprobe [options] -r [-i] modulename
	modprobe [options] -r -a [-i] modulename [modulename...]
	modprobe [options] -c
	modprobe [options] --dump-modversions filename
Management Options:
	-a, --all                   Consider every non-argument to
	                            be a module name to be inserted
	                            or removed (-r)
	-r, --remove                Remove modules instead of inserting
	    --remove-dependencies   Also remove modules depending on it
	-R, --resolve-alias         Only lookup and print alias and exit
	    --first-time            Fail if module already inserted or removed
	-i, --ignore-install        Ignore install commands
	-i, --ignore-remove         Ignore remove commands
	-b, --use-blacklist         Apply blacklist to resolved alias.
	-f, --force                 Force module insertion or removal.
	                            implies --force-modversions and
	                            --force-vermagic
	    --force-modversion      Ignore module's version
	    --force-vermagic        Ignore module's version magic

Query Options:
	-D, --show-depends          Only print module dependencies and exit
	-c, --showconfig            Print out known configuration and exit
	-c, --show-config           Same as --showconfig
	    --show-modversions      Dump module symbol version and exit
	    --dump-modversions      Same as --show-modversions

General Options:
	-n, --dry-run               Do not execute operations, just print out
	-n, --show                  Same as --dry-run
	-C, --config=FILE           Use FILE instead of default search paths
	-d, --dirname=DIR           Use DIR as filesystem root for /lib/modules
	-S, --set-version=VERSION   Use VERSION instead of `uname -r`
	-s, --syslog                print to syslog, not stderr
	-q, --quiet                 disable messages
	-v, --verbose               enables more messages
	-V, --version               show version
	-h, --help                  show this help</font>



<font color="blue">modprobe modulename</font>  Load a module in the kernel
<font color="blue">modprobe -r modulename or modprobe --remove modulename</font> Remove a module from the kernel
         modprobe exclude kernel modules invoking another command <font color="magenta">rmmod</font>

<font color="blue">depmod</font> — Generate a list of kernel module dependences and associated map files.
<font color="blue">insmod</font> — Insert a module into the Linux kernel.
<font color="blue">lsmod</font> — Show the status of Linux kernel modules found int /proc/modules, 1st column display is
        for module name, 2nd is the memory in kilobytes & 3rd column is who uses it

<font color="blue">modinfo</font> — Show information about a Linux kernel module.

<font color="blue">rmmod</font> — Remove a module from the Linux kernel.

<font color="green">Usage:
	rmmod [options] modulename ...
Options:
	-f, --force       forces a module unload and may crash your
	                  machine. This requires Forced Module Removal
	                  option in your kernel. DANGEROUS
	-s, --syslog      print to syslog, not stderr
	-v, --verbose     enables more messages
	-V, --version     show version
	-h, --help        show this help</font>

<font color="blue">tail -f /var/log/syslog</font> inform th next message when execute the firmwware  
dpkg -i linux-firmware-nonfree_1.14ubuntu1_all.deb

Oct 12 17:08:45 acer NetworkManager[1210]: <info> kernel firmware directory '/lib/firmware' changed
and when we executed   <font color="blue">sudo modprobe -r b43 && sudo modprobe b43</font>

<font color="blue">tail -f /var/log/syslog</font>

Oct 12 17:17:25 acer kernel: [ 2093.944101] ssb: Found chip with id 0x4318, rev 0x02 and package 0x00
Oct 12 17:17:25 acer kernel: [ 2093.944121] ssb: Core 0 found: ChipCommon (cc 0x800, rev 0x0D, vendor 0x4243)
Oct 12 17:17:25 acer kernel: [ 2093.944137] ssb: Core 1 found: IEEE 802.11 (cc 0x812, rev 0x09, vendor 0x4243)
Oct 12 17:17:25 acer kernel: [ 2093.944153] ssb: Core 2 found: PCI (cc 0x804, rev 0x0C, vendor 0x4243)
Oct 12 17:17:25 acer kernel: [ 2093.944168] ssb: Core 3 found: PCMCIA (cc 0x80D, rev 0x07, vendor 0x4243)
Oct 12 17:17:25 acer kernel: [ 2093.996772] ssb: Sonics Silicon Backplane found on PCI device 0000:06:00.0
Oct 12 17:17:25 acer kernel: [ 2094.255446] b43-phy2: Broadcom 4318 WLAN found (core revision 9)
Oct 12 17:17:25 acer kernel: [ 2094.283801] b43-phy2: Found PHY: Analog 3, Type 2 (G), Revision 7
Oct 12 17:17:25 acer kernel: [ 2094.283827] b43-phy2: Found Radio: Manuf 0x17F, ID 0x2050, Revision 8, Version 0
Oct 12 17:17:25 acer kernel: [ 2094.292674] Broadcom 43xx driver loaded [ Features: PNL ]
Oct 12 17:17:25 acer kernel: [ 2094.295520] ieee80211 phy2: Selected rate control algorithm 'minstrel_ht'
Oct 12 17:17:26 acer NetworkManager[1210]: <info> rfkill1: found WiFi radio killswitch (at /sys/devices/pci0000:00/0000:00:1e.0/0000:05:06.0/0000:06:00.0/ssb0:0/ieee80211/phy2/rfkill1) (driver b43)
Oct 12 17:17:26 acer kernel: [ 2094.928373] b43 ssb0:0 wlan2: renamed from wlan0
Oct 12 17:17:26 acer kernel: [ 2094.929783] systemd-udevd[5083]: renamed network interface wlan0 to wlan2
Oct 12 17:17:26 acer NetworkManager[1210]: <info> (wlan2): using nl80211 for WiFi device control
Oct 12 17:17:26 acer NetworkManager[1210]: <info> (wlan2): driver supports Access Point (AP) mode
Oct 12 17:17:26 acer NetworkManager[1210]: <info> (wlan2): new 802.11 WiFi device (driver: 'b43' ifindex: 5)
Oct 12 17:17:26 acer NetworkManager[1210]: <info> (wlan2): exported as /org/freedesktop/NetworkManager/Devices/2
Oct 12 17:17:26 acer NetworkManager[1210]: <info> (wlan2): device state change: unmanaged -> unavailable (reason 'managed') [10 20 2]
Oct 12 17:17:26 acer NetworkManager[1210]: <info> (wlan2): bringing up device.
Oct 12 17:17:26 acer kernel: [ 2095.376061] b43-phy2: Loading firmware version 666.2 (2011-02-23 01:15:07)
Oct 12 17:17:26 acer NetworkManager[1210]: <info> (wlan2): preparing device.
Oct 12 17:17:26 acer NetworkManager[1210]: <info> (wlan2): deactivating device (reason 'managed') [2]
Oct 12 17:17:26 acer kernel: [ 2095.468357] IPv6: ADDRCONF(NETDEV_UP): wlan2: link is not ready
Oct 12 17:17:26 acer NetworkManager[1210]:    SCPlugin-Ifupdown: devices added (path: /sys/devices/pci0000:00/0000:00:1e.0/0000:05:06.0/0000:06:00.0/ssb0:0/net/wlan2, iface: wlan2)
Oct 12 17:17:26 acer NetworkManager[1210]:    SCPlugin-Ifupdown: device added (path: /sys/devices/pci0000:00/0000:00:1e.0/0000:05:06.0/0000:06:00.0/ssb0:0/net/wlan2, iface: wlan2): no ifupdown configuration found.
Oct 12 17:17:27 acer NetworkManager[1210]: <info> (wlan2) supports 4 scan SSIDs
Oct 12 17:17:27 acer NetworkManager[1210]: <info> (wlan2): supplicant interface state: starting -> ready
Oct 12 17:17:27 acer NetworkManager[1210]: <info> (wlan2): device state change: unavailable -> disconnected (reason 'supplicant-available') [20 30 42]
Oct 12 17:17:27 acer NetworkManager[1210]: <warn> Trying to remove a non-existant call id.
Oct 12 17:17:27 acer wpa_supplicant[1275]: wlan2: CTRL-EVENT-SCAN-STARTED 
Oct 12 17:17:27 acer NetworkManager[1210]: <info> (wlan2): supplicant interface state: ready -> disconnected
Oct 12 17:17:27 acer NetworkManager[1210]: <info> (wlan2) supports 4 scan SSIDs
Oct 12 17:17:27 acer kernel: [ 2096.394988] spurious 8259A interrupt: IRQ7.
Oct 12 17:17:28 acer NetworkManager[1210]: <info> (wlan2): supplicant interface state: disconnected -> inactive
Oct 12 17:17:29 acer ModemManager[860]: <warn>  Couldn't find support for device at '/sys/devices/pci0000:00/0000:00:1e.0/0000:05:06.0/0000:06:00.0': not supported by any plugin


<font color="blue">tail -f /var/log/kern.log</font>

Oct 12 17:17:25 acer kernel: [ 2093.944101] ssb: Found chip with id 0x4318, rev 0x02 and package 0x00
Oct 12 17:17:25 acer kernel: [ 2093.944121] ssb: Core 0 found: ChipCommon (cc 0x800, rev 0x0D, vendor 0x4243)
Oct 12 17:17:25 acer kernel: [ 2093.944137] ssb: Core 1 found: IEEE 802.11 (cc 0x812, rev 0x09, vendor 0x4243)
Oct 12 17:17:25 acer kernel: [ 2093.944153] ssb: Core 2 found: PCI (cc 0x804, rev 0x0C, vendor 0x4243)
Oct 12 17:17:25 acer kernel: [ 2093.944168] ssb: Core 3 found: PCMCIA (cc 0x80D, rev 0x07, vendor 0x4243)
Oct 12 17:17:25 acer kernel: [ 2093.996772] ssb: Sonics Silicon Backplane found on PCI device 0000:06:00.0
Oct 12 17:17:25 acer kernel: [ 2094.255446] b43-phy2: Broadcom 4318 WLAN found (core revision 9)
Oct 12 17:17:25 acer kernel: [ 2094.283801] b43-phy2: Found PHY: Analog 3, Type 2 (G), Revision 7
Oct 12 17:17:25 acer kernel: [ 2094.283827] b43-phy2: Found Radio: Manuf 0x17F, ID 0x2050, Revision 8, Version 0
Oct 12 17:17:25 acer kernel: [ 2094.292674] Broadcom 43xx driver loaded [ Features: PNL ]
Oct 12 17:17:25 acer kernel: [ 2094.295520] ieee80211 phy2: Selected rate control algorithm 'minstrel_ht'
Oct 12 17:17:26 acer kernel: [ 2094.928373] b43 ssb0:0 wlan2: renamed from wlan0
Oct 12 17:17:26 acer kernel: [ 2095.376061] b43-phy2: Loading firmware version 666.2 (2011-02-23 01:15:07)
Oct 12 17:17:26 acer kernel: [ 2095.468357] IPv6: ADDRCONF(NETDEV_UP): wlan2: link is not ready
Oct 12 17:17:27 acer kernel: [ 2096.394988] spurious 8259A interrupt: IRQ7.


For a fresh installation, run these commands one-by-one in the terminal:

<font color="blue">sudo apt-get purge bcmwl-kernel-source</font>
<font color="blue">sudo apt-get install linux-firmware-nonfree</font>
<font color="blue">sudo apt-get install firmware-b43-installer</font>
<font color="blue">sudo modprobe -r b43 && sudo modprobe b43</font>
<font color="blue">sudo reboot</font>  





















