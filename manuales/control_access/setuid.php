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
<p><font size="6" color="red">SETUID BIT</FONT></p>

Setuid, which stands for set user ID on execution, is a special type of file permission in Unix and 
Unix-like operating systems such as Linux and BSD. It is a security tool that permits users to run certain 
programs with escalated privileges. 

When an executable file's setuid permission is set, users may execute that program with a level of access that 
matches the user who owns the file. For instance, when a user wants to change their password, they run the 
<font color="blue">passwd</font> command. The passwd program is owned by the root account and 
marked as setuid, so the user is temporarily granted root access for that very limited purpose.

<FONT COLOR="RED">VIEWING THE SETUID PERMISSION OF A FILE</font>

<img src="setuid.png" width="500" height="100" /></a>




<FONT COLOR="RED">SETTING THE SETUID PERMISSION IN SYMBOLIC MODE</FONT>

<font color="blue">chmod u+s myfile</font>

<FONT COLOR="RED">SETTING THE SETUID PERMISSION IN ABSOLUTE MODE OR OCTAL MODE</FONT>


<font color="blue">$ chmod 4555 dbprog</FONT>
<font color="blue">$ ls -l dbprog</FONT>
<font color="green">-r-sr-xr-x   1 db     staff        12095 May  6 09:29 dbprog</FONT>



Non-executable files can be marked as setuid, but it has no effect; marking them setuid does not automatically 
make them executable. In this case, the permission bit shows up as an uppercase "<font color="red">S</font>". However, if you then set the 
file to be user-executable with the permission <font color="red">u+x</font>, the setuid permission comes into effect. It will then be 
represented in the listing with a lowercase "<font color="red">s</font>":

<FONT COLOR="green">ON LINUX, BY THE WAY, THE SET-UID MECHANISM WORKS ONLY FOR BINARY PROGRAMS, NOT SHELL OR OTHER INTERPRETER SCRIPTS</FONT>


By analogy to the set-UID bit there is a SGID bit, which causes a process to be
executed with the program file’s group and the corresponding privileges (usually
to access other files assigned to that group) rather than the invoker’s group setting.
chmod syntax
The SUID and SGID modes, like all other access modes, can be changed using
the <font color="red">chmod</font> program, by giving symbolic permissions such as<font color="red">u+s</font> (sets the SUID bit)
or <font color="red">g-s</font> (deletes the SGID bit). 

You can also set these bits in octal access modes by  adding a fourth digit at the very left:
<font color="red">The SUID bit has the value 4, the SGID bit  the value 2</font> thus you can assign the access mode 
4755 to a file to make it readable and executable to all users (the owner may also write to it
) and to set the SUID bit.ls output You can recognise set-UID and set-GID programs in the output 
of “ ls -l ” by the symbolic abbreviations “ s ” in place of “ x ” for executable files

Command to find files with seuid set

<font color="blue">find / -user root -perm -4000 -exec ls -ldb {} \; > /tmp/ckprm</font>
