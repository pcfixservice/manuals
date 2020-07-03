<style type="text/css">
#wrapper{


 font-family: sans-serif;
  font-size: 95%;
  font-style: italic;

text-align: justify;
       width: 1070px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 15px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
        box-shadow: 0 0 15px rgba(0,0,0,.2);
border­radius: 200px;

word-wrap: break-word;
}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>


<font color="red">RUNLEVEL DEFINITION</font>


A runlevel is a preset operating state on a Unix-like operating system.

A system can be booted into (i.e., started up into) any of several runlevels, each of which is represented by
a single digit integer. Each runlevel designates a different system configuration and allows access to a
different combination of processes (i.e., instances of executing programs).

There are differences in the runlevels according to the operating system. 
<font color="red">Seven</font> runlevels are supported in the standard Linux kernel
(i.e., core of the operating system). They are: 

<font color="red">0 - System halt;</font> no activity, the system can be safely powered down. 
<font color="red">1 - Single user;</font> rarely used. 
<font color="red">2 - Multiple users;</font>  no NFS (network filesystem); also used rarely. 
<font color="red">3 - Multiple users;</font> command line (i.e., all-text mode) interface; 
    the standard runlevel for most Linux-based server hardware. 
<font color="red">4 - User-definable</font>
<font color="red">5 - Multiple users, GUI (graphical user interface);</font>
     the standard runlevel for most Linux-based desktop systems. 
<font color="red">6 - Reboot;</font> used when restarting the system.

By default Linux boots either to runlevel 3 or to runlevel 5. The former permits the system to run all services 
except for a GUI. The latter allows all services including a GUI.

In addition to the standard runlevels, users can modify the preset runlevels or even create new ones if desired. 
Runlevels 2 and 4 are usually used for user defined runlevels.

The program responsible for altering the runlevel is init, and it can be called using the telinit command. For example, 
changing from runlevel 3 to runlevel 5, which allows the GUI to be started, can be accomplished by the root 
(i.e., administrative) user by issuing the following command:

<font color="	blue">telinit 5</font>

Booting into a different runlevel can help solve certain problems. For example, if a change made in the X Window System 
configuration on a machine that has been set up to boot into a GUI has rendered the system unusable, it is possible 
to temporarily boot into a console (i.e., all-text mode) runlevel (i.e., runlevels 3 or 1) in order to repair the error
and then reboot into the GUI. The X Window System is a widely used system for managing GUIs on single computers and on 
networks of computers.

Likewise, if a machine will not boot due to a damaged configuration file or will not allow logging in because of a 
corrupted /etc/passwd file (which stores user names and other data about users) or because of a forgotten password, 
the problem can solved by first booting into single-user mode (i.e. runlevel 1).

The runlevel command can be used to find both the current runlevel and the previous runlevel by merely typing the
following and pressing the Enter key:

<font color="blue">/sbin/runlevel</font>

The runlevel executable file (i.e., the ready-to-run form of the program) is typically located in the /sbin directory, 
which contains mostly administrative tools and which by default is not in the user's PATH 
(i.e., the list of directories in which the system searches for programs). Thus, it is usually necessary to type the 
full path of the command as shown above rather than just the name of the command itself.

The default runlevel for a system is specified in the /etc/inittab file, which will contain an entry such as 
id:3:initdefault: if the system starts in runlevel 3, or id:5:initdefault: if it starts in runlevel 5. This file can 
be easily (and safely) read with a command such as cat, i.e.,

<font color="blue">cat /etc/inittab</font>

As an alternative to telinit, the runlevel into which the system boots can be changed by modifying /etc/inittab manually 
with a text editor. However, it is generally easier and safer (i.e., less chance of accidental damage to the file) to use 
telinit. It is always wise to make a backup copy of /etc/inittab or any other configuration file before attempting to 
modify it manually.




<FONT COLOR="RED">HOW TO RENAME INTERFACES</FONT>



The best way to rename Ethernet devices is through udev. It is the device manager for the Linux kernel. 
Primarily, it manages device nodes in /dev. It is the successor of devfs and hotplug, which means that it 
handles /dev directory and all user space actions when adding/removing devices, including firmware load.

The order of the network interfaces may be unpredictable under certain configurations. Between reboots it 
usually stays the same, but often after an upgrade to a new kernel or the addition or replacement of a network
 card (NIC) the order of all network interfaces changes. For example, what used to be rl0 now becomes wlan0 
or what used to be eth0 now becoems eth2 or visa versa.

 
Step #1: Find out the MAC address of the Ethernet device

Type the following command:
<font color="blue"># ifconfig -a | grep -i --color hwaddr</font>

Sample outputs:

eth0      Link encap:Ethernet  HWaddr b8:ac:6f:65:31:e5
pan0      Link encap:Ethernet  HWaddr 4a:71:40:ed:5d:99
vmnet1    Link encap:Ethernet  HWaddr 00:50:56:c0:00:01
vmnet8    Link encap:Ethernet  HWaddr 00:50:56:c0:00:08
wlan0     Link encap:Ethernet  HWaddr 00:21:6a:ca:9b:10
Note down the MAC address.

<font color="red">Step #2: Rename eth0 as wan0</font>

To rename eth0 as wan0, edit a file called 70-persistent-net.rules in /etc/udev/rules.d/ directory, enter:

<font color="blue"># vi /etc/udev/rules.d/70-persistent-net.rules</font>

The names of the Ethernet devices are listed in this file as follows:

# PCI device 0x14e4:0x1680 (tg3)
SUBSYSTEM=="net", ACTION=="add", DRIVERS=="?*", ATTR{address}=="b8:ac:6f:65:31:e5", ATTR{dev_id}=="0x0", ATTR{type}=="1", 
KERNEL=="eth*", NAME="eth0"

<font color="orange">Locate and identify the line with the NIC from step 1 (look for the MAC address). It may look like above. 
In this example, the interface eth0 will be renamed to wan0 (change NAME="eth0" to NAME="wan0"):</font>

# PCI device 0x14e4:0x1680 (tg3)
SUBSYSTEM=="net", ACTION=="add", DRIVERS=="?*", ATTR{address}=="b8:ac:6f:65:31:e5", ATTR{dev_id}=="0x0", ATTR{type}=="1",
KERNEL=="eth*", NAME="wan0"

Save and close the file. Reboot the system to test changes:

<font color="blue"># reboot</font>

Verify new settings:
# ifconfig -a
# ifconfig wan0
# ifconfig -a | less
# ip addr show
