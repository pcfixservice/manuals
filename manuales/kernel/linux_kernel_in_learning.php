<meta http-equiv="Content-Type" content="t/html; charset=UTF-8" />

		 <html>

	<head>
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
	<TITLE></TITLE>
	<link href="stylesheets/common.css" type="text/css" rel="stylesheet">
	</head>

	<p id="hdr_home"><h1><FONT COLOR=blue>Kernel</FONT> <span>Linux</span></h1></a></p>
	</div>

		
<style type="text/css" media="screen">
#wrapper{
lign: left;
  font-family: 'Bowlby One SC', cursive;
  margin: adjust;
  background: white;
  font-size: 1vw;
}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<pre>  
<font color="red"></font>
<font color="blue"></font>
<u></u>
<font size="6"></font>
<ul id="wrapper"> 


<li>

<font color="blue">The kernel is a program</font>
Often with a name like vmlinuz-<Kernel Version>
loaded a run by a bootloader, like GRUB
Has command-line parameters

<font color="blue">The kernel is an API</font>
System calls
Virtual File system entries
	.proc
	.sys
	.debugfs
Device files (system calls)

<font color="blue">The kernel is a Gatekeeper (Guardian)</font
Enforces privileges (capabilities)
Executes supervisor instructions
Implements security policies
Controls access to hardware and other resources

<font color="blue">The kernel is modular</font>
Kernel image is relatively small
Kernel image is sufficient to boot to user space
Optional functionality is added after booting
It allows for alternatives; for example, loading only drivers required for present hardware

<font color="blue">System calls</font>
* System calls are functions implemented by the kernel and meant to be called from user space.
* There are about 300
* See include/uapi/asm-generic/unistd.h
* They are documented in man section 2
* They are called through the standard libray (e.g., libc).  System calls are generally not invoked directly, but rather via wrapper functions in glibc 
       (or perhaps some other library).  For details of direct invocation of a system call, see intro(2).  Often, but not always, the name of the wrapper 
       function is the same as the name of the system call that it invokes. For example, glibc contains a function chdir() which invokes the underlying 
       "chdir" system call.
* Standard library uses architecture-dependent means to invoke the system call mechanism
* Suitably sized parameters are usually put in registers
* The kernel is invoked, determines which system call, and calls it

<font color="blue">Read messages from the kernel</font>

* printk() is the kernel's function for code to print messages. It is like C's printf().
* It is sent to RAM buffer and the system console.
* Important enough ones are shown on the console.
* Logging daemon may send to file or elsewhere.
* dmesg shows RAM buffer messages from kernel

<font color="blue">Surveying the Linux Kernel, /proc, /sys, and Device Files</font>
* The proc and sysfs filesystems are virtual filesystems
* Their contents are not stored on disk
* Each file and directory entry has an associated function in the kernel that produces the contents on demand
        /PROC
* The /proc filesystem is mounted on /proc at boot
* proc gets its name form "process"
* proc contains lots of process info and lots more
* Kernel tunable variables are an important part of proc
* Each process has a directory named with it PID, it has info on memory, program, files and lots more
* There are hundreds of files and directories per process
* Threads have entries under the directory "task"
	/SYS
* The sysfs filesystem is mounted on /sys at boot
* sysfs is for "kernel object" info
* In particular, it is hardware info (e.g.,device info)
	Device Files
* Charactec and block drivers use device files


<font color="blue">Understandig the bootloader GRUB2</font>

* Grub comes after POST, and the BIOS.
* Grub is installed in a special place on disk.
* Grub loads the kernel, initial root filesystem, sets up the kernel command line, and then transfers control to the kernel
* Grub can be interrupted, an you can interact with it
* Grub is built with support for filesystems. Therefore, Grub can find files. like kernel files, by name.
* Grub can do file name completion
* Grub has lots of utilities (do man -k grub)

<font color="green">Transcripts
More fun with Booting, understanding the Bootloader GRUB. What does GRUB do? What's GRUB's role? Well, GRUB is executed after 
the power on self test and the BIOS. In fact, the BIOS loads the beginning part of GRUB. The beginning part of GRUB needs to 
be in a special place on disk typically. Then GRUB loads the kernel and, frequently, for most desktops and servers, there is 
an initial root filesystem image also on disk that GRUB loads. Then GRUB is going to transfer control to the kernel, and while 
doing that, to get the kernel started up, GRUB's going to pass command line parameters. GRUB is pretty cool in that you can 
interrupt GRUB and get a prompt and edit how it's going to work. So you can, on the fly, at boot time, set some different kernel
 command line options. If you want different, then we're in the configuration file. GRUB goes to the disk, which means the filesystem
, and reads in the kernel and the init filesystem images. That means GRUB needs to understand the filesystem type. So when GRUB is built,
 it's built with support for different filesystems. In fact, GRUB may understand the filesystem on disk even though the kernel doesn't 
without a loadable kernel module. GRUB's also got some nice features like file name completion. Maybe you don't remember the exact name 
of that kernel file that you want to try. You know it starts with vmlinuz, but you're not sure what comes after that. Well, with the tab 
key, GRUB can fill that in for you just like BASH. GRUB is a pretty big deal. There are quite a few utilities and config files and so 
forth with GRUB. With the man command, man -k grub, you can see all the man pages that have the keyword, grub, to learn more.</font>


<font color="blue">Grub configuration</font>

* Grub 1 had a config file, grub.conf, that one edited to add, remove, or modify kernel boot choices.
* Grub 2 is significantly more sophisticated.
* /etc/grub.d
* /etc/default/grub
* Edit or add a config file in /etc/grub.d. Normally, edit 40_custom.
* Run grub2-mkconfig to generate a new config file.
* Normally pauses before launching Linux.
* Interrupt Grub by hitting a key (e.g., down narrow)
* Temporarily edit Grub configuration.
* Continue with boot with your changes 1b1 or Ctrl-x as indicated

<font color="green">Transcripts
- [Voiceover] Let's talk about GRUB configuration and it's different for GRUB 1 or GRUB 2. With GRUB 1, it was, perhaps, a little bit more
 straight forward. There was a single config file, grub.conf, with a link to it in etc, and you could edit that to change boot options, to 
add additional kernel entries, or remove some. With GRUB 2, there are more files, and there's a directory, /etc/grub.d, that you, typically,
could edit something in. The file /etc/default/grub is the stuff at the start of the file for configuration for grub, where you can say the
default kernel to boot, or how long, in seconds, to wait before a kernel is booted. If you want to make a new GRUB entry, then   what  you 
typically do is edit or create a new file underneath /etc/grub.d. The number in front of the file name affects the order that the files are 
processed, so it means the bigger the number, the later in the list of choices that it will be shown in the GRUB menu. Normally  you  edit 
40_custom if you want to add in a new entry. And then you're going to run grub2-mkconfig to process all that stuff and make a new config file 
for GRUB. One of the great things about GRUB is it's interactive. You can have it wait a few seconds at boot time for you to hit  a  key. I 
typically hit the down arrow key. If you hit the enter key, then you risk choosing something to boot. So when you interrupted GRUB, there's 
some stuff you could do. You could edit, temporarily, the GRUB configuration. I like doing that to add in a special boot option or two for the 
kernel. Or if there's something wrong with booting, maybe I edited the GRUB config file and I messed it up, and now it won't boot. Well, you 
can interrupt GRUB, and you can temporarily fix it, so you can get booted up, and then you can go edit the file. After editing, with GRUB 1, 
you would hit the B key to boot. With GRUB 2, you do a Ctrl-x. At the bottom of the little GRUB menu will be directions   for  that,  some 
documentations that tell you to do a B or a Ctrl-x for example.</font>


<font color="blue">kernel Command-Line Parameters</font>

* The kernel processes command-line arguments.
* Unrecognized ones are ignored
* User space may look at the kernel command-line args, too.
* You can use dmesg or /proc/cmdline to see
* In thekernel source tree, it is Documentation/kernel-parameters.txt
* About 500 are documented there.
* Many are registered with _setup() in source.

<font color="green">Transcripts
- [Voiceover] Let's talk more about booting. In particular, let's talk more about kernel command-line parameters. So GRUB passes the parameters 
to the Linux Kernel. And the kernel processes those command-line arguments. And fortunately, the kernel just ignores any that are unrecognized 
so you can put some extra stuff up there for say scripts to look at later and sometimes that's kinda handy. So some user space stuff can look at 
those options. If you wanna see, you can use dmesg to look at the kernel command line, or the kernel actually reports it in proc/cmdline. If you 
look in the kernel source tree, in the documentation directory, my favorite directory in the kernel source, there is a little  text  file  that 
documents a great number of the kernel parameters. And you'll see that there's like 500 of em there. All kinds of obscure things. Some of  them 
are architecture dependent. Many of them are for particular drivers, but it's fairly common that if you have a situation with your kernel where 
it's acting unlike the way you want it to act, that maybe you can help by putting a command line parameter there that can say turn on some extra 
debugging support or put it in a different mode. All throughout the kernel, are calls to register the functions to deal    with  the command line 
parameters. Many of those are registered with the underscore underscore setup macro so if you'll look up that in the source, you can see where a 
particular parameter is handled. So we can look at the documentation for the kernel parameters. We change directory into the documentat directory. 
And then we look at kernel-parameters.txt. Whoa! 3,459 lines long. Tons of information, tons of kernel parameters. Let's just look at one example.
Rdinit, one of my favorites. We see that there's documentation on different options. Here we see some documentation on rdinit, and it's  for  the 
kernel and you give it a path for a program to run instead of init, in the inintramfs image. So that's an example of a kernel command  parameter 
that you can set and it's really for kind of core kernel functionality. There's a number of parameters that really affect drivers.  And  there's 
parameters that affect stuff that's very rare and maybe even outdated these days. But it is common that you could find and   documentation  find 
online that there's a kernel parameter that might be valuable and you can look in this file to get documentation.</font>


<font color="blue"> Process 1 & Startup Services...The initial Root Filesystem</font>

* Linux systems start up by mounting a filesystem from ram. The filesystem that contains "/" is called the root file system
* This initial ram disk (initrd) or ram filesystem (initramfs) is used to provide drivers and support for mounting the system's real root file system
* The initrd has an init that the kernel runs first
* When the init from the initrd terminates, the Linux kernel starts again; this time from the real filesystem, which is commonly on disk
* Historically that program was called "init." Now, init may be a link to systemd
* This process is responsible for starting up system services such as daemons like a web server
* For older Linux systems, there were runleve scripts to start up services. These were under the /etc/systemd/system
* These services are user-space services and not features of the kernel 

<font color="green">Transcripts
- [Voiceover] So, more about booting. Let's talk about the first process, that process that's number one and it's starting up services. So, key part 
of Linux is the filesystem. Every Linux has a filesystem. In fact, it might have more than one. It's common to have a filesystem as a RAM image that 
Linux starts with. Now, we call the file system that includes the directory slash the root filesystem. If you have multiple disks, for example, then 
maybe home is on a different disk, and that would be not part of the root filesystem, but the Linux Kernel needs the root filesystem. And this initial 
version of it that's in RAM can be in a couple different formats. For a long time, this was an initial RAM disk image which was a file formatted with a 
filesystem. More recently, Linux uses a RAM filesystem type, which is really its own type of file system that's in RAM It's not a formatted file. It's 
something that can grow and shrink. And inside that image is the process that kernel will run first. That's usually the program called init. It runs init, 
and that is typically responsible for loading some kernel modules that are required for the kernel to be able to use the filesystem that's found elsewhere 
like on the hard disk. So, when the init in the initial RAM-based filesystem terminates, that's after the real filestystem's been mounted, the Linux kernel 
gonna start init again. And this time, the init's gonna come from the real filesystem. And that init is the one that will persist as long as your system is 
up. Now, we've called that program init for a long time, but in recent Linux systems, that init is done by a program called systemd, and in fact, the entry 
in the filesystem called init is probably a soft link to systemd. But this first process, whether it's the real init or it's systemd, it's responsible for 
starting up the other services, the daemons we think of on our system, like JO web server. In older Linux systems, the system services were controlled by 
what were called runlevel scripts, and you booted up into a certain runlevel, and that determined which services to start, and that stuff was underneath 
/etc/rc.d. With systemd, there are service files, and they're under /etc/systemd/system. Now, this is all user-space stuff, but it comes about because the 
kernel itself crafts the very first process, bid number one to run system drinit.</font>


<font color="blue">Initramfs Images</font>

* An initrd/initramfs in /boot for each kernel
* A gzipped CPIO archive when initramfs; a gzipped filesytem image (e.g., ext2) when an initrd
* Name is something .gz, unzip it, and cpio extract it; be very careful and use --no-absolute-filenames, or gunzip and mount for initrd
* Distributions and releases vary widely in the contents of their initrd/initramfs
* You can start with the init program
* Booting with rdinit=/bin/sh will start with a shell in the initramfs. init=/bin/bash will complete the initramfs and then start with a shell on the disk
* Unpack the image
* Make modifications, repack, replace version in /boot (after making a copy of the original just in case), and reboot
* Need to be on the system console



<font color="green">Transcripts
- [Voiceover] So let's drill down more into what this initramfs image looks like that's used as part of the booting up of a Linux system. So it's a file in
a /boot directory. There's gonna be one for each kernel. In recent years, these are initramfs images. An initramfs image, is a gzipped cpio archive. cpio's
kind of like tar, and what's gonna happen is the kernel's going to unzip it, and extract it into RAM and then mount it. For previous kernels, when this is 
an initrd, then a kernel would uncompress it and mount it from RAM based on it's type of file system which was commonly ext2. If you wanna look at your ini
tramfs image to find out what goes on in the beginning, sometimes it's handy to customize this. What you do is you get that initramfs image, you need to re
name it something with a .gz suffix, then you can gunzip it, and then you use the cpio command to extract it. Now inside this are gonna be some device file
s, so you need to be root to extract it. And it has absolute path names in it. So this is very, very dangerous. I could tell you from unfortunate real life
 experience. So you wanna extract it with cpio using the very important option --no-absolute-filenames, and everything will be relative. So you can make a 
empty directory and extract it there. If you don't use that --no-absolute-filenames, it's gonna start at slash and overwrite stuff in your real system and 
there are some commands and so forth in the cpio archive that have the same name as, but are different from what your regular system ones are. And it will 
be a mess. Different Linux distributions vary a lot in what they put in their initial RAM file system images. This is how they really distinguish themselve
s. Now typically there is gonna be a program in there with a name like init, or maybe something else special. But from there, it can vary widely. On some d
istributions, the init program is script, on some it's a regular binary. And the format for the directories and so forth can vary widely. So you can find o
ut a lot about how your distribution works by looking at that image. If you boot the kernel with that rdinit=/bin/sh option, when it comes time to run the 
init program instead it will run bin/sh. And the kernel run set as root, and runs it on the system console. So if you're on the console, you get a shell pr
ompt, and none of the things that the init was gonna do will be done because it doesn't the init, it just runs a shell. So you have a shell prompt and you 
can look at what's in your image, and perhaps do something special, or experiment or debug. Now instead of rdinit, if you say init=/bin/bash and of course 
you can give any program that you think makes sense, you do the init= that's the init that's gonna come from the hard disk. So the initramfs stuff will all
 be done. And then it will run init from the hard disk, if you change it to be bin/bash it'd be bin/bash from the hard disk. And you can then see what's go
ing on and debug that. Again that's run as root on the console. Sometimes it's handy to have a custom version. Sometimes it's handy to debug what's going o
n. I've worked on problems where the kernel didn't boot up right, something went wrong in the initramfs, I'm putting some debug statement, or having to put
 a different driver inside the initramfs was valuable. So you'd unpack the images we described, make your changes, and then repack it up with cpio and rezi
p it up, and put it back in the boot directory with the right name and now you have a custom initramfs image. Alright so we're gonna talk about looking at 
an initramfs image. Let's start by making an empty directory and tmp, and then we're gonna go to the boot directory and look see and we see there's a few i
nitramfs images. There's a rescue image, there's one with kdump in the name, those are special cases, and then we got the ordinary one. So let's copy that 
one to our directory, renaming it something easier to work with, with a .gz. What's shorter than i, so we're gonna call it i.gz, Oh, looks like I needed to
 do a sudo for that. And let's look. So there's the i.gz, if we check it oops. I needed to do a sudo for that too, I copied it as root right? So let's just
 go ahead and go into a shell, save doing some sudos. So it says it's gzipped, it's not because of the suffix, it's because it really looked at it. Let's g
unzip it, we check the resulting file i, and at the cpio archive. And now we're gonna extract it and we're gonna be really careful. So let's see, we're gon
na go cpio - i - -no-absolute-filenames from the file i. And it says it extracted it, and we list, no, we got all kinds of stuff here now. This is what was
 in the cpio archive. This is going to be expanded in RAM, and mounted as the first file system. And there's a program called init. What does it say? It's 
systemd, so on this system, even the initramfs uses systemd. So that's how it would get started, and we could go through the empty directory and so forth a
nd find out more.</font>

<FONT COLOR="RED">INTRODUCTION TO THE LOADABLE KERNEL MODULES</FONT>

* An object file with a .ko suffix
* Contains code to run in kernel space
* Dynamically adds functionality to the running kernel
* Should be written in C and compiled for a particular kernel version - not binary compatible with other kernels
* Can be relatively minimal kernel file
* Add funcionality without rebuilding or rebooting
* Allows for only the needed functionality to be loaded
* live updates
* Accelerated development
* Modules are installed into a directory under /lib/modules with each installed kernel version having its own directory
* The modules are organized in different subdirectories under the kernel version
* There are also config files 
* Each module should have a unique name
* Modules files can be in any directories, but the modprobe utility is designed to look only under /lib/modules/`uname -r`
* Only modules built for the kernel version - and how it was configured - should be loaded
* Modules run in kernel mode with all privileges

<font color="green">
- [Voiceover] Talking about loadable kernel modules, let's talk about finding the Linux kernel loadable modules. So modules are installed in a standar
d place, that's underneath the /lib/ modules directory and then a subdirectory with the name of the kernel version. There's a lot of modules, and they're o
rganized into different subdirectories based on their subsystem like drivers or network and so forth. In the /lib/ modules kernel version directory, there 
are also a number of config files for use for utilities like modprobe. Module files are compiled files that can be made up of multiple source files linked 
together but the module needs to have a unique name. You can't have two modules loaded with the same name. Now you could have your module files be anywhere
 on the system, they could be in your home directory, say, but then you couldn't use the modprobe command. The modprobe command, which is the most convenie
nt way for loading modules, is designed to look under /lib/modules/ kernel version and that uname -r will tell you the name of the kernel version you are r
unning right now. Remember it's modules that are built for the kernel version you're running that are safe. And in fact not only the kernel version you're 
running but how the kernel is configured. If you were to build a module against a kernel source tree that was configured differently than the kernel you're
 running, it might be unsafe. Data structures, for example, have ifdefs in them and what a data structure looks like, therefore can depend on how the kerne
l was configured, and if you do that wrong, that can be a very subtle error. Modules are kernel code. That means they run in kernel mode. That means they r
un with all the kernel privileges. And it's a privilege operation, therefore, to be able to load a module. Let's look for modules. So we are running kernel
 version 3.10.0-229. If we change to the /lib/ module's directory into a list, we see a couple different versions there. And let's go into the one that mat
ches our kernel, and we do a list, and we see a number of files that start with modules dot, some config files. And most importantly we see a subdirectory 
called kernel. It's under kernel that all the module files reside. And as a quick test, let's count how many ko files we have. 2,182, that's a lot of modul
es. A small set of those will be used at any given time, and many, many of those will never be used on a given system.</font>

<FONT COLOR="blue">Module Commands</font>
* lsmod  Lists the modules loaded, chronologically
* rmmod  This removes the module, module may be in use, so may not be able to remove it. rmmod -f mat let you remove a modules that the kernel thinks is in use
  Often never done - it is easy to leave the kernel in a fragile condition (Kernel Panic)
* modinfo  Module info, Author, parameters, Aliases
* depmod Generates module config files for modprobe, for example, modules.dep, seldom a need to run
* insmod Insert a modules, doesn't return until module initialization function returns, may fail and an error message may be printed, dmesg can show more details
  must provide absolute path to the module .ko file
* modprobe  Load a module and its dependencies, uses dependency files under /lib/modules/$(uname -r)/. Easier and more convenient than insmod
  can remove modules, too

<font color="green">- [Voiceover] lsmod is the command for listing the modules that are currently loaded in the kernel. They're listed chronologically with
 the one on the top there being the most recent loaded module. The size is the size in bytes. Then, there's two columns actually. The third column doesn't 
have a header. The third column is a small number like one or zero, or three or four. That's the module count. That's how many times the kernel thinks that
 module is in use. A zero means a kernel doesn't think it's in use. What "in use" means depends on what kind of module it is. If it's a character device mo
dule, for example, it represent how many times a device file associated with that driver has the device file open. The "used by" represents dependencies be
tween modules. In this case, we can see that macvtap is used by vhost_net. And, macvlan is used by macvtap. Dependencies can go in only one direction. Two 
modules can't depend on each other. A module needs to be loaded before a module that depends on it. If we were to try to load, for example macvtap before m
acvlan, there would be an error. The rmmod command is to remove a module. The kernel is going to try to prevent you from unloading a module that's in use. 
That's a good idea. "In use" means that the kernel could have pointers inside the module for example. If you were to remove a module and then the kernel we
re to refer to that pointer, which now refers to something that's no longer there, boom, you can panic your kernel. Rmmod -f, the force option may allow yo
u to move a module but it's seldom a good idea. Inside of module files, is stored quite a bit of metadata information. You can get that information with th
e modinfo command. For example, the author or, maybe more importantly parameters to the module. When you load a module, you can set some variables to value
 that you want. Those variables need to be defined in the code as parameters. Also, for modules that represent drivers, in the code would be a table that s
ays what devices that driver supports. Because commonly drivers support a variety of devices. From a vendor, they have multiple versions of a particular de
vice. One driver might support all of them. Both in the kernel and in the modules is stored a sting that represents the version of the kernel and some crit
ical configuration choices. Inside the module is called the "vermagic" string, and modinfo will show that to you. The vermagic string of a module needs to 
match the vermagic string of the kernel The depmod command generates those module dot files that we saw underneath lib modules. It represents the matrix of
 dependencies. What module depends on what other module. You can look at the file, modules.dep to see that. There's one line in there for every module. And
, on that line, is the name of the module and what modules it depends on. Depmod generates that, and you typically don't need to run that on your own. that
 command is run when you install modules and if you install some rpm that has a module in it, it should run it. An alternative way of loading modules is in
smod. Modprob is more convenient because modprob will look up dependencies, but insmod doesn't. insmod, you give it a path to a module. You could use insmo
d to load a module in your home directory. When you load a module, the command to load it insmod, in this case, doesn't return until the module initializat
ion function returns. When you load a module, there's a function inside the module, an initialization function that perhaps allocates some memory, or regis
ters with the kernel certain functions. When that initialization function returns, then the insmod command will return. That function returns a value. If t
he value is negative, then there was an error, and insmod will print an error message. Modprobe is the preferred way of loading a module, because modprob w
ill look at the file like modprobe.dep to determine the dependencies on a module and load everything. When you load a module, if it depends on another modu
le, that other module will be loaded first. You don't need to know the path name for a mod with modprobe. you just use the name of it and modprob gets the 
path name from the config file. Also, modprob have an option to remove a module. Instead of using rmmod, you can use modprob -r. And modprobe -r will remov
e the dependent modules as well. If they're not needed by anything else. Modprobe is a fairly complicated command, and it has some extra options, and even 
some undocumented ones that are used behind the scenes to load modules for example, based on which ones match a particular type of device. Here we are in t
he lib modules, kernel version directory, sub-directory kernel. Divided up into sub-directories for where the module are. We move back up, and we do a list
, we see these modules dot files. The modules.dep file in particular is interesting. If we look at that, we see path name to a .ko and a colon. Then we see
 sometimes their dependencies. For example, on the line, kernel/arch/x86/crypto/camelia-x86_64, after the colon, we see a path name to xts.ko, lrw.ko, and 
glue_helper.ok. That means the camelia-x86_64 needs those other modules and they'll be loaded. By the way, that's the complete list of dependencies. One do
esn't have to recurse looking for more. If we were to modprobe camelia-x86_64, those other modules would be loaded as well. Let's look at what modules are 
currently loaded. So we do an lsmod, pipe it into more. We see at the top is fuse and then xt_CHECKSUM. We see fuse is used three times. But it's not used 
by anything else. We see some dependencies. If we go down the list a little bit, we see the module nf_contrack is used by five things. And we see the depen
dency list. Sometimes, the dependency list represents the number of use count. But sometimes there's other things. Let's see how many module are loaded. We
 counted the output of lsmod. We got 106. There's a header of one line, so there's 105 modules loaded. And, there's over 2000 modules built for this system
. We see many, many modules are not being used. Let's look for a module. Let's look for that camelia one. Here we go underneath, krypto, we see some. Let's
 try and insmod that module. All right, so first of all, I got this error, operation not permitted. One needs to be root. Let's try that. Let's see what ha
ppens. We got another error. Unknown symbol and module. We don't know what symbol. We tried to load a module and the insmod command got an error from the k
ernel and all it knows is unknown symbol. It's the kernel itself that resolves symbols. So, modules are code. In that code, they can refer to symbols. Thos
e symbols need to be present. If there's a missing symbol, then there's an error. The kernel knows which symbols are missing, and the kernel can report tha
t. If you look at d message, often times you can get an idea. Here we've got on the bottom there, "unknown symbol xts_crypt." So, we needed that symbol. If
 we check lsmod, we see nothing new. Our module was not loaded. Okay, let's try to load the camelia-x86_64 module with modprobe. Okay, modprobe didn't say 
anything. Let's look at the output of lsmod. We see that the xts module got loaded, and then the camelia mod got loaded. Anything else that was required wa
s already there. But we don't see any other dependencies. If I try to rmmod xts, I get an error that it's in use. If I rmmod camelia-x86_64, and you might 
note that the name of the module was camelia dash. But when we do an lsmod, we see an underscore. That's a new feature. Dashes turn into underscores. I bet
ter type the name of the module correct here when I try to remove it. Opps, again. Got to be root to remove or insert modules. There we go, now we look at 
the output at lsmod and it left xts there. So, we should be able to remove that as well. There we go. Let's see if xts has anything interesting. Let's do a
 modinfo on it. We see the path name. We see a description, a license. And, there's the vermagic string. This module is built for our kernel version and ou
r kernel needs to be configured for smp with module unloading and mod version stuff. Here we go, so we looked at lsmod, insmod, rmmod, modprobe, and modinf
o</font>


<font color="blue">Compiling Modules</font>

* Content of simplemodule.c

[root@centos7-gp kernel]# cat /home/test2/modules/simplemodule.c 
#include <linuz/init.h>
#include <linux/module.h>
#include <linux/sched.h>
int init_simple(void)
{
  printk("in init module simple\n");
  return 0;
}
void cleanup_simple (void)
{
  printk("in cleanup module simple\n");
}
module_init(init_simple);
module_exit(cleanup_simple);

a) echo "obj-m := simplemodule.o" > Makefile
b) make -C /lib/modules/`uname -r`/build M=$PWD modules
c) insmod ./simplemodule.ko
d) rmmod simplemodule
e) dmesg|tail

<font color="green">- [Voiceover] To compile modules you use the kernel makefile and a command like "make -C" then the path name to the directory where the kernel makefile is,
 and then "M=$PWD." M is a macro used by the kernel makefile. PWD is the shell variable, of course, of what directory we're in, so what we're trying to do 
is compile modules in the directory we're in right now. And we compile modules using the target module. So we're doing a make modules using the kernel make
file and telling the kernel makefile to make modules in our current directory. Let's say we had a module source file named "mod.c" in our current directory
. Also, in that current directory we would need the makefile. The kernel makefile would look for our makefile. And in our makefile the kernel makefile look
s to see for a list of objects assigned to the macro "obj-m," and it will make modules out of all those object files. So our current directory makefile nee
ds to have "obj-m" set to "mod.o." Now we don't have a mod.o yet, we only have a mod.c, but it'll figure that out. It will compile mod.c and get a mod.o, a
nd then it'll make a mod.ko from that. So, we make mod.c, we make the makefile, and then we run the "make -C" command. And of course on the slide there, th
at backslash means it's all on one line. Here we have some C code as an example loadable kernel module. We've got some includes, and remember those include
s are referencing files underneath the kernel source tree, not in user include. And we have two functions. We have an initialization function, and a cleanu
p function. And it's common to call your initialization function something like "init_name-of-the-kind-of-thing-you're-doing" like maybe of a driver you're
 writing. And then we have a cleanup, or an exit function. Our initialization function is registered as the initialization function by using the macro "mod
ule_init," and our cleanup function is registered by using the macro "module_exit." So when our module is loaded, our init_simple function will be called. 
Notice it has a return type of int, and the return value represents whether the function was successful or not. A negative value would indicate that there 
was an error. Our cleanup function has no return type. It cannot indicate whether it succeeded or not. That's just the way it is. And notice, neither funct
ion has any parameters. They're both void. So let's say we type that in and we call it "simplemodule.c" Then in our directory we can create a makefile, and
 in that makefile we need only the one line, "obj-m := simplemodule.o." Then we compile it. And of course in the bash shell you can use back ticks, or doll
ar sign, open paren, close paren around a command. So that's gonna run the uname minus R to get our kernel version, and we're going to build modules in our
 current directory. So it's gonna look for our makefile, and make simplemodule.o, and then make simplemodule.ko, and if we didn't have any typos or any oth
er errors in our source code, it should compile just fine. And then we can insmod it. And when we insmod it, inside the kernel code, it should run our init
_simple function. And that will do a print K. And we won't see that in our window because we're not on the console, typically. But we will be able to see i
t with dMessage, or in /var/log/messages, and then we rmmod our module. Notice we don't say dot K-O in the rmmod. Then we do a dMessage, and we should see 
both messages, "in init module simple" and "in cleanup module simple." Let's look at compiling, loading, and unloading our module. So here in the directory
, we have "simplemodule.c" already typed in. If we look at it, there we go. So let's try to make a makefile and compile it. So we need a makefile, so let's
 echo, maybe a little easier than going into an editor, "obj-m ":= "simplemodule.o" Just a one-liner, and we put it into makefile. "cat Makefile" just to t
ake a quick look at it. Pretty easy makefile. So now want to try to compile our module. So we're going to do a "make -C" and we give the path name to the k
ernel makefile, and the handy shortcut for that is using a softlink "/build" that's underneath the lib/modules kernel version directory. So that gets us to
 the directory where the kernel makefile is. And we really want to build modules in our current directory and it's modules we want to make. There we go. We
 do an "ls" We got tons of stuff, including "simplemodule.ko" and in fact if we do an "ls -a" you'll see there's even some dot files and a dot directory. S
o a lot of stuff happens, but we got our dot K-O. Okay, now that we've compiled the module, let's try to load it. So we're going to insmod it. That worked 
fine, no error messages. Do an "lsmod." Look at just the top four lines there, we see simple module is loaded. And let's look at the last line of output fr
om dMessage. And there we see "in init module simple," great. And now we're going to try to remove simplemodule. No complaints. We look at the output of "l
smod", gone. If we look at the last couple lines from dMessage, and we see now it's added the "in cleanup module simple" So there we go, we wrote, we compi
led, we loaded, we unloaded. When you do that, you get to change your resume because now you've got experience doing kernel development. Way to go.</font>

<font color="orange">Linux Kernel Fundamentals: Chapter 3, Working with Loadable Kernel Modules
In this series of challenges, we create a loadable module, experiment with the use of loadable modules,
and create and use parameters for modules.
You need to be root.
You need to have installed a Linux kernel development package. On CentOS/Red Hat systems, that
is normally kernel-devel. There should be a link to the kernel directory with a Makefile, including
subdirectory etc., called /lib/modules/$(uname -r)/build. If the build does not exist or is a broken
link, then you don’t have everything you need installed.
We are working with Linux kernel code. Bad things can happen. It is best to do this with a virtual machine
that is OK if it becomes corrupted.
1. Create a loadable module. Make an empty directory to work in.
• Create a file called lab.c. Add preprocessor commands to include theses two header files:
linux/module.h and linux/sched.h.
• Add a function called my_init_module(). This should take no arguments and return an int.
This function should use printk() to print a message. my_init_module() should return
0. Register the function with module_init().
• Create a function called my_cleanup_module() that takes no arguments and has no return
value. It should print a message with printk(). Register the function with module_exit().
• Create a Makefile for making lab.ko.
• Compile your module to a .ko file by using make.
• Load your module with insmod. What output did you see? You may need to use the dmesg
command or look in /var/log/messages.
• Run lsmod. Do you see your module?
• Use rmmod to unload your module. What message did you see?
• Run lsmod again. Do you still see your module?
Linux Kernel Fundamentals
with Kevin Dankwardt
Linux Kernel Fundamentals with Kevin Dankwardt
2 of 2
• Experiment with the return code of init_module().
• Edit your module and change the return value of init_module() from 0 to -1.
• Compile the module, and try to reload it with insmod. What error did you get?
• Does your module show up in the output of lsmod?
• What happens if you try to unload the module with rmmod?
• Did my_cleanup_module() ever get called?
2. Experiment with embedded documentation.
• Modify your module to include the module author and module description.
• Recompile your module. Run modinfo with the -d and -a options against your module.
3. Add some modifiable parameters.
• Edit your module. Add both a static int called number and a static char* called word.
Initialize number to some integer. Initialize word to some string.
• Use the module_param() macro to flag number as an integer and word as a string.
• Edit the module and use the MODULE_PARM_DESC() to give descriptions for both number and
word.
• Recompile your module. Run modinfo -p against the module.
• Edit the init_module() function. Have it print out the values of number and word with
printk().
• Recompile and load your module. Unload and reload the module while passing new values
of number and word as arguments to insmod.</font>

<FONT COLOR="RED">LINUX KERNEL SOURCE CODE...OBTAINING A DISTRIBUTION'S SOURCE</FONT>

* yumdownloader -source kernel for Red hat based distros
* git clone git://kernel.ubuntu.com/ubuntu/ubuntu-<release codename>.git for debian based distros
* rpm -i kernel*.rpm, cd ~/rpmbuild/SPECS, rpmbuild -bp kernel.spec,  cd ../BUILD, ls
* make help lists lots of options
* make menuconfig or make xconfig are common choices for configuring a kernel
* All configuration choices are stored in .config
* Other important targets are bzImage, modules, modules_install, install, and clean

<FONT COLOR="green">- [Voiceover] So, we wanna fetch the kernel source, so we can work with it. And we can use the source from one of the distros. For exgr
eenple, for CentOS, we can fetch the source for a package that included in the kernel source with the yumdownloader command. That's how we got that install
ed. So, that would fetch the source RPM. Or with UBUNTU, you could use GIT to get the SourceTree. UBUNTU keeps a SourceTree, or repository, for all their k
ernel versions. If we fetched an RPM, like for CentOS or Red Hat or Fedora, then we install the RPM, and we don't need to be root to do that, to install a 
source RPM. When we do that, if we haven't installed any RPMs before, it's gonna create a subdirectory in our home directory called rpmbuild. And there'll 
be subdirectories underneath that, including one called specs. And then we change in that specs directory, and we'll find the kernel.spec file. The spec fi
le for an RPM essentially is directions on how to build the RPM. And how to build the RPM include how to get ready to build the RPM, that is, how to deal w
ith the sourcecode that's inside the source RPM. When we do an RPM build -bp, bp stands for build prep. That means get ready to be able to build the kernel
 itself. Prep will undo the tarball of the source that's inside the RPM, and apply any patches, and there's probably lots of patches. So, when that's done,
 you'll have a directory of the sourcecode all ready to peruse or to build from. So, you go back up to the build directory underneath RPM build, and there 
you should see one or more subdirectories for kernel source. It depends on the distro and so forth, exactly how that looks, but the source'll be under ther
e, so do an LS and look. So, one of the key things we get with the kernel source is the kernel makefile. A handy thing to do is make help, and it will show
 you lots of targets that the makefile supports, configuration targets, build targets, and so forth. Two of my favorite choices for configuring a kernel ar
e either make menuconfig or make xconfig. When you configure a kernel, you're gonna pick and choose options you want, and there are thousands of options. A
nd you usually start with a config file that's representing something similar to what you want. Distros normally give you a config file to start with, if y
ou want, so you can configure your kernel the same way they configured theirs. All your choices are gonna be stored in .config, all on one file, and it's a
 text file, and you can look at it, and grep it and so forth. Although, it's not recommended that you edit it directly. You wanna use one of the tools, lik
e make menuconfig or make xconfig, to configure it. So, with the make file, you will probably build a kernel. So you could say make bzImage, for example, a
nd that would build a bootable kernel in the bzImage format, which is the common format for x86, x86, -64 desktops and servers. So, the one that's probably
 most common for folks. If you say make modules, it compiles modules. If you say make modules_install, it installs the modules in the libmodules directory.
 If you say make install, it should install your kernel. If you say make clean, it should remove the object files that you built. If you wanna fetch an off
icial kernel, not one modified by the distros, then you go to kernel.org, and you can look in pub/linux/kernel, and there will be subdirectories for all th
e released kernel versions, and there's lots and lots. And if you wanna fetch one, you can fetch it, say, with wget, and give the path name. That would fet
ch a compressed kernel tarball. That's the official kernel, and that's the kernel for all the architectures, by the way. You don't go fetch an x86 kernel o
r an ARM kernel. They're all in one tarball. Let's look quick at using the spec file and getting kernel source. So, here I am in my home directory, rpmbuil
d/SPECS. I do a list, I have a kernel.spec file, I do rpmbuild -bp kernel.spec, and we get a bunch of output as it untars, it's running various things, and
 boom, we're done. We change up the build directory, we do an LS, we have a subdirectory kernel, we do an LS, we get another subdirectory that CentOS gives
 us, and there we go. There's our top-level kernel directory. And here we see, in the directory, the kernel makefile, for example. If I say make help, we s
ee a bunch of stuff scroll down the screen. There's lots of information, so we'll pipe it in to more, to get a little better idea. There we go.</font>

FONT COLOR="blue">Configuring and building a Linux Kernel</font>

Build and install modules and the Linux kernel
- [Voiceover] Let's talk about building a kernel. So the kernel Makefile is nice. It's supports parallel builds, multiple jobs, so you can use the -j option to make. I typically put a number twice the number of cores I have, so if I have a four core system, I might do a j8. So four things can be compiling at the same time while four things are, say, waiting on the disk. The target bzImage is to make the bootable image, so you can say make bzImage, or, of course, make -j8 bzImage. For other sorts of platforms, maybe for an embedded device, then the target would be uImage. Some cases, mabye it's vmlinux, or something else. Vmlinux is going to be built when you make bzImage, and it's going to be inside a bzImage, in effect. It will be stripped and compressed, and put inside bzImage, so you're going to have both. Vmlinux will be in the top-level directory, and bzImage will be underneath the architecture. After you make the kernel, you typically make modules. And the kernel and modules are the default, so if you just say make -j8, you should get the kernel and the modules. The make modules step should build all the things that you selected as an m, so probably lots of them. And they'll be .ko's all spread through the tree. Because there's a lot of these, and the sum total of megabytes compiled is probably a lot bigger than the kernel, this step is probably the longest step. It could typically take several times longer than building the kernel itself. Once you've build modules, then you can install them. So you say make modules_install. Not only does this make a directory underneath lib modules of the kernel version and then copy your .ko files there, make modules_install also calls depmod to produce the files for modprobe that are used for dependencies, for example. Now, because you're going to write underneath lib modules and maybe create a new directory or directories, typically you have to be root to do a make modules_install. Generally, in the kernel Makefile, targets that have install in the name like, modules_install imply you need to be root to do that part. So you don't need to be root to build a kernel. You don't need to be root to compile modules. But you have to be root to install modules or to install the kernel. And you install the kernel with make install. That should copy your bzImage file into the /boot directory, and it will rename it, typically, vmlinuz, dash, kernel version and make install should update your bootloader config file, if that's required, and it often creates an initramfs or initrd image. Although it does depend on the distro. Some distros like Ubuntu, sometimes you've got to do this separately. You gotta make an initramfs with a separate command. Another handy option with the Makefile from the kernel is make clean. All right? So that removes generated files. If you do that at the top, it cleans the whole tree. A handy little tip is you can just do a clean in a sub-directory if you want. So what you do is, you do a make -C, and then the path to the kernel Makefile directory, and you say M=$PWD, so that's going to be the current directory, and then you say clean, so it would be make -C, maybe dot, dot, slash, dot, dot, space, M=$PWD clean. The clean doesn't remove a .config, if you have one, if you do it at the top, but remember, make mrproper does. So make mrproper is a little more brutal than make clean. Another feature of the kernel Makefile is you can cross-compile for other architectures. And that's commonly done, because Linux runs on lots of different architectures. If you want to cross-compile, you need a cross-compiler. You need a whole cross-development tool chain. You need libraries and the linker and the compiler and so forth. And generally, the tool chain is built with some sort of prefix of the form architecture, and then maybe Linux, and then some other part of the name. So maybe you installed a cross-compiler for a certain arm target, and maybe the name for the C compiler is arm-linux-gnueabi-gcc. So then what you need to do to use the kernel Makefile for cross-compilation is you need set the environment variable CROSS_COMPILE equal to the prefix, and then you can say, make ARCH equals the architecture you want, say arm, and what you want to make, like uImage. You'll use a cross-compiler, and it make a uImage, in this case, the uImage would be arm code. So this upcoming process, where we're going to build a kernel and modules and install the kernel and install the modules is going to take quite a while. It took me about 40 minutes on a medium-speed machine, so it could take you quite a bit longer, maybe a couple hours, if you've got a slow machine, and you're going to try and follow along. So, just be ready. Let's look at making some stuff. Here we are in the top-level kernel directory. Let's edit the kernel Makefile and make a new version. So instead of, let's try, let's put something new here. Let's say buildtest. So our kernel's going to be 3.10.0-buildtest. So we save that Makefile out, and just so we have to compile everything, in case I built anything here, we're going to do a make clean, and that was really fast on this system. There wasn't much to clean, actually, and now let's time making a kernel. We've got four cores on this little system, so I'm going to do a j8. Oops. And let's see how long that takes, just as an example. There we go. After a little more than five minutes of real time, our kernel should be done. Let's look. There's our vmlinux file. Pretty big. 146 meg. Let's look for bzImage. We see x86 boot bzImage and x86_64 boot bzImage. Those are actually the same. One of them is a link. Let's look. We see the one underneath x86_64 is a link to the one underneath x86. And we see the bzImage image is, like, five meg, much smaller than the vmlinux one. The vmlinux one has symbol information and it's not compressed and so forth. Let's look at making modules. Get an idea how long that takes on this little box. So there we go. Making modules took over 17 minutes. Okay, so, we made modules. Now we need to install the modules, and we need to be root for that. So let's start a root shell. Make it a little bit easier. So now we're root. We're in the kernel top-level directory still, and we're going to do a make modules_install. There we go. The make modules_install took a minute and 41 seconds or so. Not too bad. Let's go look in the lib modules directory. Here we are in lib modules. We do a long list for time, and we see the top, most recent directory there is the 3.10.0-buildtest. That's the one we built. Let's pop back, so we're back in the top-level kernel directory, and let's time doing a make install, which will install the bzImage file into boot, and do a couple other little things. There we go. The make install finished in just over a minute. Let's go to the boot directory, do a list for time. Look at the top. And we see we have a new initramfs for our buildtest kernel version. That got created when we did the make install, and system.map link changed to be the system map for our kernel, that's symbols and addresses. Vmlinuz is a link to our new vmlinuz file, and there's our new vmlinuz file. There we go. That's the stuff that got created when we did our make install. So, we configured, built, and installed modules and a kernel.
