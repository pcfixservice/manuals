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

<font size="6" color="blue">GRUB 2</font>

GRUB 2 is a completely new implementation of the boot loader that did not make particular concessions to 
GRUB-Legacy compatibility. GRUB 2 was officially released in June 2012, even though various distributions 
used earlier versions by default.

The LPIC-1 certificate requires knowledge of GRUB 2 from version 3.5 of the exam (starting on 2 July 2012).

As before, GRUB 2 consists of several stages that build on each other: 

<font color="red">• Stage 1 ( boot.img )</font> is placed inside the MBR (or a partition’s boot sector) on BIOS-based systems. It can 
read the first sector of stage 1.5 by means of the BIOS, and that in turn will read the remainder of stage 1.5.

<font color="red">• Stage 1.5 ( core.img )</font> goes either between the MBR and the first partition (on MBR-partitioned disks) or else 
into the BIOS boot partition (on GPT-partitioned disks). Stage 1.5 consists of a first sector which is tailored(adaptado) to
the boot medium (disk, CD-ROM, network, ...) as well as a “kernel” that provides rudimentary functionality like 
device and file access, processing a  command line, etc., and an arbitrary list of modules. 

This modular structure makes it easy to adapt stage 1.5 to size restrictions.

<font color="red">• GRUB 2 no longer includes an explicit stage 2</font>; advanced functionality will be provided by modules and loaded 
on demand by stage 1.5. The modules can be found in /boot/grub , and the configuration file in /boot/grub/grub.cfg

On UEFI-based systems, the boot loader sits on the ESP in a file called EFI/ ⟨operating system⟩ /grubx64.efi ,
where ⟨operating system⟩ is something like debian or fedora . Have a look at the /boot/efi/EFI directory on your
UEFI”=based Linux system. Again, the “ x64 ” in “ grubx64.efi ” stands for “64-bit PC”.

<font size="4" color="red">THE CONFIGURATION FILE</font>

The configuration file for GRUB 2 looks markedly different from that for GRUB Legacy, and is also rather more 
complicated (it resembles a bash script more than a GRUB Legacy configuration file). The GRUB 2 authors assume 
that system managers will not create and maintain this file manually. Instead there is a command called 
<font color="red">grub-mkconfig</font> which can generate a <font color="red">grub.cfg</font> file. To do so, it makes use of a set of auxiliary tools (shell 
scripts) in <font color="red">/etc/grub.d</font> , which, e. g., search /boot for Linux kernels to add to the GRUB boot menu. 
( grub-mkconfig writes the new configuration file to its standard output; the </font>update-grub</font> command calls grub-mkconfig
and redirects its output to <font color="red">/boot/grub/grub.cfg</font> .)

You should therefore not modify /boot/grub/grub.cfg directly, since your distribution is likely to invoke 
update-grub after, e. g., installing a kernel update, which would overwrite your changes to grub.cfg .
Usually you can, for instance, add more items to the GRUB 2 boot menu by editing the <font color="red">/etc/grub.d/40_custom 
file</font>. grub-mkconfig will copy the content of this file verbatim into the grub.cfg file. As an alternative, 
you could add your configuration settings to the <font color="red">/boot/grub/custom.cfg</font> file, which will be read by grub.cfg 
if it exists. For completeness’ sake, here is an excerpt from a typical grub.cfg file.  a menu entry to start 
Linux might look like this for GRUB 2:

<img src="menu_entry_grub2.png" width="1000" height="400" />










<font color="red" font size="5"><u>PROTECTING GRUB 2 WITH A PASSWORD</font></u></font>

GRUB 2 offers two types of password protection:

Password is required for modifying menu entries but not for booting existing menu entries;
Password is required for modifying menu entries and for booting one, several, or all menu entries.

<font color="red" font size="5"><u>C⁠ONFIGURING GRUB2 TO REQUIRE A PASSWORD ONLY FOR MODIFYING ENTRIES</u></font></font>

To require password authentication for modifying GRUB 2 entries, follow these steps:

Run the grub2-setpassword command as root:

<font color="blue">~]# grub2-setpassword
Enter and confirm the password:
Enter password:
Confirm password:</font>

Following this procedure creates a /boot/grub2/user.cfg file that contains the hash of the password. 
The user for this password, root, is defined in the /boot/grub2/grub.cfg file. With this change, 
modifying a boot entry during booting requires you to specify the root user name and your password.


<font color="red" font size="5"><u>C⁠ONFIGURING GRUB2 TO REQUIRE A PASSWORD FOR MODIFYING AND BOOTING ENTRIES</font></u></font>

Setting a password using the grub2-setpassword prevents menu entries from unauthorized modification 
but not from unauthorized booting. To also require password for booting an entry, follow these steps 
after setting the password with grub2-setpassword:


<font color="red">WARNING</font>

If you forget your GRUB 2 password, you will not be able to boot the entries you reconfigure in the following procedure.

Open the <font color="blue">/boot/grub2/grub.cfg file.</font>

Find the boot entry that you want to protect with password by searching for lines beginning with menuentry.
Delete the --unrestricted parameter from the menu entry block, for example:


<font color="green">[file contents truncated]
menuentry 'Red Hat Enterprise Linux Server (3.10.0-327.18.2.rt56.223.el7_2.x86_64) 7.2 (Maipo)' --class red 
--class gnu-linux --class gnu --class os <font color="orange">--unrestricted</font> $menuentry_id_option 
'gnulinux-3.10.0-327.el7.x86_64-advanced-c109825c-de2f-4340-a0ef-4f47d19fe4bf' {
        load_video
        set gfxpayload=keep
[file contents truncated]</font>

Save and close the file.

Now even booting the entry requires entering the root user name and password.

<font color="red">NOTE</font>

Manual changes to the /boot/grub2/grub.cfg persist when new kernel versions are installed, but are lost when 
re-generating grub.cfg using the <font color="red"> grub2-mkconfig</font> command. Therefore, to retain password 
protection, use the above procedure after every use of grub2-mkconfig.

<font color="red">NOTE</font>

If you delete the <font color="orange">--unrestricted</font> parameter from every menu entry in the /boot/grub2/grub.cfg file,
all newly installed kernels will have menu entry created without <font color="red">--unrestricted</font> and hence automatically 
inherit the password protection.

<font color="red" font size="5"><u>⁠PASSWORDS SET BEFORE UPDATING TO RED HAT ENTERPRISE LINUX 7</font></u></font>

The grub2-setpassword tool was added in Red Hat Enterprise Linux 7.2 and is now the standard method of
setting GRUB 2 passwords. This is in contrast to previous versions of Red Hat Enterprise Linux, where boot
entries needed to be manually specified in the /etc/grub.d/40_custom file, and super users - in the 
etc/grub.d/01_users file.

<font color="red" font size="5"><u>⁠ADDITIONAl  GRUB2 USER</font></u></font>

Booting entries without the --unrestricted parameter requires the root password. However, GRUB 2 also enables 
creating additional non-root users that can boot such entries without providing a password. Modifying the
entries still requires the root password. For information on creating such users, see the GRUB 2 Manual.




