#!/usr/bin/expect -f
 
#
# ATENCION, necesario instalar el paquete expect
# apt-get install expect
#
# Este es un ejemplo de como subir un archivo a un servidor ftp
#
# Hay que guardar este archivo con extension .exp
<pre><h3>


# Para ejecutarlo, hay que pasarle como parametro el nombre del archivo a subir
#
# $ expect esteArchivo.exp fichero-a-subir-al-servidor-ftp
#
 
# Podemos eliminar los posibles mensajes de respuesta de los comandos
# Se deberia descomentar para produccion
# log_user 0
 
# Comprobamos que reciba por lo menos un parametro que tiene que ser el nombre
# del archivo a subir al servidor ftp
if $argc==0 {
    send_user "Tienes que indicar un archivo a subirn"
    exit
}
 
# Definimos las variables
set ftp_host "192.168.0.1"
set dir_host "/home/user/fileput/"
set host_user "usuario"
set host_password "contrasena"
 
# El nombre del archivo a subir al servidor ftp lo cogemos del parametro recibido
set new_file [lindex $argv 0]
 
# Aumentamos el timeout a 30 segundos. Por defecto esta en 10.
set timeout 30
 
spawn ftp $ftp_host
expect "*Name*"
send -- "$host_userr"
expect "Password:*"
send -- "$host_passwordr"
expect "ftp>"
send -- "put $new_file $dir_host$new_filer"
expect "ftp>"
send -- "quitr"
send "bye"
exit 0