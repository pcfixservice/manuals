<style type="text/css">
#wrapper{


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
border­radius: 200px;

word-wrap: break-word;
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



<font color="red">How to add a string in a particular line of a file</font>

 sed -i  "60,94 s|^|#|" kali_server.cfg ^C
 sed -i  "37,59 s|^|#|" kali_server.cfg 

<font color="red">How to change a word for other in the entire file</font>

sed -i 's/word1/word2/' file


<p><font color="red" size="6">DELETION</font></p>

<font color="blue">sed '7,9d'  my_file.txt</font>       #deletion line interval between the 7 and 9
<font color="blue">sed '7,$d'  my_file.txt</font>       #delete lines started from line 7 to the end of the document


<p><font color="red" size="6">PRINTING</font></p>

<font color="blue">sed -n -e '/^[de]/p' texto1</font>   #print the lines that started with d or e
<font color="blue">sed -n -e '/^#/p' /etc/nagios3/apache2.conf</font>  #print the lines that started wit a   #print the lines that started wit a ##
