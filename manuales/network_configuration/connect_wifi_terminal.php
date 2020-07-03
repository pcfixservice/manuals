<style type="text/css">
#wrapper{


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
<u></u>
<p><font size="6"></font></p>


<font color="red">WEP WIFI NETWORK</font>

$ ifconfig wlan0 down
$ dhclient wlan0 -r
$ ifconfig wlan0 up
$ iwconfig wlan0 essid "your_essid"
$ iwconfig wlan0 mode Managed
$ dhclient wlan0


$ ifconfig wlan0 down
$ dhclient wlan0 -r
$ ifconfig wlan0 up
$ iwconfig wlan0 essid "essid"
$ iwconfig wlan0 mode Managed
$ iwconfig wlan0 key ["hexadecimal_key" or "s:decimal_key"]
$ dhclient wlan0

<font color="red">WPA/WPA2 WIFI Network:</font>

$ sudo apt-get install wpasupplicant

$ sudo nano wireless-wpa.conf

ctrl_interface=/var/run/wpa_supplicant
 
network={
  ssid="the_router_ssid"
  scan_ssid=1
  key_mgmt=WPA-PSK
  psk="the_wpa_key"
}


$ ifconfig wlan0 down
$ dhclient wlan0 -r
$ ifconfig wlan0 up
$ iwconfig wlan0 mode Managed
$ killall wpa_supplicant
$ wpa_supplicant -B -Dwext -i wlan0 -c ./wireless-wpa.conf -dd
$ dhclient wlan0

<font color="red">CONFIGURE STATIC IP</font>


# The loopback network interface
auto lo
iface lo inet loopback


auto wlan1
iface wlan1 inet static
address 192.168.0.50
netmask 255.255.255.0
network 192.168.0.0
broadcast 192.168.0.255
gateway 192.168.0.1

<font color="red">CONFIGURE SCRIPT TO EXECUTE IT AT THE STARTUP OF THE SYSTEM</font>

<font color="blue">sudo chmod +x script.sh</font>

<font color="red">rc.local</font>

La forma mas facil y sencilla es editar el fichero rc.local y añadir la instrucción sh, 
es decir, la encargada de ejecutarlo después de los comentarios, pero antes del ‘exit 0′.

<font color="blue">sudo nano /etc/rc.local</font>

quedará de la siguiente forma:

<font color="orange">#!/bin/sh -e</font>
<font color="orange">#</font>
<font color="orange"># rc.local</font>
<font color="orange">#</font>
<font color="orange"># This script is executed at the end of each multiuser runlevel.</font>
<font color="orange"># Make sure that the script will "exit 0" on success or any other</font>
<font color="orange"># value on error.</font>
<font color="orange">#</font>
<font color="orange"># In order to enable or disable this script just change the execution</font>
<font color="orange"># bits.</font>
<font color="orange">#</font>
<font color="orange"># By default this script does nothing.</font>
<font color="orange">sh /home/usuario/script.sh</font>
<font color="orange">exit 0</font>


Nótese que hemos añadido el comando sh para indicar que queremos ejecutarlo. Para desinstalarlo, 
basta con comentar la línea añadida o bien eliminarla.

Nota: hay veces que hay que poner un sleep 100 antes de llamar a la ejecución de un script porque 
rc.local se suele iniciar antes que otros servicios y así evitamos que no estén iniciados. 
También es posible que haya que eliminar el parámetro “-e” de !/bin/sh para que no pare la ejecución 
del script al encontrar posibles errores.

<font color="red">init.d</font>

La otra opción, es ejecutarlo junto con el resto de servicios del sistema, para ello movemos el 
script a la carpeta init.d, le damos permisos de ejecución y actualizamos el rc.d con configuración por defecto:

<font color="blue">sudo mv /home/usuario/script.sh /etc/init.d/</font>
<font color="blue">sudo chmod +x /etc/init.d/script.sh </font>
<font color="blue">sudo update-rc.d script.sh defaults</font>

Si lo queremos desinstalar, ejecutamos:

<font color="blue">sudo update-rc.d -f script.sh remove</font>
y después eliminamos manualmente el script de init.d si no lo vamos a utilizar más:

<font color="blue">sudo rm /etc/init.d/script.sh</font>


