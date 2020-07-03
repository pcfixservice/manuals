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
<font size="6" color="red">Device Integration. (D-bus, HAL, udisk)</FONT>


The final piece of the puzzle brings in application programs. How do you set things up such that plugging 
in your digital camera will start your photo management program to download any new pictures? Or how does 
the icon for your USB disk get placed on the backdrop of your graphical desktop environment?

One possible answer to this is “<font color="red">udisks</font>”.Formerly this used an infrastructure called HAL (short for “<font color="red">hardware ab-
straction layer</font>”). HAL, however, proved too complicated and limited and is no longer being developed further.
<font color="red">Udisks</font> is one of the successor projects, and deals exclusively with storage devices such as external disks 
and USB thumb drives; there are other projects for other types of device. Large parts of HAL have also been 
assimilated into udev.

<font size="6" color="red">HAL</font>

The idea behind HAL is to aggregate information from various sources: The kernel (via udev ) reports that a 
new device is available and which one. The device itself can be asked, as can default settings for the device 
that the user once made in their graphical environment.

This aggregation is necessary because the kernel may not actually know everything worthwhile (vale la pena) about a device.
Many digital cameras, for example, register with the system as “hard disks”, and the information that they
should really be treated as cameras must come from elsewhere.

<font size="6" color="red">D-Bus</font>

<font color="red">Udisks</font> and similar project are based on<font color="red">D-Bus</font>, a simple system for interprocess communication that is 
supported by most desktop environments. Programs can tell D-Bus about services that they want to offer 
to other programs. Programs can also wait for events. (It doesn’t matter if several programs wait for
the same event; all interested parties are notified.) D-Bus has two major application areas:

<font color="green">*</font> Communication between programs in the same graphical environment. A possible application might be for 
your telephony program to automatically mute your music player when a call comes in.

<font color="green">*</font> Communication between the operating system and your graphical environment.

<font color="red">Udisks consists of two components, a background service (udisksd) and a useraccessible tool (udisksctl) </font>
which can communicate with the background service. The background service is accessible through the D-Bus
and will be started on demand whenever a program issues a D-Bus query to udisks. This way programs can find
out which storage devices are available as well as execute operations such as mounting or unmounting devices. 

This includes appropriate privilege checks; users may, for example, be allowed to plug USB thumb drives 
into their own computers but will be denied access to USB thumb drives on other “seats”. 

Here is an example of a <font color="red">udisksctl</font> query about a USB thumb drive:
