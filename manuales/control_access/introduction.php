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
<p><font size="6" color="red">The Linux Access Control System</FONT></p>

Whenever several users have access to the same computer system there must be  an access 
control system for processes, files and directories in order to ensure that
user A cannot access user B’s private files just like that. To this end, Linux implements 
the standard system of Unix privileges.

In the Unix tradition, every file and directory is assigned to exactly one user
 (its owner) and one group. Every file supports separate privileges for its owner,
the members of the group it is assigned to (“the group”, for short), and all other
users (“others”). Read, write and execute privileges can be enabled individually
for these three sets of users. The owner may determine a file’s access privileges. 

The group and others may only access a file if the owner confers suitable privileges
to them. The sum total of a file’s access permissions is also called its <font color="red">access mode</font>.

In a multi-user system which stores private or group-internal data on a generally accessible medium,
the owner of a file can keep others from reading or access control modifying his files by instituting 
suitable access control. The rights to a file can be determined separately and independently for its owner,
its group and the others. Access permissions allow users to map the responsibilities of a group collabora-
tive process to the files that the group is working with.




<P><FONT SIZE="6" COLOR="RED">ACCESS CONTROL FOR FILES AND DIRECTORIES</FONT></P>

For each file and each directory in the system, Linux allows separate access rights
for each of the three classes of users—owner, members of the file’s group, others.
These rights include read permission, write permission, and execute permission.

As far as files are concerned, these permissions control approximately what
their names suggest: Whoever has read permission may look at the file’s content,
whoever has write permission is allowed to change its content. Execute permis-
sion is necessary to launch the file as a process.


Executing a binary “machine-language program” requires only execute per-
mission. For files containing shell scripts or other types of “interpreted”
programs, you also need read permission.

<P><FONT SIZE="6" COLOR="RED">DIRECTORY PERMISSIONS</FONT><P>

For directories, things look somewhat different: Read permission is required
to look at a directory’s content—for example, by executing the ls command. You
need write permission to create, delete, or rename files in the directory. “Execute”
permission stands for the possibility to “use” the directory in the sense that you
can change into it using cd , or use its name in path names referring to files farther
down in the directory tree.

In directories where you have only read permission, you may read the file
names but cannot find out anything else about the files. If you have only “ex-
ecute permission” for a directory, you can access files as long as you know
their names.

Usually it makes little sense to assign write and execute permission to a directory
separately; however, it may be useful in certain special cases.

<font color="green">It is important to emphasise that write permission on a file is completely
immaterial if the file is to be deleted. Rather you only  need write permission to the direc-
tory that the file is in and nothing else! Since “deleting” a file only removes
a reference to the actual file information (the inode) from the directory, this
is purely a directory operation.</font> 

The rm command does warn you if you’re trying to delete a file that you do 
not have write permission for, but if you confirm the operation and have write permission 
to the directory involved, nothing will stand in the way of the operation’s success. 

Like any other Unix-like system, Linux has no way of “deleting” a file outright <font color="red">total</font>;
you can only remove all references to a file, in which case the Linux kernel decides
on its own that no one will be able to access the file any longer, and gets rid
of its content.) <font color="red">y se deshace de su contenido</font>

If you do have write permission to the file but not its directory, you cannot
remove the file completely. You can, however, truncate it down to 0 bytes
and thereby remove its content, even though the file itself still exists in prin-
ciple.
For each user, Linux determines the “most appropriate” access rights.<font color="green"> For ex-
ample, if the members of a file’s group do not have read permission for the file
but “others” do, then the group members may not read the file. The (admittedly
enticing) rationale that  CIERTAMENTE MOTIVACION, if all others may look at the file, then the group members,
who are in some sense also part of “all others”, should be allowed to read it as
well, does not apply




