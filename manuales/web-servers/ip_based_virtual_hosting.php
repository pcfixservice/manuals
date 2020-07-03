<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type="text/css">
#wrapper{
word-wrap: break-word;
font-family: sans-serif;
font-size: 98%;
font-style: italic;

text-align: auto;
       width: 1060px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 1px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 0px rgba(0,0,0,.2);
        box-shadow: 0 0 0px rgba(0,0,0,.2);
padding: 5px;

}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>
<u></u>
<font size="6"></font>


<font size="6" color="red">Setup IP-Based Virtual Hosting</FONT>


To setup IP based virtual hosting, you must have more than one IP address/Port assigned to your server or your Linux machine.

It can be on a single NIC card , For example: eth0:1, eth0:2, eth0:3 … so forth. Multiple NIC cards can also be attached. 

Create Multiple IP Addresses to One Single Network Interface
Purpose of implementing IP based virtual hosting is to assign implementing for each domain and that particular IP will not be used by any other domain.

This kind of set up required when a website is running with SSL certificate (mod_ssl) or on different ports and IPs. 
And You can also run multiple instances of Apache on a single machine. To check the IPs attached in your server, please check it using ifconfig command.


<font color="blue">ifconfig or ip ad commands to check interfaces available</font>

<img src="ip-based-virtual-hosting.png" width="700" height="500" /></a>

<img src="ip-based-example1.png" width="800" height="600" /></a>
