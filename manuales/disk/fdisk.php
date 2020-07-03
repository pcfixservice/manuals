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
<font size="6" color="red">FDISK COMMAND</FONT>

fdisk is an interactive program for manipulating disk partition tables. It can also create “foreign” 
partition types such as DOS partitions. Drives are addressed using the corresponding device files
(such as /dev/sda for the first disk).

fdisk confines itself to entering a partition into the partition table and setting the correct partition 
type. If you create a DOS or NTFS partition using fdisk, this means just that the partition exists in the 
partition table, not that you can boot DOS or Windows NT now and write files to that partition. Before doing
that, you must create a file system, i. e., write the appropriate management data structures to the disk. 
Using Linux-based tools you can do this for many but not all non-Linux file systems.

fdisk lets you partition hard disks according to the<font color="red">MBR</font> or <font color="red">GPT</font> schemes. It recognises an existing partition 
table and adjusts itself accordingly. <font color="red">On an empty (unpartitioned) disk fdisk will by default create an MBR partition
table</font>, but you can change this afterwards (we’ll show you how in a little while).


You can change the partition type using the<font color="red">t</font> command. You must select the desired partition and can then 
enter the code (as a hexadecimal number).<font color="red">L</font> displays the whole list.

You can delete a partition you no longer want by means of the <font color="red">d</font> command. When you’re done, you can write the 
partition table to disk and quit the program using<font color="red"> w</font> . With <font color="red">q</font> , you can quit the program without rewriting 
the partition table.

After storing the partition table, fdisk tries to get the Linux kernel to reread the new partition table; 
this works well with new or unused disks, but fails if a partition on the disk is currently in use 
(as a mounted file system, active swap space, ...). This lets you repartition the disk with the / file 
system only with a system reboot. One of the rare occasions when a Linux system needs to be rebooted ...

Like all Linux commands, fdisk supports a number of command-line options. Options
The most important of those include:

In order to view the size of one disk unpartitioned use the following command: <font color="red"># lsblk </font>
