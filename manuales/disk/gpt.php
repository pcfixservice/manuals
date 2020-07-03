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
<font size="6" color="red">The Modern Method..GPT Partitions</FONT>

In the late 1990s, Intel developed a new partitioning method that should do away
with the limitations of the MBR approach, namely “<font color="red">GUID Partition Table</font>” or GPT.
GPT was developed hand-in-hand with <font color="red">UEFI</font> and is part of the UEFI spec-
ification today. You can, however, use a BIOS-based Linux system to access
GPT-partitioned disks and vice-versa.

GPT uses 64-bit sector addresses and thus allows a maximum disk size of
8 ZiB—zebibyte, in case you haven’t run into that prefix. 1 ZiB are 2 70 bytes,
or, roughly speaking(mas o menos), about one million million tebibytes. This should last
even the NSA for a while. (Disk manufactures, who prefer to talk powers of
ten rather than powers of two, will naturally sell you an 8-ZiB disk as a 9.4
zettabyte disk.)
With <font color="red">GPT</font>, the first sector of the disk remains reserved as a “protective MBR”
which designates the whole disk as partitioned from a MBR point of view. This
avoids problems if a GPT-partitioned disk is connected to a computer that can’t
handle GPT.

The second sector (address 1) contains the “GPT header” which stores man-
agement information for the whole disk. Partitioning information is usually con-
tained in the third and subsequent sectors.

The GPT header points to the partitioning information, and therefore they
could be stored anywhere on the disk. It is, however, reasonable to place
them immediately after the GPT header. The UEFI header stipulates a min-
imum of 16 KiB for partitioning information (regardless of the disk’s sector
size).
On a disk with 512-byte sectors, with a 16 KiB space for partitioning infor-
mation the first otherwise usable sector on the disk is the one at address 34.
You should, however, avoid placing the disk’s first partition at that address
because that will get you in trouble with 512e disks. The next correctly-
aligned sector is the one at address 40.

For safety reasons, GPT replicates the partitioning information at the end of the disk.
Traditionally, partition boundaries are placed at the start of a new “track” on
the disk. Tracks, of course, are a relic from the hard disk paleolithic, since con-
temporary disks are addressed linearly (in other words, the sectors are numbered
consecutively from the start of the disk to the end)—but the idea of describing a
disk by means of a combination of a number of read/write heads, a number of
“cylinders”, and a number of sectors per “track” (a track is the concentric circle a
single head describes on a given cylinder) has continued to be used for a remark-
ably long time. Since the maximum number of sectors per track is 63, this means
that the first partition would start at block 63, and that is, of course, disastrous for
512e disks.
Since Windows Vista it is common to have the first partition start 1 MiB after
the start of the disk (with 512-byte sectors, at sector 2048). This isn’t a bad
idea for Linux, either, since the ample free space between the partition table
and the first partition can be used to store the GRUB boot loader. (The space
between the MBR and sector 63 was quite sufficient earlier, too.)

Partition table entries are at least 128 bytes long and, apart from 16-byte GUIDs
for the partition type and the partition itself and 8 bytes each for a starting and
ending block number, contains 8 bytes for “attributes” and 72 bytes for a partition
name. It is debatable whether 16-byte GUIDs are required for partition types, but
on the one hand the scheme is called “GUID partition table” after all, and on the
other hand this ensures that we won’t run out of partition types anytime soon.



