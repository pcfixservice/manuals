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
<p><font size="6" color="red">passwd command</FONT></p>


The passwd command is used to set up passwords for users. If you are logged in as
root , then asks for a new password for user john (You must enter it twice as it will not be
echoed to the screen).
The passwd command is also available to normal users, to let them change their
own passwords (changing other users’ passwords is root ’s prerogative):

<font color="blue">$ passwd</font>
<font color="green">Changing password for joe.
(current) UNIX password: secret123
Enter new UNIX password: 321terces
Retype new UNIX password: 321terces
passwd: password updated successfully</font>


You can change some of these settings by means of passwd options. Here are a few examples:

<img src="passwd_options.png" width="900" height="150" /></a>


Locking and unlocking accounts by means of -l and -u works by putting
a “ ! ” in front of the encrypted password in /etc/shadow . Since “ ! ” cannot
result from password encryption, it is impossible to enter something upon
login that matches the “encrypted password” in the user database—hence
access via the usual login procedure is prevented. Once the “ ! ” is removed,
the original password is back in force. (Astute, innit?) However, you should
keep in mind that users may be able to gain access to the system by other
means that do not refer to the encrypted password in the user database,
such as the secure shell with public-key authentication.
