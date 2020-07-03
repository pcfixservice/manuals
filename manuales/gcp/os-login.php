
<meta http-equiv="Content-Type" content="t/html; charset=UTF-8" />

                 <html>

        <head>
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
        <TITLE></TITLE>
        <link href="stylesheets/common.css" type="text/css" rel="stylesheet">
        </head>

        <p id="hdr_home"><h1><FONT COLOR=blue>GKE</FONT> <span> - notes</span></h1></a></p>
        </div>


<style type="text/css" media="screen">
#wrapper{
align: left;
  font-family: 'Bowlby One SC';
  margin: adjust;
  background: white;
  font-size: 17px;
}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<pre>  
<font color="red"></font>
<font color="blue"></font>
<u></u>
<font size="6"></font>
<ul id="wrapper"> 


<li>

Service account
In short, OS Login allows SSH access for IAM users - there is no need to provision Linux users on an instanceSo Ansible should have 
access to the instances via IAM user. This is accomplished via IAM service account.

<font color="red">------------------------------------------------------</font>
$ gcloud iam service-accounts create ansible-sa \
     --display-name "Service account for Ansible"

<font color="red">------------------------------------------------------</font>
Compute Instance Admin (beta)
Compute Instance Admin (v1)
Compute OS Admin Login
Service Account User

for role in \
    'roles/compute.instanceAdmin' \
    'roles/compute.instanceAdmin.v1' \
    'roles/compute.osAdminLogin' \
    'roles/iam.serviceAccountUser'
do \
    gcloud projects add-iam-policy-binding \
        my-gcp-project-241123 \
        --member='serviceAccount:ansible-sa@my-gcp-project-241123.iam.gserviceaccount.com' \
        --role="${role}"
done

<font color="red">------------------------------------------------------</font>

$ gcloud iam service-accounts keys create \
    .gcp/gcp-key-ansible-sa.json \
    --iam-account=ansible-sa@my-gcp-project.iam.gserviceaccount.com

<font color="red">------------------------------------------------------</font>

$ ssh-keygen -f ssh-key-ansible-sa

<font color="red">------------------------------------------------------</font>

$ gcloud auth activate-service-account \
    --key-file=.gcp/gcp-key-ansible-sa.json

<font color="red">------------------------------------------------------</font>

$ gcloud compute os-login ssh-keys add \
    --key-file=ssh-key-ansible-sa.pub

<font color="red">------------------------------------------------------</font>

$ gcloud config set account your@gmail.com

<font color="red">------------------------------------------------------</font>

$ gcloud iam service-accounts describe \
    ansible-sa@my-gcp-project.iam.gserviceaccount.com \
    --format='value(uniqueId)'
106627723496398399336

<font color="red">------------------------------------------------------</font>

$ ssh -i .ssh/ssh-key-ansible-sa sa_106627723496398399336@10.0.0.44
...

sa_106627723496398399336@instance-1:~$ # Yay!
