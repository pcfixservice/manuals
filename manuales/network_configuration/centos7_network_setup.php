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

En esta entrada vamos a aprender a configurar las interfaces de red en el sistema operativo 
GNU/Linux CentOS 7, lo mismo servirá para RHEL 7 ya que es exactamente igual.

¿Qué es lo que cambia respecto a la configuración de red de versiones anteriores de CentOS y Red Hat? 
Vamos a ir viéndolo.

Lo primero que os llamará la atención, aunque es algo que se sabía desde versiones anteriores es 
la desaparición del comando ifconfig para la estandarización completa del comando ip:


<font color="blue"># ip addr list</font>
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN 
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00
    inet 127.0.0.1/8 scope host lo
       valid_lft forever preferred_lft forever
    inet6 ::1/128 scope host 
       valid_lft forever preferred_lft forever
2: enp0s3: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc pfifo_fast state UP qlen 1000
    link/ether 08:00:27:99:f6:7a brd ff:ff:ff:ff:ff:ff
    inet 192.168.1.130/24 brd 192.168.1.255 scope global dynamic enp0s3
       valid_lft 258471sec preferred_lft 258471sec
    inet6 fe80::a00:27ff:fe99:f67a/64 scope link 
       valid_lft forever preferred_lft forever

<font color="red"><u>Nomenclatura de interfaces de red</u></font>

Como podéis ver en la salida del comando ip addr list, las interfaces de red ya no se llaman eth0,eth1,ethN. 
Este es el otro gran cambio en esta nueva versión. Este cambio (Predictable Network Interface Names) pretende 
asignar identificadores estables a las interfaces de red basándose en el tipo (local Ethernet, WLAN, WWAN…) 
y evitar los problemas de la nomenclatura clásica. Si os interesa profundizar en el tema recomiendo leer 
la documentación al respecto. Básicamente tenemos:


Names incorporating Firmware/BIOS provided index numbers for on-board devices (example: <font color="orange">eno1</font>)
Names incorporating Firmware/BIOS provided PCI Express hotplug slot index numbers (example: <font color="orange">ens1</font>)
Names incorporating physical/geographical location of the connector of the hardware (example: <font color="orange">enp2s0</font>)
Names incorporating the interfaces’s MAC address (example: <font color="orange">enx78e7d1ea46da</font>)
Classic, unpredictable kernel-native ethX naming (example: <font color="orange">eth0</font>)


<font color="red"><u>CONFIGURACIÓN MANUAL DE INTERFACES DE RED</u></font>

La configuración manual sigue siendo exactamente igual que en versiones anteriores. Los ficheros que contienen 
la configuración de cada interfaz de red se encuentran en:

<font color="blue"># ls -l /etc/sysconfig/network-scripts/ifcfg-*</font>
-rw-r--r--. 1 root root 321 ago 22 23:54 /etc/sysconfig/network-scripts/ifcfg-enp0s3
-rw-r--r--. 1 root root 254 abr  2 17:30 /etc/sysconfig/network-scripts/ifcfg-lo

Sólo hay que editar el de la interfaz correspondiente y modificar según requerimientos:

<font color="red"><u>CONFIGURACIÓN IP DINÁMICA DHCP</u></font>

<font color="blue"># cat /etc/sysconfig/network-scripts/ifcfg-enp0s3</font>
<font color="green">HWADDR="08:00:27:99:F6:7A"
TYPE="Ethernet"
BOOTPROTO="dhcp"
DEFROUTE="yes"
PEERDNS="yes"
PEERROUTES="yes"
IPV4_FAILURE_FATAL="no"
IPV6INIT="yes"
IPV6_AUTOCONF="yes"
IPV6_DEFROUTE="yes"
IPV6_PEERDNS="yes"
IPV6_PEERROUTES="yes"
IPV6_FAILURE_FATAL="no"
NAME="enp0s3"
UUID="30d5594c-d4db-4f2d-bc0d-91ffd2571035"
ONBOOT="yes"</font>




<font color="red"><u>CONFIGURACIÓN IP ESTÁTICA</u></font>

<font color="blue"># cat /etc/sysconfig/network-scripts/ifcfg-enp0s3</font>
<font color="green">HWADDR="08:00:27:99:F6:7A"
TYPE="Ethernet"
BOOTPROTO="static"
IPADDR="192.168.1.199"
NETMASK="255.255.255.0"
DEFROUTE="yes"
PEERDNS="yes"
PEERROUTES="yes"
IPV4_FAILURE_FATAL="no"
IPV6INIT="yes"
IPV6_AUTOCONF="yes"
IPV6_DEFROUTE="yes"
IPV6_PEERDNS="yes"
IPV6_PEERROUTES="yes"
IPV6_FAILURE_FATAL="no"
NAME="enp0s3"
UUID="30d5594c-d4db-4f2d-bc0d-91ffd2571035"
ONBOOT="yes"</font>

<font color="red"><u>CONFIGURACION EXAMPLE FOR SERVER NAGIOS4XI IN CENTOS 7</U></font>

[root@nagiosxi ~]#<font color="blue"> cat /etc/sysconfig/network-scripts/ifcfg-enp63s0</font>
<font color="green">HWADDR="00:16:35:0d:45:e3"
TYPE="Ethernet"
BOOTPROTO="static"
IPV6INIT="no"
IPV6_AUTOCONF="no"
ONBOOT="yes"
IPADDR="192.168.0.50"
NETMASK="255.255.255.0"
DEFROUTE="yes"
PEERDNS="yes"
PEERROUTES="yes"
IPV4_FAILURE_FATAL="no"</font>

<font color="red"><u>REINICIAR RED</u></font>

Para aplicar los cambios hay que reiniciar el servicio de red (Arrancar / Parar / Reiniciar servicios en RHEL 7 y CentOS 7):

<font color="blue"># systemctl restart network.service</font>

<font color="blue"># systemctl status network.service</font>

<font color="green">network.service - LSB: Bring up/down networking
Loaded: loaded (/etc/rc.d/init.d/network)
Active: active (exited) since dom 2014-08-24 10:16:49 CEST; 3s ago
Process: 11002 ExecStop=/etc/rc.d/init.d/network stop (code=exited, status=0/SUCCESS)
Process: 11169 ExecStart=/etc/rc.d/init.d/network start (code=exited, status=0/SUCCESS)

ago 24 10:16:48 localhost.localdomain systemd[1]: Starting LSB: Bring up/down networking...
ago 24 10:16:48 localhost.localdomain network[11169]: Bringing up loopback interface:  
Could not load file '/etc/sysconfig/network-scripts/ifcfg-lo'
ago 24 10:16:48 localhost.localdomain network[11169]: Could not load file '/etc/sysconfig/network-scripts/ifcfg-lo'
ago 24 10:16:48 localhost.localdomain network[11169]: Could not load file '/etc/sysconfig/network-scripts/ifcfg-lo'
ago 24 10:16:48 localhost.localdomain network[11169]: Could not load file '/etc/sysconfig/network-scripts/ifcfg-lo'
ago 24 10:16:48 localhost.localdomain network[11169]: [  OK  ]
ago 24 10:16:49 localhost.localdomain network[11169]: Bringing up interface enp0s3:  Connection 
successfully activated (D-Bus active path: /org/free...ction/3)
ago 24 10:16:49 localhost.localdomain network[11169]: [  OK  ]
ago 24 10:16:49 localhost.localdomain systemd[1]: Started LSB: Bring up/down networking.
Hint: Some lines were ellipsized, use -l to show in full.


<font color="red"><u>GATEWAY, HOSTNAME Y DNS</u></font>

La configuración de Gateway, Hostname sigue siendo exactamente igual Especificaremos nuestro HostName y puerta 
de enlace en el siguiente fichero:

<font color="blue">vi /etc/sysconfig/network</font>

<font color="red">NETWORKING=yes
HOSTNAME=pruebas
GATEWAY=192.168.1.1</font>

Y los DNS en lugar de configurarlos en /etc/resolv.conf vemos que es preferible añadirlos dentro del fichero 
de configuración de la interfaz de red:

<font color="blue">vi /etc/resolv.conf</font>

<font color="green"># Generated by NetworkManager
# No nameservers found; try putting DNS servers into your
# ifcfg files in /etc/sysconfig/network-scripts like so:
#
# DNS1=xxx.xxx.xxx.xxx
# DNS2=xxx.xxx.xxx.xxx
# DOMAIN=lab.foo.com bar.foo.com</font>




















<font color="red">Identificando las interfaces de red</font>

En versiones anteriores por lo general solo tenías que encontrar la interfaz de red llamada eth0 y 
cambiabas el numero 0 por la interfaz de red que desearas, sin embargo en Centos 7 los nombres de las
interfaces son diferentes y es importante identificarlas, para ello puedes utilizar el comando ip add 
en el que solicitarás la dirección IP del sistema y en la salida del comando de mostrará el nombre de cada interfaz.



example for command output  ip add

[root@nagiosxi ~]#<font color="blue"> ip add</font>
<font color="green">1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN 
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00
    inet 127.0.0.1/8 scope host lo
       valid_lft forever preferred_lft forever
    inet6 ::1/128 scope host 
       valid_lft forever preferred_lft forever
2: enp63s0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc mq state UP qlen 1000
    link/ether 00:16:35:0d:45:e3 brd ff:ff:ff:ff:ff:ff
    inet 192.168.0.50/24 brd 192.168.0.255 scope global enp63s0
       valid_lft forever preferred_lft forever
    inet6 fe80::216:35ff:fe0d:45e3/64 scope link 
       valid_lft forever preferred_lft forever
[root@nagiosxi ~]# </font>


En la salida de este comando es posible que no veas ningún eth0 o eth1 como en versiones anteriores, en vez de 
esto verás secuencias como la del ejemplo “enp0s3”.

Estos nuevos identificadores se crean en base a ciertas reglas y patrones que ahora se toman en cuenta para 
nombrar los dispositivos de red como se indica en en la documentación de Red Hat 7: 
Networking_Guide -Consistent_Network_Device_Naming ).

El siguiente paso a realizar es localizar el archivo de configuración de la interfaz que vas modificar, por 
lo que debes ir  la siguiente ruta:

[root@nagiosxi ~]#<font color="blue"> cd /etc/sysconfig/network-scripts/</font> 


Este archivo llamado ifcfg-enp0s3 es donde se encuentra la configuración de tu interfaz de red y lo debes editar 
con el comando “nano” pero con privilegios de root, asi:

[root@nagiosxi network-scripts]# <font color="blue">vi ifcfg-enp63s0</font> 
<font color="green">TYPE=Ethernet
BOOTPROTO=dhcp
DEFROUTE=yes
PEERDNS=yes
PEERROUTES=yes
IPV4_FAILURE_FATAL=no
IPV6INIT=yes
IPV6_AUTOCONF=yes
IPV6_DEFROUTE=yes
IPV6_PEERDNS=yes
IPV6_PEERROUTES=yes
IPV6_FAILURE_FATAL=no
NAME=enp63s0
UUID=4c199597-df24-4a14-9938-ad527d5d737b
DEVICE=enp63s0
ONBOOT=no
[root@nagiosxi network-scripts]# </font>


Los parámetros anteriores deben ser configurados según lo que te indique el proveedor de internet o el administrador \
de la LAN, si es un servidor de prueba tu puedes determinar un IP adecuado para tu red local. Ve un ejemplo de 
estos valores de la configuración en la siguiente página.


<font color="red">BOOTPROTO</font> determina el tipo de configuración que tiene la interfaz, puede ser none (ninguna), static (estática) o 
dhcp (asignación de ip dinámica por dhcp) por lo general en un servidor siempre se debe configurar como static.

<font color="red">IPV6INIT y IPV6_AUTOCONF</font> indicas si deseas activar el protocolo IP versión 6 y que se autoconfigure, en el ejemplo 
seleccionamos que no lo usaremos y que no se configure.

<font color="red">ONBOOT</font> si la interfaz de red que estás configurando debe de levantarse de forma automática cuando arranca el 
servicio network entonces debes configurar esta opción como “yes” de lo contrario el servidor arrancará y 
la interfaz permanecerá desactivada hasta que manualmente la actives. Recuerda que Centos 7 siempre configura 
esta opción como “no” por lo que no tendrás conexión a la red por default en la interfaces de red.

<font color="red">IPADDR0</font> es la primera dirección IP de la interfaz, recuerda que puede habar varias.

<font color="red">PREFIX0</font> es el pefijo de red, antes llamado NETMASK de la primera IP, recuerda que puede haber varias.

<font color="red">GATEWAY0</font> en la puerta de enlace o la pasarela de la primera IP y puede haber varias.

<font color="red">DNS1</font> es la dirección IP del servidor de resolución de nombres de dominio


<font color="red"><u>Configure IP Static in Centos 7 </u></font>



