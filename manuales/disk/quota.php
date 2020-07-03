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


<p><font size="6"> Installation & Configuration Quota Disk Procedure</font></p>

<font color="red">Ubuntu, Linux Mint & Derivates</font>

<font color="blue">sudo apt-get install quota quotatool</font>

<font color="blue">sudo vi /etc/fstab</font>

<font color="green"># /etc/fstab: static file system information.
#
# Use 'blkid' to print the universally unique identifier for a
# device; this may be used with UUID= as a more robust way to name devices
# that works even if disks are added and removed. See fstab(5).
#
# <file system> <mount point>   <type>  <options>       <dump>  <pass>
# / was on /dev/sda3 during installation
UUID=30745284-bd17-435b-a00f-52546b84f667 /               ext3    errors=remount-ro,<font color="magenta">usrquota,grpquota</font> 0       1
# swap was on /dev/sda5 during installation
UUID=624bcdb1-5581-4d8a-a954-e1a0315b0bc8 none            swap    sw              0       0</font>


<font color="blue">sudo touch /quota.user</font>
<font color="blue">sudo touch /quota.group</font>

<font color="blue">sudo chmod 600 /quota.*</font>
<font color="blue">sudo mount -o remount /</font>
<font color="blue">sudo cat /etc/mtab</font> To check that it worked, investigate /etc/mtab: that is the same if we type mount

<font color="blue">sudo quotacheck -avugm</font>
<font color="magenta">*</font> a Check all mounted non-NFS filesystems in /etc/mtab
<font color="magenta">*</font> v -v, --verbose quotacheck reports its operation as it progresses.
<font color="magenta">*</font> u -u --user  Only user quotas listed in /etc/mtab or on the filesystems specified are to be checked
<font color="magenta">*</font> g -g --group Only group quotas listed in /etc/mtab or on the filesystems specified are to be checked
<font color="magenta">*</font> m -m or  --no-remount  Don't try to remount filesystem read-only

<font color="blue">quotaon -avug </font> Enable disk quota to all filesystem, all users and to all groups
<font color="green">/dev/disk/by-uuid/30745284-bd17-435b-a00f-52546b84f667 [/]: group quotas turned on
/dev/disk/by-uuid/30745284-bd17-435b-a00f-52546b84f667 [/]: user quotas turned on</font>
<font color="blue">quotaoff -a</font> (stopping quota on all file systems.)

<font color="blue">edquota quotauser or edquota -u satori -f /</font> and then <font color="blue">quota -u satori</font> To confirm the change

<font color="gray">Disk quotas for user quotauser (uid 1006):
Filesystem      <font color="#38C3AC">blocks</font>       <font color="orange">soft</font>       <font color="magenta">hard</font>     <font color="#DBDE2C">inodes</font>       <font color="yellow">soft</font>     <font color="#2F43A7">hard</font> 
  /dev/disk      <font color="#38C3AC">11784</font>       <font color="orange">100</font>        <font color="magenta">100</font>         <font color="#DBDE2C">77</font>        <font color="yellow">0</font>       <font color="#2F43A7"> 0</font></font>

<font color="blue">repquota -s /</font>  Show information about quotas used for all users the option -s is humanreadable

<font color="green">acer antix2 #</font> <font color="blue">repquota -s /</font>

<font color="green">*** Report for user quotas on device /dev/disk/by-uuid/30745284-bd17-435b-a00f-52546b84f667
Block grace time: 7days; Inode grace time: 7days
                        Space limits                File limits
User            used    soft    hard  grace    used  soft  hard  grace
----------------------------------------------------------------------
root      --  26736M      0K      0K           240k     0     0       
man       --   2280K      0K      0K            190     0     0       
lp        --   6300K      0K      0K              1     0     0       
www-data  --   1440K      0K      0K              6     0     0       
libuuid   --     24K      0K      0K              2     0     0       
syslog    --   5856K      0K      0K             25     0     0       
dnsmasq   --      4K      0K      0K              1     0     0       
avahi-autoipd --      4K      0K      0K              1     0     0       
speech-dispatcher --      8K      0K      0K              2     0     0       
colord    --     20K      0K      0K              4     0     0       
hplip     --      4K      0K      0K              1     0     0       
mdm       --    824K      0K      0K             18     0     0       
antix2    --  36845M      0K      0K          61837     0     0       
mysql     --  30060K      0K      0K            116     0     0       
user1     --  12464K      0K      0K             85     0     0       
user2     --  11856K      0K      0K             93     0     0       
nagios    --  59908K      0K      0K            454     0     0       
postfix   --     60K      0K      0K             44     0     0       
snmp      --      8K      0K      0K              2     0     0       
awk       --  11784K      0K      0K             77     0     0       
libvirt-qemu --     16K      0K      0K              5     0     0       
quotauser +- <font color="#38C3AC">11784K</font>      <font color="orange">100K</font>    <font color="magenta">100K</font>             <font color="#DBDE2C">77</font>     <font color="yellow">0</font>     <font color="#2F43A7">0</font>       
#197609   --    624K      0K      0K             43     0     0     </font>


<font color="orange">Soft Limit:</font> Soft limit indicates the maximum amount of disk usage a quota user has on a partition. 
When combined with grace period, it acts as the border line, which a quota user is issued warnings about his impending quota 
violation when passed. 

<font color="magenta">Hard Limit:</font> Hard limit works only when grace period is set. It specifies the absolute 
limit on the disk usage, which a quota user can't go beyond his hard limit. 




<P><FONT SIZE="6"> TROUBLESHOOTING</FONT></P>

<font color="blue">quotacheck -cagfmv</font>

quotacheck: Cannot guess format from filename on /dev/disk/by-uuid/30745284-bd17-435b-a00f-52546b84f667. 
Please specify format on commandline.  quotacheck: Cannot find filesystem to check or filesystem not mounted with quota option.

<font color="red">1) Why qutoacheck shows the above error message ?</font>

The above error message is clearly shows the results as,’can’t able to identified the quota file format’. 
It seem’s that the old quota file has been broken that’s why quotacheck it shows the above error message. 
So i’m just, forces the qutoacheck process with vfsv0 format.

<font color="red">2) What is disk quota ?</font>

Disk quotas is to allocate limited disk space to every user in the system.

<font color="red">3) What is vfsv0 format ?</font>

vfsv0 is qutoa file format which is used when the default detection might not work on system and corrupted quota files.

<font color="red">4) How to run qutocheck with force option ?</font>

Use the below format to run the quota check with force option.

<font color="green">acer antix2 #</font>  <font color="blue">quotacheck -cagfmvF vfsv0</font>

<font color="green">quotacheck: Your kernel probably supports journaled quota but you are not using it. Consider switching to journaled quota to avoid running quotacheck after an unclean shutdown.
quotacheck: Scanning /dev/disk/by-uuid/30745284-bd17-435b-a00f-52546b84f667 [/] done
quotacheck: Checked 26799 directories and 275666 files</font>




Bueno, muchas personas solicitan ajustarles las cuotas a los usuarios del sistema. Muchos entienden mal 
el cómo las cuotas funcionan. Para comenzar indicaré: Las cuotas normalmente no se activan en los demonios, 
no es labor del demonio controlar las cuotas. Es labor del kernel.

En el kernel se activa un módulo que permite llevar la contabilidad de las cuotas, y como el kernel es el que recibe las
solicitudes de escritura, entonces el mismo kernel se ocupará de negarlas si la contabilidad así lo indica o no.

<font color="red">Existen dos variantes de quotas en Linux:</font>

<font color="orange"> 1. Quotas por usuario</font>
<font color="orange"> 2. Quotas por grupo</font>

Por supuesto te imaginarás que las cuotas por usuario afectarán el qué o cuánto escribe el usuario hacia disco. 
Y las cuotas de disco afectarán el qué o cuánto escribe un grupo de usuarios al disco.

De las dos, yo trabajaré con cuotas por usuario. Aunque mencionaré cómo se llevan las cuotas de grupo.

<font color="red">Las cuotas se dividen a su vez en</font>

<font color="orange"> 1. cuotas de espacio en disco (bloques)</font>
<font color="orange"> 2. quotas de cantidad de archivos (inodos)</font>

Las cuotas de espacio en disco se miden en K y es la que comunmente es más fácil de entender: 
Es cuántos KBytes puede escribir un usuario (o grupo) a disco.

Las cuotas de cantidad de archivos (inodos) indica cuántos archivos (no importa el tamaño) pueden escribir 
los usuarios (o grupos). Es util cuando temes o tienes riesgos de que un usuario te cree por ejemplo 100000 
archivos de 0 bytes de tamaño. Aún cuando tengan 0 de tamaño, consumirá muchos sino todos los inodos del sistema,
me ha pasado a veces, pero sobre todo con servidores donde se programa.

Normalmente las cuotas de inodos no las utilizo a no ser que tenga esa razón específica.

<font color="red">Las cuotas de espacio en disco y/o archivos se dividen en dos tipos:</font>

<font color="orange"> 1. Soft Quotas</font>
<font color="orange"> 2. Hard Quotas</font>

<font color="orange">Hard quotas:</font> Son aquellas que no te puedes pasar, por ejemplo, si digo que 
tienes 10000KBytes de hard quota, eso significará que no puedes pasarte de los 10000kbytes (10mb).

<font color="orange">La soft quota</font> los usuarios no la entienden casi, y yo tampoco la uso mucho, 
significa que te puedes pasar de ellas, pero por un tiempo determinado (7 días) llamado <font color="orange">periodo de gracia</font>. Una vez superado este valor, se considerarán hard quotas.

Se utilizaban antes cuando había poco disco, a los usuarios se les decía: Tienes un espacio en disco de 10MB

Sin embargo el sistema de quotas se programaba de la siguiente forma:

<font color="orange">- Soft Quota: 10MB</font>
<font color="orange">- Hard Quota: 20MB</font>

De forma tal que el usuario, si tenía un requerimiento muy especial podía pasarse de los 10MB hasta 20MB... pero eso sí,
antes de los 7 días debía ajustarse a la soft quota (10MB).

Ahora, explicale esto a tu jefe un lunes en la mañana cuando esté bien irritado.. que si soft o si hard.. prefiero softquota=
hardquota y así me quito las explicaciones de que si eran 10 que si se lo dije hace 2 años que no, que recuerde que no se le
olvide, etc. Por suerte no tengo jefe.

<FONT COLOR="RED">INSTALACION:</FONT>

<font color="blue">rpm -q quota</font>

Si el paquete no estuviera presente, deberíamos instalarlo con:

<font color="red">yum install quota</font> o conseguir los paquetes individuales de quota desde el iso de CentOS

Las cuotas se manejan por partición, supongamos que yo quiero activar las cuotas en la partición 
/home de mi linux (supongo tengas bien particionado tu linux).

Edito el archivo /etc/fstab, busco la línea de /home y la edito, en mi caso está así:

/dev/hda5 /home ext3 default 1 2 <font color="orange">default means rw, suid, dev, exec, auto, nouser, async</font>

Lo importante es agregarle soporte para quotas por usuario y/o grupo, delante de default:


<font color="blue">/dev/hda5 /home ext3 default,usrquota,grpquota 1 2</font>

Una vez haya hecho el cambio procedemos a remontar la partición /home:


<font color="blue">mount -o remount /home</font>

verificamos con el comando mount que la partición esté activada con usrquota y/o grpquota

verificamos con el comando mount que la partición esté activada con usrquota y/o grpquota

Ahora procedemos a realizar el chequeo preliminar de las quotas:

<font color="blue">quotacheck -auvg</font>

Tomará un tiempo.. al finalizar procedemos a activar la contabilidad:

<font color="blue">quotaon -a</font>

Los usuarios se activan con quota ilimitada por defecto. Así que esta anterior labor puede 
ser realizada en un servidor ya funcionando sin riesgos a bloquear algún usuario, 
pues todos tendrán ilimitada quota.

<FONT COLOR="RED"> COMANDOS PARA UTILIZAR Y MANEJAR LAS CUOTAS POR USUARIO</FONT>


Para verificar las cuotas de todos los usuarios podemos ejecutar:

<font color="blue">repquota -a</font>

Esto nos reportará las cuotas de tooooooodos los usuarios del sistema.

Para ver las quotas de un usuario en específico ponemos:

<font color="blue">quota -u nombredeusuario</font>

-u : es opcional, no tiene que ponerse -u pero sí el nombre de usuario

Nos reportará algo así:

<font color="green">Disk quotas for user usuario (uid 22802):
Filesystem blocks quota limit grace files quota limit grace
/dev/sda2 32 20480 20480 9 0 0</font>

Lo cual me indicará que el usuario "usuario" tiene una quota suave (quota) de 20480 K (~20megas) 
una cuota dura (limit) de  20480K, y está utilizando 32K (blocks).

Respecto a los archivos, está utilizando 9 archivos y no tiene quotas (están en 0 quota y limit).

Si quieres ver las quotas de un grupo pondrías:

<font color="blue">quota -g nombredelgrupo</font>

Para editar las quotas de un usuario pones:

<font color="blue">edquota -u nombrdeusuario</font>

Es el viejo vi, puedes ahi ajustar las cuotas (quota, limit) tanto del disco como de los archivos. 
No importa que queden fuera de posición una vez editadas, al finalizar se arreglan (al grabar).

Las cuotas deben ponerse en K, por ejemplo una cuota de 50MB sería: 50000KB (ok, ya sé, no es tan así pero la idea es
agregarle 3 ceros).

Al finalizar de editarlas, grabamos y puedes verificarlas con el comando anterior (quota nombredeusuario).

Para editar las quotas de un grupo es:

edquota -g nombredelgrupo

Igual que el anterior.

Espero lo disfrutes. Con este sencillo howto podrás ponerle cuotas a los usuarios, independientemente 
del servicio que corran, ya sea ftp, sendmail, o lo que sea pues estas cuotas las maneja el kernel, 
y nadie escapa al kernel.






