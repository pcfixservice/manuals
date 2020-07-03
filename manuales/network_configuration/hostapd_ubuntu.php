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

sudo apt-get install dhcp3-server
sudo apt-get install hostapd

Ubuntu: sudo gedit /etc/hostapd/hostapd.conf
Mint: sudo pluma /etc/hostapd/hostapd.conf

Editamos el siguiente archivo:
interface=wlan0
driver=nl80211
ssid=my_hotspot
channel=1
hw_mode=g
auth_algs=1
wpa=3
wpa_passphrase=1234567890
wpa_key_mgmt=WPA-PSK
wpa_pairwise=TKIP CCMP
rsn_pairwise=CCMP

2.
Ubuntu: sudo gedit /etc/default/isc-dhcp-server
Mint: sudo pluma /etc/default/isc-dhcp-server

Editar la linea que dice: INTERFACES=”" por INTERFACES=”wlan0″
O' cambiar “wlan0″ por “wlan1″ o por cualquier dispositivo wireless deseado el cual se utilizara para dar wireless (recuerden
que con "iwconfig" sabran cual es su dispositivo)
3.
Ubuntu: sudo gedit /etc/dhcp/dhcpd.conf
Mint: sudo pluma /etc/dhcp/dhcpd.conf

Asegurarce de que las siguientes lineas tenga un # delante sino lo tienen ponganlo

# option definitions common to all supported networks…
#option domain-name “example.org”;
#option domain-name-servers ns1.example.org, ns2.example.org;

#default-lease-time 600;
#max-lease-time 7200;

Añadir las siguientes lineas al archivo (copiar y pegar)

subnet 10.10.0.0 netmask 255.255.255.0 {
range 10.10.0.2 10.10.0.16;
option domain-name-servers 8.8.4.4, 208.67.222.222;
option routers 10.10.0.1;
}

Guardar y cerrar archivo

4.
Ubuntu: sudo gedit /etc/network/interfaces
Mint: sudo pluma /etc/network/interfaces

asi es como luce mi archivo de intefaces
auto lo
iface lo inet loopback

auto wlan0
iface wlan0 inet static
address 10.10.0.1
netmask 255.255.255.0

Ubuntu: sudo gedit edit /etc/sysctl.conf
Mint: sudo pluma edit /etc/sysctl.conf

Asegúrese de que la siguiente línea no tiene # delante
net.ipv4.ip_forward=1
si la tiene borrarcela
Guardar archivo y cerrar(Reiniciar la pc)

Después de reiniciar el sistema conectarce a internet y en la terminal escribir:
sudo iptables -t nat -A POSTROUTING -s 10.10.0.0/16 -o ppp0 -j MASQUERADE
(Nota el "ppp0" nombre del adaptador en la línea anterior. 10.10.0.0 El es la dirección IP de su red que configuró en los
pasos 3 y 4. Su punto de acceso wifi así que compartir el internet con un máximo de 15 máquinas que se dan las direcciones IP
10.10.0.2 a 10.10.0.16)
Nota: ppp0 es mi modem 3g para conectarme a internet ustedes deben cambiarlo por el de ustedes en la linea ejemplo si
utilizan Ethernet seria :sudo iptables -t nat -A POSTROUTING -s 10.10.0.0/16 -o eth0 -j MASQUERADE

Todos los dispositivos y ordenadores portátiles ahora deberían ser capaz de navegar por Internet
Si esto funciona, tenemos que hacerlo permanente:
Ubuntu: sudo gedit edit /etc/rc.local
Mint: sudo pluma edit /etc/rc.local
agregar esta línea justo antes de "exit 0"
iptables -t nat -A POSTROUTING -s 10.10.0.0/16 -o ppp0 -j MASQUERADE
Reinicie / Conectar a Internet y disfrutar de su punto de acceso wifi.

