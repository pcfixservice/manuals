<style type="text/css">
#wrapper{


 font-family: sans-serif;
  font-size: 95%;
  font-style: italic;

text-align: justify;
       width: 1057px;
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
<font color="red"><u>HOW TO EDIT THE SUDOERS FILE ON UBUNTU AND CENTOS</u></FONT>

<font color="orange"><u>INTRODUCTION</u></font>

Privilege separation is one of the fundamental security paradigms implemented in Linux and Unix-like operating systems.
Regular users operate with limited privileges in order to reduce the scope of their influence to their own environment,
and not the wider operating system.

A special user, called root, has "super-user" privileges. This is an administrative account without the restrictions
that are present on normal users. Users can execute commands with "super-user" or "root" privileges in a number 
of different ways.

In this article, we will discuss how to correctly and securely obtain root privileges, with a special focus on editing
the <font color="blue">/etc/sudoers</font>  file.

We will be completing these steps on an Ubuntu 12.04 VPS, but most modern Linux distributions should operate in a similar manner.

This guide assumes that you have already completed the initial server setup discussed here.
Log into your VPS as regular, non-root user.



<font color="red"><u>HOW TO OBTAIN ROOT PRIVILEGES</u></font>

There are three basic ways to obtain root privileges, which vary in their level of sophistication.



<font color="red"><u>lOG IN AS ROOT</u></font>

If you are logging in through SSH, specify the root user prior to the IP address or host name in your connection parameters.

<font color="blue">ssh root@your_IP_address_or_domain</font>

Again, enter the root password when prompted.



<font color="red"><u>USE "SU" TO BECOME ROOT</u></font>

Logging in as root is usually not recommended, because it is easy to begin using the system for non-administrative tasks,
which is dangerous.

The next way to gain super-user privileges allows you to become the root user at any time, as you need it.
We can do this <font color="red">by invoking the su command, which stands for "substitute user".</font> To gain root privileges,
simply type:



<font color="blue"><u>SU</u></font>

You will be prompted for the root user's password, after which, you will be dropped into a root shell session.

When you have finished the tasks which require root privileges, return to your normal shell by typing:

<font color="blue">exit</font>



<font color="red"><u>USE "SUDO" TO EXECUTE COMMANDS AS ROOT</u></font>

The final, and most complex, way of obtaining root privileges that we will discuss is with the sudo command.

The sudo command allows you to execute one-off commands with root privileges, without the need to spawn a new shell.
It is executed like this:

sudo command_to_execute
Unlike su, sudo will request the password of the user calling the command, not the root password.

Because of its security implications, sudo does not work by default, and must be set up before it functions correctly.
If you followed the initial server setup guide, you already completed a bare-bones configuration.

In the following section, we will discuss how to modify the configuration in greater detail.



<font color="red"><u>WHAT IS VISUDO?</u></font>

The sudo command is configured through a file located at /etc/sudoers.

Note: Never edit this file with a normal text editor! Always use the visudo command instead!

Because improper syntax in the sudoers file can leave you with a system where it is impossible to obtain 
elevated privileges, it is important to use the visudo command to edit the file.

The visudo command opens a text editor like normal, but then validates the syntax of the file upon saving. 
This prevents configuration errors from blocking "sudo" operations, which may be your only way of obtaining root privileges.

Traditionally, visudo opens the /etc/sudoers file with the "vi" text editor. Ubuntu, however, 
has configured visudo to use the "nano" text editor instead.

If you would like to change it back to "vi", issue the following command:

<font color="blue">sudo update-alternatives --config editor</font>

There are 3 choices for the alternative editor (providing /usr/bin/editor).

  Selection    Path                Priority   Status
------------------------------------------------------------
* 0            /bin/nano            40        auto mode
  1            /bin/nano            40        manual mode
  2            /usr/bin/vim.basic   30        manual mode
  3            /usr/bin/vim.tiny    10        manual mode

Select the number that corresponds with the choice you would like to make.

On CentOS, you can change this value by adding the following line to your ~/.bashrc:

<font color="blue">export EDITOR=/path/to/editor</font>

Source the file to implement the changes:

<font color="blue">. ~/.bashrc</font>

After you have configured visudo, execute the command to access the /etc/sudoers file:

<font color="blue">sudo visudo</font>



<font color="red"><u>HOW TO MODIFY THE SUDOERS FILE</u></font>

You will be presented with the sudoers file in your selected text editor.

I have copied and pasted the file from Ubuntu 12.04, with comments removed (but including the addition we made in our 
initial server set up). The CentOS sudoers file has many more lines, some of which we will not discuss in this guide.


<font color="orange">_________________________________________________________________________________________________</font>

Defaults        env_reset
Defaults        secure_path="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"

root        ALL=(ALL:ALL) ALL                    
demo        ALL=(ALL:ALL) ALL

%admin      ALL=(ALL) ALL
%sudo       ALL=(ALL:ALL) ALL

<font color="orange">___________________________________________________________________________________________________</font>

Let's take a look at what these lines do.



<font color="red"><u>DEFAULT LINES</u></font>

The first line, "Defaults env_reset", resets the terminal environment to remove any user variables.
This is a safety measure used to clear potentially harmful environmental variables from the sudo session.

The second line, which begins with "Defaults secure_path=...", specifies the PATH (the places in the filesystem
the operating system will look for applications) that will be used for sudo operations.
This prevents using user paths which may be harmful.


The third and fourth lines, we are somewhat familiar with. The fourth line you added yourself, but you might not have to
investigated the details of what each portion was accomplishing.

<font color="red"><u>USER PRIVILEGE LINES</u></font>

<font color="orange"><u>demo</u></font>  ALL=(ALL:ALL) ALL
The first field indicates the username that the <u>rule will apply to (demo).</u>

demo          <font color="orange"><u> ALL=</u></font>(ALL:ALL) ALL
The first      ALL" indicates that this <u>rule applies to all hosts.</u>

demo           ALL=(<font color="orange"><u>ALL</u></font>:ALL) ALL
The second    "ALL" indicates that the demo user <u>can run commands as all users.</u>

demo           ALL=(ALL:<font color="orange"><u>ALL</u></font>) ALL
The third     "ALL" indicates that the demo user <u>can run commands as all groups.</u>

demo           ALL=(ALL:ALL)<font color="orange"><u> ALL</u></font>
The last      "ALL" indicates these <u>rules apply to all commands.</u>

This means that our "root" and "demo" users can run any command using sudo, as long as they provide their password.



<font color="red"><u>GROUP PRIVILEGE LINES</u></font>

The last two lines are similar to the user privilege lines, but they specify sudo rules for groups.

Names beginning with a <font color="green">"%" indicate group names.</font>

Here, we see the "admin" group can execute any command as any user on any host. Similarly, the "sudo" group can has 
the same privileges, but can execute as any group as well.



<font color="red"><u>HOW TO SET UP CUSTOM RULES</u></font>

Now that we have gotten familiar with the general syntax of the file, let's create some new rules.

HOW TO CREATE ALIASES

The sudoers file can be organized more easily by grouping things with various kinds of "aliases".

For instance, we can create three different groups of users, with overlapping traslapar  membership:

User_Alias      GROUPONE = abby, brent, carl
User_Alias      GROUPTWO = brent, doris, eric, 
User_Alias      GROUPTHREE = doris, felicia, grant

<font color="green"><u>Group names must start with a capital letter</u></font>. We can then allow members of GROUPTWO 
to update apt-get's database by creating a rule like this:

GROUPTWO    ALL = /usr/bin/apt-get update

If we do not specify a user/group to run as, as above, sudo defaults to the root user.

We can allow members of GROUPTHREE to shutdown and reboot the machine by creating a "command alias"
 and using that in a rule for GROUPTHREE:

Cmnd_Alias      POWER = /sbin/shutdown, /sbin/halt, /sbin/reboot, /sbin/restart
GROUPTHREE  ALL = POWER

We create a command alias called "POWER" that contains commands to power off and reboot the machine. 
We then allow the members of GROUPTHREE to execute these commands.

We can also create "Run as" aliases, which can replace the portion of the rule that specifies the user to execute the command as:

Runas_Alias     WEB = www-data, apache
GROUPONE    ALL = (WEB) ALL

This will allow anyone who is a member of GROUPONE to execute commands as the "www-data" user or the "apache" user.

<font color="green"><u>Just keep in mind that later rules will override earlier rules when there is a conflict between the two.</u></font>



<font color="red"><u>HOW TO LOCK DOWN RULES</u></font>

There are a number of ways that you can achieve more control over how sudo reacts to a call.

The updatedb command associated with the "mlocate" package is relatively harmless. If we want to allow users
to execute it with root privileges without having to type a password, we can make a rule like this:

GROUPONE    ALL = NOPASSWD: /usr/bin/updatedb

NOPASSWD is a "tag" that means no password will be requested. It has a companion command called PASSWD,
which is the default behavior. A tag is relevant for the rest of the rule unless overruled by its "twin" tag
 later down the line.

For instance, we can have a line like this:

GROUPTWO    ALL = NOPASSWD: /usr/bin/updatedb, PASSWD: /bin/kill

Another helpful tag is "NOEXEC", which can be used to prevent some dangerous behavior in certain programs.

For example, some programs, like "less", can spawn other commands by typing this from within their interface:

<font color="blue">!command_to_run</font>

<font color="green"><u>This basically executes any command the user gives it with the same permissions that "less" is running under, 
which can be quite dangerous.</u></font>

To restrict this, we could use a line like this:

username    ALL = NOEXEC: /usr/bin/less



<font color="red"><u>MISCELLANEOUS INFORMATION</u></font>

There are a few more pieces of information that may be useful when dealing with sudo.

If you specified a user or group to "run as" in the configuration file, you can execute commands as those users 
by using the "-u" and "-g" flags, respectively:

sudo -u run_as_user command
sudo -g run_as_group command

For convenience, by default, sudo will save your authentication details for a certain amount of time in one terminal. 
This means you won't have to type your password in again until that timer runs out.

<font color="green">For security purposes, if you wish to clear this timer when you are done running administrative commands, 
you can run:</font>

<font color="blue">sudo -k</font>

If you are simply wondering what kind of privileges are defined for your username, you can type:

<font color="blue">sudo -l</font>

This will list all of the rules in the /etc/sudoers file that apply to your user. This gives you a good idea of what you 
will or will not be allowed to do with sudo as any user.

There are many times when you will execute a command and it will fail because you forgot to precede it with "sudo". 
To avoid having to re-type the command, you can take advantage of a bash functionality that means "repeat last command":

<font color="blue">sudo !!</font>

The double exclamation point will repeat the last command. We preceded it with sudo to quickly change the unprivileged 
command to a privileged command.

For some fun, you can add the following line to your sudoers file with visudo:

<font color="blue">sudo visudo</font>

Defaults    insults
This will cause sudo to return a silly insult when a user types in an incorrect password for sudo. We'll use sudo -k 
to clear the previous sudo cached password to try it out:

sudo -k
sudo ls
[sudo] password for demo:    # enter an incorrect password here to see the results
Your mind just hasn't been the same since the electro-shock, has it?
[sudo] password for demo: 
My mind is going. I can feel it.



<font color="red"><u>CONCLUSION</u></font>

You should now have a basic understanding of how to read and modify the sudoers file, and a grasp on the various 
methods that you can use to obtain root privileges.

<font color="green">Remember, super-user privileges are not given to regular users for a reason. It is essential 
that you understand what each command does that you execute with root privileges. Do not take the responsibility lightly. 
Learn the best way to use these tools for your use-case, and lock down any functionality that is not needed.</font>


<img src="/images/diagnostics_visudo.png" width="900" height="600" /></a>
