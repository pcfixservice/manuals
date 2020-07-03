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
<p><font size="6" color="red">CHAGE COMMAND</FONT></p>



Changing the remaining settings in /etc/shadow requires the chage command:


<img src="chage_options.png" width="900" height="160" /></a>

If you cannot remember the option names, invoke chage with the name of
a user account only. The program will present you with a sequence of the
current values to change or confirm.

<font color="blue">chage -E 2011-9-28 foo</font>  #change the expire date of the account foofoo  on yyyy/mm/dd 

<font color="blue">chage -l foo</font>     # List the expiration's attributes for foo account
<font color="blue">chage -d 0 foo</font>   # Force to change the passwd in the next login attempt


 
