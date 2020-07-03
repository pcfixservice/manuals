<pre><h3>


En la terminal escribimos lo siguiente:

1.-  <font color="red"># apt-get install tightvncserver</font>

Esto instala el servidor vnc. 


2.- <font color="red"># tightvncserver :1 -geometry 800x600 -depth 24</font>

Con el comando anterior estaríamos creando un nuevo servidor gráfico en un display virtual
cuyo número de display será el :1, su tamaño será de 800 x 600 píxels 
y una profundidad de color de 24 bits/pixel (true color).


3.- <font color="red">## tightvncserver -kill :1</font>

Con esta instruccion matamos el servidor vnc en ejecucion



4.-<font color="red"># apt-get install xtightvncviewer</font>

Instalmos en el lado cliente el programa para conectarnos al servidor vnc



5.- <font color="red"># xtightvncviewer</font>

Ejecutamos el programa escribiendo la direccion ip del servidor vnc asi como su correspondiente salida de video
ejemplo  192.168.2.3:1


5.- <font color="red"># apt-get install tightvnc-java</font>

Podemos utilizar el navegador Web para vizualizar la sesion remota, si contamos con la maquina virtual de java


Ejemplo, supongamos que hemos creado el display nº 1. Si vamos a http://ip_del_servidor:5801,
podremos acceder. Primero deberemos introducir la contraseña.






