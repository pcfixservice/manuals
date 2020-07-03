<style type="text/css">
#wrapper{
	
	width: 1043px;
        height:1200000px;
	background: url("/manuales/fabric_plaid.png") repeat;
	-webkit-box-shadow: 0 0 15px rgba(0,0,0,.2);
	-moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
	box-shadow: 0 0 15px rgba(0,0,0,.2);
}
</style>


<div id="wrapper" class="clearfix">
<pre><h3>


SSH es un protocolo, un medio de comunicacion entre dos ordenadores.
Nos permite administrar un equipo de forma remota.
Cuando accedamos por SSH a otro equipo, el comando que introduzcamos en esa terminal se ejecutara en el otro equipo,
de esta forma lo administramos/controlamos.

Todo lo que se transmita por SSH, va encriptado y con una seguridad considerablemente buena.

Ahora, veremos como en solo tres pasos configuraremos PC#1 para que acceda a PC#2 sin introducir contraseña:



1. En PC #1 escribimos lo siguiente:

<font color="red">ssh-keygen -b 4096 -t rsa</font>

Esto generara una llave publica. 



2. Ponemos en PC #1 lo siguiente:

<font color="red">ssh-copy-id root@192.168.2.2</font>  

Este comando lo que hace es dar la llave publica al ordenador remoto



3.- Se comprueba que accesamos al host remoto con el siguiente comando

<font color="red">ssh root@192.168.2.2</font>

4.- Useful command to reset known_hosts, due to bad mapping ip

<font color="blue">ssh-keygen -f "/root/.ssh/known_hosts" -R 10.10.0.2</font>

<font color="blue">ssh [login]@[host] "cat [remote file]" | diff - "[local file]"</font>
<font color="blue">diff foo <(ssh myServer 'cat foo') </font>   locally
<font color="blue">diff <(ssh myServer1 'cat foo') <(ssh myServer2 'cat foo')</font> if both files to compare are in remote servers




