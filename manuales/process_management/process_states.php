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
<font size="6" color="red">PROCESS STATES</FONT>

Another important property of a process is its process state. A process in memory waits to be executed 
by the CPU. This state is called “<font color="red">runnable</font>”. Linux uses pre-emptive con derecho
preferente  multitasking, i. e., a scheduler distributes the available CPU time to pre-emptive multitasking 
waiting processes in pieces called “time slices fregmentos”. If a process is actually executing  on the CPU,
 this state  is called “<font color="red">operating</font>”, and after its time slice is over the process reverts to the “<font color="red">runnable</font>” state.


From an external point of view, Linux does not distinguish between these two process states; 
the process in question is always marked “runnable”.

It is quite possible that a process requires further input or needs to wait for peripheral device operations 
to complete; such a process cannot be assigned CPU time, and its state is considered to be “<font color="red">sleeping</font>”. Processes
 that have been stopped by means of <font color="red">Ctrl + z</font> using the shell’s job control facility are in state “<font color="red">stopped</font>”.
Once the execution of a process is over, it terminates itself and makes a return return code code available,which
 it can use to signal, for example, whether it completed successfully or not (for a suitable definition of “success”).


Once in a while processes appear who are marked as zombies using the “Z” zombies state. These “living dead” 
usually exist only for a brief instant. A process becomes a zombie when it finishes and dies for good once 
its parent process has queried its return code. If a zombie does not disappear from the process table this means
that its parent should really have picked up the zombie’s return code but didn’t. A zombie cannot be removed
from the process table. Because the original process no longer exists and cannot take up neither RAM nor CPU
time, a zombie has no impact on the system except for an unattractive entry in the system state. Persistent or
very numerous zombies usually indicate programming errors in the parent process; when the parent process 
terminates they should do so as well.

<font color="green">Zombies disappear when their parent process disappears because “orphaned” processes are “adopted” by the init 
process. Since the init process spends most of its time waiting for other processes to terminate so that it
can collect their return code, the zombies are then disposed of fairly quickly. B Of course, zombies take 
up room in the process table that might be required for other processes. If that proves a problem, look 
at the parent process.</font>

<img src="process_state.png" width="800" height="400" /></a>
