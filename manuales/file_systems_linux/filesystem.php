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

<font color="red">Error  checking a Vfat file System with fscki</font>

[root@centos7i386 ~]# fsck -V /dev/sdb13
fsck from util-linux 2.23.2
[/sbin/fsck.vfat (1) -- /media/sdb13] fsck.vfat /dev/sdb13 
fsck.fat 3.0.20 (12 Jun 2013)
0x41: Dirty bit is set. Fs was not properly unmounted and some data may be corrupt.
1) Remove dirty bit
2) No action
? 


SOLUTION

<font color="blue">fsck.vfat -v -a -w /dev/sda1</font>

The above command automatically write changes to disk. It would be great if anyone can tell me whether
 this is a bug in fsck or it is due to something else.


