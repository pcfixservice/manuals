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
<p><font size="6" color="red">USERMOD</FONT></p>

<FONT SIZE="4" COLOR="RED">SETTING THE EXPIRY DATE FOR AN ACCOUNT</FONT>

Use the --expiredate flag followed by a date in YYYY-MM-DD format.

<font color="blue"># usermod --expiredate 2014-10-30 tecmint</font>



<FONT SIZE="4" COLOR="RED">ADDING THE USER TO SUPPLEMENTARY GROUPS</FONT>

Use the combined -aG, or –append –groups options, followed by a comma separated list of groups.

<font color="blue"># usermod --append --groups root,users tecmint</font>

To eliminate a user from one group use the following command

<font color="blue"># gpasswd --delete user  group_belongs_user</font>

At this respect what is the difference between gpasswd and usermod?, here the explanation:

<font color="green">To add a user to other groups use (additional_groups is a comma-separated list):

# usermod -aG additional_groups username

Warning: If the -a option is omitted in the usermod command above, the user is removed from all groups 
not listed in additional_groups (i.e. the user will be member only of those groups listed in additional_groups).
Alternatively, gpasswd may be used. Though the username can only be added (or removed) from one group at a time.

# gpasswd --add username group</font>



<FONT SIZE="4" COLOR="red">CHANGING THE DEFAULT LOCATION OF THE USER’S HOME DIRECTORY</FONT>

Use the -d, or –home options, followed by the absolute path to the new home directory.

<font color="blue"># usermod --home /tmp tecmint</font>



<FONT SIZE="4" COLOR="red">CHANGING THE SHELL THE USER WILL USE BY DEFAULT</FONT>

Use –shell, followed by the path to the new shell.

<font color="blue"># usermod --shell /bin/sh tecmint</font>


Now let’s execute all the above commands in one go.

<FONT COLOR="blue"># usermod --expiredate 2014-10-30 --append --groups root,users --home /tmp --shell /bin/sh tecmint</FONT>

In the example above, we will set the expiry date of the tecmint user account to October 30th, 2014.
We will also add the account to the root and users group. Finally, we will set sh as its default shell 
and change the location of the home directory to /tmp:

For existing accounts, we can also do the following.



<FONT SIZE="4" COLOR="RED">DISABLING ACCOUNT BY LOCKING PASSWORD</FONT>

Use the -L (uppercase L) or the –lock option to lock a user’s password.

<FONT COLOR="blue"># usermod --lock tecmint</FONT>



<FONT SIZE="4" COLOR="RED">UNLOCKING USER PASSWORD</FONT>

Use the –u or the –unlock option to unlock a user’s password that was previously blocked.

<FONT COLOR="blue"># usermod --unlock tecmint </FONT>


Adicionally we can user the passwd command to check the status' account as well the lock or unlock of the account

<FONT COLOR="blue"># passwd --status user</FONT>   -S
<FONT COLOR="blue"># passwd --lock   user</FONT>   -l
<FONT COLOR="blue"># passwd --unlock user</FONT>   -u




The usermod program accepts mostly the same options as useradd , but changes existing user accounts instead 
of creating new ones. For example, with 

<FONT COLOR="blue">usermod -g ⟨group⟩ ⟨user name⟩</FONT> #you could change a user’s primary group.

Caution! If you want to change an existing user account’s UID, you could edit the ⟨UID⟩ field in /etc/passwd directly
However, you should at the same time transfer that user’s files to the new UID using <FONT COLOR="blue">chown</FONT> : 

<FONT COLOR="blue">chown -R tux /home/tux  </FONT>

Re-confers ownership of all files below user tux ’s home directory to user tux , after you have changed the UID
for that account. If “<FONT COLOR="blue">ls -l</FONT>” displays a numerical UID instead of a textual name, this implies that there is
no user name for the UID of these files.You can fix this using <FONT COLOR="blue">chown</FONT> .




