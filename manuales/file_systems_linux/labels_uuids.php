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
<font size="6" color="red">Labels and UUIDs</FONT>


We showed you how to mount file systems using device names such as /dev/hda1. This has the 
disadvantage, though, that the correspondence between device files and actual devices is not 
necessarily fixed: As soon as you remove or repartition a disk or add another, the correspondence 
may change and you will have to adjust the configuration in /etc/fstab . With some device types, 
such as USB media, you cannot by design rely on anything. This is where labels and UUIDs come in.

A label is a piece of arbitrary text of up to 16 characters that is placed in a file system’s super 
block. If you have forgotten to assign a label when creating the file system, you can add one (or 
modify an existing one) at any time using e2label. The command

<font size="4" color="red"><u>Changing labels on ext. filesystems</u></FONT>


<font color="blue"># e2label /dev/sda3 home</FONT>

for example) lets you refer to /dev/sda3 as LABEL=home , e. g., using

<font color="blue"># mount -t ext2 LABEL=home /home</FONT>

The system will then search all available partitions for a file system containing this label.

You can do the same using the -L option of tune2fs :

<font color="blue"># tune2fs -L home /dev/sda3</FONT> 


<font size="4" color="red"><u>Changing labels on xfs filesystems</u></FONT>

<font color="blue">Unmount the device if it is mounted (sudo umount /dev/sdb1)</font>

Label it with 

<font color="blue">xfs_admin -L media /dev/sdb1</font>


<font size="4" color="red"><u>Changing labels on btrfs filesystems</u></FONT>

With Btrfs, for example, you can either specify one when the file system is generated (option “ -L ”) or use

<font color="blue"># btrfs filesystem label /dev/sdb1 MYLABE</FONT>



<font size="6" color="red">UUIDs</FONT>

If you have very many disks or computers and labels do not provide the required degree of uniqueness, 
you can fall back to a “universally unique identifier” or UUID. An UUID typically looks like 

<font color="blue">$ uuidgen</FONT>
bea6383f-22a7-453f-8ef5-a5b895c8ccb0

and is generated automatically and randomly when a file system is created. This ensures that no two file 
systems share the same UUID. Other than that, UUIDs are used much like labels, except that you now need 
to use UUID=bea6383f-22a7-453f-8ef5-a5b895c8ccb0 (Gulp.) You can also set UUIDs by means of tune2fs , 
or create completely new ones using

<font color="blue"># tune2fs -U random /dev/hda3</FONT>

This should seldom prove necessary, though, for example if you replace a disk or have cloned a file system.

Incidentally, you can determine a file system’s UUID using

<font color="blue"># tune2fs -l /dev/hda2 | grep UUID</font>
Filesystem UUID:
4886d1a2-a40d-4b0e-ae3c-731dd4692a77

With other file systems (XFS, Btrfs) you can query a file system’s UUID ( blkid is your friend) but not 
necessarily change it.  The command gives you an overview of all your block devices and their UUIDs.

<font color="blue"># lsblk -o +UUID</font>

You can also access swap partitions using labels or UUIDs:

<font color="blue"># swapon -L swap1</font>

<font color="blue"># swapon -U 88e5f06d-66d9-4747-bb32-e159c4b3b247</font>

You can find the UUID of a swap partition using blkid or lsblk , or check the /dev/disk/by- uuid directory. 
If your swap partition does not have a UUID nor a label, you can use mkswap to assign one.

You can also use labels and UUIDs in the /etc/fstab file (one might indeed claim that this is the whole point of 
the exercise). Simply put 

<font color="green">LABEL=home</font>

or

<font color="green">UUID=bea6383f-22a7-453f-8ef5-a5b895c8ccb0</font>

into the first field instead of the device name. Of course this also works for swap space.
