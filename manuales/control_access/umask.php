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
<p><font size="6" color="red">umask command</FONT></p>






<P><FONT SIZE="6" COLOR="RED">DESCRIPTION</FONT></P>

On Linux and other Unix-like operating systems, new files are created with a default set of permissions. 
Specifically, a new file's permissions may be restricted in a specific way by applying a permissions "mask"
called the umask.<font color="green"> You can consider the umask an access mode containing exactly those rights that the new file 
should not have.</font> The umask command is used to set this mask, or to show you its current value.

<font color="blue">umask [-S] [mask]</font>


<FONT SIZE="6" COLOR="RED">SPECIFYING THE FILE CREATION MASK USING SYMBOLS</FONT>

permission symbol is any combination of r (read), w (write), or x (execute), as described above


<img src="symbols_permissions.png" width="600" height="270" /></a>

Permissions operator may be one of the following:

<img src="operators_permissions.png" width="600" height="270" /></a>

So, for example, the following umask command:

<font color="blue">umask u+w</font>

sets the mask so that when files are created, they will have permissions which allow write permission 
for the user (file owner). The rest of the file's permissions would be unchanged from the operating system default.

Multiple changes can be specified by separating multiple sets of symbolic notation with commas (but not spaces!)
For example:

<font color="blue">umask u-x,g=r,o+w</font>

This command will set the mask so that when subsequent files are created, they will have permissions that:

<font color="red">1.-</font>Prohibit the execute permission from being set for the file's owner (user), while leaving the rest of 
   the owner permissions unchanged
<font color="red">2.-</font>Enable read permission for the group, while prohibiting write and execute permission for the group;

<font color="red">3.-</font>Enable write permission for others, while leaving the rest of the other permissions unchanged.

Note that if you use the equals operator ("<font color="red">=</font>"), any permissions not specified will be specifically prohibited. 
For example, the command

<font color="blue">umask a=</font>  Will set the file creation mask so that new files are inaccessible to everyone

This means that in the symbolic form you must give the exact complement of the value that you would specify in the octal
form—exactly those rights that do not occur in the octal specification.

<FONT SIZE="6" COLOR="RED">SPECIFYING THE FILE CREATION MASK USING NUMERIC REPRESENTATION</font>

The file creation mask can also be represented numerically, using octal values (the digits from 0 to 7). When using 
octal numeric representation, certain numbers represent certain permissions, and these numbers are added or subtracted 
from each other to represent the final, combined permissions value. Specifically, the numbers 1, 2, and 4 represent the 
following permissions:

<img src="numerrically_permissions.png" width="500" height="220" /></a>

These numbers are used because any combination of these three numbers will be unique. The following table illustrates 
their unique combinations:

<img src="combinations_permissions.png" width="700" height="400" /></a>

For each class of user, one digit can be used to represent their permissions; using the example above, we could represent 
the symbolic permission of rwxr-xr-- using the three-digit octal number 754. The order of the digits is always the same: 
User, Group, Other.


<FONT SIZE="6" COLOR="RED">The Other Permission Digit</FONT>

In octal representations of file permissions, there are actually four digits. The three important digits 
we've discussed are the last three digits. The first digit is a special file permission indicator, and for
the purposes of this discusion can be considered always to be zero. So from here on out, when we discuss 
file permission 777, it may also be referred to as 0777


<FONT SIZE="6" COLOR="RED">So How Does The Umask Actually Work?</FONT>

The umask masks permissions by restricting them by a certain value. Essentially, each digit of the umask is 
"subtracted" from the OS's default value to arrive (LLEGAR) at the default value that you define. 
It's not really subtraction; technically, the mask is negated (its bitwise compliment is taken) and this value 
is then applied to the default permissions using a logical AND operation. The result is that the umask tells 
the operating system which permission bits to "turn off" when it creates a file. So it's not really subtraction, 
but it's a similar concept, and thinking of it as subtraction can help to understand it.

In Linux, the default permissions value is<font color="red"> 666 FOR A REGULAR FILE</font>, and <font color="red">777 FOR A DIRECTORY</font>. When creating a new file 
or directory, the kernel takes this default value, "subtracts" the umask value, and gives the new files the 
resulting permissions.This table shows how each digit of the umask value affects new file and directory permissions:


<img src="umask_values.png" width="700" height="400" /></a>

Personal note: Besides the table above, Im maked my own table to assure myself the real umask value effects


<font color="blue">UMASK DIGIT	DIRECTORY PERMISSIONS   FILE PERMISSIONS</font>

0			rwx	 	   rw
1			rw		   rw   <font color="red">why the file permissions is set to rw instead of rx </font>
2			r-x		   r
3			r		   r    <font color="red">why the file permissions is set to r instead of wx </font>
4			wx		   w
5			w		   w    <font color="red">the file permission  must be "x" isn't </font> 
6			x		   -   
7			-		   -		

So if our umask value is 022, then any new files will, by default, have the permissions 644 (666 - 022). Likewise, 
any new directories will, by default, be created with the permissions 755 (777 - 022).

Here are some other example umask commands:

<font color="blue">umask a+r</font>      :Sets the mask so that new files will allow all users to read them; other permissions 
                will be unchanged from the default.

<font color="blue">umask a-x</font>      :Sets the mask so that new files will not initially be executable by any user; other default 
               permissions unchanged from defaults.

<font color="blue">umask u=rw,go=</font> :Sets the mask so that new files will be readable and writable by the user who owns the file, 
                but may not be executed; group members and others will have no permissions to access the file.

<font color="blue">umask 777</font>      :Make new files inaccessible to everyone - no one can read, write, or execute them.

<font color="blue">umask 000</font>      :Make new files completely accessible (read, write, and execute) to absolutely everyone. However
                ,this is a bad idea. Don't do this.


<font color="red">NOTE:</font> Note that you can only remove permissions using the umask. There is no way
of making files executable by default.
Incidentally, the umask also influences the <font color="blue">chmod</font> command. If you invoke chmod
with a “ + ” mode (e. g., “ <font color="blue">chmod +w file</font> ”) without referring to the owner, group or oth-
ers, this is treated like “ <font color="blue">a+</font> ”, but the permissions set in the umask are not modified.
Consider the following example:





