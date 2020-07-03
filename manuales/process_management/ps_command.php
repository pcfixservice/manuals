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
<font size="6" color="red">PS COMMAND</FONT>

You would normally not access the process information in /proc directly but use the appropriate commands 
to query it. The ps (“process status”) command is available on every Unix-like system. Without any otions
all processes running on the current terminal are output. The resulting list contains the process number 
PID , the terminal TTY , the process state STAT , the CPU time used so far TIME and the command being executed.

<img src="ps_options.png" width="600" height="380" /></a>

If you give ps a PID, only information pertaining to the process in question will
be displayed (if it exists):

<font color="blue">$ ps 1</font>
<font color="green"> PID TTY      STAT   TIME COMMAND
    1 ?        Ss     0:01 /sbin/init</font>


With the -C option, ps displays information about the process (or processes) based
on a particular command:

<font color="blue">$ ps -C evince</font>
<font color="green"> PID TTY          TIME CMD
 4753 pts/0    00:00:03 evince</font>



<font size="6" colOR="RED">SORT PROCESS BY CPU OR MEMORY USAGE</FONT>

System administrators often want to find out processes that are consuming lots of memory or CPU. The sort option 
will sort the process list based on a particular field or parameter.

Multiple fields can be specified with the "--sort" option separated by a comma. Additionally the fields can be 
prefixed with a "-" or "+" symbol indicating descending or ascending sort respectively. There are lots of parameters 
on which the process list can be sorted. Check the man page for the complete list.

<font color="blue">$ ps aux --sort=-pcpu,+pmem</font>


ps aux --sort=-pcpu | head -5   #Displays top 5 process consuming most of the cpu



<font size="6" colOR="RED"> DISPLAY PROCESS HIERARCHY IN A TREE STYLE</FONT>

Many processes are actually forked (bifurcado, ramificado)  out of some parent process, and knowing this 
parent child relationship is often helpful. The '--forest' option will construct an ascii art style tree 
view of the process hierarchy.

The next command will search for processes by the name apache2 and construct a tree and display detailed information.

<font color="blue">$ ps -f --forest -C apache2</font>

<font color="green">UID        PID  PPID  C STIME TTY          TIME CMD
root      2359     1  0 09:32 ?        00:00:00 /usr/sbin/apache2 -k start
www-data  4524  2359  0 10:03 ?        00:00:00  \_ /usr/sbin/apache2 -k start
www-data  4525  2359  0 10:03 ?        00:00:00  \_ /usr/sbin/apache2 -k start
www-data  4526  2359  0 10:03 ?        00:00:00  \_ /usr/sbin/apache2 -k start
www-data  4527  2359  0 10:03 ?        00:00:00  \_ /usr/sbin/apache2 -k start
www-data  4528  2359  0 10:03 ?        00:00:00  \_ /usr/sbin/apache2 -k start</font>


<font size="6" colOR="RED">DISPLAY CHILD PROCESSES OF A PARENT PROCESS i.e FORKED APACHE PROCESSES</font>

<font color="green">$ ps -o pid,uname,comm -C apache2
  PID USER     COMMAND
 2359 root     apache2
 4524 www-data apache2
 4525 www-data apache2
 4526 www-data apache2
 4527 www-data apache2
 4528 www-data apache2</font>

The first process that is owned by root is the main apache2 process and all other apache2 processes have 
been forked out of this main process. The next command lists all child apache2 processes using the pid of 
the main apache2 process

<font color="green">$ ps --ppid 2359
  PID TTY          TIME CMD
 4524 ?        00:00:00 apache2
 4525 ?        00:00:00 apache2
 4526 ?        00:00:00 apache2
 4527 ?        00:00:00 apache2
 4528 ?        00:00:00 apache2</font>



<font size="6" colOR="RED"> ANOTHER EXAMPLES</font>

       To see every process on the system using standard syntax:
<font color="blue">          ps -e
          ps -ef
          ps -eF
          ps -ely</font>

       To see every process on the system using BSD syntax:
<font color="blue">          ps ax
          ps axu</font>

       To print a process tree:
<font color="blue">          ps -ejH
          ps axjf</font>

       To get info about threads:
<font color="blue">          ps -eLf
          ps axms</font>

       To get security info:
<font color="blue">          ps -eo euser,ruser,suser,fuser,f,comm,label
          ps axZ
          ps -eM</font>

       To see every process running as root (real & effective ID) in user format:
<font color="blue">          ps -U root -u root u</font>

       To see every process with a user-defined format:
<font color="blue">          ps -eo pid,tid,class,rtprio,ni,pri,psr,pcpu,stat,wchan:14,comm
          ps axo stat,euid,ruid,tty,tpgid,sess,pgrp,ppid,pid,pcpu,comm
          ps -Ao pid,tt,user,fname,tmout,f,wchan</font>



It is possible to rename the column labels

<font color="blue">$ ps -e -o pid,uname=USERNAME,pcpu=CPU_USAGE,pmem,comm</font>
<font color="green">  PID USERNAME CPU_USAGE %MEM COMMAND
    1 root           0.0  0.0 init
    2 root           0.0  0.0 kthreadd
    3 root           0.0  0.0 ksoftirqd/0
    4 root           0.0  0.0 kworker/0:0
    5 root           0.0  0.0 kworker/0:0H
    7 root           0.0  0.0 migration/0
    8 root           0.0  0.0 rcu_bh
    9 root           0.0  0.0 rcuob/0
   10 root           0.0  0.0 rcuob/1</font>

<FONT COLOR="RED">DISPLAY AND SORT ELAPSED TIME OF PROCESSES </FONT>

The elapsed time indicates, how long the process has been running for. The column for elapsed time is 
not shown by default, and has to be brought in using the "-o" option

<font color="blue">$ ps -e -o pid,comm,etime --sort=+etime</font>




<FONT COLOR="RED">TURN PS INTO AN REALTIME PROCESS VIEWER</FONT>

As usual, the watch command can be used to turn ps into a realtime process reporter. Simple example is like this

<font color="blue">$ watch -n 1 'ps -e -o pid,uname,cmd,pmem,pcpu --sort=-pmem,-pcpu | head -15'</font>

or

<font color="blue">while true; do ps -e -o pid,uname,cmd,pmem,pcpu --sort=-pmem,-pcpu | head -15;clear;sleep 1;done</font>




<FONT COLOR="RED">YOU CAN SPECIFY A USER DEFINED FORMAT USING THE FOLLOWING SWITCH:</FONT>

<font color="blue">ps -e --format <format></font>

<font color="green">
The formats available are as follows:

%cpu - cpu utilisation
%mem - memory percentage utilisation
args - The command with all its arguments
c - processor utilisation
cmd - The command
comm - The command name only
cp - CPU Usage
cputime - CPU Time
egid - Effective group id
egroup - Effective group
etime - Elapsed time
euid - Effective user id
euser - Effective user
gid - Group id
group - Group name
pgid - Process group id
pgrp - Process group
ppid - Parent Process ID
start - Time the process started
sz - Size in physical pages
thcount - Threads owned by the process
time - Cumulative time
uid - User Id
uname - User name</font>

There are many more options but these are the most commonly used ones.


<font color="red">SORTING OUTPUT</font>

To sort the output use the following notation:

<font color="blue">ps -ef --sort <sortcolumns></font>

The choice of sort options are as follows:

<font color="green">cmd - Executable name
pcpu - CPU utilisation
flags - Flags
pgrp - Process group id
cutime - Cumulative user time
cstime - Cumulative system time
utime - User time
pid - Process ID
ppid - Parent process ID
size - Size
uid - User ID
user - User Name</font>

Again there are more options available but these are the most common

<img src="ps_1.png" width="900" height="500" /></a>
<img src="ps_2.png" width="900" height="500" /></a>
<img src="ps_3.png" width="900" height="400" /></a>
<img src="ps_4.png" width="900" height="500" /></a>
<img src="ps_5.png" width="900" height="400" /></a>
<img src="ps_6.png" width="1000" height="500" /></a>
<img src="ps_7.png" width="800" height="580" /></a>


