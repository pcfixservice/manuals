This document provides instructions for changing options with the GRUB Bootloader. 
</p><p>A 'bootloader' is the first program that runs when a computer starts ('boots'), and is responsible for loading the computers operating system.  Most Linux distributions use GRUB (the GRand Unified Bootloader), which was created by the GNU project. 
</p><p>GRUB allows users to have more than one operating system (or different kernel versions of an OS) loaded, and to choose from them at startup. By changing the instructions that GRUB gives to the OS at startup, a user can customize certain global parameters of their system.  
</p><p>The following issues (that may affect Userful MultiSeat) require modifying GRUB boot options: 
</p>
<ul>
<li> <a href="/w/index.php?title=Manuals/UMx/Known_Limitations&amp;action=edit&amp;redlink=1" class="new" title="Manuals/UMx/Known Limitations (page does not exist)"> ACPI sometimes causes X to crash at bootup</a>
</li>
<li> <a href="/UMs/KnownIssues/UMs/4.0#Kernel_virtual_address_space_exhaustion_on_the_X86_platform_with_multiple_NVIDIA_cards" title="UMs/KnownIssues/UMs/4.0" class="mw-redirect"> Kernel virtual address space exhaustion on the X86 platform with multiple NVIDIA cards</a>
</li>
<li> <a href="/UMs/Manuals/ReadMe/UMs/4.0#If_Using_Video_Cards_for_MultiSeat_.28v4.1_ONLY.29" title="UMs/Manuals/ReadMe/UMs/4.0" class="mw-redirect"> Blacklisting the open-source <i>nouveau</i> nVIDIA driver with Userful MultiSeat (stand-alone)</a>.
</li>
</ul>
<p>This document gives basic instructions for changing GRUB boot options for <code>vmalloc</code>.
</p>
<h2><span class="mw-headline" id="Check_the_GRUB_Version">Check the GRUB Version</span></h2>
<p>First, find out which version of GRUB the system has. Enter the following at a command line:
</p>
<pre>$ grub-install -v
</pre>
<p>This command should return something like:
</p>
<pre>grub-install (GNU GRUB 1.98-1ubuntu5)
</pre>
<p>If the version number is 0.97 or lower, GRUB Legacy is installed. Otherwise, it is GRUB 2.
</p>
<h3><span class="mw-headline" id="If_Using_GRUB_Legacy">If Using GRUB Legacy</span></h3>
<p>To change GRUB Legacy boot options, manually edit the <code>/boot/grub/menu.lst</code> file. It is *VERY* important to back up the <code>/boot/grub/menu.lst</code> file before any changes are made. Depending on your Linux distribution, modify <code>menu.lst</code> as described below:
</p><p><i><b>If using GRUB Legacy on Ubuntu (and other DEB-based operating systems that use the Automagic Kernel list):</b></i>
</p>
<ul>
<li> instructions are passed to the kernel by appending commands to the end of the <code># kopt=</code> line in the <code>AUTOMAGIC KERNELS LIST</code> section of <code>menu.lst</code>
</li>
<li> <b>do not remove the hash mark (#)</b> at the start of the <code># kopt=</code> line
</li>
</ul>
<ol>
<li> Back up <code>menu.lst</code>:
<dl>
<dd><pre>sudo cp /boot/grub/menu.lst /boot/grub/menu.lst-backup</pre>
</dd>
</dl>
</li>
<li> Open <code>menu.lst</code> in a text editor:
<dl>
<dd><pre>su gedit /boot/grub/menu.lst</pre>
</dd>
</dl>
</li>
<li> Find the <code># kopt=</code> line. Add options to the end of the <code># kopt=</code> line (leaving one space between each added option) as follows:
<ol>
<li> To turn off ACPI:
<ul>
<li> Add <code>acpi=off</code> to the end of the kernel line.
</li>
</ul>
</li>
<li> To increase virtual memory allocation:
<ul>
<li> Add <code>vmalloc=192MB</code>. (If 192MB does not work, try increasing the virtual address space in increments until you reach an allocation that is successful).
</li>
</ul>
</li>
<li> To blacklist the <code>nouveau</code> driver:
<ul>
<li> Change the entry that reads <code>"quiet splash"</code> to <code>"quiet splash nouveau.blacklist=1</code>
</li>
</ul>
</li>
</ol>
</li>
<li> Enter this command to update GRUB menu entries:
<dl>
<dd><pre>sudo update-grub</pre>
</dd>
</dl>
</li>
</ol>
<h3><span class="mw-headline" id="If_Using_GRUB_2">If Using GRUB 2</span></h3>
<p>GRUB 2 does not have a <code>menu.lst</code> file. To change boot options with GRUB 2 changes are made to the <code>/etc/default/grub</code> file, by adding entries to the <code>GRUB_CMDLINE_LINUX_DEFAULT</code>.
</p>
<ol>
<li> Back up <code>/etc/default/grub</code>:
<dl>
<dd><pre>sudo cp /etc/default/grub /etc/default/grub-backup</pre>
</dd>
</dl>
</li>
<li> Open <code>/etc/default/grub</code> in a text editor:
<dl>
<dd><pre>su gedit /etc/default/grub</pre>
</dd>
</dl>
</li>
<li> Find the <code>GRUB_CMDLINE_LINUX_DEFAULT</code> line. Add options to the end of this line inside the quotation marks (leaving one space between each added option) as follows:
<ol>
<li> To turn off ACPI:
<ul>
<li> Add <code>acpi=off</code>.
</li>
</ul>
</li>
<li> To increase virtual memory allocation:
<ul>
<li> Add <code>vmalloc=192MB</code>. (If 192MB does not work, try increasing the virtual address space in increments until you reach an allocation that is successful).
</li>
</ul>
</li>
<li> To blacklist the <code>nouveau</code> driver:
<ul>
<li> Change the entry that reads <code>"quiet splash"</code> to <code>"quiet splash nouveau.blacklist=1</code>
</li>
</ul>
</li>
</ol>
</li>
<li> Enter this command to update GRUB menu entries:
<dl>
<dd><pre>sudo update-grub</pre>
</dd>
</dl>
</li>
</ol>
<p><br />
