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
<font size="6" color="red">GDISK Command</FONT>

The <font color="red">gdisk</font> program specialises in GPT-partitioned disks and can do a few useful things the previously explained
programs can’t. You may however have to install it specially. The elementary functions of gdisk correspond to 
those of fdisk and parted , and we will not reiterate those (read the documentation and do a few experiments).A
few features of gdisk , however, are of independent interest:

• You can use gdisk to convert an MBR-partitioned medium to a GPT-partitioned medium. This presupposes that there 
is enough space at the start and the end of the medium for GPT partition tables. With media where, according to 
current conventions, the first partition starts at sector 2048, the former is not a problem, but the latter may be.
You will possibly have to ensure that the last 33 sectors on the medium are not assigned to a partition.

For the conversion it is usually sufficient to start gdisk with the device file name of the medium in question as a
parameter. You will either receive a warning that no GPT partition table was found and disk used the MPT partition
table instead (at this point you can quit the program using <font color="red">w</font> and you’re done), or that an intact MBR, but a damaged
GPT partition table was found (then you tell gdisk to follow the MBR, and can then quit the program using<font color="red"> w</font> and 
you’re done). • The other direction is also possible. To do this, you must use the <font color="red">r</font> command in gdisk to change to
the menu for “recovery/transformation commands”, and select the <font color="red">g</font> command there (“convert GPT into MBR and exit”).
Afterwards you can quit the program using <font color="red">w</font> and convert the storage medium this way.










