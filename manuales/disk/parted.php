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
<font size="6" color="red">Parted</FONT>

Another popular program for partitioning storage media is the GNU project’s parted . Featurewise, it is 
roughly comparable with fdisk , but it has a few useful features. Unlike fdisk , parted does not come 
pre-installed with most distributions, but can generally be added after the fact from the distribution’s servers.
Similar to fdisk , parted must be started with the name of the medium to be partitioned as a parameter.

<font color="blue"># parted /dev/sdb</font>
<font color="green">GNU Parted 3.2
Using /dev/sdb
Welcome to GNU Parted! Type 'help' to view a list of commands.
(parted)</font>

You can create a new partition using mkpart . This works either interactively

<font color="blue">(parted) mkpart</font>
<font color="green">Partition name? []? Test
File system type? [ext2]? ext4
Start? 211MB
End? 316MB</font>

... or directly when the command is invoked:

<font color="blue">(parted) mkpart primary ext4 211MB 316MB</font>

You can abbreviate the commands down to an unambiguous prefix. Hence, mkp will work instead of mkpart 
<font color="red">(mk would collide with the mklabel command)</font>. The file system type will only be used to guess a partition 
type. You will still need to manually create a file system on the partition later on.

[root@localhost ~]#<font color="blue"> parted /dev/sdb print</font>
<font color="green">Model: ATA VBOX HARDDISK (scsi)
Disk /dev/sdb: 8590MB
Sector size (logical/physical): 512B/512B
Partition Table: msdos
Disk Flags: 

Number  Start   End     Size    Type      File system  Flags
 1      1049kB  420MB   419MB   primary   ext3
 2      420MB   840MB   419MB   primary
 3      840MB   1259MB  419MB   primary
 4      1259MB  8590MB  7331MB  extended
 5      1260MB  1261MB  205kB   logical
 6      1262MB  1682MB  419MB   logical
 7      1683MB  2102MB  419MB   logical
 8      2103MB  2523MB  419MB   logical
 9      2524MB  2943MB  419MB   logical
10      2944MB  3364MB  419MB   logical</font>



<font color="red">print</font> has a few interesting subcommands: “ print devices ” lists all available block devices, “print free” 
displays free (unallocated) space, and “ print all ”outputs the partition tables of all block devices.<font color="red">You 
can get rid of unwanted partitions using rm</font> . Use name to give a name to a partition (only for GPT). The 
quit command stops the program. Hard Disks (and Other Secondary Storage) A Important: While fdisk updates 
the partition table on the disk only once you leave the program, parted does it on an ongoing basis. This means
that the addition or removal of a partition takes effect on the disk immediately. If you use parted on a new 
(unpartitioned) disk, you must first create a partition table.

<font color="blue">(parted) mklabel gpt</font>

creates a GPT-style partition table, and

<font color="blue">(parted) mklabel msdos</font>

one according to the MBR standard. There is no default value; without a partition table, parted will refuse to 
execute the mkpart command. If you inadvertently delete a partition that you would rather have kept, parted can
 help you find it again. You will just need to tell it approximately where on the disk the partition used to be:

<font color="green">(parted) rm 3
(parted) rescue 200MB 350MB
Information: A ext4 primary partition was found at 211MB -> 316MB.
Do you want to add it to the partition table?
Oops.
Yes/No/Cancel? yes</font>

<font color="red"><u>For this to work, there must be a file system on the partition, because parted looks for data blocks that appear 
to be the start of a file system.</u></font> 

In addition to the interactive mode, parted allows you to pass commands immediately on the Linux command line, like this:

<font color="blue"># parted /dev/sdb mkpart primary ext4 316MB 421MB</font> #Information: You may need to update /etc/fstab.


