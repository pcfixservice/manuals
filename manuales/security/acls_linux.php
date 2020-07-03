<pre><h3>

Posix ACLs are a way of achieving a finer granularity of permissions than is possible with the standard Unix 
file permissions. See the full page on ACLs FilePermissionsACLs 

Setting up ACL       Install the acl package:    sudo apt-get install acl


Edit /etc/fstab and add option acl to partition(s) on which you want to enable ACL. For example: 

...
UUID=d027a8eb-e234-1c9f-aef1-43a7dd9a2345 /home    ext4   defaults,acl   0   2
...
Remount partition(s) on which you want to enable ACL. For example: 

sudo mount -o remount /home


Verify acl is enabled on the partition(s): 

mount | grep acl

The commands, setfacl and getfacl, set and read ACLs on files and directories. 

Example Usage

This is a simple example for use with a Samba share to ensure that any files or sub-directories created could
also be modified by any Samba user. Create a directory with full permission: 

mkdir shared_dir
chmod 777 shared_dir


Set the default ACL with '-d' and modify with '-m' the permissions for samba nobody user nogroup group which
 will apply to all newly created file/directories. 

setfacl -d -m u:nobody:rwx,g:nogroup:rwx,o::r-x shared_dir

GUI ACL Editor: The Eiciel package allows GUI access to ACLs through the Nautilus file manager. 

Useful ACL Resources:
http://brunogirin.blogspot.com/2010/03/shared-folders-in-ubuntu-with-setgid.html 
http://wiki.kaspersandberg.com/doku.php?id=howtos:acl 

man acl        man setfacl     man getfacl
