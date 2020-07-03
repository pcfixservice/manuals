<meta http-equiv="Content-Type" content="t/html; charset=UTF-8" />



		 <html>

	<head>
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
	<TITLE>Handbooks</TITLE>
	<link href="stylesheets/common.css" type="text/css" rel="stylesheet">
	</head>

	<body class='navbar'><div id="hdr"><div id="hdr_container">
	<br>
	<p id="hdr_home"><h1><FONT COLOR=blue></FONT> <span>Handbooks</span></h1></a></p>
	<br><br>
	</div>
	</div>

	<div class="navsection"><div class="navsectiontitle">Handbooks</div><div class="navsectionlinks"><ul class="navsectionlinks">

	<script src="js/jquery-1.7.1.min.js" type="text/javascript" ></script>
		<script type="text/javascript">
		$(function(){
			$('#menu li a').click(function(event){
				var elem = $(this).next();
				if(elem.is('ul')){
					event.preventDefault();
					$('#menu ul:visible').not(elem).slideUp();
					elem.slideToggle();
				}
			});
		});
		</script>
		
	<style type="text/css" media="screen">
			#menu{
			}
			a{
				text-decoration:none;
				font-family:'Helvetica', Arial, sans-serif;
				font-size:13px;
				padding: 10px 5px;
			}
			#menu a:hover{
			}
			#menu ul a{background-color:none;}
			#menu ul a:hover{
				background-color:#EFFBF2;
				color:#2961A9;
				text-shadow:none;
			}
			ul{
				background-color:none;
				margin:0;
				padding:10;
				width:400px;
				list-style:none;
			}
			#menu ul{background-color:none;}
			#menu li ul {display:none;}
		</style>
<ul id="menu"> 


<li><a href="#"><div class="navsectiontitle">BOOT PROCESS, initramfs, init, SysVinit, Systemd,</div></a><ul>
<li><a href="manuales/boot/boot_linux.php" target="<?php echo $link_target;?>">Boot Process Linux</a></li>
<li><a href="manuales/boot/bootchart.pdf" target="<?php echo $link_target;?>">Monitoring Linux system startup Compare different Linux startup mechanisms</a></li>
<li><a href="manuales/boot/uefi.php" target="<?php echo $link_target;?>">UEFI</a></li>
<li><a href="manuales/boot/grub_legacy.php" target="<?php echo $link_target;?>">grub_legacy</a></li>
<br>
<br>
<li><a href="manuales/boot/grub2_basics.pdf" target="<?php echo $link_target;?>">grub2_basics.pdf</a></li>
<li><a href="manuales/boot/grub2.php" target="<?php echo $link_target;?>">GRUB 2 Configuration</a></li>
<li><a href="manuales/boot/grub2_console.php" target="<?php echo $link_target;?>">GRUB 2 Console & Rescue Mode</a></li>
<br>
<br>
<li><a href="manuales/boot/systemd.php" target="<?php echo $link_target;?>">Systemd Suse Documentation</a></li>
<li><a href="manuales/boot/systemd_arch.php" target="<?php echo $link_target;?>">Systemd Arch Linux Documentation</a></li>
<li><a href="manuales/boot/custom_targets.php" target="<?php echo $link_target;?>">How to create custom targets Red Hat Manual</a></li
<li><a href="manuales/boot/systemd-vs-sysvinit-cheatsheet.pdf" target="<?php echo $link_target;?>">systemd-vs-sysvinit-cheatsheet.pdf</a></li>
</ul></li>

<!--<li><a href="#"><div class="navsectiontitle">GCP </div></a><ul>
<li><a href="manuales/gcp/bug-fr-hard-consult.php" target="<?php echo $link_target;?>">Creation</a></li>
<li><a href="manuales/gcp/os-login.php" target="<?php echo $link_target;?>">OS-Login Configuration</a></li>
</ul></li>-->

<li><a href="#"><div class="navsectiontitle">Bash Shell</div></a><ul>
<font color="red">BASH SHELL</font><br>
<li><a href="manuales/editors/shell_bash.php" target="<?php echo $link_target;?>">Especial variables bash shell</a></li>
<li><a href="manuales/editors/shell_programming.php" target="<?php echo $link_target;?>">Bash Shell Concepts Interskill Course</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">DNS Server</div></a><ul>
<li><a href="manuales/dns_bind/bind.php" target="<?php echo $link_target;?>">BIND DNS Basic Configuration IBM manual</a></li>
</ul></li>
<li><a href="#"><div class="navsectiontitle">Epam</div></a><ul>
<font color=red>LESSON 1. Ways of Sounding Diplomatic</font>
<li><a href="manuales/epam/courses/english/diplo/diplomatic-grammar.php" target="<?php echo $link_target;?>">Lesson 1 part 1 Diplomatic Grammar</a></li>
<li><a href="manuales/epam/courses/english/diplo/diplomatic-vocabulary.php" target="<?php echo $link_target;?>">Lesson 1 part 2 Diplomatic Vocabulary</a></li>
<li><a href="manuales/epam/courses/english/diplo/diplomatic-questions.php" target="<?php echo $link_target;?>">Lesson 1 part 3 Diplomatic Questions</a></li>
<li><a href="manuales/epam/courses/english/diplo/saying-no-politely-small-talk.php" target="<?php echo $link_target;?>">Lesson 2 part 1 How to say NO politely in small talk</a></li>
<li><a href="manuales/epam/courses/english/diplo/saying-no-politely-meetings.php" target="<?php echo $link_target;?>">Lesson 2 part 2 How to say NO politely in meetings</a></li>
<li><a href="manuales/epam/courses/english/diplo/diplomatic.php" target="<?php echo $link_target;?>">Lesson 3 Make Your Meaning Clear</a></li>

<br>
<font color="red">Email Correspondance</font>
<li><a href="manuales/epam/courses/english/5-templates-responses-to-crazy-customers-letters.pdf" target="<?php echo $link_target;?>">5 Templates responses to crazy customers letters</a></li>
<li><a href="manuales/epam/courses/english/diplo/how-give-constructive-criticism-sandwich.php" target="<?php echo $link_target;?>">How to give constructive criticism</a></li>
<font color="red">Preparation For Customer Interview</font>
<li><a href="manuales/epam/courses/english/interview/customer_interview.php" target="<?php echo $link_target;?>">Lesson 1 Customer Interview: Handy Tips</a></li>
<li><a href="manuales/epam/courses/english/interview/customer_interview2.php" target="<?php echo $link_target;?>">Lesson 2 Self presentation</a></li>
</ul></li>

</li><li><a href="#"><div class="navsectiontitle">USER  MANAGEMENT</div></a> <ul>
<li><a href="manuales/user_management/ADI-usuarios-y-grupos-en-linux.pdf" target="<?php echo $link_target;?>">ADI-usuarios-y-grupos-en-linux.pdf</a></li>
<br><br>
<li><a href="manuales/user_management/users_groups_redhat.php" target="<?php echo $link_target;?>">Users and Groups Red Hat Manual Administration</a></li>
<br>
<br>
<li><a href="manuales/user_management/scripts_user_creation.php" target="<?php echo $link_target;?>">Scripts User Creation Linux</a></li>
<li><a href="manuales/user_management/scripts_dir_creation.php" target="<?php echo $link_target;?>">Scripts Directory Creation Linux</a></li>
<br>

<li><a href="manuales/user_management/adding_users.php" target="<?php echo $link_target;?>">Adding Users Accounts</a></li>
<li><a href="manuales/user_management/etc_passwd.php" target="<?php echo $link_target;?>">Understanding /etc/passwd</a></li>
<li><a href="manuales/user_management/etc_group.php" target="<?php echo $link_target;?>">Understanding /etc/group</a></li>
<li><a href="manuales/user_management/usermod.php" target="<?php echo $link_target;?>">usermod</a></li>
<li><a href="manuales/user_management/passwd_command.php" target="<?php echo $link_target;?>">passwd command</a></li>
<li><a href="manuales/user_management/chage.php" target="<?php echo $link_target;?>">chage command</a></li>


<li><a href="manuales/user_management/password-recovery.php" target="<?php echo $link_target;?>">Password Recovery   /etc/passwd</a></li>

</ul></li>

<li><a href="#"><div class="navsectiontitle">FTP</div></a>
<ul>
<li><a href="manuales/ftp/ftp.php" target="<?php echo $link_target;?>">FTP en linea de Comandos</a></li>
<li><a href="manuales/ftp/script_expect.php" target="<?php echo $link_target;?>">Script para subir archivos con Expect</a></li>
</ul></li>


<li><a href="#"><div class="navsectiontitle">KERNEL LINUX</div></a><ul>
<li><a href="manuales/kernel/procedure-to-compile-a-kernel.php" target="<?php echo $link_target;?>">How to compile the Kernel</a></li>
<li><a href="manuales/kernel/rhl7-kernel-administration.pdf" target="<?php echo $link_target;?>">RHEL7 Kernel Administration</a></li>
<li><a href="manuales/kernel/linux_kernel_in_learning.php" target="<?php echo $link_target;?>">What is the Linux kernel - IN Learning notes</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">KUBERNETES - DOCKER - GKE</div></a><ul>
<li><a href="manuales/kubernetes/kubernetes_in_action_Manning_2018_A0.pdf" target="<?php echo $link_target;?>">Kubernetes in Action Manning 2018 A0</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">LPIC</div></a><ul>

<li><div class="navsectiontitle">LPIC-1 Linux Certification Study Guide</div></a>
<li><a href="manuales/lpic_101-102/lpic-101-system-admin-1.pdf" target="<?php echo $link_target;?>">Tuxacademy Linux Administration I - System and Users</a></li>
<li><a href="manuales/lpic_101-102/lpic-101-system-admin-2-network-admin.pdf" target="<?php echo $link_target;?>">Tuxacademy Linux Administration II - Linux as a Network Client</a></li>
<li><a href="manuales/lpic_101-102/lpic-101-advanced-linux-the-linux-shell.pdf" target="<?php echo $link_target;?>">Tuxacademy Linux Advanced Administration - The Linux Shell and Toolkit</a></li>
<li><a href="manuales/lpic_101-102/LPIC-1.pdf" target="<?php echo $link_target;?>">LPIC-1 Linux Professional Institute Certification Study Guide</a></li>
<li><a href="manuales/lpic_101-102/Lpci_101_mcmcse.pdf" target="<?php echo $link_target;?>">PDF LPIC 101-102 mcmcse</a></li>
<li><a href="manuales/lpic_101-102/lpic_101_gitub.pdf" target="<?php echo $link_target;?>">PDF LPIC 101-102 GITUB ((in plain text)</a></li>

<li><div class="navsectiontitle">LPIC-2 Linux Certification Study Guide</div></a>
<li><a href="manuales/lpic_101-102/lpic2-study-guide.pdf" target="<?php echo $link_target;?>">Linux LPIC-2 Study Guide</a></li>

<li><div class="navsectiontitle">Linux Manuals</div></a>
<li><a href="manuales/lpic_101-102/Linux_Bible_Ninth_Edition.pdf" target="<?php echo $link_target;?>">Linux Bible Ninth Edition</a></li>
<li><a href="manuales/lpic_101-102/linux_shell_scripting_bible_3rd_edition_2015.pdf" target="<?php echo $link_target;?>">Linux Shell Scripting 3rd Edition 2015</a></li>

<li><div class="navsectiontitle">Red Hat 7 Manuals</div></a>
<li><a href="manuales/red-hat-manuals/system-administrator-s-guide.pdf" target="<?php echo $link_target;?>">Red Hat 7 Admin Guide</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">LINUX COMMANDS</div></a><ul>
<li><a href="manuales/linux-commands/find_command.php" target="<?php echo $link_target;?>">find</a></li>
<li><a href="manuales/text_processing/find.php" target="<?php echo $link_target;?>">find</a></li>
<li><a href="manuales/comandos_generales/date.php" target="<?php echo $link_target;?>">DATE</a></li>
<br>
</ul></li>

<li><a href="#"><div class="navsectiontitle">MAIL SERVERS</div></a> <ul>
<li><a href="manuales/red-hat-manuals/system-administrator-s-guide.pdf#page=222" target="<?php echo $link_target;?>">RHEL 7 Mail Server Administration</a></li>
</ul></li>



<LI><A HREF="#"><DIV CLASS="NAVSECTIONTITLE">NETWORK MANAGEMENT & CONFIGURATION</DIV></A>
<ul>
<li><a href="manuales/network_configuration/bonding_interfaces.php" target="<?php echo $link_target;?>">Bonding Interfaces Configuration</a></li>
<li><a href="manuales/network_configuration/rhl7_network_guide.pdf" target="<?php echo $link_target;?>">Red Hat 7 Network Administration</a></li>
<li><a href="manuales/network_configuration/hostapd_ubuntu.php" target="<?php echo $link_target;?>">Hostapd  En Ubuntu</a></li>
<li><a href="manuales/network_configuration/centos7_network_setup.php" target="<?php echo $link_target;?>">Interface_Configuration_CentOS7</a></li>
<li><a href="manuales/network_configuration/tips_utilities.php" target="<?php echo $link_target;?>">Tips & Utilities</a></li>
<li><a href="manuales/network_configuration/connect_wifi_terminal.php" target="<?php echo $link_target;?>">Connect to wifi through Terminal</a></li>
<li><a href="manuales/network_configuration/ip_aliasing.php" target="<?php echo $link_target;?>">Create Multiple IP Addresses to One Single Network Interface</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">NAGIOS 4</div></a><ul>
<li><a href="manuales/nagios4/nagios4.php" target="<?php echo $link_target;?>">Installation Procedure in Ubuntu</a></li>
<li><a href="manuales/nagios4/trouble.php" target="<?php echo $link_target;?>">Trouble-shooting</a></li>
<li><a href="manuales/nagios4/check_health_mysql.php" target="<?php echo $link_target;?>">Mysql checking</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">PACKAGE MANAGEMENT</div></a><ul>
<li><a href="manuales/package_management/rpm.php" target="<?php echo $link_target;?>">RPMs</a></li>
<li><a href="manuales/package_management/deb.php" target="<?php echo $link_target;?>">DEBs</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">PROCESS MANAGEMENT</div></a><ul>
<li><a href="manuales/process_management/fundamentals.php" target="<?php echo $link_target;?>">Process Introduccion</a></li>
<li><a href="manuales/process_management/process_states.php" target="<?php echo $link_target;?>">Process States</a></li>
<li><a href="manuales/process_management/ps_command.php" target="<?php echo $link_target;?>">ps command</a></li>
<li><a href="manuales/process_management/process_control.php" target="<?php echo $link_target;?>">kill & killall commands</a></li>
<li><a href="manuales/process_management/pgrep_pkill.php" target="<?php echo $link_target;?>">pgrep & pkill commands</a></li>
<li><a href="manuales/process_management/priorities.php" target="<?php echo $link_target;?>">Process Priorities</a></li>
<li><a href="manuales/process_management/top_htop.php" target="<?php echo $link_target;?>">TOP HTOP</a></li>
<li><a href="manuales/process_management/runlevels.php" target="<?php echo $link_target;?>">Run Levels</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">PROGRAMMING LANGUAGES</div></a><ul>
<li><div class="navsectiontitle"><font color=red>AWK</font></div></a>
 <li><a href="manuales/awk/awk.php" target="<?php echo $link_target;?>">Introduction to awk programing</a></li>
<li><a href="manuales/awk/awk.pdf" target="<?php echo $link_target;?>">AWK.pdf</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">PROXY SERVERS</div></a><ul>
<li><div class="navsectiontitle"><font color=red>Squid3</font></div></a>
 <li><a href="manuales/awk/awk.php" target="<?php echo $link_target;?>">Introduction to awk programing</a></li>
<li><a href="manuales/awk/awk.pdf" target="<?php echo $link_target;?>">AWK.pdf</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">PERFORMANCE MEASUREMENTS</div></a><ul>
<li><a href="manuales/measurement/introduction.php" target="<?php echo $link_target;?>">Linux Performance Monitoring and Tuning Introduction</a></li>
<li><a href="manuales/measurement/vmstat.php" target="<?php echo $link_target;?>">vmstat</a></li>
<li><a href="manuales/measurement/iftop_iptraf.php" target="<?php echo $link_target;?>">iftop and iptraf commands to analyse network traffic</a></li>
<li><a href="manuales/measurement/sar.php"  target="<?php echo $link_target;?>">sar command</a></li>
<li><a href="manuales/process_management/process_control.php" target="<?php echo $link_target;?>">kill & killall commands</a></li>
<li><a href="manuales/process_management/pgrep_pkill.php" target="<?php echo $link_target;?>">pgrep & pkill commands</a></li>
<li><a href="manuales/process_management/priorities.php" target="<?php echo $link_target;?>">Process Priorities</a></li>
<li><a href="manuales/process_management/top_htop.php" target="<?php echo $link_target;?>">TOP HTOP</a></li>
<li><a href="manuales/process_management/runlevels.php" target="<?php echo $link_target;?>">Run Levels</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">SERVIDOR VNC</div></a><ul>
<li><a href="manuales/vnc/vnc.php" target="<?php echo $link_target;?>">Configuracion sin interfaz grafica</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">SECURITY</div></a><ul>
<li><a href="manuales/security/acls_linux.php" target="<?php echo $link_target;?>">ACLs Linux</a></li>
<li><a href="manuales/security/iptables.php" target="<?php echo $link_target;?>">iptables</a></li>

<li><div class="navsectiontitle"><font color=red>Access Controls (permissions)</font></div></a>
<li><a href="manuales/control_access/umask.php" target="<?php echo $link_target;?>">umask</a></li>
<li><a href="manuales/control_access/visudo.php" target="<?php echo $link_target;?>">Visudo CentOS Debian</a></li>
<li><a href="manuales/control_access/setuid.php" target="<?php echo $link_target;?>">Setuid</a></li>
<li><a href="manuales/control_access/setguid.php" target="<?php echo $link_target;?>">Setguid</a></li>
<li><a href="manuales/control_access/stickybit.php" target="<?php echo $link_target;?>">Sticky Bit</a></li>
<li><a href="manuales/control_access/file_attributes.php" target="<?php echo $link_target;?>">File Attributes</a></li>

<li><div class="navsectiontitle"><font color=red>Red Hat Manuals</font></div></a>
<li><a href="manuales/security/rhl7-security.pdf" target="<?php echo $link_target;?>">Red Hat Enterprise Linux 7 Security Guide</a></li>

<li><div class="navsectiontitle"><font color=red>System Level Security</font></div></a>
<li><a href="manuales/security/openldap/system_level_security_rhel7.pdf" target="<?php echo $link_target;?>">LDAP, NIS, WINBIND, KERBEROS, AUTHCONFIG,  Red Hat Enterprise Linux 7 System-Level Authentication Guide</a></li>

<li><div class="navsectiontitle"><font color=red>SSH Server</font></div></a>
</ul></li>

<li><a href="#"><div class="navsectiontitle">SCRIPTS</div></a><ul>
<li><a href="manuales/scripts/scripts.php" target="<?php echo $link_target;?>">Scripts Bash</a></li>
<li><a href="manuales/security/iptables.php" target="<?php echo $link_target;?>"></a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">STORAGE ADMINISTRATION</div></a>
<ul>
<li><a href="manuales/disk/mbr.php" target="<?php echo $link_target;?>">Master Boot Record..(using dd, sfdisk,parted..)</a></li>
<li><a href="manuales/disk/gpt.php" target="<?php echo $link_target;?>">The Modern Method (GPT Partitions)</a></li>
<li><a href="manuales/disk/mass_storage.php" target="<?php echo $link_target;?>">Mass Storage and Naming Conventions</a></li>
<li><a href="manuales/disk/partitions.php" target="<?php echo $link_target;?>">Partitioning Disks..Fundamentals and Sugestions</a></li>
<li><a href="manuales/disk/fdisk.php" target="<?php echo $link_target;?>">fdisk</a></li>
<li><a href="manuales/disk/parted.php" target="<?php echo $link_target;?>">parted</a></li>
<li><a href="manuales/disk/gdisk.php" target="<?php echo $link_target;?>">gdisk</a></li>
<li><a href="manuales/disk/kpartx.php" target="<?php echo $link_target;?>">Loop Devices and kpartx</a></li>
<li><a href="manuales/disk/format_disk.php" target="<?php echo $link_target;?>">Format disc, usb</a></li>
<li><a href="manuales/disk/montardiscos.php" target="<?php echo $link_target;?>">Montar Discos</a></li>
<li><a href="manuales/disk/quota.php" target="<?php echo $link_target;?>">Disk Quotas</a></li>


<li><div class="navsectiontitle"><font color="red">RAID Administration</font></div>
<li><a href="manuales/disk/montardiscos.php" target="<?php echo $link_target;?>">Montar Discos</a></li>
<li><a href="manuales/disk/quota.php" target="<?php echo $link_target;?>">Disk Quotas</a></li>


<li><div class="navsectiontitle"><font color="red">RAID Administration</font></div>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte1.php" target="<?php echo $link_target;?>">Tecmint Tutorial Introduction</a></li>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte2.php" target="<?php echo $link_target;?>"> Tutorial Creating Software RAID0 (Stripe) part 2</a></li>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte3.php" target="<?php echo $link_target;?>">RAID 1 (Mirroring) using ‘Two Disks’ Part 3</a></li>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte4.php" target="<?php echo $link_target;?>">RAID 5 (Striping with Distributed Parity) Part 4</a></li>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte5.php" target="<?php echo $link_target;?>">RAID 6 (Striping with Double Distributed Parity) 5 </a></li>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte6.php" target="<?php echo $link_target;?>">RAID 10 or 1+0 (Nested) in Linux – Part 6</a></li>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte7.php" target="<?php echo $link_target;?>">Growing an Existing RAID & Removing Failed Disks 7</a></li>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte8.php" target="<?php echo $link_target;?>">Recover Data and Rebuild Failed Software RAID’s 8</a></li>
<li><a href="manuales/raid/raid_tecmint_tutorial_parte9.php" target="<?php echo $link_target;?>">How to Manage Software RAID’s  with ‘Mdadm’ Tool 9</a></li>

<li><div class="navsectiontitle"><font color="red">LVM</font></div>
<li><a href="manuales/lvm2/commands_lvm.php" target="<?php echo $link_target;?>">Commands for use in LVM2 Administration</a></li>
<li><a href="manuales/lvm2/lvm_tecmint_tutorial.php" target="<?php echo $link_target;?>">LVM 2 Tutorial Tecmint</a></li>
<li><a href="manuales/lvm2/lvm_tecmint_tutorial_2.php" target="<?php echo $link_target;?>">Extend/Reduce LVM’s (Logical Volume Management) – Part II</a></li>
<li><a href="manuales/lvm2/lvm_tecmint_tutorial_3.php" target="<?php echo $link_target;?>">Snapshots of Logical Volume and Restore’  Part III</a></li>
<li><a href="manuales/lvm2/lvm_tecmint_tutorial_4.php" target="<?php echo $link_target;?>">Setup Thin Provisioning Volumes in LVM  Part IV</a></li>
<li><a href="manuales/lvm2/lvm_tecmint_tutorial_5.php" target="<?php echo $link_target;?>">Multiple LVM  Disks using Striping I/O</a></li>
<li><a href="manuales/lvm2/lvm_tecmint_tutorial_6.php" target="<?php echo $link_target;?>">Migrating LVM Part to New Logical Volume (Drive) – Part VI</a></li>
<li><a href="manuales/lvm2/red_hat_pvs.php" target="<?php echo $link_target;?>">Red Hat LVM Physical Volume Administration</a></li>
<li><a href="manuales/lvm2/red_hat_vgs.php" target="<?php echo $link_target;?>">Red Hat LVM Volume Group  Administration</a></li>
<li><a href="manuales/lvm2/red_hat_lvs.php" target="<?php echo $link_target;?>">Red Hat LVM Logical Volume  Administration</a></li>

<li><div class="navsectiontitle"><font color="red">Virtual File Systems</font></div>
<li><a href="manuales/file_systems_linux/tmpfs.php" target="<?php echo $link_target;?>">tmpfs  File System Vs. RAM Disk</a></li>
<li><a href="manuales/file_systems_linux/swap.php" target="<?php echo $link_target;?>">Swap Space</a></li>
<li><a href="manuales/file_systems_linux/mount.php" target="<?php echo $link_target;?>">Mounting File Systems</a></li>
<li><a href="manuales/file_systems_linux/labels_uuids.php" target="<?php echo $link_target;?>">Labels and UUIDs</a></li>
<li><a href="manuales/file_systems_linux/dd.php" target="<?php echo $link_target;?>">dd command</a></li>
<li><a href="manuales/file_systems_linux/proc.php" target="<?php echo $link_target;?>">/proc</a></li>
<li><a href="manuales/file_systems_linux/types.php" target="<?php echo $link_target;?>">File Systems Types</a></li>
<li><a href="manuales/file_systems_linux/filesystem.php" target="<?php echo $link_target;?>">Filesystem Maintenance</a></li>

<li><div class="navsectiontitle"><font color="red">RHEL7</font></div>
<li><a href="manuales/disk/rhel7-storage.pdf" target="<?php echo $link_target;?>">RHEL7 Storage Administration</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">TEXT PROCESSING</div></a><ul>
<li><a href="manuales/text_processing/vi.php" target="<?php echo $link_target;?>">vim - vi</a></li>
<li><a href="manuales/text_processing/sed.php" target="<?php echo $link_target;?>">sed</a></li>
<li><a href="manuales/text_processing/rsync.php" target="<?php echo $link_target;?>">rsync</a></li>
<li><a href="manuales/text_processing/gzip_tar.php" target="<?php echo $link_target;?>">gzip - tar</a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">MULTISEAT-LINUX</div></a><ul>
<li><a href="manuales/sismu/loader.php" target="<?php echo $link_target;?>">How to Change Boot Options with the GRUB Bootloader</a></li>
<li><a href="manuales/sismu/Manual_Multiplatform-7.2.4-x86_64-2015.php" target="<?php echo $link_target;?>">Manual Multiplatform 2015 7.2 x86_64 </a></li>
<li><a href="manuales/sismu/multiseat_ubuntu10.04.pdf" target="<?php echo $link_target;?>">Manual MultiSeat Ubuntu 10.04 </a></li>
<li><a href="manuales/sismu/dl-driver.php" target="<?php echo $link_target;?>">Userful DL-Driver Software for Linux </a></li>
</ul></li>

<li><a href="#"><div class="navsectiontitle">KVM VIRTUALIZATION</div></a><ul>
<li><a href="manuales/kvm_virt/rhl7_virtual.pdf" target="<?php echo $link_target;?>">RHL7 Virtualization Administracion Guide</a></li><br>
</ul></li>

<li><a href="#"><div class="navsectiontitle">WEB SERVERS</div></a> <ul>
<li><div class="navsectiontitle"><font color="red">TOMCAT</font></div>
 <li><a href="manuales/web-servers/tomcat/tomcat.php" target="<?php echo $link_target;?>">Apache Tomcat 7 Administration Guide</a></li>
 <li><a href="manuales/web-servers/tomcat/maven.php" target="<?php echo $link_target;?>">Using Maven in Linux</a></li>
<br>
<li><div class="navsectiontitle"><font color="red"> HTTPD - APACHE2</font></div>
 <li><a href="manuales/red-hat-manuals/system-administrator-s-guide.pdf#page=197" target="<?php echo $link_target;?>">RHEL7 Apache Web Server Guide</a></li>
 <li><a href="manuales/web-servers/httpd/named_based_virtual_hosting.php" target="<?php echo $link_target;?>">Named-based Virtual Hosting</a></li>
 <li><a href="manuales/web-servers/httpd/ip_based_virtual_hosting.php" target="<?php echo $link_target;?>">IP-based Virtual Hosting</a></li>
 <li><a href="manuales/web-servers/httpd/secure_server_ssl.php" target="<?php echo $link_target;?>">Securing HTTPD with SSL</a></li>
</ul></li>
