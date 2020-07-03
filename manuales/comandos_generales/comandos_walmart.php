#######################################################################################################################

                                            COMANDOS UNIX

#######################################################################################################################

Para liberar recursos de memoria física, cache y swap hay que aplicar el siguiente comando siempre y cuando la aplicación ya se encuentre abajo, funciona con cualquier Linux.

 

   lsuser -a unsuccessful_login_count account_locked mproing

   sync; echo 3 > /proc/sys/vm/drop_caches

   echo "root:x$=5=Q5N7"|chpasswd       echo "mdesnbc:walmart" | chpasswd                                                    comando para sincronizar password   

   ls -ltr EFT* | awk '$5==0  {print}' >  $cre/$wk/$fr/creb049b0903_EFT0     lista todos los archivos que estan en cero y los guarda en un archivo de texto

   lpstat -plpsb4476 | awk '{system("enq -Plpsb4476 -x "$2)}'                                limpia cola de impresion

   useradd -m -c "usuario administrador Websphere" wsadmin                       agregar usuario y su descripcion

   find / -name "javacore*" -exec rm {} \;                                                    encuentra archivos y borra                                      

   ps –fea | grep java|awk  '{system(“kill -9 “$2)}'                                        encuentra procesos y los mata

   iotop  procesos de disco,    vmstat 1 20,   ls -lh  human readable

   while true; do onstat -u | grep spt | awk '{system("banner "$3 "; onstat -g ses "$3" | tail -10")}' ;sleep 10; clear ;done

   while true; do netstat -nta | grep ESTABLISHED |sleep 5; clear ;done   linux example

   onstat -k

   oncheck -cDl  "nombre de la tabla sin comillas"

   tail -f /usr/informix/online.tpd.log   log de informix

   onstat -g ses 697    al numero de la sesion en este ejemplo al 697 te dice que esta haciendo o  Last parsed  SQL statement :   SET ISOLATION TO COMMITTED READ 

   find /var/spool/mqueue -type f -mtime -30 | awk '{system("rm "$1)}'        borra archivos de directorio especificado  find /var/spool/mqueue en este directorio borrar los mas viejos

   shutdown -r     comando que se usa solo en HP-UX

   bdf  solo en HP-UX

du -ks * | sort -n       

watch -n1 df -i   

$ for i in /*; do echo $i; find $i |wc -l; done

ls | wc -l

rm *.trc   y   cp *.trc /tmp/CC/TRC  y  ls -ltr /tmp/CC/TRC

 

onstat -k|grep X|wc  -l

nstat            status bda

oninit-v         inicia bda

onmode -ky    baja bda

onstat -u        actividad sesiones

onstat -g ses    lista sesiones bda

onstat -g ses|grep -v mpro|grep -v informix|awk '{print $0;system("onmode -z "$1)}'        Comado para matar sesiones de usuario 

onstat -g ses |grep -v informix|grep -v mpro|wc -l 

while true; do onstat -u | grep spt | awk '{system("banner "$3 "; onstat -g ses "$3" | tail -10")}' ;sleep 10; clear ;done

 

 

while true; do df -h  ; netstat -nta | grep -i syn |wc -l | awk '{print "\n\033[1;33mSYN_RECV \033[0m     State Connections to port 25000: \033[1;31m" $0 "\033[0m" }';

netstat -nta | grep 25000 | grep TIME_WAIT  |wc -l | awk '{print "\033[1;36mTIME_WAIT \033[0m    State Connections to port 25000: \033[1;31m" $0 "\033[0m" }'; 

 netstat -nta | grep 25000 |wc -l | awk '{print "\033[1;35mESTABLISHED \033[0m  State Connections to port 25000: \033[1;31m" $0 "\033[0m\n" }' ;free -g ; sleep 20 ; clear ;done

