1.- Instalacion de ubuntu 10.04

2.- Instalacion de openssh-server.(Configurar acceso root via terminal)
3.- apt-get install nmap
4.- Copiar archivos deb
5.- apt-get install thunar
6.- Instalar userful 4.0
7.- Agregar nuevos Usuarios
8.- Quitar mensajes de licencia

a.- Renombrar userful-cs a userful-cs-backup, 
b.- Crear script que copie userful-cs-backup a userful-cs al reiniciar el sistema, colocarlo en /etc/int.d/
c.- Crear enlace simbolico ln -s /etc/init.d/sismu-apagar.sh  /etc/rc0.d/K99sismu-apagar.sh para ejecutarlo al apagar
d.- Crear enlace simbolico ln -s /etc/init.d/sismu-apagar.sh  /etc/rc6.d/K99sismu-apagar.sh para ejecutarlo al reiniciar

crontab -e        */13  * * * *    /etc/nagios3/sismu-inicio.sh  >/dev/null 2>&1

/etc/nagios3/sismu-inicio.sh

#!/bin/bash

sudo killall userful-cs
rm /usr/sbin/userful-cs



/etc/init.d/sismu-apagar.sh

#!/bin/sh
#
## Comentarios nuestros
## Mas comentarios
#            cd /etc/init.d/
#            chmod u+x /etc/init.d/script.sh
#            insserv script.sh
### BEGIN INIT INFO
# Provides:          sismu-apaga
# Required-Start:
# Required-Stop:
# Default-Start:
# Default-Stop:      0 6
# Short-Description: Script parada
# Description:       Script que se ejecuta al parar o reiniciar el equipo
### END INIT INFO

cp /usr/sbin/userful-cs.backup /usr/sbin/userful-cs


agregar este archivo  /etc/init.d/sismu-inicio.sh con el siguiente contenido

#!/bin/sh
#
## Comentarios nuestros
## Mas comentarios
#            cd /etc/init.d/
#            chmod u+x /etc/init.d/script.sh
#            insserv script.sh
### BEGIN INIT INFO
# Provides:          sismu-inicia
# Required-Start:
# Required-Stop:
# Default-Start:    2 3 4 5 
# Default-Stop:      
# Short-Description: Script parada
# Description:       Script que se ejecuta al parar o reiniciar el equipo
### END INIT INFO

cp /usr/sbin/userful-cs.backup /usr/sbin/userful-cs



9.- Quitar aplicaciones al inicio por usuario
9.- Desisntalar evolution y ubuntu one
10.-Evitar que las unidades aparezcan en el escritorio, se realiza script para que los quite al iniciar el sistema 


Alt+ F2, luego digita en la caja de texto gconf-editor, en la ventana nueva abre el nodo Apps luego Nautilus, luego Preferences, te quedara Apps > Nautilus > Preferences, luego busca la opcion show_desktop y quitas el check marcado
con esto, se deshabilita el boton derecho con las funciones asociadas


/etc/init.d/quitar-iconos.sh              update-rc.d quitar-iconos.sh defaults

#!/bin/sh
#
### BEGIN INIT INFO
# Provides:          quita iconos de unidades de disco en el escritorio
# Required-Start:
# Required-Stop:
# Default-Start:    2 3 4 5 
# Default-Stop
# Short-Description: quita iconos de unidades de disco en el escritorio
# Description:       Script que se ejecuta al parar o reiniciar el equipo
### END INIT INFO

rm /home/teacher/Escritorio/sda1_mount.userful.storage.desktop
rm /home/teacher/Escritorio/sda5_mount.userful.storage.desktop
rm /home/teacher/Escritorio/sda4_mount.userful.storage.desktop
rm /home/teacher/Escritorio/sda6_mount.userful.storage.desktop

rm /home/estacion1/Escritorio/sda1_mount.userful.storage.desktop  
rm /home/estacion1/Escritorio/sda5_mount.userful.storage.desktop
rm /home/estacion1/Escritorio/sda4_mount.userful.storage.desktop  
rm /home/estacion1/Escritorio/sda6_mount.userful.storage.desktop

rm /home/estacion2/Escritorio/sda1_mount.userful.storage.desktop  
rm /home/estacion2/Escritorio/sda5_mount.userful.storage.desktop
rm /home/estacion2/Escritorio/sda4_mount.userful.storage.desktop  
rm /home/estacion2/Escritorio/sda6_mount.userful.storage.desktop

rm /home/estacion3/Escritorio/sda1_mount.userful.storage.desktop  
rm /home/estacion3/Escritorio/sda5_mount.userful.storage.desktop
rm /home/estacion3/Escritorio/sda4_mount.userful.storage.desktop  
rm /home/estacion3/Escritorio/sda6_mount.userful.storage.desktop


11.- Instalar bisigi-themes
12.- Copiar perfil de usuarios a la nueva instalacion
13.- Instalar wine y playonlinux
14.- Instalar office 2010 en todos  los usuarios
15.-Quitar las aplicaciones al inicio de todos los usuarios
16.- Instalar Stellarium, tuxpaint, totem, vlc, kolourpaint4, tuxmath, 
17.- Configurar usuarios perfiles. botones, tipografias etc.
18.- Instalar los extra restrictivos   sudo apt-get install ubuntu-restricted-extras
19.- Comprobar que el idioma español este completamente instalado
20.- Cambiar de lugar los botones de minimizar, cerrar

gconf-editor apps -- metacity -- general   cambiar de :minimize,maximize,close a minimize,maximize,close:

21.- Instalar chromium browser


