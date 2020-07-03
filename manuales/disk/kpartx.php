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
<font size="6" color="red">loop Devices and kpartx</FONT>


Linux has the useful property of being able to treat files like storage media. This means that if you have
a file you can partition it, generate file systems, and generally treat the “partitions” on that file as if
they were partitions on a “real” hard disk. In real life, this can be useful if you want to access CD-ROMs 
or DVDs without having a suitable drive in your computer (it is also faster). For learning purposes, it means
that you can perform various experiments without having to obtain extra hard disks or mess with your computer.
A CD-ROM image can be created straightforwardly from an existing CD-ROM

<font color="blue">dd if=/dev/cdrom of=cdrom.iso bs=1M</FONT>

You can subsequently make the image directly accessible:

<font color="blue"># mount -o loop,ro cdrom.iso /mnt</FONT>


You can also use the dd command to create an empty file:

<font color="blue">dd if=/dev/zero of=/mnt/image.disk bs=1M count=1024 </font> 

#Now you can use one of the common partitioning tools:

<font color="blue">fdisk /mnt/image.disk</font>   or  <font color="blue">parted /mnt/image.disk</font>

Before you can do anything with the result, you will have to ensure that there are device files available 
for the partitions (unlike with “real” storage media, this is not automatic for simulated storage media in files)
To do so, you will first need a device file for the file as a whole. This—a so-called “loop device”—can be created
using the losetup command:

<font color="blue"># losetup -f /tmp/disk.img </FONT>    #The “ -f ” option makes the program search for the first free name
<font color="blue"># losetup -a  </FONT>                 #utputs a list of the currently active loop devices
<font color="green">/dev/loop0: [2050]:93 (/tmp/disk.img)</FONT>

Once you have assigned your disk image to a loop device, you can create device files for its partitions. 
This is done using the <font color="red">kpartx</font> command. You may have to install kpartx first. On Debian and Ubuntu, the 
package is called kpartx .

The command to create device files for the partitions on <font color="red">/dev/loop0</font> is:

<font color="blue"># kpartx -av /dev/loop0</font>
<font color="green">add map loop0p1 (254:0): 0 20480 linear /dev/loop0 2048
add map loop0p2 (254:1): 0 102400 linear /dev/loop0 22528</font>

(without the “ -v ” command, kpartx keeps quiet). The device files then appear in the /dev/mapper directory:

<font color="blue"># ls /dev/mapper</font>
<font color="green">control loop0p1 loop0p2</font>

Now nothing prevents you from, e. g., creating file systems on these “partitions” and mounting them into your 
computer’s directory structure. When you no longer need the device files for the partitions, you can remove
them again using the next command:

<font color="blue"># kpartx -dv /dev/loop0</font>
<font color="green">del devmap : loop0p2
del devmap : loop0p1</font>

An unused loop device can be released using:

<font color="blue"># losetup -d /dev/loop0</font>  the  <font color="blue">#losetup -D</font> command releases all loop devices









33.7. Accessing data from a guest disk image
There are various methods for accessing the data from guest image files. One common method is to use the kpartx tool, covered by this section, to mount the guest file system as a loop device which can then be accessed.
The kpartx command creates device maps from partition tables. Each guest storage image has a partition table embedded in the file.
The libguestfs and guestfish packages, available from the EPEL repository, allow advanced modification and access to guest file systems. The libguestfs and guestfish packages are not covered in this section at this time.
Warning
Guests must be offline before their files can be read. Editing or reading files of an active guest is not possible and may cause data loss or damage.
⁠
Procedure 33.1. Accessing guest image data

Install the kpartx package.
# yum install kpartx
Use kpartx to list partition device mappings attached to a file-based storage image. This example uses a image file named guest1.img.
# kpartx -l /var/lib/libvirt/images/guest1.img
loop0p1 : 0 409600 /dev/loop0 63
loop0p2 : 0 10064717 /dev/loop0 409663
guest1 is a Linux guest. The first partition is the boot partition and the second partition is an EXT3 containing the root partition.
Add the partition mappings to the recognized devices in /dev/mapper/.
# kpartx -a /var/lib/libvirt/images/guest1.img
Test that the partition mapping worked. There should be new devices in the /dev/mapper/ directory
# ls /dev/mapper/
loop0p1
loop0p2
The mappings for the image are named in the format loopXpY.
Mount the loop device which to a directory. If required, create the directory. This example uses /mnt/guest1 for mounting the partition.
# mkdir /mnt/guest1
# mount /dev/mapper/loop0p1 /mnt/guest1 -o loop,ro
The files are now available for reading in the /mnt/guest1 directory. Read or copy the files.
Unmount the device so the guest image can be reused by the guest. If the device is mounted the guest cannot access the image and therefore cannot start.
# umount /mnt/tmp
Disconnect the image file from the partition mappings.
# kpartx -d /var/lib/libvirt/images/guest1.img
The guest can now be started again.
Accessing data from guest LVM volumes
Many Linux guests use Logical Volume Management (LVM) volumes. Additional steps are required to read data on LVM volumes on virtual storage images.
Add the partition mappings for the guest1.img to the recognized devices in the /dev/mapper/ directory.
# kpartx -a /var/lib/libvirt/images/guest1.img
In this example the LVM volumes are on a second partition. The volumes require a rescan with the vgscan command to find the new volume groups.
# vgscan
Reading all physical volumes . This may take a while...
Found volume group "VolGroup00" using metadata type lvm2
Activate the volume group on the partition (called VolGroup00 by default) with the vgchange -ay command.
# vgchange -ay VolGroup00
2 logical volumes in volume group VolGroup00 now active.
Use the lvs command to display information about the new volumes. The volume names (the LV column) are required to mount the volumes.
# lvs
LV VG Attr Lsize Origin Snap% Move Log Copy%
LogVol00 VolGroup00 -wi-a- 5.06G
LogVol01 VolGroup00 -wi-a- 800.00M
Mount /dev/VolGroup00/LogVol00 in the /mnt/guestboot/ directory.
# mount /dev/VolGroup00/LogVol00 /mnt/guestboot
The files are now available for reading in the /mnt/guestboot directory. Read or copy the files.
Unmount the device so the guest image can be reused by the guest. If the device is mounted the guest cannot access the image and therefore cannot start.
# umount /mnt/
Disconnect the volume group VolGroup00
# vgchange -an VolGroup00
Disconnect the image file from the partition mappings.
# kpartx -d /var/lib/libvirt/images/guest1.img
The guest can now be restarted.







