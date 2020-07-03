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

<a href=""></a></a>
<font size="6" color="red">Creating a Secure Web Server</FONT>


<font color="red" size="5">1.- Install the Apache SSL module</font>

yum install openssl  mod_ssl


<font color="red" size="5">2.- Create a public/private key</font>

<font color="blue">openssl genrsa -des3 -out server.key 2048</font>

The passphrase that you set for the key is very important. You will to enter it
every time the key is used. If you forgot the passphrase, you won't be able to
use the private key anymore. A drawback to this is that you will need to enter
the passphrase each time the Apache server starts at boot up. To  avoid  that,
you can remove the passphrase after you create the key using this command

<font color="blue">openssl rsa -in server.key -out newserver.key</font>


<font color="red" size="5">3.- Create a Certificate Signing Request (CSR)</font>

The next step is to create a Certificate Signing Request (CSR) with the previous
private key. The CSR contains your key so that the CA can authenticate it and 
create a certificate that contains your public key.

<font color="blue">openssl req -new -key server.key -out newreq.pem</font>

The name of the output file is important, the CA signing tool will look for the
newreq.pem

<font color="red" size="5">4.- Have a CSR signed by a trusted CA to create a certificate</font>

You can sign your own CSR, which in essence means that you are validating it
yourself, this is called self-signed certificate, the command line to create
a CA is somewhat complicated, but the openssl package includes a Perl script
called CA.pl.

<font color="blue">/usr/lib/ssl/misc/CA.pl -newca</font>  This CA.pl is only available in Debian based distros

Now, use your new CA abilities to sign the CSR, make sure that newreq.pem file
is in the same folder

<font color="blue">/usr/lib/ssl/misc/CA.pl -signreq</font>

The signed certificate is now stored in the newcert.pem file. it contains the
public key along with the self-signed CA certificate validating it. Now you have
the key file (server.key) and the signed certifcate file (newcert.pem) that you
to implement SSL on your Apache server


<font color="red" size="5">5.- Install the certificate and key files in your Apache setup.</font>

Place the key and cert in a secure location on your server that's readable by the
Apache user account. It's usually a good idea to create a separate folder in the
Apache configuration folder area to store the key and certificate files

<font color="blue">sudo mkdir /etc/apache2/certs
sudo cp server.key /etc/apache/certs
sudo cp newcert.pem /etc/apache/certs</font>

Now that the key and certificate are in place, the last step is to configure the
Apache web server to use them


<font color="red" size="5">6.- Configure Apache to use the certificate</font>

First, look for the Listen directive and make sure you have a separate line to
listen on TCP port 443 for encrypted SSL connections


<font color="green">
SSLEngine On
SSLCertificateFile /etc/apache2/certs/newcert.pem
SSLCertificateKeyFile /etc/apache2/certs/server.key
</font>

Many distros make these entries automatically, for ubuntu these are in the
<font color="red">default-ssl.conf</font> file.

Save the configuration and restart the server


This is the basic to implement SSL in Apache, there are some additional
directives that can help to customize it further

<font color="orange">SSLCACertificateFile</font>
Points to a file that contains the CA certificate for validating client certs

<font color="orange">SSLCACertificatePath</font>
Path to a folder that contains the CA certificate for validating client certs

<font color="orange">SSLCertificateChainFile</font>
Path that contains multiple concatenated CA certificates for validating client certs

<font color="orange">SSLProtocol</font>
Defines which version of SSL (or TLS) the server supports

<font color="orange">SSLCipherSuite</font>
Defines one or more encryption protocols the server supports

<font color="orange">ServerTokens</font>
Controls whether the server sends OS information in the server response to clients

<font color="orange">ServerSignature</font>
Controls the sending short footer message on server-generated documents

<font color="orange">TraceEnable</font>
Defines whether the server honors the HTTP TRACE command to debug sessions

============================================================================

The tecmint tutorial sums up these steps with the following:

<font color="blue">
# openssl genrsa -des3 -out example.com.key 1024
# openssl req -new -key example.com.key -out exmaple.csr
# openssl x509 -req -days 365 -in example.com.com.csr -signkey example.com.com.key -out example.com.com.crt
</font>

<img src="images/ssl_tecmint_conf.png" width="600" height="300" /></a>

EXTERNAL LINKS
<a href="https://www.akadia.com/services/ssh_test_certificate.html">Akadia Self Signed Certificate</a></a>
<a href="https://www.linuxquestions.org/questions/linux-newbie-8/openssl-ca-pl-873714/">Linux Questions Where is CA.pl file in Centos 7</a></a>
<a href="https://linoxide.com/security/make-ca-certificate-authority/">Create a Certificate Authority</a></a>
<a href="http://localhost/manuales/red-hat-manuals/system-administrator-s-guide.pdf#page=197">Web Servers Red Hat manual</a></a>
