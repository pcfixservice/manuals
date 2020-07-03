<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type="text/css">
#wrapper{
word-wrap: break-word;
font-family: sans-serif;
font-size: 98%;
font-style: italic;

text-align: auto;
       width: 1060px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 1px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 0px rgba(0,0,0,.2);
        box-shadow: 0 0 0px rgba(0,0,0,.2);
padding: 5px;

}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>
<u></u>
<font size="6"></font>
<font size="6" color="red">/sys File System</FONT>

Up to and including Linux 2.4, the /proc directory represented the only way to access details of the kernel 
and system configuration. However, the kernel developers disliked the uncontrolled growth of entries under 
/proc , in particular those whose purpose did not have anything whatsoever to do with processes (the orig-
inal intent of the directory). For this reason, the kernel developers decided to move, in the medium to 
long term, those aspects of /proc that didn’t have any sysfs thing to do with process management to a new
pseudo file system, sysfs , where stricter rules should apply. The sysfs is usually mounted on /sys , and 
is availablefrom the Linux kernel version 2.6 onwards.

In particular, /sys/bus allows accessing devices depending on their connection type (“bus”; pci , usb , 
scsi , ...). File /sys/devices/ also allows accessing devices, only the sort order is dfferent 
(device type, e. g., PCI bus address). This redundancy is implemented by means of symbolic links:

One disadvantage of the former kernel concept was the uncertainty about the assignment of interfaces 
assignment of interfaces to devices, such as the device files. The “numbering” of  devices (as in, sda ,
sdb , sdc , ..., or eth0 , eth1 , ...) was not easy to reproduce. sysfs, on the other hand, lets us 
assign interfaces to devices in an unambiguous fashion. You will find the interfaces in the directories 
/sys/block (block devices) and /sys/class (character devices, more or less)




<font size="6" color="red">/SYS IS DIFFERENT; EVEN ROOT CAN'T DIRECTLY CREATE STUFF THERE</font>

Like <font color="red">/proc</font> and <font color="red">/dev</font>, in Ubuntu and other OSes using the Linux kernel, <font color="red">/sys</font> is a virtual filesystem, what 
it represents is not real files on your disk (or anywhere).

<font color="red">In short, /sys is a way the kernel provides information about (physical and virtual) devices.</font>

Some entries in the <font color="red">/sys</font> filesystem are also meaningfully writable and writing to them is a way to 
dynamically set configuration for devices. (This should not be confused with the /dev filesystem; 
<font color="red">writing to entries in /dev is a way of sending data to devices</font>.)

But this still must be done as root. Rather than changing permission on /sys or any part of it, 
you should just perform those action as root with sudo as explained above.

This answer on Unix.SE explains how to do that, and even how to allow some non-administrators 
(who cannot perform most actions as root) to change some /sys settings.

<font color="red">Entries in /sys are created by the kernel and by drivers; you cannot just create them from the command-line.</font>
(As stated above, you can edit some as root, but you cannot generally make new ones from userspace except by 
loading kernel modules or otherwise installing drivers or modifying the kernel.)



