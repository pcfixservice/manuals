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


<font color="red">He aquí una muestra de archivo /etc/fstab, utilizando nombres descriptivos del kernel:</font>


<font color="blue">cat /etc/fstab</font>

<font color="green"># file system        dir         type    options             dump pass
/dev/sda1              /             ext4      defaults,noatime      0      1
/dev/sda2              none          swap      defaults              0      0
/dev/sda3              /home         ext4      defaults,noatime      0      2
/dev/sda1              /media/windows ntfs-3g  auto,rw,users,umask=000 0 0" </font>

<FONT COLOR="RED">DEFINICIONES DE LOS CAMPOS</font>

El archivo /etc/fstab contiene los siguientes campos separados por un espacio o una tabulación:

<font color="orange">•file system </font>-
Define la partición o dispositivo de almacenamiento para ser montado.

<font color="orange">•dir</font>
Indica a la orden mount el punto de montaje donde la partición será montada.

<font color="orange">•type</font>
Indica el tipo de sistema de archivos de la partición o dispositivo de almacenamiento para ser montado. 
Hay muchos sistemas de archivos diferentes que son compatibles como, por ejemplo: ext2, ext3, ext4, reiserfs,
 xfs, jfs, smbfs, iso9660, vfat, ntfs, swap y auto. El type auto permite a la orden mount determinar qué tipo 
de sistema de archivos se utiliza. Esta opción es útil para proporcionar soporte a unidades ópticas (CD/DVD).

<font color="orange">•options</font>
Indica las opciones de montaje que la orden mount utilizará para montar el sistema de archivos. Tenga en cuenta 
que algunas opciones de montaje son para sistema de archivos específicos. Algunas de lasdopaionev más comu son
    


□ auto - El sistema de archivos será montado automáti durante el arranque, o cuando la orden mount -a se invoque.
□ noauto - El sistema de archivos no será montado automáticamente, solo cuando se le ordene manualmente.
□ exec - Permite la ejecución de binarios residentes en el sistema de archivos.
□ noexec - No permite la ejecución de binarios que se encuentren en el sistema de archivos.
□ ro - Monta el sistema de archivos en modo sólo lectura.
□ rw - Monta el sistema de archivos en modo lectura-escritura.
□ user - Permite a cualquier usuario montar el sistema de archivos.incluye noexec, nosuid, nodev, o lo contrario.
□ users - Permite que cualquier usuario perteneciente al grupo users montar el sistema de archivos.
□ nouser - Solo el usuario root puede montar el sistema de archivos.
□ owner - Permite al propietario del dispositivo montarlo.
□ sync - Todo el I/O se debe hacer de forma sincrónica.
□ async - Todo el I/O se debe hacer de forma asíncrona.
□ dev - Intérprete de los dispositivos especiales o de bloque del sistema de archivos.
□ nodev - Impide la interpretación de los dispositivos especiales o de bloques del sistema de archivos.
□ suid - Permite las operaciones de suid, y sgid bits. Se utiliza principalmente para permitir a los usuarios comunes
  ejecutar binarios con privilegios concedidos temporalmente con el fin de realizar una tarea específica.
□ nosuid - Bloquea el funcionamiento de suid, y sgid bits
□ noatime - No actualiza el inode con el tiempo de acceso al filesystem. Puede aumentar las prestaciones 
□ nodiratime - No actualiza el inode de los directorios con el tiempo de acceso al filesystem. Puede aumentar las pres.
□ relatime - Actualiza en el inode solo los tiempos relativos a modificaciones o cambios de los archivos. Los tiempos
  de acceso vienen actualizados solo si el último acceso es anterior respecto al de la última modificación. (Similar a
  noatime, pero no interfiere con programas como mutt u otras aplicaciones que deben conocer si un archivo ha sido
  leido después de la última modificación). Puede aumentar las prestaciones (véase opciones atime).
□ discard - Emite las órdenes TRIM para dispositivos de bloques subyacentes cuando se liberan los bloques. Recomendado
  para usar si el sistema de archivos se encuentra en un SSD.
□ flush - La opción vfat permite eliminar datos con más frecuencia, de modo que los cuadros de diálogo de copia o las
  barras de progreso se mantenga hasta que se hayan escrito todos los datos.
  nofail - Monta el dispositivo cuando está presente, pero ignora su ausencia. Esto evita que se cometan errores
  durante el arranque para los medios extraíbles.
□ nofail - Monta el dispositivo cuando está presente, pero ignora su ausencia. Esto evita que se cometan errores
  durante el arranque para los medios extraíbles.
□ defaults - Asigna las opciones de montaje predeterminadas que serán utilizadas para el sistema de archivos. Las
  opciones predeterminadas para ext4 son: rw, suid, dev, exec, auto, nouser, async


<font color="orange">dump</font> 
Utilizado por el programa dump («volcado») para decidir cuándo hacer una copia de seguridad. Dump comprueba la
entrada en el archivo fstab y el número de la misma le indica si un sistema de archivos debe ser respaldado o no.
La entradas posibles son 0 y 1. Si es 0, dump ignorará el sistema de archivos, mientras que si el valor es 1, 
dump hará una copia de seguridad. La mayoría de los usuarios no tendrán dump instalado, por lo que deben poner el 
valor 0 para la  entrada dump.

<font color="orange">pass</font> 
Utilizado por fsck para decidir el orden en el que los sistemas de archivos serán comprobados. Las entradas
posibles son 0, 1 y 2. El sistema de archivos raíz («root») debe tener la más alta prioridad: 1 -todos los demás 
sistemas de archivos que desea comprobar deben tener un 2-. La utilidad fsck no comprobará los sistemas de archivos 
que vengan ajustados con un valor 0 en pass.


<font color="red">EJEMPLOS CONCRETOS</font>

Para montar una partición FAT16 o FAT32:
<font color="blue">sudo mount -t vfat /dev/particion /media/carpeta_montaje</font>

Para montar una partición NTFS:
<font color="blue">sudo mount -t ntfs /dev/particion /media/carpeta_montaje</font>

Para montar una partición UFS:
<font color="blue">sudo mount -t ufs -o ro /dev/particion /media/carpeta_montaje</font>

Para montar una partición UFS2:
<font color="blue">sudo mount -t ufs -o ro,ufstype=ufs2 /dev/particion /media/carpeta_montaje</font>

Para montar una partición donde está Ubuntu:
<font color="blue">sudo mount /dev/particion /media/carpeta_montaje</font>

Para montar una imagen iso primero cargamos el módulo loop al kernel, si no estaba cargado todavía:

<font color="blue">sudo modprobe loop</font>

Montamos la imagen:

<font color="blue">sudo mount -t iso9660 -o loop archivo.iso /media/iso</font>


<font color="blue">sudo chown -Rf usuario /partición</font> Add a user as a owner of the partition

<font color="blue">sudo chgrp -Rf oficina /dev/sda5</font> Add a group as a owner of /dev/sda5




