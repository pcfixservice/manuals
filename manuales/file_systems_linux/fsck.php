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
<font size="6" color="red">FSCK Command</FONT>

When the computer has been switched off inadvertently or crashed, you have to consider that the file 
system might be in an inconsistent state (even though this inconsistent state happens very rarely in 
real life, even on crashes). File system errors can occur because write operations are cached inside 
the computer’s RAM and may be lost if the system is switched off before they could be written to disk.
Other errors can come up when the system gives up the ghost in the middle of an unbuffered write operation.

Besides data loss, problems can include errors within the file system manage- structural errors. 
These can be located and repaired using suitable programs and include

<font color="red">•</font> Erroneous directory entries
<font color="red">•</font> Erroneous inode entries
<font color="red">•</font> Files that do not occur in any directory
<font color="red">•</font> Data blocks belonging to several different files

Most but not all such problems can be repaired automatically without loss of data; generally, the file system
can be brought back to a consistent state.

On boot, the system will find out whether it has not been shut down correctly by checking a file system’s state.
During a regular shutdown, the file systems are unmounted and the “valid flag” in every file system’s super 
block will be set. On boot, this super block information may be used to automatically check these possibly-erroneous
file systems and repair them if necessary—before the system tries to mount a file system whose valid flag
is not set, it tries to do a file system check

With all current Linux distributions, the system initialisation scripts executed by init after booting contain 
all necessary commands to perform a file system check.

If you want to check the consistency of a file system you do not need to wait for the next reboot. You can launch 
a file system check at any time. Should a file  contain errors, however, <font color="red">it can only be repaired if it is not 
currently mounted. This restriction is necessary so that the kernel and the repair program do not “collide”</font>.
This is another argument in favour of the automatic file system checks during booting

actual consistency checks are performed using the fsck command. Like mkfs, depending on the type of the file 
system to be checked this command uses a specific sub-command called fsck. ⟨type⟩—e.g., fsck.ext2 for ext2 . 
fsck identifies the the required sub-command by examining the file system in question.

<font color="red"># fsck /dev/sdb1</font> #Check the file system on /dev/sdb1 .

<font color="red"># fsck  </font>#checks all file systems listed in /etc/fstab with a non-zero value in the sixth
(last) column in sequence. (If several different values exist, the file systems
are checked in ascending order.)

<font color="blue">fsck -t ext3</font> #checks all file systems in /etc/fstab that are marked as type ext3 there

The most important options of fsck include:

<font color="red">-A</font>  (All) causes fsck to check all file systems mentioned in /etc/fstab . This obeys the checking order in 
    the sixth column of the file. If several file systems share the same value in that column, they are checked in
    parallel if they are located on different physical disks.

<font color="red">-R</font>  With -A , the root file system is not checked (which is useful if it is already mounted for writing).

<font color="red">-V</font>  Outputs verbose messages about the check run.
<font color="red">-N</font>  Displays what fsck would do without actually doing it.
<font color="red">-s</font>  Inhibits parallel checking of multiple file systems. The “ fsck ” command without any parameters is 
    equivalent to “ fsck -A -s ”.
<font color="red"> -p</font>   Automatic repair (no questions)
<font color="red"> -n</font>   Make no changes to the filesystem
<font color="red"> -y</font>   Assume "yes" to all questions
<font color="red"> -c</font>   Check for bad blocks and add them to the badblock list
<font color="red"> -f</font>   Force checking even if filesystem is marked clean
<font color="red"> -v</font>   Be verbose
<font color="red"> -b</font>   superblock        Use alternative superblock
<font color="red"> -B</font>   blocksize         Force blocksize when looking for superblock
<font color="red"> -j</font>   external_journal  Set location of the external journal
<font color="red"> -l</font>   bad_blocks_file   Add to badblocks list
<font color="red"> -L</font>   bad_blocks_file   Set badblocks list


At program termination, fsck passes information about the file system state to the shell:

<font color="green">0 No error was found in the file system
1 Errors were found and corrected
2 Severe errors were found and corrected. The system should be rebooted
4 Errors were found but not corrected
8 An error occurred while the program was executed
16 Usage error (e. g., bad command line)
128 Error in a shared library function</font>

It is conceivable to analyse these return values in an init script and determine how to continue with the 
system boot. If several file systems are being checked (using the -A option), the return value of fsck is 
the logical OR of the return values of the individual checking programs.




<FONT SIZE="6" COLOR="RED">REPAIRING EXTENDEND FILE SYSTEMS WITH e2fsck</FONT>


e2fsck is the consistency checker for ext file systems. There are usually symbolic links such as fsck.ext2 so 
it can be invoked from fsck. Like mke2fs , e2fsck also works for ext3 and ext4 file systems. You can of course
invoke the program directly, which might save you a little typing when passing options. On the other hand, you 
can only specify the name of one single partition (strictly speaking, one single block device).


<FONT COLOR="RED" SIZE="6">WHAT IS THE DIFFERENCE BETWEEN E2FSCK AND FSCK</FONT>

<FONT COLOR="RED">fsck is a wrapper or front-end for the filesystem-specific fsck.* family of tools.</FONT>
 They can be used interchangeably with one caveat.(advertencia)

Options which are not understood by fsck are passed to the filesystem-specific checker. These arguments must 
not take arguments, as there is no way for fsck to be able to properly guess which arguments take 
options and which don’t.

Options and arguments which follow the <FONT COLOR="RED">--</FONT> are treated as file system-specific options to be passed 
to the file system-specific checker.

Please note that fsck is not designed to pass arbitrarily complicated options to filesystem-specific checkers. 
<FONT COLOR="RED">If you’re doing something complicated, please just execute the filesystem-specific checker directly. </FONT>
If you pass fsck some horribly complicated option and arguments, and it doesn’t do what you expect, 
don’t bother reporting it as a bug. You’re almost certainly doing something that you shouldn’t be doing with fsck.


how to find the names of files associated to a unique inode number

                                      <font color="red">E2FSCK</font>

root@localhost mnt]#<font color="blue"> ls -i /usr/sbin/e2fsck</font>
<font color="green">67872114 /usr/sbin/e2fsck</font>

[root@localhost mnt]# <font color="blue">find / -inum 67872114 -exec ls -li {} \;</font>
<font color="green">67872114 -rwxr-xr-x. 4 root root 256312 Mar  5  2015 /usr/sbin/e2fsck
67872114 -rwxr-xr-x. 4 root root 256312 Mar  5  2015 /usr/sbin/fsck.ext2
67872114 -rwxr-xr-x. 4 root root 256312 Mar  5  2015 /usr/sbin/fsck.ext3
67872114 -rwxr-xr-x. 4 root root 256312 Mar  5  2015 /usr/sbin/fsck.ext4
[root@localhost mnt]# </font>


The most important options for e2fsck include:


The device file specifies the partition whose file system is to be checked. <font color="red">If that partition does not contain
an ext file system, the command aborts.</font> e2fsck performs the following steps:


<font color="red">1.</font> The command line arguments are checked
<font color="red">2.</font> The program checks whether the file system in question is mounted
<font color="red">3.</font> The file system is opened
<font color="red">4.</font> The super block is checked for readability
<font color="red">5.</font> The data blocks are checked for errors
<font color="red">6.</font> The super block information on inodes, blocks and sizes are compared with
the current system state
<font color="red">7.</font> Directory entries are checked against inodes
<font color="red">8.</font> Every data block that is marked “used” is checked for existence and whether it is referred to exactly once by some inode
<font color="red">9.</font> The number of links within directories is checked with the inode link counters (must match)
<font color="red">10.</font> The total number of blocks must equal the number of free blocks plus the number of used blocks


e2fsck returns an exit code with the same meaning as the standard fsck exit codes..

It is impossible to list all the file system errors that e2fsck can handle. Here are a few important examples:

<font color="red">•</font> Files whose inodes are not referenced from any directory are placed in the file system’s lost+found 
directory using the inode number as the file name and can be moved elsewhere from there. This type of 
error can occur, e. g., if the system crashes after a file has been created but before the directory
entry could be written.


<font color="red">•</font> An inode’s link counter is greater than the number of links pointing to this inode from directories. e2fsck 
corrects the inode’s link counter. 

<font color="red">•</font> e2fsck finds free blocks that are marked used (this can occur, e. g., when the system crashes after a file has 
been deleted but before the block count and bitmaps could be updated).

<font color="red">•</font> The total number of blocks is incorrect (free and used blocks together are different from the total number of blocks).

Not all errors are straightforward to repair. What to do if the super block is unreadable? Then the file system can 
no longer be mounted, and e2fsck often fails as well. You can then use a copy of the super block, one of which is 
included with every block group on the partition. In this case you should boot a rescue system and invoke 
fsck from there. With the -b option, e2fsck can be forced to consider a particular block as the super block. 

The command in question then becomes, for example:

<font color="blue"># e2fsck -f -b 8193 /dev/sda2</font>

If the file system cannot be automatically repaired using fsck , it is possible to modify the file system directly. 
However, this requires very detailed knowledge of file system structures which is beyond the scope of this course.
There are two useful tools to aid with this. First, the <font color="red">dumpe2fs</font> program makes visible the internal management data
structures of a ext file system. The interpretation of its output requires the aforementioned detailed knowledge. 
<font color="red">An ext file system may be repaired using the debugfs file system debugger.</font>

<font color="red">You should keep your hands off programs like debugfs unless you know exactly what you are doing</font>. While debugfs 
enables you to manipulate the file system’s data structures on a very low level, it is easy to damage a file sys-
tem even more by using it injudiciously. Now that we have appropriately warned you, we may tell you that

<font color="blue"># debugfs /dev/sda1</font>

will open the ext file system on /dev/sda1 for inspection ( debugfs , reasonably,enables writing to the file 
system only if it was called with the -w option). debugfs displays a prompt; “ help ” gets you a list of available
 commands. These are also listed in the documentation, which is in debugfs
