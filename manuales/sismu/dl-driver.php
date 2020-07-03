<h2><span class="mw-headline" id="Features">Features</span></h2>
<p>Userful DL-Driver Software delivers the following features:  
</p>
<ul>
<li>  X.org-based driver for DisplayLink&#174; devices on Linux; does not require kernel changes
</li>
<li>  support for X.Org X server 1.5 and later.
</li>
<li>  16- and 24-bits per pixel color depth support
</li>
<li>  compression support for improved performance
</li>
<li>  support for multiple devices (up to ten)
</li>
<li>  basic 2D acceleration
</li>
<li>  Xv extension support with a lossy compression algorithm for increased performance
</li>
</ul>
<h2><span class="mw-headline" id="Download_and_Installation">Download and Installation</span></h2>
<p>Note: You must have <code>libusb-1.0</code> installed in order to use this software. Most distros will install this package automatically from standard repositories. If you are running SLED, you will have to manually install <code>libusb-1_0</code>.
</p><p>The Userful DL-Driver is available for download at [www.userful.com our website]. The software is supplied in the following formats for officially supported Linux distributions:
</p><p>RPM packages:
</p>
<ul>
<li> SLED 11
</li>
<li> Mandriva 2010.0
</li>
<li> Fedora 12 
</li>
</ul>
<p>DEB packages:
</p>
<ul>
<li> Ubuntu 9.10
</li>
</ul>
<p>The driver is also available in a generic .tar file for persons who would like to try to port the driver to other distros.
</p>
<h2><span class="mw-headline" id="Configuration">Configuration</span></h2>
<p>For this early Beta release, manual configuration of the xorg.conf file is required. 
</p>
<h3><span class="mw-headline" id="To_Add_DisplayLink_Devices">To Add DisplayLink Devices</span></h3>
<p>For each device in use, a “Device” section needs to be added to xorg.conf. This section should have the following contents:
</p>
 <pre>
 Section “Device”
     Identifier “some_unique_identifier”
     Driver “dl”
     Option &quot;Device&quot; “USB-device_identifier”
 EndSection
</pre>
<p>For example, with one NVIDIA pci card plus two DisplayLink Monitors, the following "Device" sections should be in xorg.conf:
</p>
<pre>
Section &quot;Device&quot;
    Identifier     &quot;Device0&quot;
    Driver         &quot;nvidia&quot;
    VendorName     &quot;NVIDIA Corporation&quot;
EndSection

Section &quot;Device&quot;
    Identifier     &quot;Device1&quot;
    Driver         &quot;dl&quot;
    Option &quot;Device&quot;  &quot;usb-0000:00:1d.7-2&quot;
EndSection

Section &quot;Device&quot;
    Identifier     &quot;Device2&quot;
    Driver         &quot;dl&quot;
    Option &quot;Device&quot;  &quot;usb-0000:00:1d.7-3&quot;
EndSection
</pre>
<h4><span class="mw-headline" id="Finding_the_Device_Identifier">Finding the Device Identifier</span></h4>
<p>The tool <code>lsdl</code> will list all DisplayLink devices available in the system with their respective identifiers. Note that these identifiers will change if the device is plugged in a different USB port.
</p><p>For example:
</p>
<pre>
$ lsdl
usb-0000:00:1d.7-2 HP USB Docking Video
usb-0000:00:1d.7-3 Samsung SMLD190G
</pre>
<h3><span class="mw-headline" id="Configuring_the_Server_Layout_To_Set_Display_Modes">Configuring the Server Layout To Set Display Modes</span></h3>
<p>A proper server layout must be configured to use the desired devices. Refer to <code>xorg.conf(5)</code> (the xorg.conf man page) for more information.
</p><p>For example, a system with 3 screens operating in extended mode should have a "ServerLayout" section like:
</p>
<pre>
Section &quot;ServerLayout&quot;
    Identifier     &quot;Layout0&quot;
    Screen      0  &quot;Screen0&quot;
    Screen	   &quot;Screen1&quot; RightOf &quot;Screen2&quot;
    Screen	   &quot;Screen2&quot; RightOf &quot;Screen0&quot;
    InputDevice    &quot;Keyboard0&quot; &quot;CoreKeyboard&quot;
    InputDevice    &quot;Mouse0&quot; &quot;CorePointer&quot;
    Option &quot;Xinerama&quot;  &quot;on&quot;
EndSection
</pre>
<p><b>Note:</b> Xinerama is incompatible with XRandR 1.2. If any of your device or video card drivers support XRandR 1.2, X will crash when Xinerama is enabled. Multiple screens will still operate in "Zaphod" mode (windows cannot be dragged across to other screens) if Xinerama is not enabled.
</p>
<h3><span class="mw-headline" id="Video_Quality">Video Quality</span></h3>
<p>The behavior of the lossy compression algorithm may be controlled by including the following options in the "Device" section of xorg.conf:
</p>
<ul>
<li> Option <code>"XvDownscale" "integer"</code>
</li>
</ul>
<dl>
<dd><dl>
<dd>Configures  whether  the  driver should downscale image data provided through the X Video (Xv) extension.
</dd>
<dd>0 - no downscaling (full-quality)
</dd>
<dd>1 - horizontal downscaling (default)
</dd>
<dd>2 - horizontal and vertical downscaling (low quality)
</dd>
</dl>
</dd>
</dl>
<ul>
<li> Option <code>"XvDownscaleMinWidth" "integer"</code>
</li>
</ul>
<dl>
<dd><dl>
<dd>Xv horizontal downscaling will only occur if the video output width is at least this value. (Default: 768)
</dd>
</dl>
</dd>
</dl>
<ul>
<li>  Option <code>"XvDownscaleMinHeight" "integer"</code>
</li>
</ul>
<dl>
<dd><dl>
<dd>Xv vertical downscaling will only occur if the video output height is at least this value. (Default: 512)
</dd>
</dl>
</dd>
</dl>
<h2><span class="mw-headline" id="How_to_Use">How to Use</span></h2>
<p>With this Beta release of Userful DL-Driver software for Linux, DisplayLink screens can run in the following modes (which must be set by editing the xorg.conf file; <a href="#Configuring_the_Server_Layout_To_Set_Display_Modes"> see above</a>): 
</p>
<ul>
<li> extend mode: the screen is part of the extended desktop (both Xinerama and Zaphod mode). 
<ul>
<li><b>Note:</b> Xinerama is incompatible with XRandR 1.2. Using a Xinerama setup with an XRandR 1.2 enabled driver will fail.
</li>
</ul>
</li>
<li> off mode: the screen is black. 
</li>
<li> stand-alone mode
</li>
</ul>
<h2><span class="mw-headline" id="Supported_Operating_Systems">Supported Operating Systems</span></h2>
<p>This release supports the following operating systems (server editions are not supported unless explicitly stated):
</p>
<ul>
<li> SLED 11
</li>
<li> Ubuntu 9.10
</li>
<li> Mandriva 2010.0
</li>
<li> Fedora 12
</li>
</ul>
<p>Video is supported in all operation modes. Restrictions may apply to Xinerama setups.
</p>
<h2><span class="mw-headline" id="PC_Recommended_Specifications">PC Recommended Specifications</span></h2>
<p>Userful DL-Driver Software can be used on a range of processors; the performance of the software is dependent upon the processing power available, and so more capable systems offer higher performance. 
</p><p>Recommended typical system/hardware requirements are: 
</p><p><b>Minimum Configuration</b>
</p>
<ul>
<li> The Minimum Configuration will support 1-3 additional users.
</li>
<li> Minimum Processor: Dual-Core 
</li>
<li> Minimum RAM: 1 GB
</li>
</ul>
<p><b>Extended Configuration</b>
</p>
<ul>
<li> The Extended Configuration will support 4-10 additional users.
</li>
<li> Minimum Processor: Quad-Core 
</li>
<li> Minimum RAM: 3 GB
</li>
</ul>
<p>If the PC specification is below this, performance will be lower (or CPU loading higher).
</p>
<h2><span class="mw-headline" id="Language_Support">Language Support</span></h2>
<p>The Beta release of Userful DL-Driver Software has not yet been internationalized. Therefore any error messages and documentation are in English only.
</p>
<h2><span class="mw-headline" id="Supported_Hardware">Supported Hardware</span></h2>
<p>This early Beta release of the Userful DL-Driver is designed to support the following chipsets:
</p>
<ul>
<li>  DL125 / DL165 / DL195 
</li>
<li>  DL120 / DL160 
</li>
</ul>
<p>The following devices have been tested with the Userful DL Linux Driver:
</p>
<table border="1" cellpadding="4" cellspacing="0" style="margin: 1em 1em 1em 0; background: #f9f9f9; border: 1px #aaa solid; border-collapse: collapse;">
<tr>
<td align="center" style="background:#f0f0f0;"><b>Chipset</b>
</td>
<td align="center" style="background:#f0f0f0;"><b>Devices <i>Extensively</i> Tested</b>
</td>
<td align="center" style="background:#f0f0f0;"><b>Devices <i>Minimally<sup>*</sup></i> Tested</b>
</td></tr>
<tr>
<td> DL-120
</td>
<td>
</td>
<td>
</td></tr>
<tr>
<td> DL-125
</td>
<td>
<ul>
<li> HP t100 Thin Client
</li>
<li> Samsung LD190 Monitor
</li>
</ul>
</td>
<td>
</td></tr>
<tr>
<td> DL-160
</td>
<td>
<ul>
<li> HP USB 2.0 Docking Station 
</li>
<li> IOGear Wireless USB2VGA Adapter (GUW2015VKIT)
</li>
<li> IOGear USB 2.0 External VGA Video Card (GUC2015V) 
</li>
</ul>
</td>
<td>
</td></tr>
<tr>
<td> DL-165
</td>
<td>
</td>
<td>
<ul>
<li> ViewXpro USB2DVI DL165
</li>
</ul>
</td></tr>
<tr>
<td> DL-195
</td>
<td>
</td>
<td>
<ul>
<li> Diamon BVU195 USB to DVI Adapter
</li>
</ul>
</td></tr>
</table>
<p><small><sup>*</sup> <i>Minimally</i> Tested Devices have not been used extensively with the Userful DL-Driver; undocumented issues may exist. </small>
</p>
<h3><span class="mw-headline" id="Driver_Performance">Driver Performance</span></h3>
<p>The performance of the Userful DL-Driver for Linux depends on processing power; performance will degrade as more devices are added.
</p>
<ul>
<li> For this early Beta release, Driver performance should be adequate for basic use with 1-6 extra stations [7 total] and adequate for intensive use (e.g., full screen streaming video) on 3 extra stations [4 total] on an Extended configuration. Restricions may apply (see known limitations).
</li>
</ul>
<p>For this Beta release, ideal performance has only been fully achieved with extensively tested DL-1×5 devices at 24-bit color depth. Performance is not optimal yet with tested DL1x0 devices at 24-bit color depth, and may be sub-par with DL1x5 and DL1x0 devices that have not been extensively tested. Achieving full perforance at 16-bit color depth settings is not an issue.
</p>
<h3><span class="mw-headline" id="USB_Hotplugging">USB Hotplugging</span></h3>
<p>For this DL-Driver early Beta release, <b>USB device hotplugging is not supported</b>. 
</p><p>To add a station, plug in the USB station. Then edit xorg.conf to add the new device and restart the X server. 
</p><p>Stations can be removed simply by unplugging them (even from a running system), but X may freeze for a short time (30 seconds) or indefinitely, requiring a system reboot.
</p>
<h2><span class="mw-headline" id="Summary_of_Known_Issues_and_Limitations">Summary of Known Issues and Limitations</span></h2>
<ul>
<li> No hot-plugging of stations 
<ul>
<li> When USB stations are unplugged from a running system, X may freeze for a brief period; sometimes X freezes completely, requiring a system reboot.
</li>
<li> When USB stations are added or reconnected, those devices will not be recognized until the device is added to xorg.conf and the X server is restarted.
</li>
</ul>
</li>
</ul>
<ul>
<li> If XRandR 1.2 is enabled, X will crash when Xinerama is enabled. Note: XRandR is enabled by default by some distros and video card drivers. 
</li>
</ul>
<ul>
<li> To get a video playback to use the lossy compression algorithm, the player must use the X Video extension. Some video players, such as Flash (e.g. YouTube.com) do not use the X Video extension and so do not take advantage of the algorithm. 
</li>
</ul>
<ul>
<li> Full HD (also known as ultra-HD, true HD, and 1080p) is not supported in this Beta release. Playback quality of normal HD (1280x720) can be fine-tuned using the <a href="#Video_Quality"> XvDownscale option</a> in the "Device" section of Xorg.conf.
</li>
</ul>
<ul>
<li> In a Xinerama setup with two or more DisplayLink devices, the X Video extension might be used by only one screen at a time. 
</li>
</ul>
<ul>
<li> For this Beta release, ideal performance has only been fully achieved with extensively tested DL-1×5 devices at 24-bit color depth. Performance is not optimal yet with tested DL1x0 devices at 24-bit color depth, and may be sub-par with DL1x5 and DL1x0 devices that have not been extensively tested. Achieving full perforance at 16-bit col0r depth settings is not an issue. 
</li>
</ul>
<ul>
<li> For this early Beta release, homogeneous USB display devices (all one model) are recommended.
</li>
</ul>
<ul>
<li> Not extensively tested (this list of limitations may be incomplete).
</li>
</ul>
<h2><span class="mw-headline" id="More_Information">More Information</span></h2>
<p>Please refer to our <a href="/Manuals/DL-Driver" title="Manuals/DL-Driver"> Userful-DL Driver Software Documentation</a> for more information. 
</p><p><b>If you:</b>
</p>
