<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type="text/css">
#wrapper{
word-wrap: break-word;
font-family: sans-serif;
font-size: 95%;
font-style: italic;

text-align: justify;
       width: 1043px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 15px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
        box-shadow: 0 0 15px rgba(0,0,0,.2);
border­radius: 100px;
padding: 10px;

}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>
<u></u>
<p><font size="6"></font></p>



<FONT COLOR="RED"> BOOT THE SYSTEM</FONT>

Candidates should be able to guide the system through the booting process.Key Knowledge Areas 
Provide common commands to the boot loader and options to the kernel at boot time.
Demonstrate knowledge of the boot sequence from BIOS to boot completion. Check boot events in the log files.



<img src="bootloader_stages.png" width="900" height="500" /></a>


<font color="red">Terms of user</font>

<font color="green">BIOS
bootloader
kernel
init
/var/log/messages
dmesg</font>

<FONT COLOR="red">BIOS/UEFI</FONT>


BIOS is Basic Input Output System and does the first steps of the PC bootup. For example
is does a POST (Power On Self Test) and decides which hardware should boot the system.

<FONT COLOR="red">BOOTLOADER</FONT>

Bootloader can be GRUB (1&2) or LILO which are great for disks less than 2TB. 

<font color="green">/etc/lilo.conf
/boot/grub/grub.cfg
/boot/grub/menu.lst</font>


<FONT COLOR="red">KERNEL</FONT>


Kernel parameters (sometimes called boot parameters) supply the kernel with information about hardware parameters 
that it  might not determine on its own - say single user mod boot (S)


<FONT COLOR="red">INIT</FONT>

When the kernel finishes loading, it usually starts <FONT COLOR="green">/sbin/init</FONT>. This program remains 
running  until the system is shut down. It is always assigned process ID 1. first process, process in charge, a big 
family tree of commands:

Recently the Linux OS use <FONT COLOR="BLUE">systemd</FONT> instead of init such as CentOS 7 or Red HAT


<img src="systemd_architecture.png" width="800" height="500" /></a>


<FONT COLOR="red">DMESG</font>

Funny fact: During the bootup, only The Kernel is running so it should record and keep its own logs! dmesg command 
will show the full data from kernel ring buffer up to know. But will show only the data during the boot.
this dmesg file we can locate it in the same path in ubuntu as in CentOS 7

<FONT COLOR="blue">cat /var/log/dmesg</FONT>


<FONT COLOR="RED">/VAR/LOG/MESSAGES</FONT>

After the init process comes up, syslog daemon will log messages. It has timestamps and will persist during restarts.
Kernel is still logging its own messages in dmesg in some systems it might be called 
<FONT COLOR="blue">/var/log/syslog (ubuntu)</FONT>  or  <FONT COLOR="blue">/var/log/messages   (CentoOS)</FONT> there are many other logs at /var/log


<FONT size="6" COLOR="RED"> Fundamentals</font>

When you switch on a Linux computer, an interesting and intricate process takes place during which the computer
initialises and tests itself before launching the actual operating system (Linux). In this chapter, we consider 
this process in some detail and explain how to adapt it to your requirements and to find and repair problems 
if necessary. 

The word “to boot” is short for “to pull oneself up by one’s bootstraps”. While, as Newton tells us, this is 
a physical impossibility, it is a good image for what goes on, namely that the computer gets itself started 
from the most basic beginnings. 

Immediately after the computer is switched on, its firmware—depending on the computer’s age, either the 
“basic input/output system” (BIOS) or “unified extensible firmware interface” (UEFI) takes control. What 
happens next depends on the firmware.

BIOS startup On BIOS-based systems, the BIOS searches for an operating system on media like CD-ROM or hard disk
depending on the boot order specified in the BIOS setup. On disks (hard or floppy), the first 512 bytes of the 
boot medium will be read. These contain special information concerning the system start. Generally boot sector 
this area is called the boot sector; a hard disk’s boot sector is also called the master master boot record 

We already came across the MBR when discussing the eponymous disk partitioning scheme in chapter. We’re now 
looking at the part of the MBR that does not contain partitioning information. <FONT COLOR="red">The first 446 bytes of the MBR 
contain a minimal startup program which in boot loader turn is responsible for starting the operating 
system—the boot loader</FONT>. The rest is occupied by the partition table. 

446 bytes are not enough for the complete boot loader, but they suffice for a small program which can fetch 
the rest of the boot loader from disk using the BIOS. <FONT COLOR="red">In the space between the MBR and the start of the first 
partition—at least sector 63, today more likely sector 2048 there is enough  room for the rest of the boot loader</FONT>
(We shall come back to that topic presently.) Modern boot loaders for Linux (in particular, the “<FONT COLOR="red">Grand Unified 
Boot loader” GRUB or GRUB</FONT>) can read common Linux file systems and are therefore able to find the operating 
system kernel on a Linux partition, load it into RAM and start it there.

<font color="orange">446 bytes – Bootstrap.  or Master Record
64 bytes – Partition table.
2 bytes – Signature.
512 vs 446 Bytes</font>

GRUB serves not just as a boot loader, but also as a boot manager. As such, it can, according to the user’s preferences
launch various Linux kernels or even other operating systems. 

Bootable CD-ROMs or DVDs play an important role for the installation or update of Linux systems, or as the 
basis of “live systems” that run directly from read-only media without having to be installed on disk. To boot a
Linux computer from CD, you must in the simplest case ensure that the  CD-ROM drive is ahead of the firmware’s 
boot order than the hard disk, and start the computer while the desired CD is in the drive.

In the BIOS tradition, booting off CD-ROMs follows different rules than booting off hard disk (or floppy disk). 
The “El Torito” standard (which specifies these rules) basically defines two approaches: One method is to 
include an image of a bootable floppy disk on the CD-ROM (it may be as big as 2.88 MiB), which the BIOS 
finds and boots; the other method is to boot  directly off the CD-ROM, which requires a specialised boot loader (such as
ISOLINUX for Linux)

With suitable hardware and software (usually part of the firmware today), a PC can boot via the network. The kernel, 
root file system, and everything else can reside on a remote server, and the computer itself can be diskless and 
hence ear-friendly. The details would be a bit too involved and are irrelevant for LPIC-1 in any case; 
if necessary, look for keywords such as “PXE” or “Linux Terminal Server Project”.

<FONT size="6" COLOR="RED">GRUB Basics</FONT>


Many distributions nowadays use GRUB as their standard boot loader. It has various advantages compared to 
LILO, most notably the fact that it can handle the common Linux file systems. This means that it can read 
the kernel directly from a file such as /boot/vmlinuz , and is thus immune against problems that can develop if
you install a new kernel or make other changes to your system. Furthermore, on the whole GRUB is more convenient
for example offering an interactive GRUB shell featuring various commands and thus allowing changes to the boot setup
for special purposes or in case of problems.

The GRUB shell allows access to the file system without using the usual access control mechanism. It should 
therefore never be made available to unauthorised people, but be protected by a password (on important com-
puters, at least). 

Right now there are two widespread versions of GRUB: The older version (“GRUB Legacy”) is found in older Linux 
distributions—especially those with an “enterprise” flavour’—, while the newer distributions tend to rely on the more
modern version GRUB 2

The basic approach taken by GRUB Legacy follows the procedure outlined in.  During a BIOS-based startup, the 
BIOS finds the first part (“stage 1”) of the boot loader in the MBR of the boot disk (all 446 bytes of it). 
Stage 1 is able to find the next stage based on sector lists stored inside the program (as part of the 446 bytes) 
and the BIOS disk access functions.


The “next stage” is usually stage 1.5, which is stored in the otherwise unused space immediately after the MBR 
and before the start of the first partition. Stage 1.5 has rudimentary support for Linux file systems and can 
find GRUB’s “stage 2” within the file system (normally below /boot/grub ). 

Stage 2 may be any where on the disk. It can read file systems, too, and it fetches its configuration file, 
displays the menu, and finally loads and starts the desired operating system (in the case of Linux, possibly 
including the “early userspace”). 1 At least as long as the next stage can be found within the first 1024 
“cylinders” of the disk. There are historical reasons for this and it can, if necessary, be enforced through 
appropriate partitioning. 

<FONT COLOR="RED">Booting Linux</FONT>

Stage 1 could read stage 2 directly, but this would be subject to the same restrictions as reading stage 
1.5 (no file system access and only within the first 1024 cylinders). This is why things aren’t usually 
arranged that way.


GRUB can directly load and start most Unix-like operating systems for x86 computers, including Linux, Minix,
NetBSD, GNU Hurd, Solaris, ReactOS, Xen, and VMware ESXi 2 . The relevant standard is called “multiboot”.
GRUB starts multiboot-incompatible systems (notably Windows) by invoking the boot loader of the operating 
system in question—a procedure called “chain loading”.

To make GRUB Legacy work with GPT-partitioned disks, you need a BIOS boot partition to store its stage 1.5. 
There is a version of GRUB Legacy that can deal with UEFI system, but for UEFI boot you are generally better 
off using a different boot loader.

