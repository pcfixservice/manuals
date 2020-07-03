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
<font size="6" color="red">TUNE2FS Tunnig Ext File Systems</FONT>

Querying and Changing ext File System Parameters...If you have created a partition and put an ext file
system on it, you can change some formatting parameters changing format parameters after the fact. This
is done using the tune2fs command, <font size="4"  color="red"><u>which should be used with utmost (mayor) caution and should never be applied
on a file system mounted for writing:</u></font>



root@localhost ~]#<font color="blue"> stat /sbin/tune2fs </font>   Centos 7 output
<font color="green">  File: ‘/sbin/tune2fs’
  Size: 71032     	Blocks: 144        IO Block: 4096   regular file
Device: 803h/2051d	Inode: <font color="red">67872115    Links: 2</font>
Access: (0755/-rwxr-xr-x)  Uid: (    0/    root)   Gid: (    0/    root)
Context: system_u:object_r:fsadm_exec_t:s0
Access: 2017-03-25 09:26:35.752000000 -0400
Modify: 2015-03-05 18:06:10.000000000 -0500
Change: 2016-12-20 10:58:25.353000000 -0500
 Birth: -</font>

[root@localhost ~]# <font color="blue">find / -inum 67872115</font>
<font color="green">/usr/sbin/e2label
/usr/sbin/tune2fs
[root@localhost ~]# </font>
 

antix2-VirtualBox html # <font color="blue">tune2fs -l /dev/sda1</font>
tune2fs 1.42.9 (4-Feb-2014)
Filesystem volume name:   <none><font color="green"> -L ⟨name⟩ sets a partition name (up to 16 characters). Commands like mount and
                           fsck make it possible to refer to partitions by their names rather than the
                           names of their device files.</font>
Last mounted on:          /
Filesystem UUID:          8e0aa164-883a-4bd2-9706-4ee8b5d98781
Filesystem magic number:  0xEF53
Filesystem revision #:    1 (dynamic)
Filesystem features:      has_journal ext_attr resize_inode dir_index filetype needs_recovery extent flex_bg 
                          sparse_super large_file huge_file uninit_bg dir_nlink extra_isize
Filesystem flags:         signed_directory_hash 
Default mount options:    user_xattr acl
Filesystem state:         clean
Errors behavior:          Continue <font color="green">-e-e  ⟨behaviour⟩ determines the behaviour of the system in case of errors. 

                          <font color="red">continue</font>       Go on as normal 
                          <font color="red">remount-ro</font>     Disallow further writing to the fs
                          <font color="red">panic</font>          Force a kernel panic
                          In every case, a file system consistency check will be performed during the next reboot.</font>
Filesystem OS type:       Linux
Inode count:              1222992
Block count:              4882432
Reserved block count:     244121 <font color="green">-m ⟨percent⟩ sets the percentage of data blocks reserved for root (or the user speci-
                          fied using the -u option). The default value is 5%.</font>
Free blocks:              4663035
Free inodes:              1211286
First block:              0
Block size:               4096
Fragment size:            4096
Reserved GDT blocks:      1022
Blocks per group:         32768
Fragments per group:      32768
Inodes per group:         8208
Inode blocks per group:   513
Flex block group size:    16
Filesystem created:       Fri Dec 16 21:59:34 2016
Last mount time:          Fri Mar 24 20:07:38 2017
Last write time:          Sat Mar 25 21:43:53 2017
Mount count:              50 <font color="green"> ⟨count⟩ sets the current “mount count”. You can use this to cheatENGAÑAR fsck or (by
                          setting it to a larger value than the current maximum set up <font color="red">using -C</font> ) force
                          a file system check during the next system boot.</font>

Maximum mount count:      255 <font color="green">sets the maximum number of times the fs may be mount to check the fs  -c </font>
Last checked:             Fri Dec 16 21:59:34 2016

Check interval:           0 (<none>) <font color="green">sets the maximun time between checks  tune2fs -i 12m /dev/sdb1  in this
                          case 12 months between checks tune2fs -i 0 means infinitely long</font>

Lifetime writes:          1080 MB
Reserved blocks uid:      0 (user root)
Reserved blocks gid:      0 (group root)
First inode:              11
Inode size:	          256
Required extra isize:     28
Desired extra isize:      28
Journal inode:            8
Default directory hash:   half_md4
Directory Hash Seed:      21bf775f-d5ca-427b-9cf5-c11df677c46d
Journal backup:           inode blocks
</font>


To upgrade an existing ext3 file system to an ext4 file system, you need to execute the commands

<font color="blue"># tune2fs -O extents,uninit_bg,dir_index /dev/sdb1</font>
<font color="blue"># e2fsck -fDp /dev/sdb1</font>

(stipulating that the file system in question is on /dev/sdb1 ). <font color="red">Make sure to change /etc/fstab 
such that the file system is mounted as ext4 later on</font>

Do note, though, that all existing files will still be using ext3 structures improvements like 
extents will only be used for files created later. The e4defrag defragmentation tool is supposed 
to convert older files but is not quite ready yet.

If you have the wherewithal(medios), you should not upgrade a file system “in place” but instead
backup its content, recreate the file system as ext4 , and the restore the content. The performance
of ext4 is considerably better on “native” ext4 file systems than on converted ext3 file systems—this 
can amount to a factor of 2.

If you have ext2 file systems lying around that you would like to convert into ext3 file systems: 
This is easily done by creating a journal. tune2fs will do that for you, too:

<font color="blue"># tune2fs -j /dev/sdb1</font>
gain, you will have to adjust <font color="red">/etc/fstab</font> if necessary.
