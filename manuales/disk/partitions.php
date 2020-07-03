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
<font size="6" color="red">Partitionig disk...Fundamentals</FONT>

Before you partition the (possibly sole) disk on a Linux system, you should briefly
consider what a suitable partitioning scheme might look like and how big the
partitions ought to be. Changes after the fact are tedious and inconvenient at best
and may at worst necessitate a complete re-install of the system (which would be
exceedingly tedious and inconvenient).

<font color="red">Here are a few basic suggestions for partitioning:</font>

<font color="red">1.-</font> Apart from the partition with the root directory / , you should provide at
least one separate partition for the file system containing the /home directory.
This lets you cleanly separate the operating system from your own data, and
facilitates distribution upgrades or even switching from one Linux distribu-
tion to a completely different one

If you follow this approach, you should probably also use symbolic
links to move the /usr/local and /opt directories to (for example) /home/
usr- local and /home/opt . This way, these directories, which also contain
data provided by you, are on “your” partition and can more easily be
included in regular backups.

<font color="red">2.-</font>It is absolutely possible to fit a basic Linux system into a 2 GiB partition, but,
considering today’s (low) costs per gigabyte for hard disk storage, there is
little point in scrimping(ESCATIMAR) and saving. With something like 30 GiB, you’re sure
to be on the safe side and will have enough room for log files, downloaded
distribution packages during a larger update, and so on.

<font color="red">3.-</font> On server systems, it may make sense to provide separate partitions for /tmp ,
/var , and possibly /srv . The general idea is that arbitrary users can put data
into these directories (besides outright files, this could include unread or
unsent e-mail, queued print jobs, and so on). If these directories are on
separate partitions, users cannot fill up the system in general and thereby
create problems.

<font color="red">4.-</font> You should provide swap space of approximately the same size as the com-
puter’s RAM, up to a maximum of 8 GiB or thereabouts. Much more is
pointless, but on workstations and mobile computers you may want to avail
yourself of the possibility to “suspend” your computer instead of shutting
it down, in order to speed up a restart and end up exactly where you were
before—and the infrastructures enabling this like to use the swap space to
save the RAM content

There used to be a rule of thumb saying that the swap space should be
about twice or three times the available RAM size. <font color="orange">This rule of thumb
comes from traditional Unix systems, where RAM works as “cache”
for the swap space. Linux doesn’t work that way, instead RAM and
swap space are added—on a computer with 4 GiB of RAM and 2 GiB
of swap space, you get to run processes to the tune of 6 GiB or so. With
8 GiB of RAM, providing 16 to 24 GiB of swap space would be absurd.</font>

You should dimension the RAM of a computer (especially a server) to
be big enough that practically no swap space is necessary during nor-
mal operations.; on an 8-GiB server, you won’t usually need 16 GiB of
swap space, but a gigabyte or two to be on the safe side will certainly
not hurt (especially considering today’s prices for disk storage). That
way, if RAM gets tight, the computer will slow down before processes
crash outright because they cannot get memory from the operating sys-
tem.

<font color="red">5.-</font>If you have several (physical) hard disks, it can be useful to spread the sys-
tem across the available disks in order to increase the access speeed to indi-
vidual components.

Traditionally, one would place the root file system ( <font color="red">/</font> with the essential
subdirectories <font color="red">/bin , /lib , /etc , and so on</font>) on one disk and the <font color="red">/usr</font> direc-
tory with its subdirectories on a separate file system on another disk.
However, the trend (TENDENCIA) on Linux is decisively away from the (artificial)
separation between <font color="red">/bin and /usr/bin</font> or<font color="red"> /lib and /usr/lib</font> and towards
a root file system which is created as a RAM disk on boot. Whether the
traditional separation of / and /usr will gain us a lot in the future is up
for debate.
What will certainly pay off is to spread swap space across several disks.
Linux always uses the least-used disk for swapping




Provided that there is enough empty space on the medium, new partitions
can be created and included (even while the system is running). This procedure
consists of the following steps:

<font color="red">1.</font> Backup the current boot sectors and data on the hard disk in question
<font color="red">2.</font> Partition the disk using fdisk (or a similar program)
<font color="red">3.</font> Possibly create file systems on the new partitions (“formatting”)
<font color="red">4.</font> Making the new file systems accessible using mount or /etc/fstab

Data and boot-sector contents can be saved using the dd program (among others).
<font color="blue"># dd if=/dev/sda of=/dev/st0 </font>#will, for example, save all of the sda hard disk to magnetic tape.

You should be aware that the partitioning of a storage medium has nothing to
do with the data stored on it. The partition table simply specifies where on the
disk the Linux kernel can find the partitions and hence the file structures. Once the
Linux kernel has located a partition, the content of the partition table is irrelevant
until it searches again, possibly during the next system boot. 

This gives you if you are courageous (or foolhardy-TEMERARIO)—far-reaching opportunities to tweak your
system while it is running. For example, you can by all means enlarge partitions
(if after the end of the partition there is unused space or a partition whose contents
you can do without) or make them smaller (and possibly place another partition
in the space thus freed up). As long as you exercise appropriate care this will be
reasonably safe.

This should of course in no way discourage you from making appropriate
backup copies before doing this kind of open-heart surgery.

In addition, the file systems on the disks must play along with such shenanigans(Engaños)
(many Linux file systems can be enlarged without loss of data, and
some of them even be made smaller), or you must be prepared to move the
data out of the way, generate a new file system, and then fetch the data back.
