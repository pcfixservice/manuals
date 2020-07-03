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
<p><font size="6" color="red">File Attributes</FONT></p>


Besides the access permissions, the ext2 and ext3 file systems support further 
attributes enabling access to special file system features. The most important file
attributes are summarised in the next table:


<img src="file_attributes.png" width="600" height="300" /></a>

Most interesting are perhaps the “<font color="red">append-only</font>” and “<font color="red">immutable</font>” attributes,
which you can use to protect log files and configuration files from modification;
only root may set or reset these attributes, and once set they also apply to processes running as root .

In principle, an attacker who has gained root privileges may reset these at-
tributes. However, attackers do not necessarily consider that they might be set.

The <font color="red">A</font> attribute may also be useful; you can use it on mobile computers to ensure
that the disk isn’t always running, in order to save power. Usually, whenever
a file is read, its “atime”—the time of last access—is updated, which of course
entails(implica) an inode write operation. Certain files are very frequently looked at in
the background, such that the disk never gets to rest, and you can help here by judiciously applying the A attribute.

The c , s and u attributes sound very nice in theory, but are not (yet) sup-
ported by “normal” kernels. There are some more or less experimental en-
hancements making use of these attributes, and in part they are still pipe
dreams.

You can set or reset attributes using the <font color="red">chattr</font> command. This works rather
like chmod : A preceding “<font color="red"> +</font> ” sets one or more attributes, “<font color="red"> -</font> ” deletes one or more
attributes, and “ <font color="red">=</font> ” causes the named attributes to be the only enabled ones. The
<font color="red">-R</font> option, as in chmod , lets chattr operate on all files in any subdirectories passed
as arguments and their nested subdirectories. Symbolic links are ignored in the process.


<font color="blue"># chattr +a /var/log/messages</font>
<font color="blue"># chattr -R +j /data/important</font>
<font color="blue"># chattr -j /data/important/notso</font>

With the lsattr command, you can review the attributes set on a file. The program behaves similar to “ ls -l ”:

<font color="blue"># lsattr /var/log/messages</font>
-----a----------- /var/log/messages

Every dash stands for a possible attribute. lsattr supports various options such
as -R , -a , and -d , which generally behave like the eponymous options to ls .
