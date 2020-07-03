<style type="text/css">
#wrapper{



 font-style: arial;
font-size:  9.5pt;
text-align: justify
       width: 1043px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 15px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
        box-shadow: 0 0 15px rgba(0,0,0,.2);
border­radius: 200px;

word-wrap: break-word;
}

<img src="" width="600" height="300" /></a>

</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>



COMMANDS FOR LINUX LPIC CERTIFICATION

#######################################################
    <font color="red">FILESYSTEMS</font>
#######################################################

<font color="blue">#dumpe2fs  -h </font>       

show the specifications of a file system, such as filesystem state, last checked, check interval and so on


<font color="blue">#tune2fs [options] device</font>

Enables you to change parameters of the filesystem according to the information given by the dumpe2fs 
command. There are many  options of tune2fs, for example. Adjust the maximum mount count, adjust time
between checks, add a journal, set the reserved blocks and so on.


<font color="blue">#debugfs </font>

debugging a filesystem, in the hands of a expert this program can rescue a badly damaged filesystem, or
at least extract.  useful information or critical data from it,  Don't use it in a mounted filesystem, and
be very careful when you use it

<font color="blue">$fsck options</font>		
Check the specific filesystem to find errors. Don't run it in a mounted filesystem, fsck can confuse and 
result in filesystem corruption

<font color="blue">#df   -kahm </font>                 

show all filesystem and their configuration, such as space free, and space used

<font color="blue">#du   -sh</font>                    

show the total amount of files and directories

<font color="blue">#mount , umount </font>             

Mount a filesystem in a specific directory, and unmount causes the contrary effect.As an example of mount
is the next command   <font color="blue"> #mount -o loop /home/centos/maindata/ISOS/tahr-6.0-CE_noPAE.iso /media/cdrom/</font>  
it causes the iso image to be  mount as a cdrom device

#######################################################
<font color="red">  FILES MANAGER</font>
#######################################################


<font color="blue">chown </font>


change owner and group of a file, option -R apply the command recursively

<font color="blue">chgrp newgroup file(s)</font>

Change the group of a files(s) option -R apply recursively. chgrp root 

Numbers Permissions          
7=read,write,execute(rwx)  6=read,write(rw)   5=read,execute(r-x)   4=read(r--)
SetUserID(SUID,4)=Runs the program with the permission of the owner the file ,
rather than with the permissions of the user  who runs the program,this bit is
indcated with a s in the owner permissions   Set Group ID(SGID,2)=Similar to SUID
but set the group  of the running program  to the group of the file it is indicated 
with a s.

Sticky Bit                   
It's used to protect  files from being deleted by those who don't own the file. 
The Sticky bit it's indicate by a (t1) in the world execute bit 

The sticky bit applies "only to directories", and is typically used on publicly-writeable
directories. Within a directory upon which the sticky bit is applied, users are prevented 
from deleting or renaming any files that they do not personally own. 
To add or remove the sticky bit, use chmod with the "t" flag: 

                             chmod +t <directory>
                             chmod -t <directory> 





<font color="blue">chmod </font>         

Change the permision of a file using numbers permission or codes symbolic modes,
example  7=grants all permissions, 6=grants read ans write permission, 5=grants 
                               
          permission  of execute, 4=grants read-only

          sudo chmod {a, u, g, o} {+, - } {r, w, x } nombre del archivo 

          u:     correspond to the user
          g:     correspond to the group
          o o a: correspond to the rest of the users

          To authorize  o restrict permissions:
                            
          +: authorize
          -: restrict
          =: give the permission value wherever user, group, o others   
                             
         chmod o=u [file] ,  sudo chmod u-r [file],   sudo chmod uoag-rwx [file]

                             
<font color="blue">umask  </font>                 
                       
Examples:000=666(rw-rw-rw-)  002=664(rw-rw-r--)   022=644(rw-r--r--) 027=640(rw-r-----) 
077=600(rw-------) umask -S show the permissions with symbolic rather than in octal mode

<font color="blue">chattr </font>
       
Change file attributes: option -a disables write access to the file except for appending 
data, -c option compress and descompress, whe read and unread respectively. Option -i 
make the file inmutable. Option -j  journal all data writen to the file. Option -A Linux 
wont'n update  the access  time stamp of a file   Using  the - + =  to remove an existing
set, example #chattr +i filename.txt..the result is even root could not  delete o modify 
the file unless you change the flag i to the file #chattr -i filename.txt


<font color="blue">#GREP</font>

grep "Linux" input.txt                     Find patterns within files  
grep "Linux" input.txt output.txt          Find patters in 1 o more files
grep -r "Linux" *                          Find patters recursively

Match patterns using regular expressions

The grep command also allows the usage of regular expressions in pattern matching. This provides
tremendous power to user using the grep command to search for any possible pattern that can be 
represented through regular expression. 

Here is an example :
# grep -r ".*Linux" output.txt output1.txt 
output.txt:I hope you enjoyed working on Linux.
output1.txt:Welcome to Linux.
output1.txt:I hope you will have fun with Linux.
As we can see that the grep command above used a regular expression ".*Linux" for pattern matching 
in files output.txt and ouput1.txt. 

 

#######################################################
<font color="red">KERNEL INFORMATION</font>
#######################################################


<font color="blue">uname  </font>                     

Shows information about the kernel installed on the system

<font color="blue">lsmod       </font>                

shows the module loaded in the kernel

<font color="blue">modinfo     </font>                

show information about a module in particular

<font color="blue">modprobe     </font>               

load kernel modules in the kernel. the option --show-depends  as the name says show the dependencies associated to that module

<font color="blue">rmmod   </font>                    

Remove a module

<font color="blue">dmesg  </font>           
store information about kernel in what is called  kernel ring  buffer, another useful files that store  messages about the system
is in /var/log/messages and /var/log/syslog



#######################################################
<font color="red">RUN LEVELS</font>
#######################################################



<font color="blue">chkconfig --list </font>

List the runlevels of the services present in the system. to change runleves use a command like this chkconfig --level 23
[name of the service], on Red Hat and derivates use a command like --level 345 rather than --level 23

<font color="blue">chkconfig --add script </font> 

Command to take the runlevels from a script, the script in which reside the script must contain special  comments  to 
indicate defaults runlevels

<font color="blue">ntsysv</font>

Graphical program to manage service runlevels

<font color="blue">runlevel</font>

show the runlevel used by the system




#############################################################################
<font color="red"> ENVIRONMENT VARIABLES & SHELLS BASH</font>
#############################################################################



env


