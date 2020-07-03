
<meta http-equiv="Content-Type" content="t/html; charset=UTF-8" />

                 <html>

        <head>
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
        <TITLE></TITLE>
        <link href="stylesheets/common.css" type="text/css" rel="stylesheet">
        </head>

        <p id="hdr_home"><h1><FONT COLOR=blue>Linux for Dummies</FONT> <span></span></h1></a></p>
        </div>


<style type="text/css" media="screen">
#wrapper{
align: left;
  font-family: 'Bowlby One SC';
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

<font color="red">###################################################################################</font>
LINUX FOR DUMMIES
<font color="red">###################################################################################</font>

<font color="blue">1.1 Content</font>
This lab introduces the history and some of the basic concepts of Linux, such as shell commands and shortcuts. If you have already learned that, you can skip this lab and start the next one directly.

<font color="blue">1.2 Key Points</font>
History of Linux
Important contributors for Linux
Basic commands
Wildcards
Basic software installation
Help documentation

Linux is an operating system, just like Windows (Win 10, 8, 7) and Mac OS.

Operating systems began in the 1950s when an OS was able to run batch processes. The batch program does not require interactions with users. It reads data from a file or punch card and then outputs it to another file or printer.

In the early 1960s, interactive operating systems became popular. An interactive operating system can not only interact, but also allow multiple users from different terminals to operate the host simultaneously. This kind of operating system is called a time-sharing operating system, and its emergence was a great challenge to the batch operating system. Many people tried to develop time-sharing operating systems, including both university research projects and business projects. At that time, a project called Multics was very innovative. However, the development of the Multics project was not going well. It cost far more than expected and did not occupy much of the market share of operating systems. When Bell Labs, part of the development group, withdrew from the project, its members developed an operating system - UNIX - by themselves.

UNIX was originally released for free and was popular in their college. Later, UNIX implemented the TCP/IP protocol stack, which became the first choice for early workstation operating systems.

In 1990, UNIX became the mainstream operating system in the server market. Most campuses had UNIX hosts. Unfortunately, since then UNIX became commercialized and became very expensive. The only substitute for UNIX was MINIX, which was an operating system with similar features and was not expensive.

In October 1991, Linus Torvalds (the father of Linux) used UNIX at the University of Helsinki. He wanted to run a similar operating system on his own computer, but the commercial version of UNIX was very expensive, so he started with MINIX which was free. He aimed to develop an operating system better than MINIX. The first release version of his operation system quickly attracted some hackers. It was named Linux. The first version of Linux was quite simple. However, as a lot of hackers tried to improve it, Linux gradually acquired many attractive features.

Linux is just a kernel of the operating system, which is the basis for other programs to run. It implements multi-tasking and hardware management. When the users or system administrators run programs, those programs are actually running on top of the kernel. Some of these programs are required, for example, the command-line interpreter (shell), which is used for interaction among users and writing shell scripts. These applications are not developed as part of Linux itself. Instead existing free applications are shipped along with Linux for installation. This reduces the amount of effort required to build a development environment. In fact, Linus Torvalds often rewrote the kernel, making it easier for those programs to run on Linux. Many important software packages, including the C compiler, came from the GNU project of the Free Software Foundation. The GNU project began in 1984 with the aim of developing a completely free UNIX-like operating system. In recognition of GNU's contribution to Linux, many people call Linux a GNU/Linux system (GNU has its own kernel Hurd).

1992-1993, the Linux kernel had all the essential features of UNIX, including TCP/IP network and graphical interface system (X Window), hence Linux also attracted the attention of many industries. Some small companies began to develop and distribute Linux, with dozens of Linux user communities established. In 1994, Linux magazine began to be issued.

Some of the breaking news about Linux are as follows:

In 1965, Bell Labs, MIT, GE (General Electric) prepared to develop Multics system, in order to support 300-terminal access to the host, but they failed in 1969;

At that time, there was no mouse, keyboard and input device, only the card machine. Therefore, if you want to test a program, you need to insert a card reader paper into the card machine. If there is an error, you have to re-test. Multics: Multiplexed Information and Computing Service;

In 1969, Ken Thompson (the father of C language) using the assembly language developed File Server System (Unics, that is, UNIX prototype);

Because of the dependency on hardware, assembly language can only target specific hardware;

Just for transplanting a "space travel" game;

In 1973, Dennis Ritchie and Ken Thompson invented the C language, and then wrote the UNIX kernel;

The B language was rewritten into C language; 90% of the code was written in C language and 10% of the code was written in assembly language, so when transplanting modifying only the 10% would suffice;

In 1977, Bill Joy of Berkeley University modified the UNIX source code for his machine, called BSD (Berkeley Software Distribution);

Bill Joy is the founder of Sun Microsystems；

In 1979, UNIX released System V for personal computers;

In 1984, because of the UNIX regulations, students could not be provided with source code. Therefore, for the purpose of teaching, Tanenbaum wrote their own Minix, compatible with UNIX;

In 1984, Richard Stallman started the GNU (GNU's Not Unix) project and founded the FSF (Free Software Foundation);

In 1985, in order to protect free software produced by GNU from being patented by others, GPL (General Public License) was created;

In 1988, in order to develop GUI, MIT set up an organization to develop XFree86;

In 1991, Linus Torvalds, a graduate student at the University of Helsinki, Finland, developed a Linux kernel for 386 machines based on gcc and bash;

In 1994, Torvalds released Linux-v1.0;

In 1996, Torvalds released Linux-v2.0, and determined the Linux mascot: penguin.
