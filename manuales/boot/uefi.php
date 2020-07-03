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
<font size="6" color="red">UEFI</FONT>

UEFI boot procedure UEFI-based systems do not use boot sectors. Instead, the
UEFI firmware itself contains a boot manager which exploits information about
the desired operating system which is held in non-volatile RAM (NVRAM). Boot
loaders for the different operating systems on the computer are stored as regular
files on an “EFI system partition” (ESP), where the firmware can read and start
them. The system either finds the name of the desired boot loader in NVRAM, or
else falls back to the default name, /EFI/BOOT/BOOTX64.EFI . (The X64 here stands for
“64-bit Intel-style PC”. Theoretically, UEFI also works for 32-bit systems, but that
doesn’t mean it is a great idea.) The operating-system specific boot loader then
takes care of the rest, as in the BIOS startup procedure.
B The ESP must officially contain a FAT32 file system (there are Linux distri-
butions that use FAT16, but that leads to problems with Windows 7, which
requires FAT32). A size of 100 MiB is generally sufficient, but some UEFI
implementations have trouble with FAT32 ESPs which are smaller than
512 MiB, and the Linux mkfs command will default to FAT16 for partitions
of up to 520 MiB. With today’s prices for hard disks, there is little reason
not to play it safe and create an ESP of around 550 MiB.
B In principle it is possible to simply write a complete Linux kernel as BOOTX64.
EFI on the ESP and thus manage without any boot loader at all. PC-based
Linux distributions don’t usually do this, but this approach is interesting for
embedded systems.
B Many UEFI-based systems also allow BIOS-style booting from MBR-parti-
tioned disks, i. e., with a boot sector. This is called “compatibility support
module” or CSM. Sometimes this method is used automatically if a tradi-
tional MBR is found on the first recognised hard disk. This precludes an
UEFI boot from an ESP on an MBR-partitioned disk and is not 100% ideo-
logically pure.
B UEFI-based systems boot from CD-ROM by looking for a file called /EFI/
BOOT/BOOTX64.EFI —like they would for disks. (It is feasible to produce CD-
ROMs that boot via UEFI on UEFI-based systems and via El Torito on BIOS-
based systems.)
“UEFI Secure Boot” is supposed to prevent computers being infected with UEFI Secure Boot
“root kits” that usurp the startup procedure and take over the system before the
actual operating system is being started. Here the firmware refuses to start boot
loaders that have not been cryptographically signed using an appropriate key. Ap-
proved boot loaders, in turn, are responsible for only launching operating system
kernels that have been cryptographically signed using an appropriate key, and
approved operating system kernels are expected to insist on correct digital sig-
natures for dynamically loadable drivers. The goal is for the system to run only
“trusted” software, at least as far as the operating system is concerned.
B A side effect is that this way one gets to handicap or exclude potentially un-
desirable operating systems. In principle, a company like Microsoft could
exert pressure on the PC industry to only allow boot loaders and operating
systems signed by Microsoft; since various anti-trust agencies would take a
dim view to this, it is unlikely that such a step would become part of offi-
cial company policy. It is more likely that the manufacturers of PC mother-
boards and UEFI implementations concentrate their testing and debugging
129130
8 Booting Linux
efforts on the “boot Windows” application, and that Linux boot loaders will
be difficult or impossible to get to run simply due to inadvertent firmware
bugs.
Linux supports UEFI Secure Boot in various ways. There is a boot loader called
Shim “Shim” (developed by Matthew Garrett) which a distributor can have signed by
Microsoft. UEFI starts Shim and Shim then starts another boot loader or operating
system kernel. These can be signed or unsigned; the security envisioned by UEFI
Secure Boot is, of course, only obtainable with the signatures. You can install your
own keys and then sign your own (self-compiled) kernels.
B The details for this would be carrying things too far. Consult the Linup
Front training manual Linux System Customisation
PreLoader An alternative to Shim is “PreLoader” (by James Bottomley, distributed by the
Linux Foundation). PreLoader is simpler than Shim and makes it possible to ac-
credit a (possibly unsigned) subsequent boot loader with the system, and boot it
later without further enquiries.


