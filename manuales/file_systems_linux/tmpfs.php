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
<font size="6" color="red">tmpfs File System</FONT>

tmpfs is a flexible implementation of a “RAM disk file system”, which stores files not on disk, 
but in the computer’s virtual memory. They can thus be accessed more quickly, but seldom used 
files can still be moved to swap space. The size of a tmpfs is variable up to a set limit. 
There is no special program for generating a tmpfs , but you can create it simply by mounting it: 
For example, the tmpfs
	
<font color="blue"># mount -t tmpfs -o size=1G,mode=0700 tmpfs /scratch</font>


If you type the mount command you will see /dev/shm as a tempfs file system. Therefore, it is a file system
which keeps all files in virtual memory. Everything in tmpfs is temporary in the sense that no files 
will be created on your hard drive. If you unmount a tmpfs instance, everything stored therein is lost. 
By default almost all Linux distros configured to use /dev/shm:

<font color="blue">$ df -h</font>

Sample outputs:

<font color="green">Filesystem            Size  Used Avail Use% Mounted on
/dev/mapper/wks01-root
                      444G   70G  351G  17% /
tmpfs                 3.9G     0  3.9G   0% /lib/init/rw
udev                  3.9G  332K  3.9G   1% /dev
<font color="magenta">tmpfs                 3.9G  168K  3.9G   1% /dev/shm</font>
/dev/sda1             228M   32M  184M  15% /boot</font>

Nevertheless, where can I use /dev/shm?

You can use <font color="red">/dev/shm</font> to improve the performance of application software such as Oracle or overall Linux 
system performance. On heavily loaded system, it can make tons of difference. For example VMware 
workstation/server can be optimized to improve your Linux host’s performance (i.e. improve the 
performance of your virtual machines).

In this example, remount /dev/shm with 8G size as follows:

<font color="blue"># mount -o remount,size=8G /dev/shm</font>

To be frank, if you have more than 2GB RAM + multiple Virtual machines, this hack always improves performance. 
In this example, you will give you tmpfs instance on <font color="red">/disk2/tmpfs</font> which can allocate 5GB RAM/SWAP in 
5K inodes and it is only accessible by root:

<font color="blue"># mount -t tmpfs -o size=5G,nr_inodes=5k,mode=700 tmpfs /disk2/tmpfs</font>

Where,

<font color="red">-o opt1,opt2</font> Pass various options with a -o flag followed by a comma separated string of options. 
               In this examples, I used the following options:
<font color="red">remount</font>:Attempt to remount an already-mounted filesystem. In this example, remount the system and increase its size.

<font color="red">size=8G or size=5G</font>:Override default maximum size of the /dev/shm filesystem. the size is given in bytes,
                    and rounded up to entire pages. The default is half of the memory. The size parameter also 
                    accepts a suffix % to limit this tmpfs instance to that percentage of your pysical RAM: 
                    the default, when neither size nor nr_blocks is specified, is size=50%. In this example 
                    it is set to 8GiB or 5GiB. The tmpfs mount options for sizing ( size, nr_blocks, and nr_inodes
                    accept a suffix k, m or g for Ki, Mi, Gi (binary kilo, mega and giga) and can be changed on remount.

<font color="red">nr_inodes=5k</font>:The maximum number of inodes for this instance. The default is half of the number of your physical 
               RAM pages, or (on a machine with highmem) the number of lowmem RAM pages, whichever is the lower.

<font color="red">mode=700</font> : Set initial permissions of the root directory.

<font color="red">tmpfs</font> : Tmpfs is a file system which keeps all files in virtual memory.

<font color="red">How do I restrict or modify size of /dev/shm permanently?</font>

You need to add or modify entry in /etc/fstab file so that system can read it after the reboot. Edit
, /etc/fstab as a root user, enter:

<font color="blue"># vi /etc/fstab</font>

Append or modify /dev/shm entry as follows to set size to 8G

<font color="green">none      /dev/shm        tmpfs   defaults,size=8G        0 0</font>

Save and close the file. For the changes to take effect immediately remount /dev/shm:

<font color="blue"># mount -o remount /dev/shm</font>

Verify the same:

<font color="blue"># df -h</font> 



<font size="6" color="red">WHAT IS THE DIFFERENCE BERTWEEN TMPFS AND RAM-DISK</FONT>
There are two file system types built into most modern Linux distributions which allow you to create
 a RAM based storage area which can be mounted and used link a normal folder.

Before using this type of file system you must understand the benefits and problems of memory file 
system in general, as well as the two different types. The two types of RAM disk file systems are 
<font color="red">tmpfs</font> and <font color="red">ramfs</font> and each type has it’s own strengths and weaknesses.

See my other post for details on how to create a RAM disk in Linux.

<font color="red">What is a memory based file system (RAM disk)?</font>

A memory based file system is something which creates a storage area directly in a computers RAM as 
if it were a partition on a disk drive. As RAM is a volatile type of memory which means when the 
system is restarted or crashes the file system is lost along with all it’s data.

The major benefit to memory based file systems is that they are very fast – 10s of times faster than 
modern SSDs. Read and write performance is massively increased for all workload types. These types 
of fast storage areas are ideally suited for applications which need repetitively small data areas 
for caching or using as temporary space. As the data is lost when the machine reboots the data must 
not be  precious as even scheduling backups cannot guarantee that all the data will be replicated in 
the even of a system crash.

<FONT COLOR="RED" SIZE="4">TMPFS VS. RAMFS</FONT>

The two main RAM based file system types in Linux are tmpfs and ramfs. ramfs is the older file system type 
and is largely replaced in most scenarios by tmpfs.

<FONT COLOR="RED">RAMFS</FONT>

ramfs creates an in memory file system which uses the same mechanism and storage space as Linux file 
system cache. Running the command free in Linux will show you the amount of RAM you have on your system
including the amount of file system cache in use. The below is an example of a 31GB of ram in a production server.

<font color="blue">free -g</font>
<font color="green">       total used free shared buffers cached
Mem:   31    29   2    0      0       8
-/+ buffers/cache: 20 11
Swap:  13    6    7</font>

Currently 8GB of file system cache is in use on the system. This memory is generally used by Linux to 
cache recently accessed files so that the next time they are requested then can be fetched from RAM 
very quickly. ramfs uses this same memory and exactly the same mechanism which causes Linux to cache 
files with the exception that it is not removed when the memory used exceeds threshold set by the system.

ramfs file systems cannot be limited in size like a disk base file system which is limited by it’s capacity.
ramfs will continue using memory storage until the system runs out of RAM and likely crashes or becomes 
unresponsive. This is a problem if the application writing to the file system cannot be limited in total 
size. Another issue is you cannot see the size of the file system in df and it can only be estimated by 
looking at the cached entry in free.

<FONT COLOR="RED" SIZE="4">TMPFS</FONT>

tmpfs is a more recent RAM file system which overcomes many of the drawbacks(inconvenientes) with ramfs. 
You can specify a size limit in tmpfs which will give a ‘disk full’ error when the limit is reached. 
This behaviour is exactly the same as a partition of a physical disk.

The size and used amount of space on  a tmpfs partition is also displayed in df. The below example shows 
an empty 512MB RAM disk.

<font color="blue">df -h /mnt/ramdisk</font>
<font color="green">Filesystem Size Used Avail Use% Mounted on
tmpfs      512M 0    512M  0%   /mnt/ramdisk</font>

These two differences between ramfs and tmpfs make tmpfs much more manageable  however this is one major 
drawback; tmpfs may use SWAP space. If your system runs out of physical RAM, files in your tmpfs partitions 
may be written to disk based SWAP partitions and will have to be read from disk when the file is next accessed. 
In some environments this can be seen as a benefit as you are less likely to get out of memory exceptions as 
you could with ramfs because more ‘memory’ is available to use.



<FONT COLOR="RED" SIZE="7">CENTOS 7 Activation and Configuration</FONT>


By default CentOS uses tmpfs for various things as you can see from the output of the df –h command:

[root@localhost user]# <font color="blue">df -h</FONT>
<font color="green">Filesystem      Size  Used Avail Use% Mounted on
/dev/sda3        27G  2.9G   24G  11% /
<font color="magenta">devtmpfs        600M     0  600M   0% /dev</FONT>
<font color="magenta">tmpfs           600M     0  600M   0% /dev/shm</FONT>
<font color="magenta">tmpfs           600M  6.7M  594M   2% /run</FONT>
<font color="magenta">tmpfs           600M     0  600M   0% /sys/fs/cgroup</FONT>
/dev/sda1       497M  116M  382M  24% /boot
<font color="magenta">tmpfs           600M     0  600M   0% /run/user/0</FONT>
<font color="magenta">tmpfs           600M     0  600M   0% /tmp</FONT></FONT>

/dev - directory contains the special device files for all the devices.
/dev/shm – contains shared memory allocation
/run - used for system logs
/sys/fs/cgroup - used for cgroups, a kernel feature to limit, police and account the resource usage of certain processes

One use of tmpfs is to obviously use it as a /tmp folder, you can do this in 2 ways:

Using systemctl to enable tmpfs in /tmp

You can use the systemctl command to enable tmpfs in the /tmp folder, first use the following command 
to check if this feature is not already enabled:

<font color="blue"># systemctl is-enabled tmp.mount</FONT>

Will show the current status of settings you can use the following command to enable it:

<font color="blue"># systemctl enable tmp.mount</FONT>

This will have the system controlling the /tmp folder and mount a tmpfs in it.


<FONT COLOR="RED">MANUALLY MOUNTING A /TMP/FS</FONT>

You can also manually add a tmpfs in /tmp by adding the following line to <font color="red">/etc/fstab:</FONT>

<font color="green">tmpfs /tmp tmpfs size=512m 0 0</FONT>

And then running the mount command like this:

<font color="blue"># mount –a</FONT>

This should make the tmpfs show in df –h, also it will automatically mount it the next time you reboot.



<FONT COLOR="RED" SIZE>CREATING A TMPFS ON THE FLY</FONT>

If for some reason you wish to create a tmpfs in a folder on the fly you can always use the following command:

<font color="blue"># mount -t tmpfs -o size=1G tmpfs /mnt/mytmpfs</FONT>

Of course you can specify any size you wish in the size option and any mount point you wish, 
just remember it must be a valid directory.
