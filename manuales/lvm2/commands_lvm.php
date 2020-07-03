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




<font color="red">Preventing Allocation on a physical Volume</font>

#pvchange -x n /dev/sdk1    #disallows the allocation of physical extents on /dev/sdk1.use the -xy arguments of the pvchange 
command to allow allocation where it had previously been disallowed.


<font color="red">Removin Physical Volumes</font>

#<font color="blue"> pvremove /dev/ram15</font>     #If a device is no longer required for use by LVM, you can remove the LVM 
label with the  pvremove command.   Executing the pvremove command zeroes the LVM metadata on an empty physical volume.

<font color="red">VOLUMEN GROUP ADMINISTRATION</font>

# vgcreate vg1 /dev/sdd1 /dev/sde  # The following command creates a volume group named vg1 that contains physical volumes 
/dev/sdd1 and /dev/sde1.


<font color="red">Adding Physical Volumes to a Volume Group</font>

# vgextend vg1 /dev/sdf1 # The following command adds the physical volume /dev/sdf1 to the volume group vg1



<font color="red">Removing Physical Volumes from a Volume Group</font>

#vgreduce my_volume_group /dev/hda1  #removes the physical volume /dev/hda1 from the volume group my_volume_group. If the 
physical volume is still being used you will have to migrate the data to another physical volume using the pvmove command. 
Then use the vgreduce command to remove the physical volume

<font color="red">Changing the Parameters of a Volume Group</font>

#vgchange -l 128 /dev/vg00 #  changes the maximum number of logical volumes of volume group vg00 to 128


<font color="red">Activating and Deactivating Volume Groups</font>

#vgchange -a n my_volume_group # deactivates the volume group my_volume_group.


<font color="red">Removing Volume Groups</font>

#vgremove officevg  # To remove a volume group that contains no logical volumes, use the vgremove command


<font color="red">Splitting a Volume Group</font>

#vgsplit bigvg smallvg /dev/ram15  # The following example splits off the new volume group smallvg from the original volume 
group bigvg.


<font color="red">Combining Volume Groups</font>

# vgmerge -v databases my_vg #  merges the inactive volume group my_vg into the active or inactive volume group databases 
giving verbose runtime information











<img src="images/part_4/raid_1.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_2.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_3.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_4.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_5.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_6.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_7.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_8.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_9.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_10.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_11.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_12.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_13.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_14.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_15.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_16.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_17.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_18.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_19.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_20.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_21.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_22.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_23.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_24.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_25.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_26.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_27.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_28.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_29.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_30.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_31.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_32.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_33.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_34.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_35.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_36.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_37.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_38.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_39.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_40.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_41.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_42.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_43.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_44.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_45.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_46.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_47.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_48.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_49.png" width="1000" height="700" /></a>
<img src="images/part_4/raid_50.png" width="1000" height="700" /></a>
