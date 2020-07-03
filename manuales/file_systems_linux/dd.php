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
<font size="6" color="red">DD Command</FONT>

dd is a command for copying files “by block”. It is used with particular preference to create “images”,
that is to say complete copies of file systems—for example, when preparing for the complete restoration 
of the system in case of a catastrophic disk failure.

dd (short for “copy and convert” 2 ) reads data block by block from an input file and writes it unchanged
to an output file. The data’s type is of no consequence. Neither does it matter to dd whether the files in 
question are regular files or device files.

Using dd , you can create a quickly-restorable backup copy of your system partition as follows:


<font color="blue"># dd if=/dev/sda2 of=/data/sda2.dump</font>

This saves the second partition of the first SCSI disk to a file called /data/sda2.dump —this file should 
of course be located on another disk. If your first disk is damaged, you can easily and very quickly restore 
the original state after replacing it with an identical (!) drive:

<font color="blue"># dd if=/data/sda2.dump of=/dev/sda2</font>

(If /dev/sda is your system disk, you must of course have booted from a rescue or live system.) For this to work, 
the new disk drive’s geometry must match that of the old one. partition table In addition, the new disk drive 
needs a partition table that is equivalent to the old one. You can save the partition table using dd as well 
(at least for MBR-partitioned disks):

<font size="6" color="red">DELETE AND RESTORE /BOOT PARTITION IN CENTOS 7 64 BITS</font>


FIRST ALL THE DETAILS ABOUT THE /dev/sda1 where the /boot is mounted

[root@localhost ~]#<font color="blue"> fdisk -l</font>


<font color="green">Disk /dev/sda: 30.7 GB, 30703796224 bytes, 59968352 sectors
Units = sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disk label type: dos
Disk identifier: 0x00018cb0

   Device Boot      Start         End      Blocks   Id  System
<font color="magenta">/dev/sda1   *        2048     1026047      512000   83  Linux</font>
/dev/sda2         1026048     5222399     2098176   82  Linux swap / Solaris
/dev/sda3         5222400    59967487    27372544   83  Linux</font>

[root@localhost ~]#<font color="blue"> blkid</font>
<font color="green">/dev/sda1: UUID="b8355e6d-fec9-4739-84ef-eda638bf8442" TYPE="xfs"</font>

[root@localhost ~]#<font color="blue"> lsblk</font>
<font color="green">NAME   MAJ:MIN RM  SIZE RO TYPE MOUNTPOINT
sda      8:0    0 28.6G  0 disk 
├─sda1   8:1    0  500M  0 part /boot</font>


[root@localhost ~]# <font color="blue">parted /dev/sda1 </font>
<font color="green">GNU Parted 3.1
Using /dev/sda1
Welcome to GNU Parted! Type 'help' to view a list of commands.
(parted) print                                                            
Model: Unknown (unknown)
Disk /dev/sda1: 524MB
Sector size (logical/physical): 512B/512B
Partition Table: loop
Disk Flags: 

Number  Start  End    Size   File system  Flags
 1      0.00B  524MB  524MB  xfs</font>



mint mint # parted /dev/sda1
GNU Parted 2.3
Using /dev/sda1
Welcome to GNU Parted! Type 'help' to view a list of commands.
(parted) print                                                            
Model: Unknown (unknown)
Disk /dev/sda1: 524MB
Sector size (logical/physical): 512B/512B
Partition Table: loop

Number  Start  End    Size   File system  Flags
 1      0.00B  524MB  524MB  xfs




The procedure to delete the partition with fdisk or parted doesn't worked so we deleted the /dev/sda1 
partition with GPARTED utility this is the detail of log:

GParted 0.18.0 --enable-libparted-dmraid --enable-online-resize

Libparted 2.3
Delete /dev/sda1 (xfs, 499.73 MiB) from /dev/sda  00:00:01    ( SUCCESS )
     	
calibrate /dev/sda1  00:00:00    ( SUCCESS )
     	
path: /dev/sda1
start: 1
end: 1023437
size: 1023437 (499.73 MiB)
delete partition  00:00:01    ( SUCCESS )

========================================
Create Primary Partition #1 (xfs, 500.00 MiB) on /dev/sda  00:00:00    ( SUCCESS )
     	
create empty partition  00:00:00    ( SUCCESS )
     	
path: /dev/sda1
start: 2048
end: 1026047
size: 1024000 (500.00 MiB)
clear old file system signatures in /dev/sda1  00:00:00    ( SUCCESS )
     	
write 68.00 KiB of zeros at byte offset 0  00:00:00    ( SUCCESS )
write 4.00 KiB of zeros at byte offset 67108864  00:00:00    ( SUCCESS )
write 4.00 KiB of zeros at byte offset 524283904  00:00:00    ( SUCCESS )
flush operating system cache of /dev/sda  00:00:00    ( SUCCESS )
set partition type on /dev/sda1  00:00:00    ( SUCCESS )
     	
new partition type: xfs
create new xfs file system  00:00:00    ( SUCCESS )
     	
mkfs.xfs -f -L "" /dev/sda1
     	
meta-data=/dev/sda1 isize=256 agcount=4, agsize=32000 blks
= sectsz=512 attr=2, projid32bit=0
data = bsize=4096 blocks=128000, imaxpct=25
= sunit=0 swidth=0 blks
naming =version 2 bsize=4096 ascii-ci=0
log =internal log bsize=4096 blocks=1200, version=2
= sectsz=512 sunit=0 blks, lazy-count=1
realtime =none extsz=4096 blocks=0, rtextents=0

========================================







<font color="red">How to re-read partition table or how to inform to the kernel about changes in the partition table</font>

mint mint #<font color="blue"> hdparm -d /dev/sda1</font>
<font color="green">/dev/sda1:
HDIO_GET_DMA failed: Inappropriate ioctl for device</font>





<font color="blue"># dd if=/dev/sda of=/media/floppy/mbr_sda.dump bs=512 count=1</font>

Used like this, dd does not save all of the hard disk to floppy disk, but writes every thing in chunks of 
512 bytes ( bs=512 )—one chunk ( count=1 ), to be exact. In effect, all of the MBR is written to the floppy. 
This kills two birds with the same stone: the boot loader’s stage 1 also ends up back on the hard disk after 
the MBR is restored:

<font color="orange">NOTE:  Seriously! The dd command is inspired by a corresponding command on IBM mainframes (hence
the parameter syntax, which according to Unix standards is quite quaint), which was called CC (as in
“copy and convert”), but on Unix the cc name was already spoken for by the C compiler.</font>

<font color="blue">dd if=/media/floppy/mbr_sda.dump of=/dev/sda</font>

You do not need to specify a chunk size here; the file is just written once and is (hopefully) only 512 
bytes in size.  <font color="red">Caution: The MBR does not contain partitioning information for logical partitions! 
IF you use logical partitions, you should use a program like sfdisk to save all of the partitioning 
scheme—see below.</font>

To save partitioning information for GPT-partitioned disks, use, for example, gdisk (the b command).

dd can also be used to make the content of CD-ROMs or DVDs permanently accessible from hard disk. 
The 
<font color="blue"> dd if=/dev/cdrom of=/data/cdrom1.iso</font> 

places the content of the CD-ROM on disk. Since the file is an ISO image, hence contains a file system that 
the Linux kernel can interpret, it can also be mounted. After 

<font color="blue">mount -o loop,ro /data/cdrom.iso /mnt  </font>

you can access the image’s content. You can of course make this permanent using <font color="red">/etc/fstab .</font>
