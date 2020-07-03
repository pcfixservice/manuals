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
<font size="6" color="red">Installing and Using Maven on Tomcat</FONT>

Installation Procedure

1.- Download the package from https://maven.apache.org/download.cgi in /opt/maven
2.- mkdir /opt/maven && cd $_
3.- Uncompress the archive
4.- Export the environment variables for JAVA_HOME and maven
<font color="blue">    export M2_HOME="/opt/maven3"
    export JAVA_HOME="/usr/lib/jvm/java-1.7.0-openjdk-i386"
    export PATH=$PATH:$M2_HOME/bin:$JAVA_HOME/bin</font>
5.- Refresh the path and the variables <font color="blue">source ~/.bashrc</font>
6.- Test the correct configuration executing <font color="blue">mvn -version</font>



HOW TO SET THE JAVA ENVIRONMENT VARIABLES FOR EACH USER

user@linuxbox:~$<font color="blue"> vi ~/.profile</font>
.
.
.
<font color="green">JAVA_HOME=/usr/java/jdk1.6.0_11
export JAVA_HOME
PATH=$PATH:$JAVA_HOME/bin
export PATH</font>

user@linuxbox:~$<font color="blue"> source ~/.profile</font>

user@linuxbox:~$<font color="blue"> java -version</font>
<font color="green">java version "1.6.0_11"
Java(TM) SE Runtime Environment (build 1.6.0_11-b03)
Java HotSpot(TM) Client VM (build 11.0-b16, mixed mode, sharing)</font>




