<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type="text/css">
#wrapper{
word-wrap: break-word;
font-family: 'Bowlby One SC', cursive; 
font-size: 98%;


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
<font size="6" color="red">find command</FONT>

# find /home -name tecmint.txt                                # FIND Files Using Name in Current Directory
# find /home -iname tecmint.txt                               # FIND Files Under Home Directory
# find / -type d -name Tecmint                                # FIND Files Using Name and Ignoring Case
# find / -type d -name Tecmint                                # FIND Directories Using Name
# find . -type f -name tecmint.php                            # FIND PHP Files Using Name
# find . -type f -name "*.php"                                # FIND all PHP Files in Directory
# find . -type f -perm 0777 -print                            # FIND Files With 777 Permissions
# find / -type f ! -perm 777				      # FIND Files Without 777 Permissions
# find / -perm 2644					      # FIND SGID Files with 644 Permissions
# find / -perm 1551					      # FIND Sticky Bit Files with 551 Permissions
# find / -perm /u=s					      # FIND SUID Files
# find / -perm /g=s					      # FIND SGID Files
# find / -perm /u=r					      # FIND Read Only Files
# find / -type f -perm 0777 -print -exec chmod 644 {} \;      # FIND Files with 777 Permissions and Chmod to 644
# find / -type d -perm 777 -print -exec chmod 755 {} \;       # FIND Directories with 777 Permissions and Chmod to 755
# find . -type f -name "tecmint.txt" -exec rm -f {} \;        # FIND and remove single File
# find . -type f -name "*.txt" -exec rm -f {} \;              # FIND and remove Multiple File
# find /tmp -type f -empty				      # FIND all Empty Files
# find /tmp -type d -empty				      # FIND all Empty Directories
# find /tmp -type f -name ".*" 				      # FIND all Hidden Files
# find / -user root -name tecmint.txt			      # FIND Single File Based on User
# find /home -group developer				      # FIND all Files Based on Group
# find /home -user tecmint -iname "*.txt"		      # FIND Particular Files of User
# find / -mtime 50					      # FIND Last 50 Days Modified Files
# find / -atime 50					      # FIND Last 50 Days Accessed Files
# find / -mtime +50 –mtime -100				      # FIND all the files which are modified more than 50 days back and less than 100 days
# find / -cmin -60					      # FIND all the files which are changed in last 1 hour 
# find / -mmin -60					      # FIND all the files which are modified in last 1 hour
# find / -amin -60					      # FIND all the files which are accessed in last 1 hour
# find / -size 50M					      # FIND 50MB Files
# find / -size +50M -size -100M				      # FIND all the files which are greater than 50MB and less than 100MB
# find / -type f -size +100M -exec rm -f {} \;		      # FIND and Delete 100MB Files
# find / -type f -name *.mp3 -size +10M -exec rm {} \;        # FIND Specific Files and Delete
	




