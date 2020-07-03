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
        -moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
        box-shadow: 0 0 15px rgba(0,0,0,.2);


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

<font color="red">UDEV DAEMON</font>

udev is a daemon which dynamically creates and removes device nodes from /dev/, handles hotplug events 
and loads drivers at boot time.


<font color="magenta">*</font> Started at boot time
<font color="magenta">*</font> user space tool - you can stop it and start it
<font color="magenta">*</font> Watches the kernel and updates the /dev filesystem in realtime
  . /etc/rcS.d/S03udev --> /etc/init.d/udev
  . /sbin/udev

<font color="magenta">*</font> udev is designed to be configured by configuration files outside the kernel
<font color="magenta">*</font> udev does not care about device order on the bus or device initiation order
<font color="magenta">*</font> udev allows the user to set arbitrary rules and create symlinks as the user sees fit
<font color="magenta">*</font> Everything lives in  <font color="blue">/etc/udev  rather /dev</font>
<font color="magenta">*</font> udev uses information provides for the filesystem sysfs normally located en /sys/. 
The kernel linux offered this filesystem /sys/ with the information  kernel has about the hardware in the system.
r="blue">

######   CONFIG FILES & LOG FILES  #####

<font color="magenta">*</font> /etc/udev
<font color="magenta">*</font> /var/log/kern.log
<font color="magenta">*</font> /etc/udev/rules.d/  Path where udev store the rules that manage the devices   

<FONT COLOR="RED">KERNEL COMPONENTS</FONT>

Kernel needs to tell user-land what is going on:

<font color="magenta">*</font> sysfs
<font color="magenta">*</font> /proc
<font color="magenta">*</font> /sys
<font color="magenta">*</font> Unix domain sockets 
<font color="magenta">*</font> Networking enabled

<font color="blue">NOTE:</font> NONE of the kernel code is udev, but udev needs to know what is going on in the kernel to 
know how to populate /dev


<FONT COLOR="RED">UDEV TOOLS</FONT>

The udev package comes with a number of binaries that you can use to diagnose what it going on and help with writing tools
you can check this utilities by typing <font color="blue">dpkg -L udev</font>






<FONT COLOR="RED">CREACIÓN DE REGLAS UDEV PARA PERSONALIZAR EL NOMBRE DE LOS FICHEROS DE DISPOSITIVO DE LAS MEMORIAS USB</FONT>


El Linux Hotplugging, que se encarga de cargar automáticamente los módulos/drivers para los dispositivos que el kernel detecta, 
bien en el arranque, bien dinámicamente. El <font color="magenta">udev</font>, que permite usar nombres lógicos en los ficheros 
de dispositivo (los que están bajo <font color="magenta">/dev</font>).

<font color="magenta">El HAL – Hardware Abstraction Layer</font>, que es el que permitiría que, por ejemplo, al conectar una 
cámara de fotos nos saliera en el escritorio una aplicación de gestión de fotos, pero también se encargaría, por ejemplo, 
de montar automáticamente las memorias USB al conectarlas.

El <font color="magenta">D-Bus</font>, usado por el <font color="magenta">HAL</font> para comunicar a todos los procesos interesados 
en la máquina los eventos de hardware que se vayan produciendo


El primer paso para la configuración del udev a nuestra medida pasa por conectar nuestra memoria USB y por mirar las 
últimas lineas del comando <font color="magenta">dmesg</font>:

<font color="green">usb 1-6: USB disconnect, address 5
usb 1-6: new high speed USB device using ehci_hcd and address 6
usb 1-6: configuration #1 chosen from 1 choice
scsi8 : SCSI emulation for USB Mass Storage devices
usb-storage: device found at 6
usb-storage: waiting for device to settle before scanning
scsi 8:0:0:0: Direct-Access     TrekStor USB Stick CS-D        PQ: 0 ANSI: 0
SCSI device sdi: 15625008 512-byte hdwr sectors (8000 MB)
sdi: Write Protect is off
sdi: Mode Sense: 10 00 00 00
sdi: assuming drive cache: write through
SCSI device sdi: 15625008 512-byte hdwr sectors (8000 MB)
sdi: Write Protect is off
sdi: Mode Sense: 10 00 00 00
sdi: assuming drive cache: write through
 sdi: sdi1
sd 8:0:0:0: Attached scsi removable disk sdi
sd 8:0:0:0: Attached scsi generic sg8 type 0
usb-storage: device scan complete</font>

Tenemos una memoria USB de 8000MiB en <font color="magenta">/dev/sdi</font>. Si la hubiéramos conectado 
antes o después de otras memorias USB, en vez de <font color="magenta">/dev/sdi</font> podría haber sido 
<font color="magenta">/dev/sdh</font> o <font color="magenta">/dev/sdj</font>. Para no tener que buscar siempre 
ese fichero de dispositivo en la salida del dmesg, sería ideal que siempre fuera <font color="magenta">/dev/trekstor</font >, 
independientemente de cuándo lo conectáramos.

Sabiendo ya el fichero de dispositivo, podemos mirar las propiedades del mismo con el comando udevinfo:

<font color="blue">udevinfo -a -p $(udevinfo -q path -n /dev/sdi)</font>
y en la salida del comando nos tenemos que fijar en los atributos:

<font color="green">looking at parent device '/devices/pci0000:00/0000:00:02.1/usb1/1-6':
KERNELS=="1-6"
SUBSYSTEMS=="usb"
DRIVERS=="usb"
ATTRS{serial}=="AAC26F0C1D29"
ATTRS{product}=="USB Stick CS-D"
ATTRS{manufacturer}=="TrekStor GmbH _ Co. KG"
ATTRS{maxchild}=="0"
 ATTRS{version}==" 2.00"
ATTRS{devnum}=="7"
ATTRS{speed}=="480"
ATTRS{bMaxPacketSize0}=="64"
ATTRS{bNumConfigurations}=="1"
ATTRS{bDeviceProtocol}=="00"
ATTRS{bDeviceSubClass}=="00"
ATTRS{bDeviceClass}=="00"
ATTRS{bcdDevice}=="0220"
ATTRS{idProduct}=="625f"
ATTRS{idVendor}=="0451"
ATTRS{bMaxPower}=="100mA"
ATTRS{bmAttributes}=="c0"
ATTRS{bConfigurationValue}=="1"
ATTRS{bNumInterfaces}==" 1"
ATTRS{configuration}==""</font>

Con esta salida, elegimos un atributo que nos parezca razonablemente único en el sistema, y siguiendo el manual 
Writing udev rules como referencia, podemos crear una regla como la siguiente en un fichero con el nombre que 
queramos bajo <font color="red">/etc/udev/rules.d/</font>. Yo lo voy a hacer en <font color="red">/etc/udev/rules.d/vicente.rules:</font>

<font color="green">BUS=="usb", KERNEL=="sd*", ATTRS{product}=="USB Stick CS-D", SYMLINK+="trekstor%n"</font>

y tras hacer un:

<font color="blue">/etc/init.d/udev reload</font>

la regla se activará y al conectar de nuevo la memoria USB se creará automáticamente un fichero de dispositivo con 
el nombre deseado, incluyendo el fichero de dispositivo de la primera partición:

<font color="green"># ls -la /dev/trekstor*
lrwxrwxrwx 1 root root 3 2007-03-24 00:58 /dev/trekstor -> sdi
lrwxrwxrwx 1 root root 4 2007-03-24 00:58 /dev/trekstor1 -> sdi1</font>

y si ponemos esta línea en el /etc/fstab:

<font color="red">/dev/trekstor1  /mnt/trekstor vfat defaults,umask=000     0       0</font>

cada vez que el sistema arranque con la memoria USB conectada se montará directamente en el directorio deseado 
sin más inconvenientes. Esto, por supuesto, si lo hacemos con todos nuestros dispositivos, tendremos la 
diferenciación deseada entre memorias USB:

<font color="red">BUS=="usb", KERNEL=="sd*", ATTRS{product}=="USB Stick CS-D", SYMLINK+="trekstor%n"
BUS=="usb", KERNEL=="sd*", ATTRS{product}=="DataTraveler 2.0", SYMLINK+="kingston%n"
BUS=="usb", KERNEL=="sd*", ATTRS{manufacturer}=="P Technology", SYMLINK+="dedo512mb%n"</font>

Hay que tener en cuenta que en la salida del comando <font color="red">udevinfo</font> nos sale tanto la controladora de la memoria como 
lo que es la memoria en sí misma, la segunda como hija de la primera. Para entender esto mejor nos podemos 
fijar en el disco IDE Maxtor en el enclosure USB Venus que comentaba antes. En esta memoria USB podemos ver 
esta diferencia entre controladora y memoria. Éste es el disco y sale antes en la salida del udevinfo:

<font color="green">looking at parent device '/devices/pci0000:00/0000:00:02.1/usb1/1-8/1-8:1.0/host6/target6:0:0/6:0:0:0':
KERNELS=="6:0:0:0"
SUBSYSTEMS=="scsi"
DRIVERS=="sd"
ATTRS{ioerr_cnt}=="0x0"
ATTRS{iodone_cnt}=="0x36"
ATTRS{iorequest_cnt}=="0x36"
ATTRS{iocounterbits}=="32"
ATTRS{timeout}=="30"
ATTRS{state}=="running"
ATTRS{rev}=="    "
ATTRS{model}=="TM3250820A      "
ATTRS{vendor}=="MAXTOR S"
ATTRS{scsi_level}=="3"
ATTRS{type}=="0"
ATTRS{queue_type}=="none"
ATTRS{queue_depth}=="1"
ATTRS{device_blocked}=="0"
ATTRS{max_sectors}=="240"
</font>

y ésta es la controladora del enclosure:

<font color="green">looking at parent device '/devices/pci0000:00/0000:00:02.1/usb1/1-8':
KERNELS=="1-8"
SUBSYSTEMS=="usb"
DRIVERS=="usb"
ATTRS{serial}=="300000031605"
ATTRS{product}=="USB2.0 Storage Device"
ATTRS{manufacturer}=="Cypress Semiconductor"
ATTRS{maxchild}=="0"
ATTRS{version}==" 2.00"
ATTRS{devnum}=="4"
ATTRS{speed}=="480"
ATTRS{bMaxPacketSize0}=="64"
ATTRS{bNumConfigurations}=="1"
ATTRS{bDeviceProtocol}=="00"
ATTRS{bDeviceSubClass}=="00"
ATTRS{bDeviceClass}=="00"
ATTRS{bcdDevice}=="0001"
ATTRS{idProduct}=="6830"
ATTRS{idVendor}=="04b4"
ATTRS{bMaxPower}=="  0mA"
ATTRS{bmAttributes}=="c0"
ATTRS{bConfigurationValue}=="1"
ATTRS{bNumInterfaces}==" 1"
ATTRS{configuration}==""</font>

Para tener el fichero de dispositivo con el nombre deseado, en el fichero <font color="red">/etc/udev/rules.d/vicente.rules</font> 
podríamos la siguiente línea haciendo referencia a un atributo único de la controladora:

<font color="green">BUS=="usb", KERNEL=="sd*", ATTRS{manufacturer}=="Cypress Semiconductor", SYMLINK+="maxtor%n"</font>

Podemos fijarnos en que la controladora tiene un path incluído en el path de la memoria:

<font color="green">/devices/pci0000:00/0000:00:02.1/usb1/1-8/1-8:1.0/host6/target6:0:0/6:0:0:0</font>

y que es al que apunta el fichero de dispositivo dentro del sysfs:

<font color="blue"># ll /sys/block/sdi/</font>
<font color="green">total 0
drwxr-xr-x  6 root root    0 2007-03-28 21:54 ./
drwxr-xr-x 44 root root    0 2007-03-28 21:53 ../
-r--r--r--  1 root root 4096 2007-03-28 21:53 dev
lrwxrwxrwx  1 root root    0 2007-03-28 21:53 device -> ../../devices/pci0000:00/0000:00:02.1/usb1/1-6/1-6:1.0/host9/target9:0:0/9:0:0:0/
drwxr-xr-x  2 root root    0 2007-03-28 21:53 holders/
drwxr-xr-x  3 root root    0 2007-03-28 21:53 queue/
-r--r--r--  1 root root 4096 2007-03-28 21:53 range
-r--r--r--  1 root root 4096 2007-03-28 21:53 removable
drwxr-xr-x  3 root root    0 2007-03-28 21:53 sdi1/
-r--r--r--  1 root root 4096 2007-03-28 21:53 size
drwxr-xr-x  2 root root    0 2007-03-28 21:53 slaves/
-r--r--r--  1 root root 4096 2007-03-28 21:54 stat
lrwxrwxrwx  1 root root    0 2007-03-28 21:53 subsystem -> ../../block/
--w-------  1 root root 4096 2007-03-28 21:54 uevent</font>

Para diferenciar el disco de la controladora podemos fijarnos en los drivers usados, ya que el disco tiene 
<font color="red">DRIVERS==”sd”</font> (de SCSI Disk) mientras que la controladora tiene <font color="red">DRIVERS==”usb”</font>.

Además, un dísco típicamente tendrá de atributo <font color="red">ATTRS{max_sectors}</font> 
mientras que un atributo típico de la controladora es <font color="red">ATTRS{bMaxPower}.</font>

Estoy haciendo énfasis en fijarnos en los atributos de la controladora porque en la regla estamos
poniendo <font color="red">BUS==”usb”</font>. Si por ejemplo tienes un lector de tarjetas como éste:

<FONT SIZE="6" COLOR="RED">LECTOR DE TARJETAS DE MEMORIA</FONT>

En el que cada ranura es un <font color="red">/dev/sdX</font>, resulta que la controladora es única para 
los cuatro discos y cada disco tiene propiedades diferentes. La controladora tendría este aspecto:

<font color="green">SUBSYSTEMS=="usb"
DRIVERS=="usb"
ATTRS{serial}=="0123456789abcdef"
ATTRS{product}=="USB Multi- Card Reader "
ATTRS{manufacturer}=="OTi"</font>

y cada uno de los discos este, variando el model en cada uno de ellos:

<font color="green">SUBSYSTEMS=="scsi"
DRIVERS=="sd"
[...]
ATTRS{model}=="SD CARD Reader  "
ATTRS{model}=="MS CARD Reader  "
ATTRS{model}=="SM CARD Reader  "
ATTRS{model}=="CF CARD Reader  "</font>
En este caso, es mucho mejor usar el BUS==”scsi” y las reglas quedarían así:

<font color="green">BUS=="scsi", ATTRS{model}=="SD CARD Reader  ", SYMLINK+="cardsd%n", OPTIONS+="all_partitions"
BUS=="scsi", ATTRS{model}=="CF CARD Reader  ", SYMLINK+="cardcf%n", OPTIONS+="all_partitions"
BUS=="scsi", ATTRS{model}=="SM CARD Reader  ", SYMLINK+="cardsm%n", OPTIONS+="all_partitions"
BUS=="scsi", ATTRS{model}=="MS CARD Reader  ", SYMLINK+="cardms%n", OPTIONS+="all_partitions"</font>

y tras el /etc/init.d/udev reload tendremos:

<font color="blue"># ll /dev/card*</font>
<font color="green">lrwxrwxrwx 1 root root 3 2007-03-29 20:19 /dev/cardcf -> sdd
lrwxrwxrwx 1 root root 4 2007-03-29 20:19 /dev/cardcf1 -> sdd1
lrwxrwxrwx 1 root root 3 2007-03-29 20:19 /dev/cardcf3 -> sg3
lrwxrwxrwx 1 root root 3 2007-03-29 20:19 /dev/cardms -> sdg
lrwxrwxrwx 1 root root 3 2007-03-29 20:19 /dev/cardms6 -> sg6
lrwxrwxrwx 1 root root 3 2007-03-29 20:19 /dev/cardsd -> sdf
lrwxrwxrwx 1 root root 4 2007-03-29 20:19 /dev/cardsd1 -> sdf1
lrwxrwxrwx 1 root root 3 2007-03-29 20:19 /dev/cardsd5 -> sg5
lrwxrwxrwx 1 root root 3 2007-03-29 20:19 /dev/cardsm -> sde
lrwxrwxrwx 1 root root 3 2007-03-29 20:19 /dev/cardsm4 -> sg4</font>

En un momento en el que hay una tarjeta SD (sdf1) y una CF metidas (sdd1). En este punto me queda la 
duda de por qué se crean enlaces a otros ficheros de dispositivo (sg3, sg6, sg5, sg4), 
pero los que nos hacen falta están correctos.

La opción <font color="red">all_partitions</font> es una recomendación que aparece en el ejemplo del 
USB Card Reader del “Writing udev rules” y según la página de man de udev sirve para:

all_partitions will create the device nodes for all available partitions of a block device. This may 
be useful for removable media devices where media changes are not detected.

Podríamos haber usado <font color="red">BUS==”scsi”</font> desde el principio, pero creo que así es 
mucho más ilustrativo de la dinámica de las reglas del udev.

El fichero /etc/udev/rules.d/vicente.rules queda definitivamente así:

<font color="green">BUS=="usb", KERNEL=="sd*", ATTRS{product}=="USB Stick CS-D", SYMLINK+="trekstor%n"
BUS=="usb", KERNEL=="sd*", ATTRS{product}=="DataTraveler 2.0", SYMLINK+="kingston%n"
BUS=="usb", KERNEL=="sd*", ATTRS{manufacturer}=="Cypress Semiconductor", SYMLINK+="maxtor%n"
BUS=="usb", KERNEL=="sd*", ATTRS{manufacturer}=="P Technology", SYMLINK+="dedo512mb%n"
BUS=="scsi", ATTRS{model}=="SD CARD Reader  ", SYMLINK+="cardsd%n", OPTIONS+="all_partitions"
BUS=="scsi", ATTRS{model}=="CF CARD Reader  ", SYMLINK+="cardcf%n", OPTIONS+="all_partitions"
BUS=="scsi", ATTRS{model}=="SM CARD Reader  ", SYMLINK+="cardsm%n", OPTIONS+="all_partitions"
BUS=="scsi", ATTRS{model}=="MS CARD Reader  ", SYMLINK+="cardms%n", OPTIONS+="all_partitions"</font>

Es importante indicar que si las reglas tienen algún error de sintaxis, el udev se quejará en el syslog:

Mar 29 20:18:13 localhost udevd[4881]: add_to_rules: invalid rule '/etc/udev/rules.d/vicente.rules:9'

Finalmente, comentar que se pueden crear reglas de udev para muchos otros tipos de dispositivos como 
impresoras, tarjetas de red o grabadoras que también nos pueden venir muy bien.

Actualización 30/3/07 18:40: El artículo ha aparecido en Barrapunto. Allí se están comentando cosas interesantes. 
Me ha interesado especialmente un comentario de Ivan Vilata i Balaguer en el que explica que el udev crea 
por defecto también una serie de dispositivos bajo <font color="red">/dev/disk/by-*</font> que nos pueden ser de utilidad.


Y, efectivamente, con todos mis cacharritos USB conectados, el directorio <font color="red">/dev/disk/by-id</font> contiene las siguientes entradas:

<font color="green">lrwxrwxrwx 1 root root   9 2007-03-30 18:47 usb-Kingston_DataTraveler_2.0_27C08C4111818B31 -> ../../sdj
lrwxrwxrwx 1 root root  10 2007-03-30 18:47 usb-Kingston_DataTraveler_2.0_27C08C4111818B31-part1 -> ../../sdj1
lrwxrwxrwx 1 root root   9 2007-03-30 18:47 usb-MAXTOR_S_TM3250820A_300000031605 -> ../../sdk
lrwxrwxrwx 1 root root  10 2007-03-30 18:47 usb-MAXTOR_S_TM3250820A_300000031605-part1 -> ../../sdk1
lrwxrwxrwx 1 root root   9 2007-03-30 18:38 usb-OTi_CF_CARD_Reader_0123456789abcdef -> ../../sdd
lrwxrwxrwx 1 root root  10 2007-03-30 18:38 usb-OTi_CF_CARD_Reader_0123456789abcdef-part1 -> ../../sdd1
lrwxrwxrwx 1 root root   9 2007-03-30 18:38 usb-OTi_MS_CARD_Reader_0123456789abcdef -> ../../sdg
lrwxrwxrwx 1 root root   9 2007-03-30 18:38 usb-OTi_SD_CARD_Reader_0123456789abcdef -> ../../sdf
lrwxrwxrwx 1 root root  10 2007-03-30 18:38 usb-OTi_SD_CARD_Reader_0123456789abcdef-part1 -> ../../sdf1
lrwxrwxrwx 1 root root   9 2007-03-30 18:38 usb-OTi_SM_CARD_Reader_0123456789abcdef -> ../../sde
lrwxrwxrwx 1 root root   9 2007-03-30 18:38 usb-TrekStor_USB_Stick_CS-D_AAC26F0C1D29 -> ../../sdh
lrwxrwxrwx 1 root root  10 2007-03-30 18:38 usb-TrekStor_USB_Stick_CS-D_AAC26F0C1D29-part1 -> ../../sdh1
lrwxrwxrwx 1 root root   9 2007-03-30 18:38 usb-UT163_USB_Flash_Disk_20060400000401 -> ../../sdi
lrwxrwxrwx 1 root root  10 2007-03-30 18:38 usb-UT163_USB_Flash_Disk_20060400000401-part1 -> ../../sdi1</font>

El directorio <font color="red">/dev/disk/by-label</font> contiene entradas para las etiquetas de las 
particiones como las siguientes, pero requiere que la partición tenga etiqueta:

<font color="green">lrwxrwxrwx 1 root root  10 2007-03-30 18:47 KINGSTON -> ../../sdj1
lrwxrwxrwx 1 root root  10 2007-03-30 18:47 Maxtor_250G -> ../../sdk1
lrwxrwxrwx 1 root root  10 2007-03-30 18:38 TREKSTOR -> ../../sdh1</font>

Los directorios /dev/disk/by-uuid y /dev/disk/by-path podrían ser útiles también pero parecen menos intuitivos.

Todas las reglas de udev que crean estos ficheros de dispositivo están en el fichero <font color="red">/etc/udev/rules.d/z20_persistent.rules.</font>

También es interesante la posibilidad de añadir entradas al <font color="red">/etc/fstab</font> que hagan 
referencia a la etiqueta de la partición. Esto lo explica la página de man del fstab:

<font color="green">Instead of giving the device explicitly, one may indicate the (ext2 or xfs) filesystem that is to be 
mounted by its UUID or volume label (cf. e2label(8) or xfs_admin(8)), writing LABEL=<label> 
or UUID=<uuid>, e.g., `LABEL=Boot’ or `UUID=3e6be9de-8139-11d1-9106-a43f08d823a6′. 
This will make the system more robust: adding or removing a SCSI disk changes the disk device 
name but not the filesystem volume label.</font>

Si yo quisiera montar siempre la memoria Kingston con label KINGSTON en /mnt/kingston 
podría poner en el fstab una línea como esta:

LABEL=KINGSTON /mnt/kingston vfat defaults,umask=000 0 0
Los comandos para cambiar la etiqueta en los diferentes sistemas de ficheros son:

<font color="green">ext2/ext3	tune2fs -L etiqueta /dev/XXX
e2label /dev/XXX etiqueta
reiserfs	reiserfstune -l etiqueta /dev/XXX
jfs	jfs_tune -L etiqueta /dev/XXX
xfs	xfs_admin -L etiqueta /dev/XXX
ntfs	ntfslabel /dev/XXX etiqueta</font>

FAT	• Al crearlo con mkdosfs se puede especificar la opción -n etiqueta
• Con mlabel definiendo el nombre de la unidad en el /etc/mtools.conf
• Con el Konqueror funcionando como gestor de ficheros
Para finalizar esta actualización, quiero mencionar el artículo Persistent block device naming donde 
he encontrado los comandos para cambiar los labels pero que incluso habla de usar este tipo de ficheros 
de dispositivo by-id o by-label en el gestor de arranque.

Actualización 2/5/08: Para obtener el UUID de una partición, podemos usar el comando vol_id o el blkid:

<font color="blue"># vol_id /dev/sdg1</font>
<font color="green">ID_FS_USAGE=filesystem
ID_FS_TYPE=ntfs
ID_FS_VERSION=3.1
ID_FS_UUID=F680D4CE80D49709
ID_FS_UUID_ENC=F680D4CE80D49709
ID_FS_LABEL=Maxtor 250G
ID_FS_LABEL_ENC=Maxtor\x20250G
ID_FS_LABEL_SAFE=Maxtor_250G</font>

<font color="blue"># blkid /dev/sdg1</font>
/dev/sdg1: UUID="F680D4CE80D49709" LABEL="Maxtor 250G" TYPE="ntfs"
















































