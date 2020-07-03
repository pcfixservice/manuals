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
<p><font size="6" color="red">SGID Bit</FONT></p>



By analogy to the set-UID bit there is a SGID bit, which causes a process to be
executed with the program file’s group and the corresponding privileges (usually
to access other files assigned to that group) rather than the invoker’s group setting.
chmod syntax
The SUID and SGID modes, like all other access modes, can be changed using
the <font color="red">chmod</font> program, by giving symbolic permissions such as <font color="red"> u+s</font> (sets the SUID bit)
or <font color="red">g-s</font> (deletes the SGID bit). 

You can also set these bits in octal access modes by  adding a fourth digit at the very left:
<font color="red">The SUID bit has the value 4, the SGID bit  the value 2</font> thus you can assign the access mode 
4755 to a file to make it readable and executable to all users (the owner may also write to it
) and to set the SUID bit.ls output You can recognise set-UID and set-GID programs in the output 
of “ ls -l ” by the symbolic abbreviations “ s ” in place of “ x ” for executable files


<FONT COLOR="RED">SETTING THE SETGID PERMISSION IN SYMBOLIC MODE</FONT>

<font color="blue">chmod u+s myfile</font>

<FONT COLOR="RED">SETTING THE SETGID PERMISSION IN ABSOLUTE MODE OR OCTAL MODE</FONT>


<font color="blue">$ chmod 2555 dbprog</FONT>
<font color="blue">$ ls -l dbprog</FONT>
<font color="green">-r-xr-sr-x   1 db     staff        12095 May  6 09:29 dbprog</FONT>

Command to find files with SetGID set

<font color="blue">find / -user root -perm 2000 -exec ls -ldb {} \; > /tmp/list_files_setgid_set</font>

<FONT SIZE="6" COLOR="RED">SPECIAL PERMISSIONS FOR DIRECTORIES</FONT>


There is another exception from the principle of assigning file ownership accord-
ing to the identity of its creator: a directory’s owner can decree that files created
in that directory should belong to the same group as the directory itself. This can
be specified by setting the SGID bit on the directory. (As directories cannot be
executed, the SGID bit is available to be used for such things.)

A directory’s access permissions are not changed via the SGID bit. To create a
file in such a directory, a user must have write permission in the category (owner,
group, others) that applies to him. If, for example, a user is neither the owner of a
directory nor a member of the directory’s group, the directory must be writable for
“others” for him to be able to create files there. A file created in a SGID directory
then belongs to that directory’s group, even if the user is not a member of that
group at all.

The typical application for the SGID bit on a directory is a directory that is
used as a file storage for a “project group”. (Only) the members of the project
group are supposed to be able to read and write all files in the directory, and
to create new files. This means that you need to put all users collaborating
on the project into a project group (a secondary group will suffice):

<font color="blue"># groupadd project</font>
<font color="blue"># usermod -a -G project joe</font>
<font color="blue"># usermod -a -G project sue</font>

✁✁✁✁✁
Now you can create the directory and assign it to the new group. The owner
and group are given all permissions, the others none; you also set the SGID bit:

<font color="blue"># cd /home/project</font>
<font color="blue"># chgrp project /home/project</font>
<font color="blue"># chmod u=rwx,g=srwx /home/project</font>

Now, if user hugo creates a file in /home/project , that file should be assigned to group project :

<font color="blue">$ id</font>
uid=1000(joe) gid=1000(joe) groups=101(project),1000(joe)

<font color="blue">$ touch /tmp/joe.txt</font>


<font color="blue">$ ls -l /tmp/joe.txt</font>    We make a test standard      
-rw-r--r-- 1 joe joe 0 Jan 6 17:23 /tmp/joe.txt

<font color="blue">$ touch /home/project/joe.txt</font>

<font color="blue">$ ls -l /home/project/joe.txt</font>   We make the test now with the SGUID already set in the directory /home/project
-rw-r--r-- 1 joe project 0 Jan 6 17:24 /home/project/joe.txt


There is just a little fly in the ointment.(mosca en el unguento), which you will be able to discern by
looking closely at the final line in the example: The file does belong to the
correct group, but other members of group project may nevertheless only
read it. If you want all members of group project to be able to write to it as
well, you must either apply chmod after the fact (a nuisance)molestia or else set the
umask such that group write permission is retained.

The SGID mode only changes the system’s behaviour when new files are cre-
ated. Existing files work just the same as everywhere else. This means, for in-
stance, <font color="red">that a file created outside the SGID directory keeps its existing group as-
signment when moved into it (whereas on copying, the new copy would be put
into the directory’s group).</font>

The chgrp program works as always in SGID directories, too: the owner of a
file can assign it to any group he is a member of. Is the owner not a member of
the directory’s group, he cannot put the file into that group using chgrp —he must
create it afresh(de nuevo) within the directory



