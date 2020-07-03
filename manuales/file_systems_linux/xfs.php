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
<font size="6" color="red">XFS File System</FONT>

The XFS file system was donated to Linux by SGI (the erstwhile Silicon Graphics, XFS Inc.); it is the 
file system used by SGI’s Unix variant, IRIX, <font color="red">which is able to handle very large files efficiently. </font>
All Linux distributions of consequence offer XFS support, even though few deploy it by default; you 
may have to install the XFS tools separately. it's know for it's technical sophistification, robustness, speed
and flexibility


In some circles, “XFS” is the abbreviation of “X11 Font Server”. This can occur in distribution package 
names. Don’t let yourself be confused. You can create an XFS file system on an empty partition (or file) 
using the  command  (insert the appropriate device name). Of course, the real work is done by a program called 
<font color="red">mkfs.xfs</font> . You can control it using various options; consult the documentation ( xfs (5) and mkfs.xfs (8))

<font color="blue"># mkfs -t xfs /dev/sda2</font>


<font size="6" color="red">About External XFS Journals</font>

If performance is your goal, you can, for example, create the journal on another (physical) storge medium 
by using an option like “ <font color="blue">-l logdev=/dev/sdb1,size=10000b</font> ”. (The actual file system should of course not be on 
/dev/sdb , and the partition for the journal should not otherwise be used.)

<font size="4" color="magenta">NOTE FROM ORACLE SITE</font>:The default location for an XFS journal is on the same block device as the data. 
As synchronous metadata writes to the journal must complete successfully before any associated data writes can start,
such a layout can lead to disk contention for the typical workload pattern on a database server. To overcome 
this problem, you can place the journal on a separate physical device with a low-latency I/O path. As the journal 
typically requires very little storage space, such an arrangement can significantly improve the file system's 
I/O throughput.(rendimiento) A suitable host device for the journal is a solid-state drive (SSD) device or a RAID device
with a battery-backed write-back cache.

To reserve an external journal with a specified size when you create an XFS file system, specify the 
<font color="blue">-l logdev=device,size=size</font> option to the <font color="red">mkfs.xfs</font> command. If you omit the size parameter, mkfs.xfs selects 
a journal size based on the size of the file system. To mount the XFS file system so that it uses the external journal,
specify the <font color="blue">-o logdev=device</font> option to the mount command.


<FONT SIZE="6" COLOR="RED" >STEPS TO  CREATE A XFS FILESYSTEM AND A EXTERNAL JORNUAL</FONT>

1.-Create a file with dd command.

[root@localhost partitions_images]#<font color="blue">dd if=/dev/zero of=/partition_xfs.img  bs=1M count=650</font> 

[root@localhost partitions_images]#<font color="blue">dd if=/dev/zero of=/journal_partition.img bs=1M count=650</font> 

2.- Partition the file using the fdisk or parted utility

3.-Create a device file for each of one of the files with the next command

<font color="blue">[root@localhost partitions_images]#losetup -f partition_xfs.img</font> 
<font color="blue">[root@localhost partitions_images]#losetup -f journal_partition.img</font> 
<font color="blue">[root@localhost partitions_images]#losetup -a</font>                     #check if there is device files available
<font color="blue">[root@localhost partitions_images]#lsetup -d  partition_xfs.img</font>   #release a device file
<font color="blue">[root@localhost partitions_images]#losetup -D</font>                     #release all of the device files currently loaded


4.-Create a device file  for the  partitions with kpartx

[root@localhost partitions_images]#<font color="blue"> kpartx -av /dev/loop0 </font> 
<font color="green">add map loop0p1 (253:0): 0 1329152 linear /dev/loop0 2048</font> 

[root@localhost partitions_images]#<font color="blue"> kpartx -av /dev/loop1 </font> 
<font color="green">add map loop1p1 (253:1): 0 1329152 linear /dev/loop1 2048</font> 


5.- The recently created file partitions should appear in the /dev/mapper directory

[root@localhost partitions_images]#<font color="blue"> ls -la /dev/mapper/</font> 
<font color="green">total 0
drwxr-xr-x.  2 root root     100 Mar 25 19:30 .
drwxr-xr-x. 18 root root    3540 Mar 25 19:30 ..
crw-------.  1 root root 10, 236 Mar 25 19:28 control
lrwxrwxrwx.  1 root root       7 Mar 25 19:28 <font color="magenta">loop0p1 -> ../dm-0</font> 
lrwxrwxrwx.  1 root root       7 Mar 25 19:30 <font color="magenta">loop1p1 -> ../dm-1</font> </font> 


6-utilize the mkfs.xfs command to create

[root@localhost partitions_images]# <font color="blue">mkfs.xfs -f /dev/mapper/loop0p1 -l logdev=/dev/mapper/loop1p1 </font> 
<font color="green">meta-data=/dev/mapper/loop0p1    isize=256    agcount=4, agsize=41536 blks
         =                       sectsz=512   attr=2, projid32bit=1
         =                       crc=0        finobt=0
data     =                       bsize=4096   blocks=166144, imaxpct=25
         =                       sunit=0      swidth=0 blks
naming   =version 2              bsize=4096   ascii-ci=0 ftype=0
<font color="magenta">log      =/dev/mapper/loop1p1    bsize=4096   blocks=166144, version=2</font> 
         =                       sectsz=512   sunit=0 blks, lazy-count=1
realtime =none                   extsz=4096   blocks=0, rtextents=0
[root@localhost partitions_images]# </font> 


7.- Mount the file system with its external journal 

[root@localhost partitions_images]#<font color="blue"> mount /dev/mapper/loop0p1 -o logdev=/dev/mapper/loop1p1 /mnt</font> 


The XFS tools contain a fsck.xfs (which you can invoke using “ <font color="blue">fsck -t xfs</font> ”), but this program doesn’t 
really do anything at all—it is merely there to give the system something to call when “all” file systems
are to be checked (which is easier than putting a special exception for XFS into fsck ). In actual fact,
XFS file systems are checked automatically on mounting if they have not been unmounted cleanly. 
If you want to check the consistency of an XFS or have to repair one, use the 

[root@localhost partitions_images]# <font color="blue">xfs_repair -n /dev/mapper/loop0p1 -l /dev/mapper/loop1p1 </font>

checks whether repairs are required; without the option, any repairs will be performed outright.


in extreme cases xfs_repair may not be able to repair the file system. In such a situation you can use 
xfs_metadump to create a dump of the filesystem’s metadata and send that to the developers: 

<font color="blue">xfs_metadump /dev/sdb1 sdb1.dump</font>

(The file system must not be mounted when you do this.) The dump is a binary file that does not contain 
actual file data and where all file names have been obfuscated. Hence there is no risk of inadvertently 
passing along confidential data. A dump that has been prepared using <font color="red">xfs_metadump</font> can be written back to
a file system (on a “real” storage medium or an image in a file) using <font color="red">xfs_mdrestore</font > . This will not 
include file contents as these aren’t part of the dump to begin with. Unless you are an  XFS   developer,
this command will not be particularly interesting to you.

The <font color="blue">xfs_info</font> command outputs information about a (mounted) XFS file system:

<img src="xfs_info.png" width="600" height="300" /></a>

You can see, for example, that the file system consists of 65536 blocks of 4 KiB each ( bsize and blocks
in the data section), while the journal occupies 853 4-KiB blocks in the same file system (Intern, bsize
and blocks in the log section). The same information is output by mkfs.xfs after creating a new XFS file
system.

You should avoid copying XFS file systems using dd (or at least proceed very cautiously). This is because
every XFS file system contains a unique UUID, and programs like <font color="red">xfsdump</font> (which makes backup copies)can get
confused if they run into two independent file systems using the same UUID. To copy XFS file systems,use 
<font color="red">xfsdump</font> and <font color="red">xfsrestore</font> or <font color="red">else xfs_copy</font> instead.




