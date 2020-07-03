<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type="text/css">
#wrapper{
word-wrap: break-word;
font-family: sans-serif;
font-size: 95%;
font-style: italic;

text-align: justify;
       width: 1043px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 15px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
        box-shadow: 0 0 15px rgba(0,0,0,.2);
border­radius: 100px;
padding: 10px;

}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>
<u></u>
<p><font size="6"></font></p>


<FONT COLOR="RED"><u>HOW TO SUSTITUTE A STRING FOR ANOTHER</u></FONT>

<font color="blue">awk   '{gsub(/original_string/, "new_string"); print  }' file</font>



<font color="blue">ls -lh | awk '$6 == "Feb" { sum += $5 } END { print sum }'</font>

print the total number of  bytes of all files in the current folder that were modified the last time on February in any year


<font color="blue">awk -F: '$2 == ""' /etc/passwd</font>
print the outputo all users with no passwd

<font color="blue">ls -lR /proc | awk '/antix2/{ print $3}' | wc -l</font> Busca cadena de dentro de / / y cuenta resultado

<font color="blue"> sudo ls -lR / | awk '/-rwx------/ { print $1,$3,$9}'</font>
Find all the files with read, write, execute permissions, startin from / recursively, showing the file and its owner

<font color="blue">ps -fea | grep kworker | awk '{system("kill -9 "$2)}'</font>
find processes and redirect the output to awk who execute kill -9 toward field number 2
