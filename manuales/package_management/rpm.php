<style type="text/css">
#wrapper{


 font-family: sans-serif;
  font-size: 100%;
  font-style: italic;

text-align: justify;
       width: 1085px;
        height:1200000px;
        background: url("/manuales/fabric_plaid.png") repeat;
        -webkit-box-shadow: 0 0 15px rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 15px rgba(0,0,0,.2);
        box-shadow: 0 0 15px rgba(0,0,0,.2);
border­radius: 200px;

word-wrap: break-word;
}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<div id="wrapper" class="clearfix">
<pre>  <h3>
<font color="red"></font>
<font color="blue"></font>

<pre><h3>

<font color="red">Packages  RPM (Red Hat, Fedora y similars)</font>



<img src="rpm_options.png" width="800" height="400" /></a>
<img src="rpm_options2.png" width="800" height="600" /></a>
<img src="rpm_options3.png" width="800" height="200" /></a>

<font color="#C14328">rpm -ivh package.rpm:</font> Install a single package
<font color="#C14328">rpm -ivh --nodeeps package.rpm</font> Install a package ignoring dependencies request
<font color="#C14328">rpm -U package.rpm</font> Update a package without change the configuration files
<font color="#C14328">rpm -F package.rpm</font> Update a rpm only if the package exist
<font color="#C14328">rpm -e package_name.rpm</font> Remove a package rpm
<font color="#C14328">rpm -qa</font> Show all the packages installed on the system
<font color="#C14328">rpm -qa | grep httpd</font> Filter the search of all packages installed on the system
<font color="#C14328">rpm -qi package_name</font> Obtain information about a package rpm
<font color="#C14328">rpm -qg System Environment/Daemons</font> Show all packages from a group of software
<font color="#C14328">rpm -ql package_name:</font> Show the files given for a rpm installed
<font color="#C14328">rpm -qc package_name:</font>  Show the configuration files given for a rpm package
<font color="#C14328">rpm -q package_name --whatrequires:</font> Show dependencies require by a package
<font color="#C14328">rpm -q package_name --whatprovides:</font> Show the capacity of rpm package
<font color="#C14328">rpm -q package_name --scripts:</font> Show the scripts that iniciate during instalation or elimination
<font color="#C14328">rpm -q package_name --changelog:</font>  Show the historial of reviews
<font color="#C14328">rpm -qf /etc/httpd/conf/httpd.conf:</font> Verify which package rpm  belongs to a given file
<font color="#C14328">rpm -qp package.rpm -l:</font> Show the files given by a package that yet is not installed 
<font color="#C14328">rpm --import /media/cdrom/RPM-GPG-KEY</font>  Import the digital sign of the public key 
<font color="#C14328">rpm --checksig package.rpm:</font> Verify the integrity of a package rpm
<font color="#C14328">rpm -qa gpg-pubkey</font> Verify the integrity of all prms installed on the system
<font color="#C14328">rpm -V package_name:</font> Size of file, licences, kind, owner, group, MD5 check and the last modification
<font color="#C14328">rpm -Va:</font> Check alls the rpms installed on the system. use with careful
<font color="#C14328">rpm -Vp package.rpm:</font> Check the integrity of a rpm  not installed on the system
<font color="#C14328">rpm2cpio package.rpm | cpio --extract --make-directories *bin*:</font> extract a exe file from a rpm
<font color="#C14328">rpm -ivh /usr/src/redhat/RPMS/`arch`/package.rpm</font> Install a package build from a rpm source
<font color="#C14328">rpmbuild –rebuild package_name.src.rpm</font> Buil a rpm package from a rpm source



<font color="blue">YUM Management (Red Hat, Fedora y similars)</font>


<img src="yum_options.png" width="800" height="500" /></a>


<font color="blue">su -c 'yum update'</font>   Command to  perform a full system update
<font color="blue">yum install package_name</font> Download and install a package
<font color="blue">yum localinstall package_name.rpm</font> Install a local file .rpm and it'll try to resolve the dependencies
<font color="blue">yum update package_name.rpm</font>  Update a package rpm installed on the system
<font color="blue">yum remove package_name</font>  Remove a package rpm
<font color="blue">yum list</font>  List all the packages installed on the system
<font color="blue">yum search package_name</font>  Find a package rpm in the repositories
<font color="blue">yum clean packages</font> Clean the rpm cache by deleting all the rpms already downloaded
<font color="blue">yum clean headers</font> Remove all the headers of files that the system use for resolve dependencies
<font color="blue">yum clean all</font>   remove from cache repositories and headers files
<font color="blue">su -c '/sbin/chkconfig --level 345 yum on; /sbin/service yum start'</font>  Perform a system updates every day






