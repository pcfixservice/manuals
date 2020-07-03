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

<script>
function actionForm(formid, act)
{
    document.getElementById(formid).action=act;
    document.getElementById(formid).submit();
}
</script>

 <script>
    // Esta función abre una ventana con tu propio contenido
    function firstExample() {
      var newWindow = window.open('', '', 'width=250, height=120');
      newWindow.document.write('<p>¡Cuidado todos sus datos seran borrados!</p>');
    }
    
    // Abre una página diferente
    function secondExample() {
      window.open('http://twitter.com', 'Twitter', 'width=915, height=590');
    }
  </script>

<form id="form1" method="post">

<label  style="position: absolute; left: 20px;  margin-top: 10px;font-size: 14px">Related Videos</label>
<select name="video" style="position: absolute; left:20px; width: 200px; height: 30px; margin-top: 30px;font-size: 11px;"/>

<option value="lspci_lsusb.m4v">Linux Academy lspci, lsusb, lscpu</option> 
<option value="usuario2">Usuario 2</option>
<option value="usuario3">Usuario 3</option>
<option value="usuario4">Usuario 4</option>
<option value="usuario5">Usuario 5</option>
</select>

<input type="button" value="video" onClick="actionForm(this.form.id, 'prueba.php'); return true;" style="position: absolute; left:250px; color: blue; height: 20px; width: 120px; margin-top: 4px;font-size: 14px" >
<br>
</FORM>


<video width="1050" height="800" controls>
  <source src="lspci_lsusb.m4v" type="video/mp4">
  
Your browser does not support the video tag.
</video>
<p>
Linux Academy video lsusb, lspci

</p>



<FONT COLOR="RED">lscpu</FONT>

The lscpu command reports information about the cpu and processing units. 
It does not have any further options or functionality.

<FONT COLOR="RED">lshw -short</FONT>

A general purpose utility, that reports detailed and brief information about multiple different hardware units such as
cpu,  memory, disk, usb controllers, network adapters etc. Lshw extracts the information from different /proc files.

<FONT COLOR="RED">lsusb</FONT>

Linux supports a wide variety of USB (universal serial bus) devices. A USB system on a PC consists of a host controller 
inside your computer, hubs that act as splitters to give you more ports, and the actual USB devices. The Linux kernel 
supports USB devices through three types of drivers:

<font color="blue">Host interface drivers</font>

<font color="blue">USB device drivers</font>

Other drivers not necessarily related to USB, but required by a USB device driver (for example,<font color="blue">
the USB mass storage driver requires the SCSI disk support driver)</font>

Plugging in external hubs yields kernel messages like the following:

<font color="green">Oct 10 11:07:28 nagiosxi kernel: usb 5-1: new low-speed USB device number 4 using uhci_hcd
Oct 10 11:07:28 nagiosxi kernel: usb 5-1: New USB device found, idVendor=0000, idProduct=0538
Oct 10 11:07:28 nagiosxi kernel: usb 5-1: New USB device strings: Mfr=0, Product=1, SerialNumber=0
Oct 10 11:07:28 nagiosxi kernel: usb 5-1: Product:  USB OPTICAL MOUSE
Oct 10 11:07:28 nagiosxi kernel: input:  USB OPTICAL MOUSE as /devices/pci0000:00/0000:00:1d.3/usb5/5-1/5-1:1.0/input/input11
Oct 10 11:07:28 nagiosxi kernel: hid-generic 0003:0000:0538.0005: input,hidraw2: USB HID v1.11 Mouse [ USB OPTICAL MOUSE]</font>








