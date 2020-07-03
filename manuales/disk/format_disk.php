             <html>

        <head>
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
        <TITLE>Manuales</TITLE>
        <link href="stylesheets/common.css" type="text/css" rel="stylesheet">
        </head>

        <body class='navbar'><div id="hdr"><div id="hdr_container">
        <br>
        <p id="hdr_home"><h1><FONT COLOR=blue>FORMATEO DE UNIDADES USB</FONT> <span></span></h1></a></p>
<style type="text/css">
#wrapper{


 font-family: sans-serif;
  font-size: 100%;
  font-style: italic;

text-align: justify;
       width: 1043px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 15px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
        box-shadow: 0 0 15px rgba(0,0,0,.2);
border­radius: 200px;

word-wrap: break-word;
}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>

<font color="RED">FORMATEO DE PARTICIONES, ETIQUETAS etc</font>

Lo primero que tenemos que hacer, es asegurarnos de tener instalado el paquete dosfstools.

<font color="blue">$ sudo aptitude install dosfstools</font>


<font color="blue">$ sudo fdisk -l</font>

<font color="blue">$ mke2fs -t ext2 (ext3,ext4) -L label-name /dev/sdba</font>
<font color="blue">$ mkfs.ext2  -L label-name /dev/

<font color="blue">sudo mkfs.vfat -F 32 -n Mi_Memoria /dev/sdc1</font>

Con la opción -F 32 le decimos que será formateada como Fat32, y con la opción -n le ponemos una etiqueta o nombre al dispositivo.
