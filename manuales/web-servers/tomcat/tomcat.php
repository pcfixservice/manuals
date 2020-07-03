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
<font size="6" color="red">Administration Guide Tomcat 7.0</FONT>

Tomcat is a very popular web server/servlet container that can host Java web applications which are made 
up of servlets, JSP pages (dynamic content), HTML pages, javascript, stylesheets, images… (static content).                     
This article describes the most common ways about how to deploy a Java web application on 
Tomcat, include the followings:

          Copying web application archive file (.war).
          Copying unpacked web application directory.
          Using Tomcat’s manager application.
<img src="images/tomcat_1.png" width="1000" height="700" /></a>


<font size="6" color="red">wget commands</FONT>

LIST ALL OF APPS CURRENTLY DEPLOYED AND THEIR STATUS USING WGET
<font color="blue">wget http://tomcat1:6d19vi@localhost:8080/manager/text/list -O - -q</font>

TO UNDEPLOY CURRENT APP USING WGET
<font color="blue">wget http://username:password@localhost:portnumber/manager/text/undeploy?path=/appname -O - -q</font>

<font color="blue">wget --http-user=tomcat1 --http-password=6d19vi "http://localhost:8080/manager/text/undeploy?path=/EjemploPruebaCarga" -O -</font>


TO DEPLOY AN APP USING WGET
<font color="blue">wget http://username:password@localhost:portnumber/manager/text/deploy?path=/appname&war=file:/warpath -O - -q</font>
<font color="blue">wget --http-user=tomcat1 --http-password=6d19vi "http://localhost:8080/manager/text/deploy?war=file:/opt/
tomcat/EjemploPruebaCarga.war&path=/EjemploPruebaCarga" -O -</font>



<font size="6" color="red">curl commands</FONT>


LIST ALL APPS CURRENTLY DEPLOYED AND THEIR STATUS USING CURL
<font color="blue">curl --user tomcat1:6d19vi http://localhost:8080/manager/text/list</font>

STOPING, STARTING AND RELOADING A WEB APP USING CURL
<font color="blue">curl --user tomcat1 "http://localhost:8080/manager/text/stop?path=/EjemploPruebaCarga"</font>

DEPLOY A WEB APP WITH CURL
<font color="blue">curl --user tomcat1 "http://localhost:8080/manager/text/undeploy?path=/EjemploPruebaCarga"</font>

<font color="blue">curl --upload-file appplication-0.1-1.war "http://tomcat:tomcat@localhost:8080/manager/deploy?path=/application-0.1-1</font>

UNDEPLOY A WEB APP WITH CURL
<font color="blue">curl --user tomcat1 "http://localhost:8080/manager/text/deploy?war=file:/opt/
tomcat/EjemploPruebaCarga.war&path=/EjemploPruebaCarga"</font>


