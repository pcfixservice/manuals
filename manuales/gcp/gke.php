
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
  font-size: 1vw;
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

<font color="red">###################################################################################</font>
Node not scaled down, resulting in wasted cost
<font color="red">###################################################################################</font>
Cluster Name: public
Project name:  ai2-beaker
Zone: us-west1-b
Instance Names (If Applicable): gke-public-memory-16x-p100-1x-blue-4b2026c6-sq35
Namespace (If Applicable):
Workload Type (ie, job, deployment, service)(if Applicable):  GPU
Workload Name (if Applicable): 
Hello all,
We just noticed that the above node has been scaled up since April, despite having no user pods running.  The node pool is configured to have 0 nodes minimum and we are quite confused as to why this is still running.  IN fact, this entire node pool was made inactive on May 22 as we migrated over to our "green" set of node pools at this time and no user jobs have been sent there since.
1) We have left the node up for investigation. Can we get to the bottom as to why this node is not scaled down?
2) Can we explore a refund, as GPU nodes are quite expensive? And this seems to be a problem on the autoscaler side


scale down status

<font color=#01DFA5>kube-env</font>

ALLOCATE_NODE_CIDRS: "true"
API_SERVER_TEST_LOG_LEVEL: --v=3
AUTOSCALER_ENV_VARS: kube_reserved=cpu=110m,memory=8029Mi,ephemeral-storage=100Gi;node_taints=nvidia.com/gpu=present:NoSchedule;node_labels=beaker.org/gpu-type=p100-1x,beaker.org/node-type=memory-16x,beaker.org/nodepool-color=blue,beta.kubernetes.io/fluentd-ds-ready=true,beta.kubernetes.io/masq-agent-ds-ready=true,cloud.google.com/gke-accelerator=nvidia-tesla-p100,cloud.google.com/gke-nodepool=memory-16x-p100-1x-blue,cloud.google.com/gke-os-distribution=cos,projectcalico.org/ds-ready=true
CA_CERT: LS0tLS1CRUdJTiBDRVJUSUZJQ0FURS0tLS0tCk1JSURDekNDQWZPZ0F3SUJBZ0lRQnpuOERCZUZrdUgzcFdEcDFqQWdNakFOQmdrcWhraUc5dzBCQVFzRkFEQXYKTVMwd0t3WURWUVFERXlReU1tWmhObUkyWXkwM1pUa3dMVFF6T1dZdE9EY3dPUzFsTnpVMk5ESmtZakkyWXpRdwpIaGNOTVRnd09ERTNNVGN4TnpFeVdoY05Nak13T0RFMk1UZ3hOekV5V2pBdk1TMHdLd1lEVlFRREV5UXlNbVpoCk5tSTJZeTAzWlRrd0xUUXpPV1l0T0Rjd09TMWxOelUyTkRKa1lqSTJZelF3Z2dFaU1BMEdDU3FHU0liM0RRRUIKQVFVQUE0SUJEd0F3Z2dFS0FvSUJBUUQzUHh2dEZqcG94d2JYblhCelA4RjIrSHQyQTZ6cmFoV003ZnNiZkV5RwpySUZ0MlZiZmYrMHpVR2dubk1GZU5Rb2FKb2ZDUUhJS05rNW41cHlZc0lEY1krWmUyL1NUS0NBdkRlWnd1Qkc1CkpyY2tsenY5akVZbnZyWXRxQWRjV2NNcUVSNENKNUpXUXBRWTE2WXpsbUpSMDgyQzYzWk56dTRZaGg1V1dOVlUKdGpYZGxwUTRQbDRPekZXb25LcTYvaU95cm1tMitpQzUxdVd3Y3VMSjNuQ1ZCQU14R0NCa3k5ZWxYWXVIMEtzWQp4ZmhCR3k3L29YWXdOb0Y3c1dOVXdzMWh5L3hrUGxJZ2RpMDdFV2VnT241TlNORzhXZlRycnFRWE1Ibm1HUDNHCnRqRnJsMnBOaDYxNXVBVnVVY1lmOUF0ZnRPREdDbFVMTnQzeld4dXMxRXI5QWdNQkFBR2pJekFoTUE0R0ExVWQKRHdFQi93UUVBd0lDQkRBUEJnTlZIUk1CQWY4RUJUQURBUUgvTUEwR0NTcUdTSWIzRFFFQkN3VUFBNElCQVFERApGeGFrVWhFVlpIM3VZWDN0N21qT3dZZDJWV2lOL2hkbGtVL29CdlYvQmpSemZ3OXZKbms1Y3B4eWRHQUJmOTRsCktSY0tLcUZCdEhldUc1WFd6bWJjVDZkc0dxclFJOVJ0K2d5a2ZWY1NhdHN4VVl0UHBEZk5LWDd0bWc3WElkOU4KZGJWMjkvdlpwNE9UN0d5d3pHMEJUOEE5Y25MeWh6dFRiZXlWNkNoNjQ2ZXRuU0tpeDdxclU4UnphUThDbzJuUwpOSjRxakZWOHorNjZWV2dwNmNJbXBCU2VQU2NhdWpRLzNua0hrZzV3d3NscjJPVmgxUVdwNVRxRnVmUkpMb2FSCm54aU0wZkczMlF1MloxMTJ5ZWdOTDNoK3pvbFVzSmIrZ1BrSjVEUlgxZnY0T2I2bFdJaEJHR1BXV1RlT25rbFYKQ0phd3ZyNkk1R0hmVWo4L2d5VWQKLS0tLS1FTkQgQ0VSVElGSUNBVEUtLS0tLQo=
CLUSTER_IP_RANGE: 10.192.0.0/12
CLUSTER_NAME: public
CREATE_BOOTSTRAP_KUBECONFIG: "true"
DNS_DOMAIN: cluster.local
DNS_SERVER_IP: 10.32.16.10
DOCKER_REGISTRY_MIRROR_URL: https://mirror.gcr.io
ELASTICSEARCH_LOGGING_REPLICAS: "1"
ENABLE_CLUSTER_DNS: "true"
ENABLE_CLUSTER_LOGGING: "false"
ENABLE_CLUSTER_MONITORING: none
ENABLE_CLUSTER_REGISTRY: "false"
ENABLE_CLUSTER_UI: "true"
ENABLE_L7_LOADBALANCING: glbc
ENABLE_METADATA_AGENT: ""
ENABLE_METRICS_SERVER: "true"
ENABLE_NODE_LOGGING: "false"
ENABLE_NODE_PROBLEM_DETECTOR: standalone
ENABLE_NODELOCAL_DNS: "false"
ENV_TIMESTAMP: "2018-08-17T18:17:12+00:00"
EXTRA_DOCKER_OPTS: --insecure-registry 10.0.0.0/8
FEATURE_GATES: DynamicKubeletConfig=false,DevicePlugins=true,RotateKubeletServerCertificate=true,ExperimentalCriticalPodAnnotation=true
FLUENTD_CONTAINER_RUNTIME_SERVICE: containerd
HEAPSTER_USE_NEW_STACKDRIVER_RESOURCES: "false"
HEAPSTER_USE_OLD_STACKDRIVER_RESOURCES: "false"
HPA_USE_REST_CLIENTS: "true"
INSTANCE_PREFIX: gke-public-6d02e029
KUBE_ADDON_REGISTRY: gcr.io/google-containers
KUBE_MANIFESTS_TAR_HASH: 7f89bc2e655d7edab8677505dd0b0a36f66ac484
KUBE_MANIFESTS_TAR_URL: https://storage.googleapis.com/kubernetes-release-gke/release/v1.12.6-gke.10/kubernetes-manifests.tar.gz,https://storage.googleapis.com/kubernetes-release-gke-eu/release/v1.12.6-gke.10/kubernetes-manifests.tar.gz,https://storage.googleapis.com/kubernetes-release-gke-asia/release/v1.12.6-gke.10/kubernetes-manifests.tar.gz
KUBE_PROXY_TOKEN: SI072prxxpUYbYUGPtFDSr3EATEEkGLY3clqQY2n2wk=
KUBELET_ARGS: --v=2 --cloud-provider=gce --experimental-mounter-path=/home/kubernetes/containerized_mounter/mounter
  --experimental-check-node-capabilities-before-mount=true --cert-dir=/var/lib/kubelet/pki/
  --cni-bin-dir=/home/kubernetes/bin --allow-privileged=true --kubeconfig=/var/lib/kubelet/kubeconfig
  --experimental-kernel-memcg-notification=true --max-pods=110 --non-masquerade-cidr=0.0.0.0/0
  --network-plugin=cni --register-with-taints=nvidia.com/gpu=present:NoSchedule --node-labels=beaker.org/gpu-type=p100-1x,beaker.org/node-type=memory-16x,beaker.org/nodepool-color=blue,beta.kubernetes.io/fluentd-ds-ready=true,beta.kubernetes.io/masq-agent-ds-ready=true,cloud.google.com/gke-accelerator=nvidia-tesla-p100,cloud.google.com/gke-nodepool=memory-16x-p100-1x-blue,cloud.google.com/gke-os-distribution=cos,projectcalico.org/ds-ready=true
  --volume-plugin-dir=/home/kubernetes/flexvolume --registry-qps=10 --registry-burst=20
  --bootstrap-kubeconfig=/var/lib/kubelet/bootstrap-kubeconfig --node-status-max-images=25
KUBELET_CERT: LS0tLS1CRUdJTiBDRVJUSUZJQ0FURS0tLS0tCk1JSUMzRENDQWNTZ0F3SUJBZ0lSQUxSZk1qRjROV1dNWldNZGpGRy9zQmd3RFFZSktvWklodmNOQVFFTEJRQXcKTHpFdE1Dc0dBMVVFQXhNa01qSm1ZVFppTm1NdE4yVTVNQzAwTXpsbUxUZzNNRGt0WlRjMU5qUXlaR0l5Tm1NMApNQjRYRFRFNE1EZ3hOekU0TVRjeE0xb1hEVEl6TURneE5qRTRNVGN4TTFvd0VqRVFNQTRHQTFVRUF4TUhhM1ZpClpXeGxkRENDQVNJd0RRWUpLb1pJaHZjTkFRRUJCUUFEZ2dFUEFEQ0NBUW9DZ2dFQkFMNXU5OTlhbDgrU2J0VVMKaklVTG44cElEU2RhTUEzMWRKdXVzR1V0d3UzeE9BVzZabXViOU93UDBHSURqTEthRUhPYUNxVDk2Zkc3WmRSNwo3NE93cUZ5Nzh5N3dBZWNza2NCalprS0o5WnJiMGxZam13bFRaUURNdndWcEFLb0p3QXJKWFAzQVErLzVWa1N3CjgyZkJCN1VkNi9xWXg0V0daRytOai9JcEdMc3ppWVRlamQzSkRwV1F3K0Q4RVNMRmYwby9iSmdRRi9RSVlGbm8KNWRRY2ZzTkYzLzJKZFZkaDcxWWphditvdHJsL1hMTHJFVDZGQURKc3J4dmdvbXRxUGJrZlBITzVMbVZ3dE1QaAorMHdiVEFROW1wNHJ1YS9YenlWYmJMK2k5YURYdmQwSVV2bUI4Mmd5WU9URkszMU9paDlHdWNuWnBhY2xJYllzCm0xbzZ4U01DQXdFQUFhTVFNQTR3REFZRFZSMFRBUUgvQkFJd0FEQU5CZ2txaGtpRzl3MEJBUXNGQUFPQ0FRRUEKNTJscHFyMHFWMnUyVWIrK2VLV2M5U0dHMmRrbXQyNDN5bDZHdkgxZWUxc05RZVpwVUZFWlFXNnVHekFUSldYZQpCU3hjeHUycXI4UDVxeHB4Z29Ocno2OXh5QThDck5lOVcwTExSQnR5ZU5VVmxHamxWUE1vUnpGRVVrME43TGNPCjR6ZndRWC91NnQyS2FiNHgxSkc0Q0F4VVVJamRKWVp6U3pYS1hNNThJOWVDRWJLY2ZPZk82WWhDOTJaWEttTTcKemVjSGQ4eit0OStuMW8vM2FIT3E4TkMwVndMY1h3UnJEV2ltaGxkZERRbU14eUIwRDN2bUVEcWdNNFBGeHd0NwpxN1pHa2JrRFlINnduclk0a1BaYll1L0VwTHZ0eWRSeXBwdjE3TDZFSzBiSnlWUzZtT21hK1hmbzlwSDdWaXdMCm4xanVLYzB5V3VTdGM0WDJSTlZESlE9PQotLS0tLUVORCBDRVJUSUZJQ0FURS0tLS0tCg==
KUBELET_KEY: LS0tLS1CRUdJTiBSU0EgUFJJVkFURSBLRVktLS0tLQpNSUlFcEFJQkFBS0NBUUVBdm03MzMxcVh6NUp1MVJLTWhRdWZ5a2dOSjFvd0RmVjBtNjZ3WlMzQzdmRTRCYnBtCmE1djA3QS9RWWdPTXNwb1FjNW9LcFAzcDhidGwxSHZ2ZzdDb1hMdnpMdkFCNXl5UndHTm1Rb24xbXR2U1ZpT2IKQ1ZObEFNeS9CV2tBcWduQUNzbGMvY0JENy9sV1JMRHpaOEVIdFIzcitwakhoWVprYjQyUDhpa1l1ek9KaE42TgozY2tPbFpERDRQd1JJc1YvU2o5c21CQVg5QWhnV2VqbDFCeCt3MFhmL1lsMVYySHZWaU5xLzZpMnVYOWNzdXNSClBvVUFNbXl2RytDaWEybzl1Ujg4YzdrdVpYQzB3K0g3VEJ0TUJEMmFuaXU1cjlmUEpWdHN2Nkwxb05lOTNRaFMKK1lIemFESmc1TVVyZlU2S0gwYTV5ZG1scHlVaHRpeWJXanJGSXdJREFRQUJBb0lCQUJ4Zmd6MzdqUGZuM095UgpOVytUUWswTXZDejdVb0taNmpSUjdFVSs4cmFxQkl0UjhQV2lpSFR0akVJMlBpM1VKNVJaeExFOWhiQTNHQjUzCkVzSWZ2WTRIa04yUzgrMmlKZHN3MUNrZ3pmK3pOZDBRdEFaSkx4alY2TFloSlhDd1FEVTdPRWcwYjhyZTd2d1EKRTB3SHBpTFZvUFcyOHE5UnpVQVRxdmxOSnpxbzJvdmFwOGpDeDVpQVdVcHhQTTJBSnFmSjBIcFcyNjh1L3YwMgpIRWtuempCbXhISkFKNHN6TndybkdpZlVpaUVWM1Q3TDh5YjVhbnFwbTN4bHZpNk9ERTlId0x0VVVHaURxTXZOCmdZYjBWT3pVaVhPc3V1Z2NIeDBuTSttTWEwSGJYSm9zYXpTbFl1anVpWGVxREpvV3MyaXVNb3ZjaTh4azJ0U04KVCs0aHVQRUNnWUVBOFZUUlVDV0Zxd0NJaGJUSzlaakFNRjhqYmtqNDEveGorbFRCZDM5UlJDcGw0eWZFSXc4ZQoyTU12ZXh3VXdjd3QxZlRidGhpVSs4SExtMG1CU2tLZFNrWEQ0RHN4YU5BUHFPeGtpUGtnQzlPWnZ3b2pVVkhFCitVWmhGZzVYbUdQNnVMb0hJSkZjNkUxd0ozUU1DQ2lrZ1czWFdOam41K2JvdUplMEpZZSt2bE1DZ1lFQXlnSXEKZTZYRDRtTnhndUYvWmtRQ0ljS3UwU3Z3QTg5MWtkWk5CdDdNeXZ2enBEN3owc3B3R04xdXlsV1VUSE5hN2dJMQpBVzhsM29CVXgrVmZ3d09HeUpwTkhGcGdOM05FdVNxR21kVzM0Mk9pU2xkZnd4SWlVdlhSYkxWbTN4S0JpUk14CjdOWlNMTm5pbEUzOEU4UmVZamN4alZOalp4UGtTYm5pT01iQzQvRUNnWUVBcHhHcTNpczd3RWhjT3dRUVJibjcKd3dENkRFMWtTRkluL0pOVVpCKzE2TlRaT0VxOVUvQVIwTW8vUXFFTUZhWCtUVko0RURZd1hhR3FETlQwTnE2cgpLVkhtNm9MUUQ5bUtIYzJaUStJRHQyeEQwYWQ1RDhEbDloUXMvaEhydmtub3RwM0NkVjlzekQxZjJWQlRUQXFtCjZCdGNxOXR0b0hPUXhNbnhJdEk0MEpVQ2dZQit6SWRBSDlmcUZjT2RoTkFFTURJcVlOcDh2NWlqdTZndng1V0gKOTNnUy9iMThYbXVMNTdnZlUzY0VtRjFDODdHaTdrMjVQYnhHZ3NVMHlGeW91MkR5TURDdzJHWEd5SnJkbzd6agplUXc1TmtRYlorYmJPbG5ET3p1ZWdlczFvSmNncEtUVTVkNmsrb3RIemYrcHBMd2Q2RWs1VFp0Nml6ampza00yCm9rU1k4UUtCZ1FDbG1SRlJycXJqZkRpcUl6M2pQZDk2bldDU2xQOGhYTGdNT3BxM2RISmp5L2lHRW85Vk5UT20KUXZYdFg0RVVFSVdTektQN2V4UnFrL0RUbFBOQWkvWHJkZVR3V2RJZ0xTSjA0V3VKczBJR3FmMXp6S2ljMFlqcwpsSnFqMVlaZGhTdS9IbDBrK1k2SVBWWjIwaFJ1aWZCMHhObUhmQ0ErcThOemFiV2h2dHVDeVE9PQotLS0tLUVORCBSU0EgUFJJVkFURSBLRVktLS0tLQo=
KUBERNETES_MASTER: "false"
KUBERNETES_MASTER_NAME: 35.233.255.238
LOGGING_DESTINATION: ""
LOGGING_STACKDRIVER_RESOURCE_TYPES: ""
MONITORING_FLAG_SET: "true"
NETWORK_POLICY_PROVIDER: calico
NETWORK_PROVIDER: cni
NODE_LOCAL_SSDS_EXT: ""
NODE_PROBLEM_DETECTOR_TOKEN: 2DK4GhH1sUTRxtLe91G3YoU_Xk9h0nxyJtsA5ruVGrQ=
NODE_TAINTS: nvidia.com/gpu=present:NoSchedule
NON_MASQUERADE_CIDR: 0.0.0.0/0
REMOUNT_VOLUME_PLUGIN_DIR: "true"
REQUIRE_METADATA_KUBELET_CONFIG_FILE: "true"
SALT_TAR_HASH: ""
SALT_TAR_URL: https://storage.googleapis.com/kubernetes-release-gke/release/v1.12.6-gke.10/kubernetes-salt.tar.gz,https://storage.googleapis.com/kubernetes-release-gke-eu/release/v1.12.6-gke.10/kubernetes-salt.tar.gz,https://storage.googleapis.com/kubernetes-release-gke-asia/release/v1.12.6-gke.10/kubernetes-salt.tar.gz
SERVER_BINARY_TAR_HASH: 073d2656119e5ec372997a2775ac0b4501824f38
SERVER_BINARY_TAR_URL: https://storage.googleapis.com/kubernetes-release-gke/release/v1.12.6-gke.10/kubernetes-server-linux-amd64.tar.gz,https://storage.googleapis.com/kubernetes-release-gke-eu/release/v1.12.6-gke.10/kubernetes-server-linux-amd64.tar.gz,https://storage.googleapis.com/kubernetes-release-gke-asia/release/v1.12.6-gke.10/kubernetes-server-linux-amd64.tar.gz
SERVICE_CLUSTER_IP_RANGE: 10.32.16.0/20
VOLUME_PLUGIN_DIR: /home/kubernetes/flexvolume
ZONE: us-west1-b

<font color=#01DFA5>Kubelet-config:</font>

	
apiVersion: kubelet.config.k8s.io/v1beta1
authentication:
  anonymous:
    enabled: false
  webhook:
    enabled: true
  x509:
    clientCAFile: /etc/srv/kubernetes/pki/ca-certificates.crt
authorization:
  mode: Webhook
cgroupRoot: /
clusterDNS:
- 10.32.16.10
clusterDomain: cluster.local
configMapAndSecretChangeDetectionStrategy: Cache
enableDebuggingHandlers: true
evictionHard:
  memory.available: 100Mi
  nodefs.available: 10%
  nodefs.inodesFree: 5%
featureGates:
  DevicePlugins: true
  DynamicKubeletConfig: false
  ExperimentalCriticalPodAnnotation: true
  RotateKubeletServerCertificate: true
kind: KubeletConfiguration
kubeReserved:
  cpu: 110m
  ephemeral-storage: 100Gi
  memory: 8029Mi
readOnlyPort: 10255
serverTLSBootstrap: true
staticPodPath: /etc/kubernetes/manifests


Creation time of the node ke-public-memory-16x-p100-1x-blue-4b2026c6-sq35 May 23, 2019, 1:31:08 PM --- internal 10.32.0.24 (nic0), external 35.197.36.154 --- 1 x NVIDIA Tesla P100
nstance Id: 5968605509568911364
Machine type: n1-highmem-16 (16 vCPUs, 104 GB memory)gke-public-memory-16x-p100-1x-blue-4b2026c6-grp

instance group gke-public-memory-16x-p100-1x-blue-4b2026c6-grp us-wext1-b instances 1, creation time Apr 4, 2019, 12:46:10, n used by public

I am also noticing that the same pod landed on another GPU node in the "internal" cluster: gke-internal-memory-16x-p100-1x-v2-gr-becc75c0-hflf.

Node pool name: memory-16x-p100-1x-blue

instance group creation:         Apr 4, 2019, 12:46:10
node creation:                   May 23, 2019, 1:31:08 PM
entire node pool inactive since: May 22             "no user jobs have been sent since there"


is it possible that the node that belongs to "public" cluster land in the "internal" cluster using this node gke-internal-memory-16x-p100-1x-v2-gr-becc75c0-hflf?


                                                                                                                                                                                        179,1         Bot









                                                                                                                                                                                        179,1         Bot
