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
<font size="6" color="red">PROCESS CONTROL</FONT>

<img src="linux_kill.png" width="600" height="300" /></a>


The kill command sends signals to selected processes. The desired signal can be specified either numerically
or by name; you must also pass the process number in question, which you can find out using ps :

<img src="kill_signals.png" width="600" height="300" /></a" width="600" height="300" /></>

You shouldn’t get hung up on the signal numbers, which are not all guaranteed to be the same on all Unix 
versions (or even Linux platforms). You’re usually safe as far as 1, 9, or 15 are concerned, but for 
everything else you should rather be using the names.

Unless otherwise specified, the signal <font color="red">SIGTERM</font> (“terminate”) will be sent, which (usually) ends the process
Programs can be written such that they “trap” signals (handle them internally) or ignore them altogether.
Signals that a process neither traps nor ignores usually cause it to crash hard. Some (few) signals are ignored
by default.

The <font color="red">SIGKILL</font> and <font color="red">SIGSTOP</font> signals are not handled by the process but by the kernel and hence cannot be trapped or 
ignored. <font color="red">SIGKILL</font> terminates a process without giving it a chance to object (as SIGTERM would), and <font color="red">SIGSTOP</font> 
stops the process such that it is no longer given CPU time.kill does not always stop processes. Background 
processes which provide system services without a controlling terminal—daemons—usually reread their configuration
 files without a restart if they are sent SIGHUP (“hang up”).

You can apply kill , like many other Linux commands, only to processes that you actually own. Only root is not 
subject to this restriction. Sometimes a process will not even react to <font color="red">SIGKILL</font> . The reason for this is either
that it is a zombie (which is already dead and cannot be killed again) or else blocked in a system call. 
The latter situation occurs, for example, if a process waits for a write or read operation on a slow device to finish

An alternative to the kill command is the killall command. killall acts just killall like kill —it sends 
a signal to the process. The difference is that the process must be named instead of addressed by its PID,
 and that all processes of the same name are signalled. If no signal is specified, it sends SIGTERM by 
default (like kill ). killall outputs a warning if there was nothing to signal to under the specified name.

Be careful with killall if you get to use Solaris or BSD every now and then.On these systems, the command 
does exactly what its name suggests—it kills all processes



