#!/bin/bash
#unset $previuos_mag $current_mag $tsyst $chile_time $utctime $latitude $longitude $abism $magnitude $epic
#unset previuos_mag current_mag tsyst chile_time utctime latitude longitude abism magnitude epic
wget http://www.sismologia.cl/links/ultimos_sismos.html -O /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html
sed -n '33 s/<\/td>/ /gp' /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html |awk '{print $7}' FS='<td>'|sed 's/Ml//'|cut -b 1,3 > /var/www/html/earthquakes/monitors/chile/current_mag.txt
previuos_mag=`cat /var/www/html/earthquakes/monitors/chile/previuos_mag.txt`
current_mag=`cat /var/www/html/earthquakes/monitors/chile/current_mag.txt`
tsyst=`date +'%a_%b_%e_%H:%M'`
chile_time=`sed -n '33 s/<\/td>/ /gp' /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html |awk '{print $3}' FS='<td>'`
utctime=`date --utc +'%e%b_%H:%M_%Y'`
latitude=`sed -n '33 s/<\/td>/ /gp' /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html |awk '{print $4}' FS='<td>'`
longitude=`sed -n '33 s/<\/td>/ /gp' /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html |awk '{print $5}' FS='<td>'`
abism=`sed -n '33 s/<\/td>/ /gp' /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html |awk '{print $6}' FS='<td>'`
magnitud=`sed -n '33 s/<\/td>/ /gp' /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html |awk '{print $7}' FS='<td>'|sed 's/Ml//'` 
epic=`sed -n '33 s/<\/td>/ /gp' /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html |awk '{print $9}' FS='<td>'|sed 's/<\/tr>//'`
current_deep=`sed -n '33 s/<\/td>/ /gp' /var/www/html/earthquakes/monitors/chile/ultimos_sismos.html |awk '{print $6}' FS='<td>'|sed  's/[.]//'`
prev_deep=`cat /var/www/html/earthquakes/monitors/chile/previous_deep.txt`

if   [[ $current_mag -eq $previuos_mag && $current_deep -eq  $prev_deep ]];then
          echo -e  "last $previuos_mag  $abism "


elif [[  $current_mag -le  37 ]];then
        mplayer /var/www/html/earthquakes/monitors/chile/alarms/soft_alarm.mp3
        echo $current_mag  > /var/www/html/earthquakes/monitors/chile/previuos_mag.txt
	echo $current_deep > /var/www/html/earthquakes/monitors/chile/previous_deep.txt
sed -i "35a\<TABLE BORDER="2" WIDTH="100%" CELLPADDING="2" CELLSPACING="3">\n<td style="width:15px">$tsyst</TD><td style="width:70px">$chile_time</TD><td style="width:70px">$utctime</TD><td style="width:40px"><font color="green"><strong>$magnitud</strong></font></TD><td style="width:50px">$latitude</TD><td style="width:50px">$longitude</TD><td style="width:40px">$abism km</TD><td style="width:470px">$epic</TD>\n</TABLE>"  /var/www/html/earthquakes/hist_chile.html
echo -e "Eartquake:$magnitud Location:$epic Deep:$abism UTC:$utctime" | mail -s "CH MAG:$magnitud  EPIC:$epic DEEP:$abism UTC:$utctime" pcfixservice1@gmail.com



elif [[  $current_mag -ge  38 && $current_mag -le 55 ]];then
        mplayer /var/www/html/earthquakes/monitors/chile/alarms/soft_alarm.mp3
        echo $current_mag > /var/www/html/earthquakes/monitors/chile/previuos_mag.txt
	echo $current_deep > /var/www/html/earthquakes/monitors/chile/previous_deep.txt
sed -i "35a\<TABLE BORDER="2" WIDTH="100%" CELLPADDING="2" CELLSPACING="3">\n<td style="width:15px">$tsyst</TD><td style="width:70px">$chile_time</TD><td style="width:70px">$utctime</TD><td style="width:40px"><font color="orange"><strong>$magnitud</strong></font></TD><td style="width:50px">$latitude</TD><td style="width:50px">$longitude</TD><td style="width:40px">$abism km</TD><td style="width:470px">$epic</TD>\n</TABLE>"  /var/www/html/earthquakes/hist_chile.html
echo -e "Eartquake:$magnitud Location:$epic Deep:$abism UTC:$utctime" | mail -s "CH MAG:$magnitud  EPIC:$epic DEEP:$abism UTC:$utctime" pcfixservice1@gmail.com


elif  [[ $current_mag -ge  56 ]];then
        mplayer /var/www/html/earthquakes/monitors/chile/alarms/main_alarm.mp3
        echo $current_mag > /var/www/html/earthquakes/monitors/chile/previuos_mag.txt
	echo $current_deep > /var/www/html/earthquakes/monitors/chile/previous_deep.txt
sed -i "35a\<TABLE BORDER="2" WIDTH="100%" CELLPADDING="2" CELLSPACING="3">\n<td style="width:15px">$tsyst</TD><td style="width:70px">$chile_time</TD><td style="width:70px">$utctime</TD><td style="width:40px"><font color="red"><strong>$magnitud</strong></font></TD><td style="width:50px">$latitude</TD><td style="width:50px">$longitude</TD><td style="width:40px">$abism km</TD><td style="width:470px">$epic</TD>\n</TABLE>"  /var/www/html/earthquakes/hist_chile.html
echo -e "Eartquake:$magnitud Location:$epic Deep:$abism UTC:$utctime" | mail -s "CH MAG:$magnitud  EPIC:$epic DEEP:$abism UTC:$utctime" pcfixservice1@gmail.com


fi

