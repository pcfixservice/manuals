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
<font size="6" color="red">Creating Extended File Systems</FONT>

To create a ext2 or ext3 file system, it is easiest to use the mkfs command with a suitable -t option:

<font color="blue"># mkfs -t ext2 /dev/sdb1
# mkfs -t ext3 /dev/sdb2
# mkfs -t ext4 /dev/sdb3</font>

After the <font color="red">-t</font> option and its parameter, you can specify further parameters which will be passed to the program
performing the actual operation—<font color="red">in the case of the ext file systems, the mke2fs program.</font> (In spite of the e2 
in its name, it can also create ext3 and ext4 file systems.)

The following commands would also work:

<font color="blue"># mkfs.ext2 /dev/sdb1
# mkfs.ext3 /dev/sdb2
# mkfs.ext4 /dev/sdb3</font>

These are exactly the commands that mkfs would invoke. <font color="red">All three commands are really symbolic links 
referring to mke2fs ; mke2fs looks at the name used to call it and behaves accordingly.</font>

You can even call the mke2fs command directly: <font color="blue"> # mke2fs /dev/sdb1</font>

The following options for mke2fs are useful (and possibly important for the exam):

<font color="red">-b</font>  ⟨size⟩ determines the block size. Typical values are 1024, 2048, or 4096. On partitions of interesting
     size, the default is 4096.

<font color="red">-c</font>  checks the partition for damaged blocks and marks them as unusable. Current hard disks can notice “bad blocks” 
    and replace them by blocks from a “secret reserve” without the operating system even noticing (at least as long
    as you don’t ask the disk directly). While this is going on, “ mke2fs -c ”) does not provide an advantage. 
    The command will only find bad blocks when the secret reserve is exhausted, and at that point you would do well 
    to replace the disk, anyway. (A completely new hard disk would at this point be a warranty case. Old chestnuts are
    only fit for the garbage.)

<font color="red">-i</font> ⟨count⟩ determines the “inode density”; an inode is created for every ⟨count⟩bytes of space on the disk. The 
   value must be a multiple of the block size (option b ); there is no point in selecting a ⟨count⟩ that is less than
   the block

The inode density (<font color="red"> -i option</font>) determines how many files you can create on the file system—since every file
requires an inode, <font color="red">there can be no more files than there are inodes</font>. The default, creating an inode for every single
data block on the disk, is very conservative, but from the point of view of the developers, the danger of not 
being able to create new files for lack of inodes seems to be more of a problem than wasted space due to unused
inodes.
Various file system objects require inodes but no data blocks—such as device files, FIFOs or short symbolic links. 
Even if you create as many inodes as data blocks, you can still run out of inodes before running out of data blocks

<font color="red">-m</font> ⟨percentage⟩ sets the percentage of data blocks reserved for root (default: 5%)

<font color="red">-S</font> causes mke2fs to rewrite just the super blocks and group descriptors and leave the inodes intact

<font color="red">-j</font> creates a journal and, hence, an ext3 or ext4 file system.

It is best to create an ext4 file system using one of the precooked calls like “<font color="red"> mkfs -t ext4</font> ”, since mke2fs
then knows what it is suppsed to do. If you must absolutely do it manually, use something like

<font color="blue"># mke2fs -j -O extents,uninit_bg,dir_index /dev/sdb1</font>


Using the <font color="red">mke2fs -F</font> option, you can “format” file system objects that are not block device files. For example,
you can create CD-ROMs containing an ext2 file system by executing the command sequence


<font color="blue">dd if=/dev/zero of=cdrom.img bs=1M count=650</font>
<font color="blue">mke2fs -F cdrom.img</font>
<font color="blue">mount -o loop cdrom.img /mnt</font>
... copy stuff to /mnt ...
<font color="blue">umount /mnt</font>
<font color="blue">cdrecord -data cdrom.img</font>

(/dev/zero is a “device” that produces arbitrarily many zero bytes.) The resulting CD-ROMs contain 
“genuine” ext2 file systems with all permissions, attributes, ACLs etc., and can be mounted using

<font color="blue"># mount -t ext2 -o ro /dev/scd0 /media/cdrom</font>

(or some such command); you should replace <font color="red">/dev/scd0</font> by the device name of your optical drive. (It is best to
avoid using an ext3 file system here, since the journal would be an utter waste of space. An ext4 file system, though,
can be created without a journal.)


