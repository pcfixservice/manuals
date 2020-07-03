<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type="text/css">
#wrapper{
word-wrap: break-word;
font-family: sans-serif;
font-size: 98%;
font-style: italic;

text-align: auto;
       width: 1060px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 1px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 0px rgba(0,0,0,.2);
        box-shadow: 0 0 0px rgba(0,0,0,.2);
padding: 5px;

}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>
<u></u>
<font size="6"></font>
<font size="6" color="red">Scripts for Directory Creation</FONT>


Script to validate if a certain directory exists or not

#!/bin/bash

for HOMES_DIR  in $(cat home_dir.txt); do
  # Agrego el usuario
  ls   $HOMES_DIR
done


________________________________________________________________________________________________-

Aqui les dejo un pequeno truco para crear un directorio con multiples subdirectorios con una sola linea de comando mkdir.

<font color="blue">mkdir -p miProyecto/{src,doc,herramientas,db}</font>

Este comando crea un directorio de nivel superior llamado miProyecto, conjuntamente con 
los subdirectorios src,doc,herramientas,db.

<font color="red">-p</font> : aqui especificamos a mkdir que cree cualquier directorio superior que no exista. 
Esto se asegura que el directorio miProyecto se cree antes de los sudbirectorios

la lista dentro de <font color="red">{}</font>: esta lista de expansion basicamente establece los items que se deben crear 
bajo la ruta predecesora, quedando, mi Proyecto/scr, miProyecto/doc, etc
 

Aqui otro ejemplo para crear una estructura mas commpleja:

<font color="blue">mkdir -p miProyecto/{src,doc/{api,sistema},herramientas,db}</font>

Esta es la estructura que genera:
miProyecto
src
     doc
        api
        sistema
herramientas
db
_____________________________________________________________________________________________________________________________
<img src="mkdir.png" width="800" height="00" /></a>






