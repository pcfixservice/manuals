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


<P><FONT SIZE="6" COLOR="RED">UNDERSTANDING /etc/group/</FONT></P>
	
Group information is stored in the /etc/group file. Each record has the following format:

<font color="red">[Group name]:[Group password]:[GID]:[Group members]</font>
	
* [Group Name]: Is the name of the group
* An x in [Group password] indicates group passwords are not being used
* [GID] is the same as in /etc/passwd
* [Group members]. A comma separated list  of users that are members of [Group name]


<font color="blue">Delete a group</font>

<font color="blue">groupdel  [group_name]</font>


<FONT SIZE="4" COLOR="RED">DISPLAYING THE GROUPS AN USER IS A MEMBER OF</FONT>

<FONT COLOR="blue"># groups tecmint</FONT>
<FONT COLOR="blue"># id tecmint</FONT>


<FONT COLOR="RED">GROUP MANAGEMENT</FONT>

Every time a new user account is added to the system, a group with the same name is 
created with the username as its only member. Other users can be added to the group later. 
One of the purposes of groups is to implement a simple access control to files and other 
system resources by setting the right permissions on those resources.

For example, suppose you have the following users.

user1 (primary group: user1)
user2 (primary group: user2)
user3 (primary group: user3)

All of them need read and write access to a file called common.txt located somewhere on your 
local system, or maybe on a network share that user1 has created. You may be tempted to do something like,

<FONT COLOR="blue"># chmod 660 common.txt</FONT>
OR
<FONT COLOR="blue"># chmod u=rw,g=rw,o= common.txt</FONT> [notice the space between the last equal sign and the file name]

However, this will only provide read and write access to the owner of the file and to those users who 
are members of the group owner of the file (user1 in this case). Again, you may be tempted to add user2 
and user3 to group user1, but that will also give them access to the rest of the files owned by user user1 and group user1.

This is where groups come in handy, and here’s what you should do in a case like this


<FONT COLOR="red">GPASSWD COMMAND</FONT>


The gpasswd command is mainly used to manipulate group passwords in a way similar to the passwd command. 
The system administrator can, however, delegate group administrator the administration of a group’s 
membership list to one or more group administrators. Group administrators also use the gpasswd command:

<font color="blue">gpasswd -a ⟨user⟩ ⟨group⟩</font> #adds the ⟨user⟩ to the ⟨group⟩, and
<font color="blue">gpasswd -d ⟨user⟩ ⟨group⟩</font> #removes him again. With
<font color="blue">gpasswd -A ⟨user⟩ ,... ⟨group⟩</font> #the system administrator can nominate users who are to 
serve as group administrators.

The SUSE distributions haven’t included gpasswd for some time. Instead there are modified versions of the user 
and group administration tools that can handle an LDAP directory.


<FONT COLOR="RED">VIGR<FONT COLOR="RED">

As the system administrator, you can change the group database directly using the vigr command. It works like vipw 
by invoking an editor for “exclusive” access to /etc/group . Similarly, “ vigr -s ” gives you access to /etc/gshadow .










