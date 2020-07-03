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
<font size="6" color="red">Master Boot Record</FONT>



The traditional method stores partitioning information inside the “master boot record” (MBR), the 
first sector (number 0) of a hard disk. (Traditionally, PC hard disk sectors are 512 bytes long, but 
see below.) The space there—64 bytes starting primary partitions at offset 446—is sufficient for 
four primary partitions. If you want to create more  extended partition than four partitions, you 
must use one of these primary partitions as an extended logical partitions partition. An extended 
partition may contain further logical partitions. 

The details about logical partitions are not stored inside the MBR, but at the start of the partition (
extended or logical) in question, i. e., they are scattered around the hard disk. Partition entries 
today usually store the starting sector number of the partition on the disk as well as the length of
the partition in question in sectors. Since these values are 32-bit numbers, given the common 512-byte 
sectors this results in a maximum partition size of 2 TiB.

There are hard disks available today which are larger than 2 TiB. Such disks cannot be made fully 
accessible using MBR partitioning. One common use  consists in using disks whose sectors are 4096 bytes 
long instead of 512. This will let you have 16-TiB disks even with MBR, but not every operating sys-
tem supports such “4Kn” drives (Linux from kernel 2.6.31, Windows from 8.1 or Server 2012).

Sectors are useful on hard disks even without considering partitions. The larger sectors are more efficient 
for storing larger files and allow better error correction. Therefore the market offers “512e” disks 
which use 4-KiB sectors internally but pretend to the outside that they really have 512-byte sectors.
This means that if a single 512-byte sector needs to be rewritten, the  adjoining 7 sectors must be 
read and also rewritten (a certain, but usually bearable, loss of efficiency, since data is most often
written in larger chunks).

When partitioning, you will have to pay attention that the 4-KiB blocks that Linux uses internally for 
hard disk access coincide with the disk’s internal 4-KiB sectors—if that is not the case, then to write
one 4-KiB Linux block two 4-KiB disk sectors might have to be read and rewritten, and that would not
be good. (Fortunately, the partitioning tools help you watch out for this.) Besides the starting address
 and length of the (primary) partitions, the partition table contains a partition type which loosely 
describe the type of data management structure that might appear on the partition.


<font size="6" color="red">HOW TO DETECT IF MY DISK IS USING GPT OR MBR FROM A TERMINAL?</font>

<font color="red">*</font>If you use an MS-DOS partition table (or MBR), you can only have up to four primary/extended partitions.
<font color="red">*</font>If you use a GUID partition table (GPT) with default settings, you can have up to 128 partitions.


To find whether your disk is GPT or MBR in ubuntu,you have to install gdisk utility.

<font color="blue">sudo apt-get install gdisk </font> #Then run the below command.

<font color="blue">sudo gdisk -l /dev/sda</font>

If the output of the above command shows like this,then you have MBR disk,
<font color="green">Partition table scan:
MBR: MBR only
BSD: not present
APM: not present
GPT: not present</font>

If the output shows like this then you have GPT disk,
<font color="green">Partition table scan:
MBR: protective
BSD: not present
APM: not present
GPT: present</font>

<FONT COLOR="RED">USING PARTED INSTALL PARTED</FONT>

You can use this command, replace /dev/sda with your device:

<font color="blue">parted /dev/sda print | grep -i '^Partition Table'</font>

You may need to install it first: <font color="blue">sudo apt-get install parted</font>

<font color="green">Example output:
Partition Table: msdos</font>


<font color="red">USING GDISK INSTALL GDISK</font>

Install it first:

<font color="blue">sudo apt-get install gdisk</font>

Then, you can use this command, replace /dev/sda with your device:

<font color="blue">gdisk -l /dev/sda | grep -A4 '^Partition table scan:'</font>

<font color="green">Example output:

Partition table scan:
  MBR: MBR only
  BSD: not present
  APM: not present
  GPT: not present</font>

<font color="red">USING FDISK</font>

Run this command, replacing /dev/sda with your device:

<font color="blue">fdisk -l /dev/sda</font>

It will show a warning if the device uses GPT:

WARNING: GPT (GUID Partition Table) detected on '/dev/sda'! The util fdisk doesn't support GPT. Use GNU Parted.


<FONT SIZE="6" COLOR="RED">HOW TO CLEAN OR DELETE THE MBR IN LINUX</FONT>

To format just your MBR  <font color="blue">dd if=/dev/zero of=/dev/sda bs=446 count=1</font>

To format (remove) your MBR & partition table <font color="blue">sudo dd if=/dev/zero of=/dev/sda count=1 bs=512</font>



<font size="6" color="red">HOW DO I COPY MBR FROM ONE HARD DISK TO ANOTHER HARD DISK?</font>

To copy MBR simply use the <font color="red">dd</font> command. dd command works under all Linux distros and 
other UNIX like operating systems too. A master boot record (MBR) is the 512-byte boot sector that is the 
first sector of a partitioned data storage device of a hard disk


MBR Total Size

<font color="orange">446 + 64 + 2 = 512</font>

Where,

<font color="orange">446 bytes – Bootstrap.  or Master Record
64 bytes – Partition table.
2 bytes – Signature.
512 vs 446 Bytes</font>

Use 446 bytes to overwrite or restore your /dev/XYZ MBR boot code only with the contents of $mbr.backup.file.
Use 512 bytes to overwrite or restore your /dev/XYZ the full MBR (which contains both boot code and the drive’s 
partition table) with the contents of $mbr.backup.file.

dd command to copy MBR (<font color="red">identically sized partitions only</font>)

Type dd command as follows:
<font color="blue">dd if=/dev/sda of=/dev/sdb bs=512 count=1</font>

Above command will copy 512 bytes (MBR) from sda to sdb disk. 
<font color="red">This will only work if both discs have identically sized partitions.</font>


dd command for two discs with different size partitions
<font color="blue"># dd if=/dev/sda of=/tmp/mbrsda.bak bs=512 count=1</font>

Now to restore the image to any sdb:
<font color="blue"># dd if=/tmp/mbrsda.bak of=/dev/sdb bs=446 count=1</font>

The above commands will preserve the partitioning schema.



<FONT SIZE="6" COLOR="RED">USING SFDISK COMMAND TO BACKUP THE EXTENDED PARTITIONS</FONT>

Linux sfdisk command can make a backup of the primary and extended partition table as follows. It creates a 
file that can be read in a text editor, or this file can be used by sfdisk to restore the primary/extended
partition table. 

To back up the partition table /dev/sda, enter: <font color="blue"># sfdisk -d /dev/sda > /tmp/sda.bak</font>

To restore, enter:<font color="blue"># sfdisk /dev/sda < /tmp/sda.bak</font>

The above command will restore extended partitions.


Task: Backup MBR and Extended Partitions Schema

Backup /dev/sda MBR, enter: <font color="blue"># dd if=/dev/sda of=/tmp/backup-sda.mbr bs=512 count=1</font>

Next, backup entries of the extended partitions: <font color="blue"># sfdisk -d /dev/sda > /tmp/backup-sda.sfdisk</font>

Copy /tmp/backup-sda.sfdisk and /tmp/backup-sda.mbr to USB pen or somewhere else safe over the network based nas server.

Task: Restore MBR and Extended Partitions Schema
To restore the MBR and the extended partitions copy backup files from backup media and enter:

<font color="blue"># dd if=backup-sda.mbr of=/dev/sda </font>
<font color="blue"># sfdisk /dev/sda < backup-sda.sfdisk</font>

Exercise to do   create several partitions more the 20 with mkfs, then backup the mbr  with dd,
backup the partition information with sfdisk. and finally restore them with the same utilities

