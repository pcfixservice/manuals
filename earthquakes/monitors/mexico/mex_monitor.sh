#!/bin/bash
unset previuos_magnitude  current_magnitude tsys dat hour mag epicenter lat long loc deep tc
rm -f /var/www/html/earthquakes/monitors/mexico/index.html
wget http://www.ssn.unam.mx/ -O /var/www/html/earthquakes/monitors/mexico/index.html
sed -n '134p' /var/www/html/earthquakes/monitors/mexico/index.html|egrep -o [0-9]|awk '{printf $0}' >  /var/www/html/earthquakes/monitors/mexico/current_magnitude.txt
current_magnitude=`cat /var/www/html/earthquakes/monitors/mexico/current_magnitude.txt`
previuos_magnitude=`cat /var/www/html/earthquakes/monitors/mexico/previuos_magnitude.txt`
tsys=`date +'%a_%b_%e_%H:%M_%Y'`
dat=`sed -n '132p' /var/www/html/earthquakes/monitors/mexico/index.html|awk '{print  $5}'|sed -n 's/<\/p>/ /p'`
hour=`sed -n '133p' /var/www/html/earthquakes/monitors/mexico/index.html|awk '{print  $5}'|sed -n 's/<\/p>/ /p'`
mag=`sed -n '134p' /var/www/html/earthquakes/monitors/mexico/index.html |awk '{print $6}'|sed -n 's/<\/p>/ /p'`
epicenter=`sed -n '135p' /var/www/html/earthquakes/monitors/mexico/index.html |awk '{print $6}'|sed -n 's/<\/p>/ /p'`
lat=`sed -n '136p' /var/www/html/earthquakes/monitors/mexico/index.html |awk '{print $7}'|sed -n 's/<\/p>/ /p'`
long=`sed -n '137p' /var/www/html/earthquakes/monitors/mexico/index.html |awk '{print $7}'|sed -n 's/<\/p>/ /p'`
loc=`sed -n '138p' /var/www/html/earthquakes/monitors/mexico/index.html|awk '{print $3}' FS="span"|sed -ne 's/<\/p>/ /; s/>/ /p'`
deep=`sed -n '139p' /var/www/html/earthquakes/monitors/mexico/index.html |awk '{print $5}'`
utc=`date --utc +'%e%b_%H:%M_%Y'`
previuos_deep=`cat /var/www/html/earthquakes/monitors/mexico/previuos_deep.txt`


if   [[ $current_magnitude -eq $previuos_magnitude && $previuos_deep -eq $deep ]];then
	  echo -e  "last $previuos_magnitude  $deep "


elif [[  $current_magnitude -le  37 ]];then
        echo -e "there was a tiny earthquake of $current_magnitude"
	mplayer /var/www/html/earthquakes/monitors/mexico/alarms/soft_alarm.mp3 
        echo $current_magnitude  > /var/www/html/earthquakes/monitors/mexico/previuos_magnitude.txt
        echo $deep > /var/www/html/earthquakes/monitors/mexico/previuos_deep.txt 
sed -i "35a\<TABLE BORDER="2" WIDTH="100%" CELLPADDING="2" CELLSPACING="3">\n<td style="width:15px">$tsys</TD><td style="width:70px">$hour</TD><td style="width:70px">$utc</TD><td style="width:40px"><font color="green"><strong>$mag</strong></font></TD><td style="width:50px">$lat</TD><td style="width:50px">$long</TD><td style="width:40px">$deep</TD><td style="width:470px">$loc -- $epicenter</TD>\n</TABLE>"  /var/www/html/earthquakes/hist_mexico.html
echo -e "Eartquake:$mag Location:$loc Deep:$deep UTC:$utc" | mail -s "MX MAG:$mag EPIC:$loc DEEP:$deep UTC:$utc" pcfixservice1@gmail.com


elif [[  $current_magnitude -ge  38 && $current_magnitude -le 55 ]];then
        echo -e "there was a tiny earthquake of $current_magnitude"
	mplayer /var/www/html/earthquakes/monitors/mexico/alarms/soft_alarm.mp3 
        echo $current_magnitude  > /var/www/html/earthquakes/monitors/mexico/previuos_magnitude.txt
        echo $deep > /var/www/html/earthquakes/monitors/mexico/previuos_deep.txt 
sed -i "35a\<TABLE BORDER="2" WIDTH="100%" CELLPADDING="2" CELLSPACING="3">\n<td style="width:15px">$tsys</TD><td style="width:70px">$hour</TD><td style="width:70px">$utc</TD><td style="width:40px"><font color="orange"><strong>$mag</strong></font></TD><td style="width:50px">$lat</TD><td style="width:50px">$long</TD><td style="width:40px">$deep</TD><td style="width:470px">$loc -- $epicenter</TD>\n</TABLE>"  /var/www/html/earthquakes/hist_mexico.html
echo -e "Eartquake:$mag Location:$loc Deep:$deep UTC:$utc" | mail -s "MX MAG:$mag EPIC:$loc DEEP:$deep UTC:$utc" pcfixservice1@gmail.com

elif  [[ $current_magnitude -ge  56 ]];then
        echo -e "An Earthquake of  $current_magnitude occurred"
	mplayer /var/www/html/earthquakes/monitors/mexico/alarms/main_alarm.mp3 
	echo $current_magnitude > /var/www/html/earthquakes/monitors/mexico/previuos_magnitude.txt 
	echo $deep > /var/www/html/earthquakes/monitors/mexico/previuos_deep.txt
sed -i "35a\<TABLE BORDER="2" WIDTH="100%" CELLPADDING="2" CELLSPACING="3">\n<td style="width:15px">$tsys</TD><td style="width:70px">$hour</TD><td style="width:70px">$utc</TD><td style="width:40px"><font color="red"><strong>$mag</strong></font></TD><td style="width:50px">$lat</TD><td style="width:50px">$long</TD><td style="width:40px">$deep</TD><td style="width:470px">$loc -- $epicenter</TD>\n</TABLE>" /var/www/html/earthquakes/hist_mexico.html
echo -e "Eartquake:$mag Location:$loc Deep:$deep UTC:$utc" | mail -s "MX MAG:$mag EPIC:$loc DEEP:$deep UTC:$utc" pcfixservice1@gmail.com
fi



