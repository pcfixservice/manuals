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
<font size="6" color="red">Swap Space</FONT>


In addition to the file system partitions, you should always create a swap partition. Linux can use 
this to store part of the content of system RAM; the effective amount of working memory available to
you is thus greater than the amount of RAM in your computer.
Before you can use a swap partition you must “format” it using the mkswap command:

<font color="blue"># mkswap /dev/sda4</font>

This writes some administrative data to the partition. When the system is started, it is necessary to 
“activate” a swap partition. This corresponds to mounting a partition with a file system and is done 
using the swapon command:

<font color="blue"># swapon /dev/sda4</font>

The partition should subsequently be mentioned in the /proc/swaps file:

antix2@antix2-VirtualBox ~ $ <font color="blue">cat /proc/swaps </font>
<font color="green">Filename				Type		Size	Used	Priority
/dev/sda11                              partition	975868	217308	-1
antix2@antix2-VirtualBox ~ $ </font>

After use the swap partition can be deactivated using swapoff :

<font color="blue"># swapoff /dev/sda4</font>

The system usually takes care of activating and deactivating swap partitions, as long as you put 
them into the /etc/fstab file. You can operate up to 32 swap partitions (up to and including kernel
version 2.4.10: 8) in parallel; the maximum size depends on your computer’s architecture and isn’t 
documented anywhere exactly, but “stupendously gigantic” is a reasonable approximation. It used to 
be just a little less than 2 GiB for most Linux platforms.

If you have several disks, you should spread your swap space across all of them, which should 
increase speed noticeably.  Linux can prioritise swap space. This is worth doing if the disks containing
your swap space have different speeds, because Linux will prefer the faster disks. Read up on this 
in swapon (8). 

Besides partitions, you can also use files as swap space. Since Linux 2.6 this isn’t even any slower! 
This allows you to temporarily provide space for rare humongous workloads. You must initially create 
a swap file as a file full of zeros, for instance by using

<font color="blue"># dd if=/dev/zero of=swapfile bs=1M count=256</font>

before preparing it using the mkswap command and activating it with swapon. <font color="red">(Desist from tricks using dd or 
cp ; a swap file may not contain “holes”.)</font>  You can find information about the currently active swap areas in 
the /proc/ swaps file.

