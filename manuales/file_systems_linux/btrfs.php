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
<font size="6" color="red">BTRFS File System</FONT>

Btrfs is considered the up-and-coming Linux file system for the future. It combines the properties 
traditionally associated with a Unix-like file system with some innovative ideas that are partly 
based on Solaris’s ZFS. Besides some features otherwise provided by the Logical Volume Manager(LVM;
such as the creation of file systems that span several physical storage media—or provided by the 
Linux kernel’s RAID support—such as the redundant storage of data on several physical  media  <font color="red">this 
includes transparent data compression, consistency checks on data blocks by means of checksums,and 
various others.</font> The “killer feature” is probably snapshots that can provide views of different ver-
sions of files or complete file hierarchies simultaneously 

Btrfs is several years younger than ZFS, and its design therefore contains a few neat(ordenado) ideas that 
hadn’t been invented yet when ZFS was first introduced. ZFS is currently considered the “state of 
the art” in file systems, but it is to be expected that some time in the not-too-distant future it 
will be overtaken by Btrfs


<font color="red">Btrfs is based, in principle, on the idea of “copy on write”</font>. This means that if you create a snapshot 
of a Btrfs file system, nothing is copied at all; the system only notes that a copy exists. The data is 
accessible both from the original file system and the snapshot, and as long as data is just being read,
the file systems can share the complete storage. Once write operations happen either in the original 
file system or the snapshot, only the data blocks being modified are copied. <font color="red">The data itself is stored 
in efficient data structures called B-trees.</font>



<font size="6" color="red">FILE SYSTEM CREATION</font>

Btrfs file systems are created with mkfs , as usual:

<font color="blue"># mkfs -t btrfs /dev/sdb1</font>

You can also mention several storage media, which will all be made part of the new file system. Btrfs 
stores metadata such as directory information redundantly on several media; by default, data is spread 
out across various disks (“striping”) in order to accelerate access. You can, however, request other 
storage arrangements:

<font color="blue"># mkfs -t btrfs -L MyBtrfs -d raid1 /dev/sdb1 /dev/sdc1</font>

This example generates a Btrfs file system which encompasses(engloba) the /dev/sdb1 and /dev/sdc1 disks and is 
labeled “<font color="red">MyBtrfs</font>”. Data is stored redundantly on both disks (“ <font color="red">-d raid1</font> ”).



<font size="6" color="red">SUBVOLUMES</font>

Within Btrfs file systems you can create “subvolumes”, which serve as a type of partition at the 
file system level. Subvolumes are the units of which you will later be able to make snapshots.If 
your system uses Btrfs as its root file system, the command

<font color="blue"># btrfs subvolume create /home</font>

would, for instance, allow you to keep your own data within a separate subvolume. Subvolumes do not 
take a lot of space, so you should not hesitate to create more of them rather than fewer—in particular,
one for every directory of which you might later want to create independent snapshots, since it is not 
possible to make directories into subvolumes after the fact



<font size="6" color="red">SNAP-SHOTS</font>

You can create a snapshot of a subvolume using  

<font color="blue"># btrfs subvolume snapshot /mnt/sub /mnt/sub-snap</font>

The snapshot (here, /mnt/sub- snap ) is at first indistinguishable from the original subvolume (here, 
/mnt/sub ); both contain the same files and are writable. At first no extra storage space is being 
used—only if you change files in the original or snapshot or create new ones, the system copies whatever 
is required.



<font size="6" color="red">REPAIRING BTRFS FILE SYSTEMS</font>

Btrfs makes on-the-fly consistency checks and tries to fix problems as  they  are  detected. The 
“<font color="red">btrfs scrub start</font>” command starts a house-cleaning operation that recalculates the checksums on 
all data and metadata on a Btrfs file system and repairs faulty blocks according to a different 
copy if required. This can, of course, take a long time; with “ <font color="red">btrfs scrub status</font> ” you can 
query how it is getting on, with “ <font color="red">btrfs scrub cancel</font> ” you can interrupt it, and restart it later 
with “ <font color="red">btrfs scrub resume</font> ”. There is a <font color="red">fsck.btrfs</font> program, but it does nothing beyond outputting a 
message that it doesn’t do anything. The program is required because something needs to be there 
to execute when all file systems are checked for consistency during startup. To really check or 
repair Btrfs file systems there is the “ <font color="red">btrfs check</font> ” command. By default this does only a 
consistency check, and if it is invoked with the “ <font color="red">--repair</font> ” it tries to actually repair any problems 
it found. Btrfs is very versatile and complex and we can only give you a small glimpse(vislumbre) here. Consult 
the documentation (starting at btrfs (8)).








<font size="6" color="red">TROUBLE-SHOOTING</font>

<font color="blue">[root@localhost partitions_images]#</font> mount /dev/mapper/loop2p1 /mnt
<font color="green">mount: /dev/mapper/loop2p1 is write-protected, mounting read-only
mount: wrong fs type, bad option, bad superblock on /dev/mapper/loop2p1,
       missing codepage or helper program, or other error

       In some cases useful info is found in syslog - try
       dmesg | tail or so.</font>


[root@localhost partitions_images]<font color="blue"># mkfs.btrfs -L Mybtrfs -d raid1 raid01_btrfs raid02_btrfs </font>
<font color="green">SMALL VOLUME: forcing mixed metadata/data groups
ERROR: With mixed block groups data and metadata profiles must be the same
[root@localhost partitions_images]# </font>



<font color="green">Jan Safranek 2014-06-13 08:49:32 EDT
When formatting a small partition (~100MB), blivet executes:
<font color="blue">mkfs.btrfs --data=single --metadata=dup /dev/vdb1</font>

Which fails with following output:
SMALL VOLUME: forcing mixed metadata/data groups
ERROR: With mixed block groups data and metadata profiles must be the same


Blivet should execute mkfs.btrfs without parameters, it then adjusts itself to create a small volume:

<font color="blue">$ mkfs.btrfs  /dev/vdb1</font>
Turning ON incompat feature 'mixed-bg': mixed data and metadata block groups
Turning ON incompat feature 'extref': increased hardlink limit per file to 65536
...


Version-Release number of selected component (if applicable):
python-blivet-0.55-1.fc21.noarch

How reproducible:
always

Steps to Reproduce:
1. format small device (~100 MB) with btrfs
Comment 1 mulhern 2014-06-16 07:25:16 EDT
Almost certainly caused by commit 2cb79f3d2fff0617cdfac322630d1e320b0736a3, so I'll just grab it.
Comment 2 mulhern 2014-06-16 08:46:58 EDT
Useful link about the code that generates the error message:
https://www.mail-archive.com/linux-btrfs@vger.kernel.org/msg28868.html

and reasons for this special small volume behavior:
http://marc.info/?l=linux-btrfs&m=130224788719132

According to the manpages, some good default values exists for data and metadata raid levels. But according 
to reality, that is not really the case, or at least it is not so simple. With really small volumes,the -M 
option is forced, and when the -M option is forced, the raid levels for data and metadata, if specified, 
must be the same.

Sometimes the user will specify raid levels for metadata and data, and they should, more or less, get 
what they are asking for. So, simply executing mkfs.btrfs without parameters is not an option.

On the other hand, btrfs does not have any nice way of communicating when it is going to force the -M parameter.

So, we're going to have to allow a btrfs value of None for user unspecified data and metadata values after all.

And, we should probably have a fall-back and try again on btrfs filesystem creation if the user specifies 
some values that cause failure.

btrfs filesystem df command apparently tells the current filesystem raid level.
Comment 3 Jan Safranek 2014-08-27 06:45:55 EDT
I tested it in python-blivet-0.61, it might be fixed also in earlier releases</font>




Exercises
C 7.4 [!1] Ge




Exercises
C 7.4 [!1] Generate a Btrfs file system on an empty partition, using “ mkfs -t
btrfs ”.
C 7.5 [2] Within your Btrfs file system, create a subvolume called sub0 . Create
some files within sub0 . Then create a snapshot called snap0 . Convince your-
self that sub0 and snap0 have the same content. Remove or change a few files
in sub0 and snap0 , and make sure that the two subvolumes are independent
of each other.nerate a Btrfs file system on an empty partition, using “ mkfs -t
btrfs ”.
C 7.5 [2] Within your Btrfs file system, create a subvolume called sub0 . Create
some files within sub0 . Then create a snapshot called snap0 . Convince your-
self that sub0 and snap0 have the same content. Remove or change a few files
in sub0 and snap0 , and make sure that the two subvolumes are independent
of each other.
