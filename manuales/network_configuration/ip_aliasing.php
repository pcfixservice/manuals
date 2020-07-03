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
<font size="6" color="red">Create Multiple IP Addresses to One Single Network Interface</FONT>


cd /etc/sysconfig/network-scripts/

# cp ifcfg-eth0 ifcfg-eth0:0
# cp ifcfg-eth0 ifcfg-eth0:1
# cp ifcfg-eth0 ifcfg-eth0:2


DEVICE="eth0:0"
BOOTPROTO=static
ONBOOT=yes
TYPE="Ethernet"
IPADDR=172.16.16.126
NETMASK=255.255.255.224
GATEWAY=172.16.16.100
HWADDR=00:0C:29:28:FD:4C

/etc/init.d/network restart

systemctl restart network.service

<font size="6">Assign Multiple IP Address Range</font>

[root@tecmint network-scripts]# cd /etc/sysconfig/network-scripts/
[root@tecmint network-scripts]# cp -p ifcfg-eth0 ifcfg-eth0-range0

[root@tecmint network-scripts]# vi ifcfg-eth0-range0

#DEVICE="eth0"
#BOOTPROTO=none
#NM_CONTROLLED="yes"
#ONBOOT=yes
TYPE="Ethernet"
IPADDR_START=172.16.16.126
IPADDR_END=172.16.16.130
IPV6INIT=no
#GATEWAY=172.16.16.100

/etc/init.d/network restart

systemctl restart network.service

