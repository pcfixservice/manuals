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


<p><font size="6" color="red">ADDING USER ACCOUNTS</FONT></p>

Under Linux, every user account is assigned a unique number, the so-called
user ID (or UID, for short). Every user account also features a textual user name 
(such as root or joe ) which is easier to remember for humans. In most places where
it counts—e. g., when logging in, or in a list of files and their owners—Linux will
use the textual name whenever possible.

 The Linux kernel does not know anything about textual user names; process
data and the ownership data in the filesystem use the UID exclusively. This
may lead to difficulties if a user is deleted while he still owns files on the
system, and the UID is reassigned to a different user. That user “inherits”
the previous UID owner’s files.

 There is no technical problem with assigning the same (numerical) UID to
different user names. These users have equal access to all files owned by that
UID, but every user can have his own password. You should not actually
use this (or if you do, use it only with great circumspection).




To add a new user you can run either one of the following two commands as root:

<font color="blue"># adduser  user</font>
<font color="blue"># useradd  user</font>

When a new user account is added to the system, the following operations are performed:

<font color="red">1.-</font> his/her home directory is created, by defaults in /home/newuser
<font color="red">2.-</font> The following hidden files are copied into the user's home directory, and will be used
to provide environment variables for his/her user session

<font color="orange">.bash_logout
.bash_profile
.bashrc</font>

<font color="red">3.-</font> A email spool is created for each user at /var/spool/mail/username
<font color="red">4.-</font> A group is created and given  the same name of the new user account







<P><FONT SIZE="6" COLOR="RED">DELETING USER ACCOUNTS</FONT></P>

You can delete an account (along with its home directory, if it’s owned by the user, and all the files 
residing therein, and also the mail spool) using the userdel command with the –remove option.

<font color="blue"># userdel --remove [username]</font>

other files belonging to the user—e. g., crontab files—must be delete manually. A quick way to locate and remove files
belonging to a certain user is the 

<font color="blue">find / -uid  ⟨UID⟩ -delete</font>

command. Without the -r option, only the user information is removed from the
user database; the home directory remains in place




<FONT COLOR="RED">CHANGING USER INFORMATION DIRECTLY— VIPW</FONT>

The vipw command invokes an editor ( vi or a different one) to edit /etc/passwd directly. At the same time,
the file in question is locked in order to keep other users from simultaneously changing the file using, e. g.,
passwd (which changes would be lost). With the -s option, /etc/shadow can be edited. B The actual editor that is
invoked is determined by the value of the VISUAL environment variable, alternatively that of the EDITOR environment variable;
if neither exists, vi will be launched.
