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




<font color="red">APT-GET COMMANDS</font>

1.-Update all available packages in the system
<font color="blue">sudo apt-get update</font>

2.-check if everything finish well after using apt-get update
<font color="blue">apt-get check</font>

3.-It will show us a list with the programs according the string we indicated
<font color="blue">apt-get search "string-to-find"</font>

4.- Allow us to consult a package information
<font color="blue">apt-cache show  package</font>

5.-Install a package
<font color="blue">apt-get install package-name</font>

6.-Just download a package
<font color="blue">apt-get install -d package-name</font>

7.-check that all dependencies are correctly installed
<font color="blue">apt-get check</font>

8.-Update all the packages in the system, if we want to update just one package, we need to add the name of the package
<font color="blue">apt-get upgrade</font>     <font color="blue">apt-get upgrade package_name</font>

9.-Update the package and its dependencies, but it handles better dependencies issues than upgrade
<font color="blue">apt-get dist-upgrade package-name</font>

10.- Simulated a practice Installation or elimination of a package
<font color="blue">apt-get install -s package-name</font>        <font color="blue">apt-get remove -s package_name</font>

11.- Remove  a package and all its dependencies if you want to eliminate configuracion files of that package use apt-purge
<font color="blue">apt-get autoremove package_name</font>

12.-Clean the temporal folder <font color="magenta">/var/cache/apt/archives</font> where are all the downloaded fils.deb.i
<font color="blue">apt-get clean</font>



<FONT COLOR="RED">RECONFIGURATION OF DEBIAN PACKAGES</FONT>

<font color="blue">dpkg-reconfigure  tzdata</font>  Reconfigure time zone of the system
<font color="blue">dpkg -s teeworlds</font>         Show the status of package already installed
<font color="blue">dpkg --contents</font>           Show the contents of package not installed
<font color="blue">dpkg --status</font>             Show status of a package already installed.(dependencies,description and so on)
<font color="blue">dpkg -S</font>                   Show the contents' package already installed it doesn't work with package.deb
<font color="blue">dpkg --info</font>               Show info. about version, dependencies, architecture, descripcion and so on of
                          packages non installed in the system
<font color="blue">dpkg -L tzdata</font>            Show the contents of package already installed
<font color="blue">ls -l $(which java)</font>       Show all the symbolics links to packages related to the package java, not shown
                          by  <font color="blue">dpkg -L</font> or <font color="blue">dpkg -S</font>

<FONT COLOR="RED">Configuration and log filesfor APT package management</FONT>

<font color="magenta">*</font> /etc/dpkg/dpkg.cfg
<font color="magenta">*</font> /var/log/dpkg.log
<font color="magenta">*</font> /var/lib/dpkg/status 


<FONT COLOR="RED">APT-CDROM</FONT>

We can use the CDs or DVs as installation source if we no have internet access

<font color="magenta">*</font>mount /dev/cdrom /media/cdrom
<font color="magenta">*</font>apt-cdrom add
<font color="magenta">*</font>apt-get update
If we decide not to use the cdrom as installation source just comment or eliminate the reference to this source at /etc/apt/source.list


<FONT COLOR="RED">ADD A NEW REPOSITORY TO /ETC/APT/SOURCE.LIST</FONT>

<font color="magenta">*</font>add this line to /etc/apt/source.list   deb http://repository.spotify.com stable non-free
<font color="magenta">*</font>apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 94558F59
<font color="magenta">*</font>apt-get update
<font color="magenta">*</font>apt-get install spotify-client







<FONT COLOR="RED">TROUBLESHOOTING</FONT>

<font color="red">Error GPG</font>

<font color="green">Reading package lists... Done 
W: GPG error: http://extras.ubuntu.com oneiric Release: Unknown error executing gpgv executing gpgv
---- 
---- 
W: GPG error: http://archive.ubuntu.com oneiric-updates Release: Unknown error executing gpgv</font>

<font color="magenta">*</font>apt-get clean 
<font color="magenta">*</font>cd /var/lib/apt 
<font color="magenta">*</font>mv lists lists.old 
<font color="magenta">*</font>mkdir -p lists/partial 
<font color="magenta">*</font>apt-get clean 
<font color="magenta">*</font>apt-get update
































oxxo14853712+2747466105
250



