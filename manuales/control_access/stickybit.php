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
<p><font size="6" color="red">sticky bit</FONT></p>


Linux supports another special mode for directories, where only a file’s owner
may delete or remove files within that directory:

This <font color="red">t</font> mode, the “<font color="red">sticky bit</font>”, can be used to counter a problem which arises when
public directories are in shared use: Write permission to a directory lets a user
delete other users’ files, regardless of their access mode and owner! For example,
the /tmp directories are common ground, and many programs create their tempo-
rary files there. To do so, all users have write permission to that directory. This
implies that any user has permission to delete files there.

Usually, when deleting or renaming a file, the system does not consider that
file’s access permissions. If the “<font color="red">sticky bit</font>” is set on a directory, a file in that di-
rectory can subsequently be deleted only by its owner, the directory’s owner, or
root . The “sticky bit” can be set or removed by specifying the symbolic<font color="red"> +t</font> and <font color="red">-t</font>
modes; in the octal representation it has value <font color="red">1</font> in the same digit as SUID and
SGID.


<FONT COLOR="RED">SETTING THE STICKY BIT  PERMISSION IN SYMBOLIC MODE</FONT>

<font color="blue">chmod o+t public_dir/</font>

<FONT COLOR="RED">SETTING THE STICKY BIT PERMISSION IN ABSOLUTE MODE OR OCTAL MODE</FONT>


<font color="blue">$ chmod 1777 public_dir/</FONT>
<font color="blue">$ ls -l public_dir/</FONT>
<font color="green">-rwxrxxrwt   1 db     staff        12095 May  6 09:29 public_dir/</FONT>


Command to find files with sticky bit set:

<font color="blue">find / -user root -perm -1000 -exec ls -ldb {} \;  > /tmp/dir_stickybit_set</font>





The “<font color="red">sticky bit</font>” derives its name from an additional meaning it used to have
in earlier Unix systems: At that time, programs were copied to swap space
in their entirety when started, and removed completely after having ter-
minated. Program files with the sticky bit set would be left in swap space
instead of being removed. This would accelerate subsequent invocations of
those programs since no copy would have to be done. Like most current
Unix systems, Linux uses demand paging, i. e., it fetches only those parts
of the code from the program’s executable file that are really required, and
does not copy anything to swap space at all; on Linux, the sticky bit never
had its original meaning.


