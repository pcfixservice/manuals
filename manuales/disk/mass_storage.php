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
<font size="6" color="red">LINUX MASS STORAGE AND NAMING CONVENTION</FONT>


If a mass storage device is connected to a Linux computer, the Linux kernel tries to locate any partitions. 
It then creates block-oriented device files in <font color="red">/dev</font> for the device itself and its partitions. You can subsequently 
access the partitions’ device files and make the directory hierarchies there available as part of the computer’s
file system.

A new mass storage device may have no partitions at all. In this case you can use suitable tools to create partitions. 
This will be explained later in this chapter. The next step after partitioning consists of generating file systems
on the partitions. 

The device names for mass storage are usually /dev/sda , /dev/sdb , ..., in the order the devices are recognised. 
Partitions are numbered, the /dev/sda device therefore contains partitions like /dev/sda1 , /dev/sda2 , ... <font color="red">A maximum 
of 15 partitions per device is possible.</font> If /dev/sda is partitioned according to the MBR scheme, /dev/sda1 to /dev/sda4 
correspond to the primary partitions (possibly including an extended partition), while any logical partitions are 
numbered starting with /dev/sda5 (regardless of whether there are four primary partitions on the disk or fewer).

The “ s ” in /dev/sda derives from “SCSI”. Today, almost all mass storage devices in Linux are managed as SCSI devices.
For P-ATA disks there is another, more specific mechanism. This accesses the IDE controllers inside the computer 
directly—the two drives connected to the first controller are called /dev/hda and /dev/hdb , the ones connected to
the second /dev/hdc and /dev/hdd . (These names are used independently of whether the drives actually exist or not—if
you have a single hard disk and a CD-ROM drive on your system, you do well to connect the one to one controller 
and the other to the other so they will not be in each other’s way.  Therefore you will have /dev/hda for the disk 
and /dev/hdc for the CD-ROM  drive.) Partitions on P-ATA disks are, again, called /dev/hda1 , /dev/hda2 and so on. 
<font color="red">In this scheme, 63 (!) partitions are allowed.</font>

If you still use a computer with P-ATA disks, you will notice that in the vast majority of cases the SCSI 
infrastructure is used for those, too (note the /dev/sda style device names). This is useful for convenience 
and consistency. Some very few P-ATA controllers are not supported by the SCSI infrastructure, and must use the 
old P-ATA specific infrastructure. 

The migration of an existing Linux system from “traditional” P-ATA drivers to the SCSI infrastructure should be 
well-considered and involve changing the configuration in <font color="red">/etc/fstab</font> such that file systems are not mounted via
their device files but via volume labels or UUIDs that are independent of the partitions’ device file names.

The Linux kernel’s mass storage subsystem uses a three-tier architecture. At architecture the bottom there are 
drivers for the individual SCSI host adapters, SATA or USB  controllers and so on, then there is a generic 
“middle layer”, on top of which there  are drivers for the various devices (disks, tape drives, ...) that you might 
encounter on a SCSI bus. This includes a “generic” driver which is used to access devices without a specialised driver 
such as scanners or CD-ROM recorders. (If you can still find any of those anywhere.)

Every SCSI host adapter supports one or more buses (“channels”). Up to 7 (or 15) other devices can be connected to each bus
and every device can support several “local unit numbers” (or LUNs), such as the individual CDs LUNs in a CD-ROM 
changer (rarely used). Every SCSI device in the system can  thus be describe by a quadrupel (⟨host⟩, ⟨channel⟩, ⟨ID⟩, 
⟨LUN⟩). Usually (⟨host⟩, ⟨channel⟩, ⟨ID⟩) are sufficient. B In former times you could find information on SCSI devices 
within the /proc/scsi/scsi directory. This is no longer available on current systems unless the kernel was compiled 
using “Legacy /proc/scsi support”. B Nowadays, information about “SCSI controllers” is available in /sys/class/
scsi_host (one directory per controller). This is unfortunately not quite as accessible as it used to be. 
You can still snoop around

Device names such as /dev/sda , /dev/sdb , etc. have the disadvantage of not being very illuminating. In addition
they are assigned to devices in the order of their  appearance. So if today you connect first your MP3 player and 
then your digital camera, they might be assigned the device files /dev/sdb and /dev/sdc ; if tomorrow  you start with
the digital camera and continue with the MP3 player, the names might be the other way round. This is of course a nuisance.
Fortunately, <font color="red">udev</font> assigns some symbolic names on top of the traditional device names. These can be found in /dev/block :
