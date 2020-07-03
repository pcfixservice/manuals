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
<font size="6" color="red">PROCESS PRIORITIES</FONT>

Process Priorities nice and renice

In a multi-tasking operating system such as Linux, CPU time must be shared among various processes.
This is the scheduler’s job. There is normally more than one runnable process, and the scheduler must
allot CPU time to runnable processes according to certain rules. The deciding factor for this is the 
priority priority of a process. The priority of a process changes dynamically according to its prior
behaviour—“interactive” processes, i. e, ones that do I/O, are favoured over those that just consume CPU time.

As a user (or administrator) you cannot set process priorities directly. You can merely ask the kernel to 
prefer or penalise processes. The “nice value” quantifies the degree of favouritism exhibited towards a 
process, and is passed along to child processes. A new process’s nice value can be specified with the 
nice command. Its syntax nice is

The possible nice values are numbers between<font color="red"> −20</font> and <font color="red">+19</font>. A negative nice possible nice values value 
increases the priority, a positive value decreases it <font color="red">(the higher the value, the “nicer” you are towards
the system’s other users by giving your own processes a lower priority</font>). If no nice value is specified,
the <font color="red">default value of +10 is assumed</font>. Only root may start processes with a negative nice value 
(negative nice value are not generally nice for other users). The priority of a running process can be 
influenced using the renice command. renice You call renice with the desired new nice value and the 
PID (or PIDs) of the process(es) in question:
