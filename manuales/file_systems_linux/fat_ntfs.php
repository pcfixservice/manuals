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
<font size="6" color="red">FAT and NTFS Filesystems</FONT>

A popular file system for older Windows PCs, USB sticks, digital cameras, MP3 players and other 
“storage devices” without big ideas about efficiency and flexiVFAT bility is Microsoft’s venerable 
VFAT file system. Naturally, Linux can mount, read, and write media formatted thusly, and also 
create such file systems, for example by

<font color="blue"># mkfs -t vfat /dev/mcblk0p1</font>

insert the appropriate device name again). At this point you will no longer be surprised to hear 
that mkfs.vfat is just another name for the mkdosfs program, which can create all sorts of MS-DOS 
and Windows file systems—including the file system used by the Atari ST of blessed memory. 
(As there are Linux variants running on Atari computers, this is not quite as far-fetched as it may sound.)

<font color="red">mkdosfs</font> supports various options allowing you to determine the type of file system created. Most of these 
are of no practical consequence today, and mkdosfs will do the Right Thing in most cases, anyway. 
We do not want to disgress into a taxonomy of FAT file system variants and restrict ourselves to 
pointing out <font color="red">that the main difference between FAT and VFAT is that file systems of the latter persuasion 
allow file names that do not follow the older, strict 8 + 3 scheme.</font> The “file allocation table”, the 
data structure that remembers which data blocks belong to which file and that gave the file system 
its name, also exists invarious flavours, of which mkdosfs selects the one most suitable to the medium 
in question—floppy disks are endowed with a 12-bit FAT, and hard disk (partitions) or (today) USB sticks 
of considerable capacity get 32-bit FATs; in the latter case the resulting file system is called
“VFAT32”.


NTFS, the file system used by Windows NT and its successors including Win- NTFS
dows Vista, is a bit of an exasperating topic. Obviously there is considerable
interest in enabling Linux to handle NTFS partitions—everywhere but on Mi-
crosoft’s part, where so far one has not deigned to explain to the general public
how NTFS actually works. (It is well-known that NTFS is based on BSD’s “Berke-
ley Fast Filesystem”, which is reasonably well understood, but in the meantime
Microsoft butchered it into something barely recognisable.) In the Linux com-
munity there have been several attempts to provide NTFS support by trying to
understand NTFS on Windows, but complete success is still some way off. At
the moment there is a kernel-based driver with good support for reading, but
questionable support for writing, and another driver running in user space which
according to the grapevine works well for reading and writing. Finally, there are
the “ntfsprogs”, a package of tools for managing NTFS file systems, which also
allow rudimentary access to data stored on them. Further information is available
from http://www.linux- ntfs.org/ .




