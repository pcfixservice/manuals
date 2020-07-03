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
<p><font size="6" color="red"></FONT></p>

<P><FONT SIZE="6" COLOR="RED">UNDERSTANDING /ETC/PASSWD</FONT></P>

The full information for all users is stored in /etc/passwd. This file contains a record  per system user
account, and has the following format.(fields are delimited by a colon)

<font color="red">[username]:[x]:[UID]:[GID]:[Comment]:[Home directory]:[Default shell]</font>

* The username and Comment (also know as GECOS) fields are self explanatory. (autoexplicativo)
   Note: This information is often used by programs such as mail or finger and theoretically there is a 
   program called <font color="blue">chfn</font> that let you modify the infomation about the user in this field

* The x in the second field indicates that the account is protected by a shadowed password (in /etc/shadow), which
  is needed  to logon as username
* The UID and the GID are integers that represents the User Identification and the primary Group Identification to 
  which a user belongs, respectively
* The Home directory indicates the absolute path for user's home directory
* The Default Shell is the shell that will be made available to this user when he/she logins the system
  the user can change the default shell by means of the <font color="blue">chsh</font> program. the eligible shells are listed in /etc/shells
  or by executing <font color="blue">chsh --list</font> command 






















