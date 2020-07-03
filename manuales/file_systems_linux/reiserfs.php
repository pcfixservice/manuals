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
<font size="6" color="red">Reiserfs File System</FONT>


Overview ReiserFS is a Linux file system meant for general use. It was developed
by a team under the direction of Hans Reiser and debuted in Linux 2.4.1 (that was
in 2001). This made it the first journaling file system available for Linux. ReiserFS
also contained some other innovations that the most popular Linux file system at
the time, ext2 , did not offer:
• Using a special tool, ReiserFS file systems could be changed in size. Enlarge-
ment was even possible while the file system was mounted.
• Small files and the ends of larger files could be packed together to avoid
“internal fragmentation” which arises in file systems like ext2 because space
on disk is allocated based on the block size (usually 4 KiB). With ext2 and
friends, even a 1-byte file requires a full 4-KiB block, which could be consid-
ered wasteful (a 4097-byte file requires two data blocks, and that is almost
as bad). With ReiserFS, several such files could share one data block.
B There is nothing in principle that would keep the ext developers to add
this “tail packing” feature to the ext file systems. This was discussed
and the consensus was that by now, disk space is cheap enough that
the added complexity would be worth the trouble.
• Inodes aren’t pregenerated when the file system is created, but are allocated
on demand. This avoids a pathological problem possible with the ext file
systems, where there are blocks available in the file system but all inodes
are occupied and no new files can be generated.
B The ext file systems mitigate this problem by allocating one inode per
data block per default (the inode density corresponds to the block size).
This makes it difficult to provoke the problem.
• ReiserFS uses trees instead of lists (like ext2 ) for its internal management
data structures. This makes it more efficient for directories with many files.
B Ext3 and in particular ext4 can by now do that too.
As a matter of fact, ReiserFS uses the same tree structure not just for di-
rectory entries, but also for inodes, file metadata and file block lists, which
leads to a performance increase in places but to a decrease in others.
For a long time, ReiserFS used to be the default file system for the SUSE
distributions (and SUSE contributed to the project’s funding). Since 2006,
Novell/SUSE has moved from ReiserFS to ext3 ; very new SLES versions use
Btrfs for their root file system.

In real life you should give the Reiser file system (and its designated succes-
sor, Reiser4) a wide berth unless you need to manage older systems using
it. This is less to do with the fact that Hans Reiser was convicted of his
wife’s murder (which of course does not speak in his favour as a human
being, but things like these do happen not just among Linux kernel devel-
opers), but more with the fact that the Reiser file system does have its good
points but is built on a fairly brittle base. For example, certain directory
operations in ReiserFS break basic assumptions that are otherwise univer-
sally valid for Unix-like file systems. This means, for instance, that mail
servers storing mailboxes on a ReiserFS file system are less resilient against
system crashes than ones using different file systems. Another grave prob-
lem, which we will talk about briefly later on, is the existence of technical
flaws in the file system repair program. Finally—and that may be the most
serious problem—nobody seems to maintain the code any longer.
Creating ReiserFS file systems mkreiserfs serves to create a ReiserFS file system.
The possible specification of a logical block size is currently ignored, the size is
always 4 KiB. With dumpreiserfs you can determine information about ReiserFS
file systems on your disk. resize_reiserfs makes it possible to change the size of
currently-unused ReiserFS partitions. Mounted partitions may be resized using a
command like “ mount -o remount,resize= ⟨block count⟩ ⟨mount point⟩”.
mkreiserfs
dumpreiserfs
resize_reiserfs
Consistency Checks for ReiserFS For the Reiser file system, too, there is a check- Reiser file system
ing and repair program, namely reiserfsck .
reiserfsck performs a consistency check and tries to repair any errors found,
much like e2fsck . This program is only necessary if the file system is really dam-
aged. Should a Reiser file system merely have been unmounted uncleanly, the
kernel will automatically try to restore it according to the journal.
A reiserfsck has some serious issues. One is that when the tree structure needs
to be reconstructed (which may happen in certain situations) it gets com-
pletely mixed up if data files (!) contain blocks that might be misconstrued
as another ReiserFS file system’s superblock. This will occur if you have
an image of a ReiserFS file system in a file used as a ReiserFS-formatted
“virtual” hard disk for a virtualisation environment such as VirtualBox or
VMware. This effectively disqualifies the ReiserFS file system for serious
work. You have been warned.
