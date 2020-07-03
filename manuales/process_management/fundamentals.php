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
<p><font size="6" color="red">WHAT IS A PROCESS?</FONT></p>


A process is, in effect, a “running program”. Processes have code that is executed, and data on which the code 
operates, but also various attributes the operating uses to manage them, such as:

<font color="red">* The unique process number (PID or “process identity”)</font> serves to identify the process and can only 
be assigned to a single process at a time.

<font color="red">* All processes know their parent process number, or PPID.</font> Every process can spawn (generar) others 
(“children”) that then contain a reference to their procreator. The only process that does not have a parent process is 
the “pseudo” process with <font color="red">PID 0</font>, which is generated during system startup and creates the “<font color="red">init</font>”process with a PID of 1,
which in turn is the ancestor of all other processesin the system.

<font color="red">* Every process is assigned to a user and a set of groups.</font> These are important to determine the 
access the process has to files, devices, etc. (See Section 3.4.) Besides, the user the process is assigned to may stop,
 terminate, or otherwise influence the process. The owner and group assignments are passed on to child processes.

<font color="red">* The system splits the CPU time into little chunks (“time slices(parte,porcion)”)</font>, each of which 
lasts only for a fraction of a second. The current process is entitled (autorizado) to such a time slice, and afterwards
the system decides which process should be allowed to execute during the next time slice. This decision is made by  the 
appropriate “scheduler” based on the priority of a process.  In multi-processor systems, Linux also takes into account the 
particular topology of the computer in question when assigning CPU time to processes it is simple to run a process on any 
of the different cores of a multi-core CPU which share the same memory, while the “migration” of a process to a different 
processor with separate memory entails(implica-requiere) a noticeable(perceptible) administrative overhead and is therefore
less often worthwhile.

<font color="red">* A process has other attributes—a current directory, a process environment</font>,...—which are also
passed on to child processes. Process file system You can consult the /proc file system for this type of information. 
This process file system is used to make available data from the system kernel which is collected at run time and presented 
by means of directories and files. In particular, there are various directories using numbers as names; every such directory 
corresponds to one process and its name to the PID of that process.

In the directory of a process, there are various “files” containing process information. Details may be found in the proc 
(5) man page.

<FONT COLOR="RED">JOB CONTROL</FONT>

The job control available in many shells is also a form of process management a “job” is a process whose parent process 
is a shell. From the corresponding shell, its jobs can be controlled using commands like jobs , bg , and fg , as well
as the key combinations Ctrl + z and Ctrl + c (among others). More information is available from the manual page of the
 shell in question, or rom the Linup Front training manual, Introduction to Linux for Users and Administrators.

Command to check the environment variables for a particular process:


In Linux,

<FONT COLOR="blue">strings –a /proc/<pid_of_the_process>/environ</FONT>
<FONT COLOR="blue">cat /proc/<pid>/environ | tr | tr \\0 \\n </FONT>


In Solaris,

<FONT COLOR="blue">pargs -e <pid_of_the_process></FONT>


In AIX,

<FONT COLOR="blue">pargs or ps eww <pid_of_the_process></FONT>

