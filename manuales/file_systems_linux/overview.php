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
<font size="6" color="red">Creating a linux File System..Overview and History</FONT>

After having created a new partition, you must “format” that partition, i. e., write the data structures 
necessary to manage files and directories onto it. What these data structures look like in detail depends
on the “file system” in question.Unfortunately, the term “file system” is overloaded on Linux. It means, 
for example:

<font color="red">1.</font> A method to arrange data and management information on a medium (“the ext3 file system”)
<font color="red">2.</font> Part of the file hierarchy of a Linux system which sits on a particular medium or partition 
   (“the root file system”, “the /var file system”)
<font color="red">3.</font> All of the file hierarchy, across media boundaries


The file systems (meaning 1 above) common on Linux may differ considerably. On the one hand, there are file systems
that were developed specifically for Linux, such as the “ ext filesystems” or the Reiser file system, and on the 
other hand there are file systems that originally belonged to other operating systems but that Linux supports 
(to a greater or lesser degree) for compatibility. This includes the file systems of DOS, Windows, OS X, and 
various Unix variants as well as “network file systems” such as <font color="red">NFS</font> or <font color="red">SMB</font> which allow access to file servers 
via the local network.

Many file systems “native” to Linux are part of the tradition of file systems common on Unix, like the 
<font color="red">Berkeley Fast Filesystem (FFS)</font>, and their data structures are based on those. However, development did not stop there;
more modern influences are constantly being integrated in order to keep Linux current with the state of the art.

<font color="red">Btrfs (pronounced “butter eff ess”)</font> by Chris Mason (Fusion-IO) is widely considered the answer to the famous 
ZFS of Solaris. (The source code for ZFS is available but cannot be integrated in the Linux directly, due to li-
censing considerations.) Its focus is on “fault tolerance, repairs and simple administration”. By now it seems 
to be mostly usable, at least some distributions rely on it. 

With Linux file systems it is common to have a superblock at the beginning of the file system. This contains information 
pertaining to the file system as a whole—such as <font color="red">when it was last mounted or unmounted, whether it was unmounted
“cleanly” or because of a system crash, and so on.</font> The superblock normally also points to other parts of the management
data structures, like where the inodes or free/occupied block lists are to be found and which parts of the medium
are available for data.

It is usual to keep spare copies of the superblock elsewhere on the file system, in case something happens to 
the original. This is what the ext file systems do.

On disk, there is usually a “boot sector” in front of the superblock, into which you can theoretically put a boot
loader. This makes it possible to, e. g., install Linux on a computer alongside Windows and use the Windows boot 
manager to start the system.

On Linux, file systems (meaning 2 above) are created using the <font color="red">mkfs</font> command. mkfs is independent of the actual 
file system (meaning 1) desired; it invokes the real routine specific to the file system (meaning 1) in question
mkfs. ⟨file system name⟩. You can select a file system type by means of the <font color="red">-t</font> option—with “ <font color="red">mkfs -t ext2</font> ”,
for example, the <font color="red">mkfs.ext2</font> program would be started (another name for <font color="red">mke2fs</font> ).

<FONT SIZE="6" COLOR="RED">THE EXTENDED FILE SYSTEMS</FONT>

History and Properties The original “extended file system” for Linux was imple-
mented in April, 1992, by Rémy Card. It was the first file system designed specifi-
cally for Linux (although it did take a lot of inspiration from general Unix file
systems) and did away with various limitations of the previously popular Minix
file system.7.1 Creating a Linux File System
B The Minix file system had various nasty limits such as a maximum file sys-
tem size of 64 MiB and file names of at most 14 characters. (To be fair, Minix
was introduced when the IBM PC XT was considered a hot computer and
64 MiB, for PCs, amounted to an unimaginably vast amount of disk storage.
By 1990, that assumption had begun to crumble.) ext allowed file systems
of up to 2 GiB—quite useful at the time, but naturally somewhat ridiculous
today.
B The arrival of the ext file system marks another important improvement
to the Linux kernel, namely the introduction of the “virtual file system
switch”, or VFS. The VFS abstracts file system operations such as the open-
ing and closing of files or the reading and writing of data, and as such
enables the coexistence of different file system implementations in Linux.
A The original ext file system is no longer used today. From here on, when we
talk about “the ext file systems”, we refer to ext2 and everything newer than
that.
The subsequent version, ext2 (the “second extended file system”), which was
begun by Rémy Card in January, 1993, amounted to a considerable rework of the
original “extended file system”. The development of ext2 made use of many ideas
from the BSD “Berkeley Fast Filesystem”. ext2 is still being maintained and makes
eminent sense for certain applications.
B Compared to ext , ext2 pushes various size limits—with the 4 KiB block size
typical for Intel-based Linux systems, file systems can be 16 TiB and single
files 2 TiB in size. Another important improvement in ext2 was the intro-
duction of separate timestamps for the last access, last content modification
and last inode modification, which achieved compatibility to “traditional”
Unix in this respect.
B From the beginning, ext2 was geared towards continued development and
improvement: Most data structures contained surplus space which was
later used for important extensions. These include ACLs and “extended
attributes”.
Since the end of the 1990s, Stephen Tweedie worked on a successor to ext2 ,
which was made part of the Linux kernel at the end of 2001 under the name of
ext3 . (That was Linux 2.4.15.) The most important differences between ext2 and
ext3 include:
• ext3 supports Journaling.
• ext3 allows enlarging file systems while they are mounted.
• ext3 supports more efficient internal data structures for directories with
many entries.
Even so it is largely compatible with ext2 . It is usually possible to access ext3 file
systems as ext2 file systems (which implies that the new features cannot be used)
and vice-versa.
B “Journaling” solves a problem that can be very tedious with the increasing
size of file systems, namely that an unforeseen system crash makes it neces-
sary to do a complete consistency check of the file system. The Linux kernel
does not perform write operations immediately, but buffers the data in RAM
and writes them to disk when that is convenient (e. g., when the read/write
head of the disk drive is in the appropriate place). In addition, many write
operations involve writing data to various places on the disk, e. g., one or
more data blocks, the inode table, and the list of available blocks on the
disk. If the power fails in the right (or wrong) moment, such an operation
can remain only half-done—the file system is “inconsistent” in the sense
that a data block can be assigned to a file in the inode, but not marked used
in the free-block list. This can lead to serious problems later on.
103104
7 File Systems: Care and Feeding
B A journaling file system like ext3 considers every write access to the disk
as a “transaction” which must be performed completely or not at all. By
definition, the file system is consistent before and after a transaction is per-
formed. Every transaction is first written into a special area of the file sys-
tem called the journal. If it has been entirely written, it is marked “complete”
and, as such, it is official. The Linux kernel can do the actual write opera-
tions later.—If the system crashes, a journaling file system does not need to
undergo a complete file system check, which with today’s file system sizes
could take hours or even days. Instead, the journal is considered and any
transactions marked “complete” are transferred to the actual file system.
Transactions not marked “complete” are thrown out.
A Most journaling file systems use the journal to log changes to the file sys-
tem’s “metadata”, i. e., directories, inodes, etc. For efficiency, the actual file
data are normally not written to the journal. This means that after a crash
and reboot you will have a consistent file system without having to spend
hours or days on a complete consistency check. However, your file contents
may have been scrambled—for example, a file might contain obsolete data
blocks because the updated ones couldn’t be written before the crash. This
problem can be mitigated by writing the data blocks to disk first and then
the metadata to the journal, but even that is not without risk. ext3 gives
you the choice between three operating modes—writing everything to the
journal (mount option data=journal ), writing data blocks directly and then
metadata to the journal ( data=ordered ), or no restrictions ( data=writeback ). The
default is data=ordered .
B Writing metadata or even file data twice—once to the journal, and then later
to the actual file system—involves a certain loss of performance compared
to file systems like ext2 , which ignore the problem. One approach to fix
this consists of log-structured file systems, in which the journal makes up the
actual file system. Within the Linux community, this approach has so far not
prevailed. Another approach is exemplified by “copy-on-write filesystems”
like Btrfs.
A Using a journaling file system like ext3 does not absolve you from having to
perform complete consistency checks every so often. Errors in a file system’s
data structures might arise through disk hardware errors, cabling problems,
or the dreaded cosmic rays (don’t laugh) and might otherwise remain un-
noticed until they wreak havoc. For this reason, the ext file systems force a
file system check every so often when the system is booted (usually when
you can least afford it). You will see how to tweak this later in this chapter.
A With server systems that are rarely rebooted and that you cannot simply
take offline for a few hours or days for a prophylactic file system check, you
may have a big problem. We shall also come back to this.
The apex of ext file system evolution is currently represented by ext4 , which has
been developed since 2006 under the guidance of Theodore Ts’o. This has been
considered stable since 2008 (Kernel version 2.6.28). Like ext3 and ext2 , backward
compatibility was an important goal: ext2 and ext3 file systems can be mounted
as ext4 file systems and will profit from some internal improvements in ext4 . On
the other hand, the ext4 code introduces some changes that result in file systems
no longer being accessible as ext2 and ext3 . Here are the most important improve-
ments in ext4 as compared to ext3 :
• Instead of maintaining the data blocks of individual files as lists of block
numbers, ext4 uses “extents”, i. e., groups of physically contiguous blocks
on disk. This leads to a considerable simplification of space management
and to greater efficiency, but makes file systems using extents incompatible
to ext3 . It also avoids fragmentation, or the wild scattering of blocks belong-
ing to the same file across the whole file system.7.1 Creating a Linux File System
105
• When data is written, actual blocks on the disk are assigned as late as pos-
sible. This also helps prevent fragmentation.
• User programs can advise the operating system how large a file is going
to be. Again, this can be used to assign contiguous file space and mitigate
fragmentation.
• Ext4 uses checksums to safeguard the journal. This increases reliability and
avoids some hairy problems when the journal is replayed after a system
crash.
• Various optimisations of internal data structures increase the speed of con-
sistency checks.
• Timestamps now carry nanosecond resolution and roll over in 2242 (rather
than 2038).
• Some size limits have been increased—directories may now contain 64,000
or more subdirectories (previously 32,000), files can be as large as 16 TiB,
and file systems as large as 1 EiB.
In spite of these useful improvements, according to Ted Ts’o ext4 is not to be con-
sidered an innovation, but rather a stopgap until even better file systems like Btrfs
become available.
All ext file systems include powerful tools for consistency checks and file sys-
tem repairs. This is very important for practical use
