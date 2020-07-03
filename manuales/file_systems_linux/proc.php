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




<font color="red">THE /PROC FILE SYSTEM</font>


The Linux kernel has two primary functions: to control access to physical devices on the computer and to schedule 
when and how processes interact with these devices. The <FONT COLOR="magenta">/proc/</FONT> directory — also called the proc file system — contains 
<font color="blue"></font>
a hierarchy of special files which represent the current state of the kernel — allowing applications and users to peer 
into the kernel's view of the system.

Within the <FONT COLOR="magenta">/proc/</FONT> directory, one can find a wealth of information detailing the system hardware and any processes 
currently running. In addition, some of the files within the <FONT COLOR="magenta">/proc/</FONT> directory tree can be manipulated by users 
and applications to communicate configuration changes to the kernel.

<FONT COLOR="RED"> A VIRTUAL FILE SYSTEM</FONT>

Under Linux, all data are stored as files. Most users are familiar with the two primary types of files: text and binary. 
But the <FONT COLOR="magenta">/proc/</FONT> directory contains another type of file called a virtual file. It is for this reason that <FONT COLOR="magenta">/proc/</FONT> is often 
referred to as a virtual file system.

These virtual files have unique qualities. Most of them are listed as zero bytes in size and yet when one is viewed, 
it can contain a large amount of information. In addition, most of the time and date settings on virtual files reflect 
the current time and date, indicative of the fact they are constantly updated.

Virtual files such as <FONT COLOR="magenta">/proc/interrupts</FONT>, <FONT COLOR="magenta">/proc/meminfo</FONT>, <FONT COLOR="magenta">/proc/mounts</FONT>, and <FONT COLOR="magenta">/proc/partitions</FONT> provide an up-to-the-moment glimpse 
of the system's hardware. Others, like the <FONT COLOR="magenta">/proc/filesystems</FONT> file and the <FONT COLOR="magenta">/proc/sys/</FONT> directory provide system configuration 
information and interfaces.

For organizational purposes, files containing information on a similar topic are grouped into virtual directories and 
sub-directories. For instance, <FONT COLOR="magenta">/proc/ide/</FONT> contains information for all physical IDE devices. Likewise, process directories 
contain information about each running process on the system.


<FONT COLOR="RED">THE /PROC FILESYSTEM</FONT>

The /proc filesystem contains a illusionary filesystem. It does not exist on a disk. Instead, the kernel 
creates it in memory. It is used to provide information about the system (originally about processes, 
hence the name). Some of the more important files and directories are explained below. The /proc 
filesystem is described in more detail in the proc manual page

<font color="blue">/proc/1</font>
A directory with information about process number 1. Each process has a directory below /proc with the
name being its process identification number.

<font color="blue">/proc/cpuinfo</font>
Information about the processor, such as its type, make, model, and performance.

<font color="blue">/proc/devices</font>
List of device drivers configured into the currently running kernel.

<font color="blue">/proc/dma</font>
Shows which DMA channels are being used at the moment.

<font color="blue">/proc/filesystems</font>
Filesystems configured into the kernel.

<font color="blue">/proc/interrupts</font>
Shows which interrupts are in use, and how many of each there have been.

<font color="blue">/proc/ioports</font>
Which I/O ports are in use at the moment.

<font color="blue">/proc/kcore</font>
An image of the physical memory of the system. This is exactly the same size as your physical memory, but
does not really take up that much memory; it is generated on the fly as programs access it. (Remember: unless 
you copy it elsewhere, nothing under /proc takes up any disk space at all.)

<font color="blue">/proc/kmsg</font>
Messages output by the kernel. These are also routed to syslog.

<font color="blue">/proc/ksyms</font>
Symbol table for the kernel.

<font color="blue">/proc/loadavg</font>
The `load average' of the system; three meaningless indicators of how much work the system has to do at the moment.

<font color="blue">/proc/meminfo</font>
Information about memory usage, both physical and swap.

<font color="blue">/proc/modules</font>
Which kernel modules are loaded at the moment.

<font color="blue">/proc/net</font>
Status information about network protocols.

<font color="blue">/proc/self</font>
A symbolic link to the process directory of the program that is looking at /proc. When two processes look at /proc, 
they get different links. This is mainly a convenience to make it easier for programs to get at their process directory.

<font color="blue">/proc/stat</font>
Various statistics about the system, such as the number of page faults since the system was booted.

<font color="blue">/proc/uptime</font>
The time the system has been up.

<font color="blue">/proc/version</font>
The kernel version.

Note that while the above files tend to be easily readable text files, they can sometimes be formatted in a way that 
is not easily digestible. There are many commands that do little more than read the above files and format them for 
easier understanding. For example, the freeprogram reads /proc/meminfo converts the amounts given in bytes to kilobytes 
(and adds a little more information, as well).



<font color="red">CONFIGURANDO EL SISTEMA: /PROC/SYS</font>

/proc/sys no solo proveé información sobre el sistema, tambié facilita o permita cambiar parámetros del kernel al vuelo, 
y habilta o deshabilita características de usabilidad. (Por supuesto, esto puede dañar tu sistema, considérate avisado.)
Para determinar si puedes configurar un archivo o es solo de lectura, 

usa <font color="magenta">ls -ld;</font> si un archivo tiene el atributo "w", significa que puedes configurar el kernel de alguna manera. 
Por ejemplo, <font color="magenta">ls -ld /proc/kernel/*</font> comienza como esto:

<font color="green">dr-xr-xr-x 0 root root 0 2008-01-26 00:49 pty
dr-xr-xr-x 0 root root 0 2008-01-26 00:49 random
-rw-r--r-- 1 root root 0 2008-01-26 00:49 acct
-rw-r--r-- 1 root root 0 2008-01-26 00:49 acpi_video_flags
-rw-r--r-- 1 root root 0 2008-01-26 00:49 audit_argv_kb
-r--r--r-- 1 root root 0 2008-01-26 00:49 bootloader_type
-rw------- 1 root root 0 2008-01-26 00:49 cad_pid
-rw------- 1 root root 0 2008-01-26 00:49 cap-bound</font>

Se puede observar que bootloader_type no está hecho para ser cambiado, pero otros archivos si lo están. 
Para cambiar un archivo, puedes usar algo como esto:

<font color="blue">echo 10 > /proc/sys/vm/swappiness</font>

Este ejemplo en particular cambiará el rendimiento de la paginación de la memoria virtual. Por cierto, estos cambios 
son solo temporales, y sus efectos desapareceran cuando tu reinicies el sistema; usa <font color="magenta">sysctl</font> 
y el archivo de configuración /etc/sysctl.conf para afectar los cambios de manera permanente.

Veamos el nivel superior del directorio /proc/sys:

debug: Contiene (¡sorpresa!) información para depuración (debugging). Esto es muy bueno si estás metido en el desarrollo del kernel.

<font color="magenta">dev:</font> Proveé parámetros para dispositivos específicos en tu sistema; por ejemplo, 
                     checa el directorio dev/cdrom.
<font color="magenta">fs:</font> Ofrece datos sobre cada posible aspecto del sistema de archivos.
<font color="magenta">kernel:</font> Te permite afectar la configuración del kernel y su operación directamente.
<font color="magenta">net:</font> Te permite controlar aspectos relacionados a la red. Se cuidadoso, 
                     porque puedes perder conectividad.
<font color="magenta">vm:</font> Trata con el subsistema VM.

<FONT COLOR="MAGENTA">CONCLUSIÓN</FONT>
El directorio especial <font color="magenta">/proc</font> proveé información completa y detallada acerca de los trabajos 
internos de Linux y te permite ajustar a la medida muchos aspectos de su configuración. Si te tomas algo de tiempo para 
aprender las posibilidades de este directorio, estarás en posición de obtener un sistema Linux más perfecto. 
¿Y no es acaso lo que todos queremos?.


