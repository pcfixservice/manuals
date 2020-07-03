<meta http-equiv="Content-Type" content="t/html; charset=UTF-8" />

		 <html>

	<head>
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
	<TITLE></TITLE>
	<link href="stylesheets/common.css" type="text/css" rel="stylesheet">
	</head>

	<body class='navbar'><div id="hdr"><div id="hdr_container">
	<br>
	<p id="hdr_home"><h1><FONT COLOR=blue>Bug , Feature request, Hard Consult</FONT> <span>Creation</span></h1></a></p>
	<br><br>
	</div>
	</div>

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
#wrapper{
                                text-align: auto;
                                text-decoration:none;
				white-space: pre-line;
                                font-family:'Helvetica', Arial, sans-serif;
                                font-size:13px;
                                padding: 10px 5px;

}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<pre>  
<font color="red"></font>
<font color="blue"></font>
<u></u>
<font size="6"></font>
<ul id="menu"> 


<li>

<font color="blue"></font>

Cloud case consult templates
Edited 2018-10-24
go/gcp_consults

This article includes consult templates for several types of cases, including a general template, adding a website field or external users to Google Cloud Support Center (GCSC), 
bug update requests, feature requests (bug creation), and public issue feature requests (bug creation). Details about populating these templates are in Cloud case consult details,
 and a link from each template to the details appears in the template item, "Link to KB details article," which supports copy-paste the template to Salesforce, including the usable link.

If using the templates from this page, please remove the template text (anything in bold italic black text) that isn't relevant, and remove sections that aren't useful for your specific consult. 
This makes the consult more concise and will lead to higher consult quality.

TIP: If times provided to you by the customer are not in US/Pacific time zone, please convert all times to US/Pacific. This speeds up the response of TSEs, as all internal monitoring and logging are in this timezone.

FTC: TSE QQ
Tag: [QQ]

App ID / Project ID:

App Version/Module or VM Instance:

Issue Summary:

Link to KB details article: http://goto.google.com/gcp_consults_details#ftc_qq

Question(s) that need to be answered by TSEs:

1.

2.

Mini Templates:

Background info:

-

Research I've done:

-

Closed Incident Root Cause/Detail
Mini template:

Product name:

Incident number:

Asking TSE for root cause or detail or else

Ref: https://cloud-status.googleplex.com/google-cloud/admin

How to get product name and incident number:

The screenshot below isn't being displayed ( b/111131619). Go to http://screen, and then reload this page.

Incident information

FTC: Bug Update Request
Consult Subject: [FTC] Bug Update Request

Bug number:

Update Request:

Link to KB details article: http://goto.google.com/gcp_consults_details#ftc_bug_update_request

Next Steps for TSEs: Please provide us with any new information concerning this bug.

General: Action Needed
Tag: [AN]

App ID / Project ID:

App Version/Module or VM Instance:

Issue Summary:

Link to KB details article: http://goto.google.com/gcp_consults_details#general-action-needed

Actions to be taken by TSEs:

Mini Templates:

Relevant Details:

-

Steps to Reproduce the Issue:

1.

Troubleshooting Steps I’ve Taken:

-

Logs - Screenshots:

[1]

Research I’ve done:

-

General: Determine Expected Behavior
Tag: [EB]

TSEs, please:

Confirm if observed behavior is expected

If not, what additional (if any) information will be needed to file a bug

Link to KB details article: http://goto.google.com/gcp_consults_details#general-determine-expected-behavior

Product:

Component:

Mini Templates:

Time window (or date) for observed behavior:

Observed behavior:

Expected behavior:

Steps to reproduce:

1.

Other details:

General: Quota Increase Request (QIR)
Please stop reading if you are consulting for QI request for following products:

Compute Engine. Please use go/gce-quotas
Translate API. Please use the Handle quota increase requests for Google Translate API
Cloud Search Index size. Please use Increase Search API Index size
BigQuery. Please use go/bq-quotas
IMPORTANT: Before processing any quota, please check that the requester is a member of the project in Google Admin. If not, please clarify with the requester why they requested quota change for the particular project.

Tag: [QIR]

App ID / Project ID:

Product:

Component:

Link to KB details article: http://goto.google.com/gcp_consults_details#general-quota-increase-request-qir

Quota Type:

Desired Quota:

Current Usage:

Justification:

Relevant Details:

-

QIR Mini Templates

Currently all QIR’s are covered by the standard template. More will be added as needed. If one needs to be added, contact your support staff to update the article.

General: Case Takeover Request
Consult Subject: [CT] Case Takeover Request

Reason for takeover:

Link to KB details article: http://goto.google.com/gcp_consults_details#general-case-takeover-request

Additional information:

Next Steps for TSEs: Please take over the case and retain case ownership until closure.

Bug Creation: Defect Report
NOTE: Choose the appropriate title. If the source is from the Public Issue Tracker use ‘[PIT] Defect Report - Bug Creation’ otherwise use the tag [DR] with an appropriate title.

Tag/Consult Subject: [DR] / [PIT] Defect Report - Bug Creation

Product:

Link to KB details article: http://goto.google.com/gcp_consults_details#bug-creation-defect-report

Link to public tracker bug:

Link to reproduction:

Explain the problem as you understand it:

Current behavior and steps to reproduce:

Expected functionality:

Next Steps for TSEs: Please locate or file a bug for the above issue, and provide us with its number and status. More information can be found in the KB article https://goto.google.com/associate-public-issues-with-buganizer

Bug Creation: Feature Request
NOTE: Choose the appropriate title. If the source is from the Public Issue Tracker use ‘[PIT] Feature Request - Bug Creation’ otherwise use the tag [FR] with an appropriate title.

Tag/Consult Subject: [FR] / [PIT] Feature Request - Bug Creation

Product:

Link to KB details article: http://goto.google.com/gcp_consults_details#bug_creation_feature_request

Link to public tracker bug:

Summary:

Business impact for users:

Task the customer wishes to accomplish:

Current functionality if applicable:

Current customer workaround(s):

Next Steps for TSEs: Please locate or file a feature request bug with the above functionality, and provide us with its number and status. More information can be found in the KB article https://goto.google.com/associate-public-issues-with-buganizer

Stack Exchange: Question
Tag/Consult Subject: [SX] 1:Many Stack Exchange question help required.

Product:

Link to KB templates article: http://goto.google.com/gcp_consults_details#stack-exchange-question

Link to question:

Summary:

Research already done:

Specific request:

Next Steps for TSEs: Do not take this consult while other paid consults are pending. Please take a look at the above question and provide details of an answer/comment. You may also answer directly if you wish - if you do please note that on the consult.

Architectural Consult
Usage: Architectural questions arise when a customer is creating a design for a new application or changing an application design to meet changed requirements such as new features or better scalability. The customer may be asking for advice choosing between different services or other high level decisions. If you do not feel able to address the customer concerns consult with this template to

Subject: [AC] Architectural consult

Customer project goal:

Describe what the customer is trying to achieve as an end goal. For example this could be "A webservice to provide user matching for a online game." Don't include implementation details, but do include as much as possible about the project's intent.

Usage estimates:

Describe QPS rates to services, number of objects to store, size of payloads, geographic distribution of end users and any other metric that the customer is able to predict about the service.

Existing infrastructure to augment and/or replace:

If the customers is constrained by a requirement to interoperate with an existing system or the project is intended to replace an existing component, describe the existing infrastructure here. If possible please include location, for example whether something is in GCP, another cloud or their own datacenter.

Customer proposed architecture:

Often customer has an architecture in mind. For example they may think the best solution is to use HTTP LB, to a pool of GCE instances, backed by GCS. We will try and stick to their plan unless we can see potential issues with it. Please include region/zone info if possible.

Current customer concerns:

If the customer has concerns about their architecture or the capabilities of GCP, describe them here. If you have already questions answered based on the docs or your own knowledge, please still include their question but add [answered] at the end.

Hand off requested:

If you feel an ongoing discussion is needed please request the TSE take over the case. If you feel the gathered information is sufficient to make a full answer, say no and the TSE will provide answers.

Action required: Address customer concerns, note any pitfalls in customer proposed architecture, provide suggestions for architecture if appropriate. If required, engage Solutions Architects

EAP Candidate Consult
Usage: If you find an Early Access Preview (EAP) product or feature documented on the Cloud Support site that would solve a customer issue, you can consult to see if the customer can be given access to it. EAPs are confidential and admission is not guaranteed, so do not describe the EAP or offer it to the customer without a response to the consult directing you to do this. You can say something like "I am aware of some development work that might help, I'm going to reach out to the product team to see if we can use it here."

Subject: [EAP] Can Customer join <EAP NAME>

EAP requested:

Specify the EAP feature you think the customer is suitable for. Link to any documents on the EAP that you have found to help TSE research it.

Reason for suitability:

Why would the customer be good for this EAP? Example reasons include that the customer requested a feature already in EAP or the EAP would solve an issue they are having.

Customer Contact:

Specify an email address for the customer. If the product team decides to include the customer on the EAP they will reach out using this address.

Customer Project:

Specify the project(s) that the customer would use the EAP in.

Steps for TSE:

Verify the EAP still exists and is appropriate for the customer.
Find the TPM (or PM if no TPM available) for the EAP. The Ariane launch for the EAP is a good place to find it.
Reach out to them suggest including this customer in the EAP. CC the vendor.
If the TPM/PM says yes, ensure there is agreement on how the EAP will be communicated to the customer.
Product Specific Mini Templates
These templates are used in conjunction with other templates and should never be sent on their own.

Link to KB details article: http://goto.google.com/gcp_consults_details#product_specific_mini_templates

BigQuery
Time frame:

JobID:

Query:

Dataset/Table:

CloudSQL
Instance name:

Instance properties:

Time frame:

Cloud Storage
Issue frequency (transient, permanent, etc.):

Debug output:

Affected object paths:

Upload IDs (look into request headers and debugging output of gsutil):

GKE Google Kubernetes Engine
Cluster Name:

Zone:

Namespace:

Cluster-hash URL (go/gke-cluster-hash):

Managed VMs
Runtime used:

Dockerfile:

Version of the cloud SDK:

Their ".dockercfg" file:

(If the issue has to do with deployment) 5. The output of a deployment with --verbosity DEBUG:

Pub/Sub
Topic name:

Subscription name:

Dataflow
NOTE: The fields below are mandatory for all Dataflow consults unless marked as if applicable/relevant.

Job ID:

Batch or Streaming job?:

SDK language/version:

GCP and external services used (if relevant):

Issue description:

Time of the issue in Pacific Time (if applicable):


App ID / Project ID: boxwood-complex-208616 

App Version/Module or VM Instance: 

Issue Summary: Customer is reporting duplicate container names in the cluster, 

Warning Failed 30m kubelet, gke-production-primary-8bd188e2-vqv1 Error: Error response from daemon: Conflict. The container name "/k8s_crowd-redis-slave_crowd-redis-slave-bccb485ff-k7qgm_crowd_26f61c1f-8b85-11e9-ba84-42010a8e00a0_3" is already in use by container "b7f897bface9c76340ac1fd112810a273accdde0c9195f6cd351dc5661c9e3ca". You have to remove (or rename) that container to be able to reuse that name. 

Link to KB details article: http://goto.google.com/gcp_consults_details#ftc_qq 

Question(s) that need to be answered by TSEs: 

1. Is there a way to avoid container naming conflicts? 
2. why don't GKE does not resolve this errors? 

Mini Templates: 

Cluster Name: this happens on all our clusters 

Zone: us-east1, australia-southeast1 

Namespace: 

Cluster-hash URL (go/gke-cluster-hash): 


Background info: 

Please assign this case directly to Ivan Gonzalez (gonzalezivan@google.com) 

Research I've done: 

https://kubernetes.io/docs/concepts/containers/images/#updating-images 
https://kubernetes.io/docs/concepts/configuration/overview/#container-images 
https://kubernetes.io/docs/tasks/run-application/force-delete-stateful-set-pod/#delete-pods 

1.- I told the customer to specify a different tag number before execute the deployment to avoid a name conflict. 
2.- As a workaround I suggest to delete the pod with the following command 
for pod in $(kubectl get pods -o name); do kubectl describe $pod | grep -ie "{containerhash}"; done 

However, same situation arises again
