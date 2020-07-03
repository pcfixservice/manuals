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


<font size="6" color="red">Named-Based Virtual Hosting</FONT>

1.- First, you need to make a directory structure which will hold the web pages. This directory is known as the document root for the domain.

sudo mkdir -p /var/www/html/www.vhost1.com
sudo mkdir -p /var/www/html/www.vhost2.com

2.- Create the initial page for both sites
sudo nano /var/www/html/www.vhost1.com/index.html
sudo nano /var/www/html/www.vhost2.com/index.html

add the following content

<img src="images/html_content.png" width="600" height="200" /></a>

3.- Modify permissions

sudo chown -R apache:apache /var/www/html/www.vhost1.com
sudo chown -R apache:apache /var/www/html/www.vhost2.com
sudo chmod -R 755 /var/www/html

4.- Create virtual host file for both sites

sudo nano /etc/httpd/conf.d/vhost1.com.conf
sudo nano /etc/httpd/conf.d/vhost2.com.conf

Add the following content.

<VirtualHost *:80>

  ServerName www.vhost1.com
  ServerAlias vhost1.com
  DocumentRoot /var/www/html/www.vhost1.com
  ErrorLog /var/www/html/www.vhost1.com/error.log
  CustomLog /var/www/html/www.vhost1.com/access.log combined

</VirtualHost>

<img src="images/virtual-host-conf.png" width="600" height="200" /></a>

<font color="green">
The very first line opens our VirtualHost block and defines what IP address and port we will listen on for this 
directive. 

The asterisk identifies all IPs on the server, and port 80 as the non-SSL port since we don’t have an 
SSL yet.

The only two lines you are required to have in a VirtualHost block are ServerName and DocumentRoot. These 
tell Apache what inbound domain requests to listen for, and what folder to serve those requests.

The ServerAlias can describe other domains that should serve the same document root, which can be handy, in say a WordPress 
multisite installation. 

The ErrorLog line tells Apache where to store errors related to loading this domain. A single unique file can separate logs 
per domain, such as domain.com.error.log. 

CustomLog with the ‘combined’ option will log all access requests for this domain. This log is also especially useful when troubleshooting 
issues that happen when a request is made. Also, this can be very useful for keeping track of what IP’s are accessing your site.

There are also other helpful lines you could add to your VirtualHost block:

ServerAdmin declares the email address of the webmaster and is provided to visitors if an error is encountered.
 
Other options can be set here as well; Like in a .htaccess file, we can turn off index pages or symlinks.

RewriteEngine can be enabled in a VirtualHost Also, other conditions and rules for rewrites Almost anything you 
can put in a .htaccess file can also go in a VirtualHost configuration file</font>

<img src="images/virtual-host-conf2.png" width="700" height="300" /></a>

<font color="green">
ServerName: The domain that should match for this virtual host configuration. This should be your domain name.
ServerAlias: All other domains that should match for this virtual host as well, such as the www subdomain.
DocumentRoot: The directory from which Apache will serve the domain files.
Options: This directive controls which server features are available in a specific directory.
-Indexes: Prevents directory listings.
FollowSymLinks: This option tells your web server to follow the symbolic links.
AllowOverride: Specifies which directives declared in the .htaccess file can override the configuration directives.
ErrorLog, CustomLog: Specifies the location for log files.
Edit the file according to your needs and save it.</font>

5.-Check the syntax

sudo apachectl configtest   

sudo httpd -t 
Run syntax tests for configuration files only. The program immediately exits after these syntax parsing tests with either a return code of 0 
(Syntax OK) or return code not equal to 0 (Syntax Error). If -D DUMP_VHOSTS is also set, details of the virtual host configuration will be 
printed. If -D DUMP_MODULES  is set, all loaded modules will be printed.


6.- Restart apache

systemctl restart httpd.service

7.- httpd -S
Show the settings as parsed from the config file (currently only shows the virtualhost settings)

7.- Create DNS records in /etc/hosts files

192.0.2.0 www.vhost1.com
192.0.2.0 www.vhost2.com

8.- test the access to the pages

curl http://www.vhost1.com


External Links

<a href="https://httpd.apache.org/docs/2.4/vhosts/name-based.html">Apache official page</a></a>
