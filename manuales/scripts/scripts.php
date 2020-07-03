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

<FONT COLOR="RED">HOW TO ADD DATE TO NEW FILES AND DIRECTORIES</FONT>

<font color="green">#!/bin/sh

dt=`date +%y%m%d`
touch ./archivo-$dt</font>


#> tar xvzf /usr/archivos/* /respaldos/respaldo20070624_1400.tar.gz

El administrador directamente está escribiendo el nombre del archivo donde se empaquetan y comprimen los archivos respaldados
que es "respaldo20070624_1400", y su sintaxis para distinguir un respaldo del otro es la fecha y la hora AÑOMESDIA_HHMM. Pero
¿que pasa si un día no puede estar presente para realizar el respaldo correpsondiente?. Ciertamente con cron (ver Manual
básico de Cron) es posible programar la tarea, pero el problema no es ese, sino como indicar autmáticamente otra fecha para
el nombre del archivo, el siguiente script de shell resuelve el problema:

# respaldo de /usr/archivos
# se forma el nombre del archivo
DIA=`date +%d`
MES=`date +%m`
AÑO=`date +%Y`
HORA=`date +%H`
ARCHIVO=respaldo$AÑO$MES$DIA_$HORA00.tar.gz
# copia del archivo
tar xvzf /usr/archivos/* /respaldos/$ARCHIVO

Si este script lo nombramos como "respaldo.sh" ubicado dentro de /root con sus permisos adecuados de ejecucción, entonces la
línea cron correspondiente sería la siguiente:

* 14,21 * * * root /root/respaldo.sh

Con lo anterior deberá bastar para que el respaldo se ejecute a las horas indicadas y automáticamente se forme el nombre del
archivo con la ayuda de date y las literales correspondientes.

<font color="green">#########################################################################################################</font>
BACKUP, DATE, MYSQL, LOGGER
<font color="green">#########################################################################################################</font>
#!/bin/bash
HDBS="db1 db2 db3 db4"
BAK="/sout/email"
[ ! -d $BAK ] && mkdir -p $BAK || :
/bin/rm $BAK/*
NOW=$(date +"%d-%m-%Y")
ATTCH="/sout/backup.$NOW.tgz"
[ -f $ATTCH ] && /bin/rm $ATTCH  || :
MTO="you@yourdomain.com"
for db in $HDBS
do
 FILE="$BAK/$db.$NOW-$(date +"%T").gz"
 mysqldump -u admin -p'password' $db | gzip -9 > $FILE
done
tar -jcvf $ATTCH $BAK
 mutt -s "DB $NOW" -a $ATTCH $MTO <<EOF
DBS $(date)
EOF
[ "$?" != "0" ] &&  logger "$0 - MySQL Backup failed" 


