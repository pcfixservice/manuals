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
<font size="6" color="red">Mounting File Systems</FONT>

The mount command mounts file systems into the directory tree. It can also be used to display the 
currently mounted file systems, simply by calling it without parameters:

To mount a medium, a hard disk partition, you must specify its device file and the desired mount point:

<font color="blue"># mount -t ext2 /dev/sda5 /home</font>

It is not mandatory to specify the file system type using the -t option, since the kernel can generally 
figure it out for itself. If the partition is mentioned in /etc/fstab , it is sufficient to give either 
the mount point or the device file

<font color="blue">mount /dev/sda5</font>
<font color="blue"># mount /home</font>

Generally speaking, the <font color="red">/etc/fstab</font> file describes the composition of the whole /etc/fstab file system 
structure from various file systems that can be located on different partitions, disks etc. In addition 
to the device names and corresponding mount points, you can specify various options used to mount the 
file systems. The allowable options depend on the file system; many options are to be found in mount (8).

A typical /etc/fstab file could look similar to figure 7.1.<font color="magenta">The root partition usually occupies the first line.</font>>
Besides the “normal” file systems, pseudo file systems such as devpts or proc and the swap areas are mentioned here.

The third field describes the type of the file system in question. Entries like ext3 type and iso9660 
speak for themselves (if mount cannot decide what to do with the type specification, it tries to delegate 
the job to a program called /sbin/mount. ⟨type⟩), swap refers to swap space (which does not require mounting), 
and auto means that mount should try to determine the file system’s type.


To guess, mount utilises the content of the <font color="red">/etc/filesystems</font> file, or, if that file does not exist, the 
<font color="blue">/proc/filesystems</font> file. ( /proc/filesystems is also read if /etc/filesystems ends with a line containing 
just an asterisk.) <font color="red">In any case, mount processes only those lines that are not marked nodev</font> . For your edification,
here is a snippet from a typical /proc/filesystems file:


[root@localhost partitions_images]#<font color="blue"> cat /proc/filesystems </font>
<font color="green">nodev	sysfs
nodev	rootfs
nodev	bdev
nodev	proc
nodev	cgroup
nodev	cpuset
nodev	tmpfs
nodev	devtmpfs
nodev	debugfs
nodev	securityfs
nodev	sockfs
nodev	pipefs
nodev	anon_inodefs
nodev	configfs
nodev	devpts
nodev	ramfs
nodev	hugetlbfs
nodev	autofs
nodev	pstore
nodev	mqueue
nodev	selinuxfs
	xfs
	btrfs
	ext3
	ext2
	ext4
	iso9660
	vfat</font>


The kernel generates <font color="red">/proc/filesystems dynamically based on those file systems for which it actually 
contains drivers.</font>/etc/filesystems is useful if you want to specify an order for mount ’s guesswork 
that deviates(se desvia) from the one resulting from /proc/filesystems (which you cannot influence).

Before mount refers to /etc/filesystems , it tries its luck with the <font color="red">libblkid</font> and <font color="red">libvolume_id</font> libraries,
both of which are (among other things) able to determine which type of file system exists on a medium. 
You can experiment with these libraries using the command line programs blkid and vol_id


The fourth field contains the options, including: 

<font color="red">defaults:</font>   Is not really an option, but merely a place holder for the standard options

<font color="red">noauto:</font> Opposite of auto , keeps a file system from being mounted automatically when the system is booted.

<font color="red">user:</font> In principle, only root can mount storage devices (normal users may only use the simple mount command
to display information), unless the user option is set. In this case, normal users may say “ mount ⟨device⟩”
or “ mount ⟨mount point⟩”; this will mount the named device on the designated mount point. The user option 
will allow the mounting user to unmount the device ( root , too); there is a similar option users that allows
any user to unmount the device.

<font color="red">sync:</font> Write operations are not buffered in RAM but written to the medium directly. The end of the write 
operation is only signaled to the application program once the data have actually been written to the medium. 
This is useful for floppies or USB thumb drives, which might otherwise be inadvertently removed from the 
drive while unwritten data is still buffered in RAM.

<font color="red">ro:</font> This file system is mounted for reading only, not writing (opposite of rw )

<font color="red">exec:</font> Executable files on this file system may be invoked. The opposite is noexec ;exec is given here 
because the user option implies the noexec option (among others).

As you can see in the /dev/sdb entry, later options can overwrite earlier ones: user implies the noexec 
option, but the exec farther on the right of the line overwrites this default.




