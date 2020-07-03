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
<font size="6" color="red">pgrep & pkill Commands</FONT>

<FONT SIZE="6" COLOR="RED">DESCRIPTION</FONT>

pgrep looks through the currently running processes and lists the process IDs which matches 
the selection criteria to stdout. All the criteria have to match. For example,

<font color="blue">pgrep -u root ssh</font>

will only list the processes that are called sshd and are owned by root. On the other hand,

<font color="blue">pgrep -u root,daemon</font>

will list the processes owned by root OR daemon.
<font color="red">pkill</font> will send the specified signal (by default SIGTERM) to each process instead of listing them on standard output.



<FONT SIZE="6" COLOR="RED">PGREP AND PKILL EXAMPLES</font>

<font color="blue">pgrep -u root named</font>
Find the process ID of the named (name daemon) process.

<font color="blue">pkill -HUP syslogd</font>
Send the HUP signal to syslogd, which forces it to re-read its configuration file.

<font color="blue">renice +4 $(pgrep firefox)</font>
Make all firefox processes run nicer by a value of 4. This command illustrates the way pgrep's output can be 
passed to other utilities as input. In this case, the command pgrep firefox is passed as an argument to 
renice because it is enclosed in $( ).

The command <font color="blue">pgrep [process_name]</font> is equivalent  as <font color="blue">ps ax | grep nombre_del_proceso | grep -v grep | awk '{print $1}'</font> 


<font color="blue">pgrep -l -G otros</font>  # show all of the processes listing the PID, name's process, and the Group

<font color="blue">pgrep -v -u root</font>   #show all of the process not belonging to user root



<FONT SIZE="6" COLOR="RED">SHELL SCRIPT TO AUTO RESTART APACHE HTTPD WHEN IT GOES DOWN / DEAD</font>

Here is a simple shell script tested on CentOS / RHEL / Fedora / Debian / Ubuntu Linux. Should work 
under any other UNIX liker operating system. It will check for httpd pid using pgrep command

pgrep command

pgrep looks through the currently running processes and lists the process IDs which matches the selection 
criteria to screen. If no process found it will simply return exit status 0 (zero).

Download the script and set cronjob as follows:
<font color="blue">*/5 * * * * /path/to/script.sh >/dev/null 2>&1</font>


<font color="green">#!/bin/bash
# Apache Process Monitor
# Restart Apache Web Server When It Goes Down
# -------------------------------------------------------------------------
# Copyright (c) 2003 nixCraft project <http://cyberciti.biz/fb/>
# This script is licensed under GNU GPL version 2.0 or above
# -------------------------------------------------------------------------
# This script is part of nixCraft shell script collection (NSSC)
# Visit http://bash.cyberciti.biz/ for more information.
# -------------------------------------------------------------------------
# RHEL / CentOS / Fedora Linux restart command
RESTART="/sbin/service httpd restart"
# uncomment if you are using Debian / Ubuntu Linux
#RESTART="/etc/init.d/apache2 restart"
#path to pgrep command
PGREP="/usr/bin/pgrep"
# Httpd daemon name,
# Under RHEL/CentOS/Fedora it is httpd
# Under Debian 4.x it is apache2
HTTPD="httpd"
# find httpd pid
$PGREP ${HTTPD}
if [ $? -ne 0 ] # if apache not running
then
 # restart apache
 $RESTART
fi</font>





