(function(){var DEPS_GRAPH={'dcmenablermodule':[]};var f,k=this,l=function(a,b,c){a=a.split(".");c=c||k;a[0]in c||!c.execScript||c.execScript("var "+a[0]);for(var d;a.length&&(d=a.shift());)a.length||void 0===b?c[d]?c=c[d]:c=c[d]={}:c[d]=b},aa=function(){},ba=function(a){var b=typeof a;if("object"==b)if(a){if(a instanceof Array)return"array";if(a instanceof Object)return b;var c=Object.prototype.toString.call(a);if("[object Window]"==c)return"object";if("[object Array]"==c||"number"==typeof a.length&&"undefined"!=typeof a.splice&&"undefined"!=typeof a.propertyIsEnumerable&&
!a.propertyIsEnumerable("splice"))return"array";if("[object Function]"==c||"undefined"!=typeof a.call&&"undefined"!=typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("call"))return"function"}else return"null";else if("function"==b&&"undefined"==typeof a.call)return"object";return b},n=function(a){return"string"==typeof a},p=function(a){return"function"==ba(a)},ca=function(a,b,c){return a.call.apply(a.bind,arguments)},da=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,
2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},q=function(a,b,c){q=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?ca:da;return q.apply(null,arguments)},r=function(a,b){function c(){}c.prototype=b.prototype;a.ha=b.prototype;a.prototype=new c;a.ma=function(a,c,g){for(var d=Array(arguments.length-2),e=2;e<arguments.length;e++)d[e-2]=arguments[e];
return b.prototype[c].apply(a,d)}};var t=function(a){if(Error.captureStackTrace)Error.captureStackTrace(this,t);else{var b=Error().stack;b&&(this.stack=b)}a&&(this.message=String(a))};r(t,Error);var ea=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g,"")},fa=function(a,b){return a<b?-1:a>b?1:0};var ga=Array.prototype.indexOf?function(a,b,c){return Array.prototype.indexOf.call(a,b,c)}:function(a,b,c){c=null==c?0:0>c?Math.max(0,a.length+c):c;if(n(a))return n(b)&&1==b.length?a.indexOf(b,c):-1;for(;c<a.length;c++)if(c in a&&a[c]===b)return c;return-1},ha=Array.prototype.some?function(a,b,c){return Array.prototype.some.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=n(a)?a.split(""):a,g=0;g<d;g++)if(g in e&&b.call(c,e[g],g,a))return!0;return!1},ia=function(a){return Array.prototype.concat.apply(Array.prototype,
arguments)},ja=function(a){var b=a.length;if(0<b){for(var c=Array(b),d=0;d<b;d++)c[d]=a[d];return c}return[]};var ka=function(a){this.a=a};l("studio.common.mde.Direction",ka,void 0);ka.prototype.toString=function(){return(this.a&2?"b":"t")+(this.a&1?"r":"l")};l("studio.module.ModuleId",{ENABLER:"enabler",DCM_ENABLER:"dcmenabler",VIDEO:"video",CONFIGURABLE:"configurable",CONFIGURABLE_FILLER:"configurablefiller",LAYOUTS:"layouts",FILLER:"layoutsfiller",RAD_VIDEO:"rad_ui_video",GDN:"gdn"},void 0);var u=function(){};l("studio.common.Environment",u,void 0);u.Type={LIVE:1,LOCAL:2,BROWSER:4,IN_APP:8,LAYOUTS_PREVIEW:16,CREATIVE_TOOLSET:32,RENDERING_STUDIO:64,RENDERING_TEST:128,PREVIEW:256};var v=6;u.addType=function(a){v|=a;la(a)};var ma=function(a){v=a|6;la(v)};u.setType=ma;u.hasType=function(a){return(v&a)==a};u.getValue=function(){return v};var la=function(a){w(a,2,1);w(a,1,2);w(a,4,8);w(a,8,4);w(a,128,64);w(a,64,128);w(a,256,2)},w=function(a,b,c){(a&b)==b&&(v|=b,v&=~c)};var na="StopIteration"in k?k.StopIteration:{message:"StopIteration",stack:""},oa=function(){};oa.prototype.next=function(){throw na;};oa.prototype.g=function(){return this};var x=function(a,b){this.b={};this.a=[];this.f=this.c=0;var c=arguments.length;if(1<c){if(c%2)throw Error("Uneven number of arguments");for(var d=0;d<c;d+=2)this.set(arguments[d],arguments[d+1])}else if(a){var e;if(a instanceof x)e=a.m(),d=a.l();else{var c=[],g=0;for(e in a)c[g++]=e;e=c;c=[];g=0;for(d in a)c[g++]=a[d];d=c}for(c=0;c<e.length;c++)this.set(e[c],d[c])}};x.prototype.l=function(){y(this);for(var a=[],b=0;b<this.a.length;b++)a.push(this.b[this.a[b]]);return a};
x.prototype.m=function(){y(this);return this.a.concat()};var y=function(a){if(a.c!=a.a.length){for(var b=0,c=0;b<a.a.length;){var d=a.a[b];z(a.b,d)&&(a.a[c++]=d);b++}a.a.length=c}if(a.c!=a.a.length){for(var e={},c=b=0;b<a.a.length;)d=a.a[b],z(e,d)||(a.a[c++]=d,e[d]=1),b++;a.a.length=c}};x.prototype.get=function(a,b){return z(this.b,a)?this.b[a]:b};x.prototype.set=function(a,b){z(this.b,a)||(this.c++,this.a.push(a),this.f++);this.b[a]=b};
x.prototype.forEach=function(a,b){for(var c=this.m(),d=0;d<c.length;d++){var e=c[d],g=this.get(e);a.call(b,g,e,this)}};x.prototype.g=function(a){y(this);var b=0,c=this.f,d=this,e=new oa;e.next=function(){if(c!=d.f)throw Error("The map has changed since the iterator was created");if(b>=d.a.length)throw na;var e=d.a[b++];return a?e:d.b[e]};return e};var z=function(a,b){return Object.prototype.hasOwnProperty.call(a,b)};var pa=/^(?:([^:/?#.]+):)?(?:\/\/(?:([^/?#]*)@)?([^/#?]*?)(?::([0-9]+))?(?=[/#?]|$))?([^?#]+)?(?:\?([^#]*))?(?:#([\s\S]*))?$/,qa=function(a,b){if(a){a=a.split("&");for(var c=0;c<a.length;c++){var d=a[c].indexOf("="),e,g=null;0<=d?(e=a[c].substring(0,d),g=a[c].substring(d+1)):e=a[c];b(e,g?decodeURIComponent(g.replace(/\+/g," ")):"")}}};var ra=function(a,b){this.f=this.j=this.c="";this.i=null;this.g=this.h="";this.a=!1;var c;a instanceof ra?(this.a=void 0!==b?b:a.a,sa(this,a.c),this.j=a.j,this.f=a.f,ta(this,a.i),this.h=a.h,b=a.b,c=new A,c.c=b.c,b.a&&(c.a=new x(b.a),c.b=b.b),ua(this,c),this.g=a.g):a&&(c=String(a).match(pa))?(this.a=!!b,sa(this,c[1]||"",!0),this.j=B(c[2]||""),this.f=B(c[3]||"",!0),ta(this,c[4]),this.h=B(c[5]||"",!0),ua(this,c[6]||"",!0),this.g=B(c[7]||"")):(this.a=!!b,this.b=new A(null,0,this.a))};
ra.prototype.toString=function(){var a=[],b=this.c;b&&a.push(C(b,va,!0),":");var c=this.f;if(c||"file"==b)a.push("//"),(b=this.j)&&a.push(C(b,va,!0),"@"),a.push(encodeURIComponent(String(c)).replace(/%25([0-9a-fA-F]{2})/g,"%$1")),c=this.i,null!=c&&a.push(":",String(c));if(c=this.h)this.f&&"/"!=c.charAt(0)&&a.push("/"),a.push(C(c,"/"==c.charAt(0)?wa:xa,!0));(c=this.b.toString())&&a.push("?",c);(c=this.g)&&a.push("#",C(c,ya));return a.join("")};
var sa=function(a,b,c){a.c=c?B(b,!0):b;a.c&&(a.c=a.c.replace(/:$/,""))},ta=function(a,b){if(b){b=Number(b);if(isNaN(b)||0>b)throw Error("Bad port number "+b);a.i=b}else a.i=null},ua=function(a,b,c){b instanceof A?(a.b=b,za(a.b,a.a)):(c||(b=C(b,Aa)),a.b=new A(b,0,a.a))},B=function(a,b){return a?b?decodeURI(a.replace(/%25/g,"%2525")):decodeURIComponent(a):""},C=function(a,b,c){return n(a)?(a=encodeURI(a).replace(b,Ba),c&&(a=a.replace(/%25([0-9a-fA-F]{2})/g,"%$1")),a):null},Ba=function(a){a=a.charCodeAt(0);
return"%"+(a>>4&15).toString(16)+(a&15).toString(16)},va=/[#\/\?@]/g,xa=/[\#\?:]/g,wa=/[\#\?]/g,Aa=/[\#\?@]/g,ya=/#/g,A=function(a,b,c){this.b=this.a=null;this.c=a||null;this.f=!!c},D=function(a){a.a||(a.a=new x,a.b=0,a.c&&qa(a.c,function(b,c){b=decodeURIComponent(b.replace(/\+/g," "));D(a);a.c=null;b=E(a,b);var d=a.a.get(b);d||a.a.set(b,d=[]);d.push(c);a.b+=1}))},Ca=function(a,b){D(a);b=E(a,b);z(a.a.b,b)&&(a.c=null,a.b-=a.a.get(b).length,a=a.a,z(a.b,b)&&(delete a.b[b],a.c--,a.f++,a.a.length>2*a.c&&
y(a)))},Da=function(a,b){D(a);b=E(a,b);return z(a.a.b,b)};f=A.prototype;f.m=function(){D(this);for(var a=this.a.l(),b=this.a.m(),c=[],d=0;d<b.length;d++)for(var e=a[d],g=0;g<e.length;g++)c.push(b[d]);return c};f.l=function(a){D(this);var b=[];if(n(a))Da(this,a)&&(b=ia(b,this.a.get(E(this,a))));else{a=this.a.l();for(var c=0;c<a.length;c++)b=ia(b,a[c])}return b};f.set=function(a,b){D(this);this.c=null;a=E(this,a);Da(this,a)&&(this.b-=this.a.get(a).length);this.a.set(a,[b]);this.b+=1;return this};
f.get=function(a,b){a=a?this.l(a):[];return 0<a.length?String(a[0]):b};f.toString=function(){if(this.c)return this.c;if(!this.a)return"";for(var a=[],b=this.a.m(),c=0;c<b.length;c++)for(var d=b[c],e=encodeURIComponent(String(d)),d=this.l(d),g=0;g<d.length;g++){var h=e;""!==d[g]&&(h+="="+encodeURIComponent(String(d[g])));a.push(h)}return this.c=a.join("&")};
var E=function(a,b){b=String(b);a.f&&(b=b.toLowerCase());return b},za=function(a,b){b&&!a.f&&(D(a),a.c=null,a.a.forEach(function(a,b){var c=b.toLowerCase();b!=c&&(Ca(this,b),Ca(this,c),0<a.length&&(this.c=null,this.a.set(E(this,c),ja(a)),this.b+=a.length))},a));a.f=b};var F;a:{var Ea=k.navigator;if(Ea){var Fa=Ea.userAgent;if(Fa){F=Fa;break a}}F=""}var G=function(a){return-1!=F.indexOf(a)};var Ga=function(a){Ga[" "](a);return a};Ga[" "]=aa;var Ia=function(a,b){var c=Ha;return Object.prototype.hasOwnProperty.call(c,a)?c[a]:c[a]=b(a)};var Ja=G("Opera"),H=G("Trident")||G("MSIE"),Ka=G("Edge"),I=G("Gecko")&&!(-1!=F.toLowerCase().indexOf("webkit")&&!G("Edge"))&&!(G("Trident")||G("MSIE"))&&!G("Edge"),La=-1!=F.toLowerCase().indexOf("webkit")&&!G("Edge"),Ma=function(){var a=k.document;return a?a.documentMode:void 0},Na;
a:{var Oa="",Pa=function(){var a=F;if(I)return/rv\:([^\);]+)(\)|;)/.exec(a);if(Ka)return/Edge\/([\d\.]+)/.exec(a);if(H)return/\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);if(La)return/WebKit\/(\S+)/.exec(a);if(Ja)return/(?:Version)[ \/]?(\S+)/.exec(a)}();Pa&&(Oa=Pa?Pa[1]:"");if(H){var Qa=Ma();if(null!=Qa&&Qa>parseFloat(Oa)){Na=String(Qa);break a}}Na=Oa}
var Ra=Na,Ha={},J=function(a){return Ia(a,function(){for(var b=0,c=ea(String(Ra)).split("."),d=ea(String(a)).split("."),e=Math.max(c.length,d.length),g=0;0==b&&g<e;g++){var h=c[g]||"",m=d[g]||"";do{h=/(\d*)(\D*)(.*)/.exec(h)||["","","",""];m=/(\d*)(\D*)(.*)/.exec(m)||["","","",""];if(0==h[0].length&&0==m[0].length)break;b=fa(0==h[1].length?0:parseInt(h[1],10),0==m[1].length?0:parseInt(m[1],10))||fa(0==h[2].length,0==m[2].length)||fa(h[2],m[2]);h=h[3];m=m[3]}while(0==b)}return 0<=b})},Sa;var Ta=k.document;
Sa=Ta&&H?Ma()||("CSS1Compat"==Ta.compatMode?parseInt(Ra,10):5):void 0;var Ua=!H||9<=Number(Sa),Va=H&&!J("9");!La||J("528");I&&J("1.9b")||H&&J("8")||Ja&&J("9.5")||La&&J("528");I&&!J("8")||H&&J("9");var Wa=function(){this.c=this.c;this.g=this.g};Wa.prototype.c=!1;var K=function(a,b){this.type=a;this.a=this.c=b};K.prototype.f=function(){};var M=function(a,b){K.call(this,a?a.type:"");this.b=this.a=this.c=null;if(a){this.type=a.type;this.c=a.target||a.srcElement;this.a=b;if((b=a.relatedTarget)&&I)try{Ga(b.nodeName)}catch(c){}this.b=a;a.defaultPrevented&&this.f()}};r(M,K);M.prototype.f=function(){M.ha.f.call(this);var a=this.b;if(a.preventDefault)a.preventDefault();else if(a.returnValue=!1,Va)try{if(a.ctrlKey||112<=a.keyCode&&123>=a.keyCode)a.keyCode=-1}catch(b){}};var N="closure_listenable_"+(1E6*Math.random()|0),Xa=0;var Ya=function(a,b,c,d,e){this.listener=a;this.a=null;this.src=b;this.type=c;this.capture=!!d;this.b=e;++Xa;this.s=this.v=!1},Za=function(a){a.s=!0;a.listener=null;a.a=null;a.src=null;a.b=null};var $a=function(a){this.src=a;this.a={};this.b=0},bb=function(a,b,c,d,e){var g=b.toString();b=a.a[g];b||(b=a.a[g]=[],a.b++);var h=ab(b,c,d,e);-1<h?(a=b[h],a.v=!1):(a=new Ya(c,a.src,g,!!d,e),a.v=!1,b.push(a));return a},cb=function(a,b){var c=b.type;if(c in a.a){var d=a.a[c],e=ga(d,b),g;(g=0<=e)&&Array.prototype.splice.call(d,e,1);g&&(Za(b),0==a.a[c].length&&(delete a.a[c],a.b--))}},ab=function(a,b,c,d){for(var e=0;e<a.length;++e){var g=a[e];if(!g.s&&g.listener==b&&g.capture==!!c&&g.b==d)return e}return-1};var db="closure_lm_"+(1E6*Math.random()|0),eb={},fb=0,O=function(a,b,c,d,e){if("array"==ba(b))for(var g=0;g<b.length;g++)O(a,b[g],c,d,e);else if(c=gb(c),a&&a[N])bb(a.a,String(b),c,d,e);else{if(!b)throw Error("Invalid event type");var g=!!d,h=P(a);h||(a[db]=h=new $a(a));c=bb(h,b,c,d,e);if(!c.a){d=hb();c.a=d;d.src=a;d.listener=c;if(a.addEventListener)a.addEventListener(b.toString(),d,g);else if(a.attachEvent)a.attachEvent(ib(b.toString()),d);else throw Error("addEventListener and attachEvent are unavailable.");
fb++}}},hb=function(){var a=jb,b=Ua?function(c){return a.call(b.src,b.listener,c)}:function(c){c=a.call(b.src,b.listener,c);if(!c)return c};return b},kb=function(a,b,c,d,e){if("array"==ba(b))for(var g=0;g<b.length;g++)kb(a,b[g],c,d,e);else(c=gb(c),a&&a[N])?(a=a.a,b=String(b).toString(),b in a.a&&(g=a.a[b],c=ab(g,c,d,e),-1<c&&(Za(g[c]),Array.prototype.splice.call(g,c,1),0==g.length&&(delete a.a[b],a.b--)))):a&&(a=P(a))&&(b=a.a[b.toString()],a=-1,b&&(a=ab(b,c,!!d,e)),(c=-1<a?b[a]:null)&&lb(c))},lb=
function(a){if("number"!=typeof a&&a&&!a.s){var b=a.src;if(b&&b[N])cb(b.a,a);else{var c=a.type,d=a.a;b.removeEventListener?b.removeEventListener(c,d,a.capture):b.detachEvent&&b.detachEvent(ib(c),d);fb--;(c=P(b))?(cb(c,a),0==c.b&&(c.src=null,b[db]=null)):Za(a)}}},ib=function(a){return a in eb?eb[a]:eb[a]="on"+a},nb=function(a,b,c,d){var e=!0;if(a=P(a))if(b=a.a[b.toString()])for(b=b.concat(),a=0;a<b.length;a++){var g=b[a];g&&g.capture==c&&!g.s&&(g=mb(g,d),e=e&&!1!==g)}return e},mb=function(a,b){var c=
a.listener,d=a.b||a.src;a.v&&lb(a);return c.call(d,b)},jb=function(a,b){if(a.s)return!0;if(!Ua){if(!b)a:{b=["window","event"];for(var c=k,d;d=b.shift();)if(null!=c[d])c=c[d];else{b=null;break a}b=c}d=b;b=new M(d,this);c=!0;if(!(0>d.keyCode||void 0!=d.returnValue)){a:{var e=!1;if(0==d.keyCode)try{d.keyCode=-1;break a}catch(h){e=!0}if(e||void 0==d.returnValue)d.returnValue=!0}d=[];for(e=b.a;e;e=e.parentNode)d.push(e);a=a.type;for(e=d.length-1;0<=e;e--){b.a=d[e];var g=nb(d[e],a,!0,b),c=c&&g}for(e=0;e<
d.length;e++)b.a=d[e],g=nb(d[e],a,!1,b),c=c&&g}return c}return mb(a,new M(b,this))},P=function(a){a=a[db];return a instanceof $a?a:null},ob="__closure_events_fn_"+(1E9*Math.random()>>>0),gb=function(a){if(p(a))return a;a[ob]||(a[ob]=function(b){return a.handleEvent(b)});return a[ob]};var Q=function(){Wa.call(this);this.a=new $a(this)};r(Q,Wa);Q.prototype[N]=!0;Q.prototype.addEventListener=function(a,b,c,d){O(this,a,b,c,d)};Q.prototype.removeEventListener=function(a,b,c,d){kb(this,a,b,c,d)};var pb={ka:"dcm",la:"studio",ja:"configurable"};l("studio.sdk.ContainerState",{COLLAPSING:"collapsing",COLLAPSED:"collapsed",EXPANDING:"expanding",EXPANDED:"expanded",FS_COLLAPSING:"fs_collapsing",FS_EXPANDING:"fs_expanding",FS_EXPANDED:"fs_expanded"},void 0);var qb=function(){};l("studio.sdk.IEnabler",qb,void 0);f=qb.prototype;f.ba=function(){};f.W=function(){};f.da=function(){};f.ca=function(){};f.R=function(){};f.P=function(){};f.O=function(){};f.N=function(){};f.A=function(){};f.getParameter=function(){};f.w=function(){};f.D=function(){};f.C=function(){};f.ea=function(){};f.fa=function(){};f.J=function(){};f.K=function(){};f.Y=function(){};f.G=function(){};f.X=function(){};f.F=function(){};f.close=function(){};f.M=function(){};f.S=function(){};
f.addEventListener=function(){};f.removeEventListener=function(){};f.V=function(){};f.U=function(){};f.$=function(){};f.I=function(){};f.Z=function(){};f.H=function(){};f.L=function(){};l("studio.sdk.logger",{}.na,void 0);!I&&!H||H&&9<=Number(Sa)||I&&J("1.9.1");H&&J("9");var rb=function(a,b,c){this.f=c;this.c=a;this.g=b;this.b=0;this.a=null};rb.prototype.get=function(){var a;0<this.b?(this.b--,a=this.a,this.a=a.next,a.next=null):a=this.c();return a};var sb=function(a,b){a.g(b);a.b<a.f&&(a.b++,b.next=a.a,a.a=b)};var tb=function(a){k.setTimeout(function(){throw a;},0)},ub,vb=function(){var a=k.MessageChannel;"undefined"===typeof a&&"undefined"!==typeof window&&window.postMessage&&window.addEventListener&&!G("Presto")&&(a=function(){var a=document.createElement("IFRAME");a.style.display="none";a.src="";document.documentElement.appendChild(a);var b=a.contentWindow,a=b.document;a.open();a.write("");a.close();var c="callImmediate"+Math.random(),d="file:"==b.location.protocol?"*":b.location.protocol+"//"+b.location.host,
a=q(function(a){if(("*"==d||a.origin==d)&&a.data==c)this.port1.onmessage()},this);b.addEventListener("message",a,!1);this.port1={};this.port2={postMessage:function(){b.postMessage(c,d)}}});if("undefined"!==typeof a&&!G("Trident")&&!G("MSIE")){var b=new a,c={},d=c;b.port1.onmessage=function(){if(void 0!==c.next){c=c.next;var a=c.B;c.B=null;a()}};return function(a){d.next={B:a};d=d.next;b.port2.postMessage(0)}}return"undefined"!==typeof document&&"onreadystatechange"in document.createElement("SCRIPT")?
function(a){var b=document.createElement("SCRIPT");b.onreadystatechange=function(){b.onreadystatechange=null;b.parentNode.removeChild(b);b=null;a();a=null};document.documentElement.appendChild(b)}:function(a){k.setTimeout(a,0)}};var xb=new rb(function(){return new wb},function(a){a.reset()},100),zb=function(){var a=yb,b=null;a.a&&(b=a.a,a.a=a.a.next,a.a||(a.b=null),b.next=null);return b},wb=function(){this.next=this.b=this.a=null};wb.prototype.set=function(a,b){this.a=a;this.b=b;this.next=null};wb.prototype.reset=function(){this.next=this.b=this.a=null};var Cb=function(a,b){R||Ab();Bb||(R(),Bb=!0);var c=yb,d=xb.get();d.set(a,b);c.b?c.b.next=d:c.a=d;c.b=d},R,Ab=function(){var a=k.Promise;if(-1!=String(a).indexOf("[native code]")){var b=a.resolve(void 0);R=function(){b.then(Db)}}else R=function(){var a=Db;!p(k.setImmediate)||k.Window&&k.Window.prototype&&!G("Edge")&&k.Window.prototype.setImmediate==k.setImmediate?(ub||(ub=vb()),ub(a)):k.setImmediate(a)}},Bb=!1,yb=new function(){this.b=this.a=null},Db=function(){for(var a;a=zb();){try{a.a.call(a.b)}catch(b){tb(b)}sb(xb,
a)}Bb=!1};var Eb=function(a){a.prototype.then=a.prototype.then;a.prototype.$goog_Thenable=!0},Fb=function(a){if(!a)return!1;try{return!!a.$goog_Thenable}catch(b){return!1}};var U=function(a,b){this.a=0;this.i=void 0;this.f=this.b=this.c=null;this.g=this.h=!1;if(a!=aa)try{var c=this;a.call(b,function(a){S(c,2,a)},function(a){S(c,3,a)})}catch(d){S(this,3,d)}},Gb=function(){this.next=this.c=this.b=this.f=this.a=null;this.g=!1};Gb.prototype.reset=function(){this.c=this.b=this.f=this.a=null;this.g=!1};var Hb=new rb(function(){return new Gb},function(a){a.reset()},100),Ib=function(a,b,c){var d=Hb.get();d.f=a;d.b=b;d.c=c;return d};
U.prototype.then=function(a,b,c){return Jb(this,p(a)?a:null,p(b)?b:null,c)};Eb(U);U.prototype.cancel=function(a){0==this.a&&Cb(function(){var b=new V(a);Kb(this,b)},this)};
var Kb=function(a,b){if(0==a.a)if(a.c){var c=a.c;if(c.b){for(var d=0,e=null,g=null,h=c.b;h&&(h.g||(d++,h.a==a&&(e=h),!(e&&1<d)));h=h.next)e||(g=h);e&&(0==c.a&&1==d?Kb(c,b):(g?(d=g,d.next==c.f&&(c.f=d),d.next=d.next.next):Lb(c),Mb(c,e,3,b)))}a.c=null}else S(a,3,b)},Ob=function(a,b){a.b||2!=a.a&&3!=a.a||Nb(a);a.f?a.f.next=b:a.b=b;a.f=b},Jb=function(a,b,c,d){var e=Ib(null,null,null);e.a=new U(function(a,h){e.f=b?function(c){try{var e=b.call(d,c);a(e)}catch(T){h(T)}}:a;e.b=c?function(b){try{var e=c.call(d,
b);void 0===e&&b instanceof V?h(b):a(e)}catch(T){h(T)}}:h});e.a.c=a;Ob(a,e);return e.a};U.prototype.o=function(a){this.a=0;S(this,2,a)};U.prototype.u=function(a){this.a=0;S(this,3,a)};
var S=function(a,b,c){if(0==a.a){a===c&&(b=3,c=new TypeError("Promise cannot resolve to itself"));a.a=1;var d;a:{var e=c,g=a.o,h=a.u;if(e instanceof U)Ob(e,Ib(g||aa,h||null,a)),d=!0;else if(Fb(e))e.then(g,h,a),d=!0;else{var m=typeof e;if("object"==m&&null!=e||"function"==m)try{var L=e.then;if(p(L)){Pb(e,L,g,h,a);d=!0;break a}}catch(T){h.call(a,T);d=!0;break a}d=!1}}d||(a.i=c,a.a=b,a.c=null,Nb(a),3!=b||c instanceof V||Qb(a,c))}},Pb=function(a,b,c,d,e){var g=!1,h=function(a){g||(g=!0,c.call(e,a))},
m=function(a){g||(g=!0,d.call(e,a))};try{b.call(a,h,m)}catch(L){m(L)}},Nb=function(a){a.h||(a.h=!0,Cb(a.j,a))},Lb=function(a){var b=null;a.b&&(b=a.b,a.b=b.next,b.next=null);a.b||(a.f=null);return b};U.prototype.j=function(){for(var a;a=Lb(this);)Mb(this,a,this.a,this.i);this.h=!1};
var Mb=function(a,b,c,d){if(3==c&&b.b&&!b.g)for(;a&&a.g;a=a.c)a.g=!1;if(b.a)b.a.c=null,Rb(b,c,d);else try{b.g?b.f.call(b.c):Rb(b,c,d)}catch(e){Sb.call(null,e)}sb(Hb,b)},Rb=function(a,b,c){2==b?a.f.call(a.c,c):a.b&&a.b.call(a.c,c)},Qb=function(a,b){a.g=!0;Cb(function(){a.g&&Sb.call(null,b)})},Sb=tb,V=function(a){t.call(this,a)};r(V,t);/*
 Portions of this code are from MochiKit, received by
 The Closure Authors under the MIT license. All other code is Copyright
 2005-2009 The Closure Authors. All Rights Reserved.
*/
var W=function(a,b){this.g=[];this.aa=a;this.T=b||null;this.f=this.a=!1;this.b=void 0;this.o=this.ia=this.i=!1;this.h=0;this.c=null;this.j=0};W.prototype.cancel=function(a){if(this.a)this.b instanceof W&&this.b.cancel();else{if(this.c){var b=this.c;delete this.c;a?b.cancel(a):(b.j--,0>=b.j&&b.cancel())}this.aa?this.aa.call(this.T,this):this.o=!0;if(!this.a){a=new Tb;if(this.a){if(!this.o)throw new Ub;this.o=!1}this.a=!0;this.b=a;this.f=!0;Vb(this)}}};
W.prototype.u=function(a,b){this.i=!1;this.a=!0;this.b=b;this.f=!a;Vb(this)};var Wb=function(a,b,c){a.g.push([b,c,void 0]);a.a&&Vb(a)};W.prototype.then=function(a,b,c){var d,e,g=new U(function(a,b){d=a;e=b});Wb(this,d,function(a){a instanceof Tb?g.cancel():e(a)});return g.then(a,b,c)};Eb(W);
var Xb=function(a){return ha(a.g,function(a){return p(a[1])})},Vb=function(a){if(a.h&&a.a&&Xb(a)){var b=a.h,c=Yb[b];c&&(k.clearTimeout(c.a),delete Yb[b]);a.h=0}a.c&&(a.c.j--,delete a.c);for(var b=a.b,d=c=!1;a.g.length&&!a.i;){var e=a.g.shift(),g=e[0],h=e[1],e=e[2];if(g=a.f?h:g)try{var m=g.call(e||a.T,b);void 0!==m&&(a.f=a.f&&(m==b||m instanceof Error),a.b=b=m);if(Fb(b)||"function"===typeof k.Promise&&b instanceof k.Promise)d=!0,a.i=!0}catch(L){b=L,a.f=!0,Xb(a)||(c=!0)}}a.b=b;d&&(m=q(a.u,a,!0),d=q(a.u,
a,!1),b instanceof W?(Wb(b,m,d),b.ia=!0):b.then(m,d));c&&(b=new Zb(b),Yb[b.a]=b,a.h=b.a)},Ub=function(){t.call(this)};r(Ub,t);Ub.prototype.message="Deferred has already fired";var Tb=function(){t.call(this)};r(Tb,t);Tb.prototype.message="Deferred was canceled";var Zb=function(a){this.a=k.setTimeout(q(this.c,this),0);this.b=a};Zb.prototype.c=function(){delete Yb[this.a];throw this.b;};var Yb={};var X=new x;X.set("enabler","enabler");X.set("dcmenabler","dcm");X.set("video","vid");X.set("configurable","cfg");X.set("configurablefiller","cfg_fill");X.set("layouts","lay");X.set("layoutsfiller","lay_fill");X.set("gdn","gdn");X.set("rad_ui_video","rad");l("goog.exportSymbol",function(a,b,c){l(a,b,c)},this);var $b=function(a){a+="goog.exportSymbol('studioLoader.context.evalInContext', "+$b.toString()+");";eval(a)};l("studioLoader.context.evalInContext",$b,void 0);var Y=function(a){O(window,"message",ac);if(a!=bc)return!1;Q.call(this);this.b=null;this.b||(this.b=new ra((window.STUDIO_ORIGINAL_ASSET_URL?window.STUDIO_ORIGINAL_ASSET_URL:window.location.href).replace(/%(?![A-Fa-f0-9][A-Fa-f0-9])/g,"%25")));(a=this.f=this.b.b)&&(a=a.get("e",null))&&ma(parseInt(a,10)||0)},cc;r(Y,Q);l("studio.DcmEnabler",Y,void 0);var bc=Math.random(),dc=null,ec={},fc=function(){dc||(dc=new Y(bc));return dc};Y.getInstance=fc;
var ac=function(a){if(n(a.b.data)){try{var b=JSON.parse(a.b.data)}catch(e){return}if(b.isInitClickTag){if(a=b.clickTags)for(var c=0;c<a.length;c++){var d=a[c];ec[d.name]=d.url}cc=b.relegateNavigation}}};Y.prototype.W=function(){};Y.prototype.reportManualClose=Y.prototype.W;Y.prototype.ba=function(){};Y.prototype.setExpandingPixelOffsets=Y.prototype.ba;Y.prototype.da=function(){};Y.prototype.setStartExpanded=Y.prototype.da;Y.prototype.ca=function(){};Y.prototype.setIsMultiDirectional=Y.prototype.ca;
Y.prototype.R=function(){return!0};Y.prototype.isVisible=Y.prototype.R;Y.prototype.P=function(){return!0};Y.prototype.isServingInLiveEnvironment=Y.prototype.P;Y.prototype.O=function(){return!0};Y.prototype.isPageLoaded=Y.prototype.O;Y.prototype.N=function(){return!0};Y.prototype.isInitialized=Y.prototype.N;Y.prototype.A=function(){};Y.prototype.callAfterInitialized=Y.prototype.A;Y.prototype.getParameter=function(a){return this.f.get(a,null)};Y.prototype.getParameter=Y.prototype.getParameter;
Y.prototype.w=function(a,b){a=null!=ec[a]&&"null"!=ec[a]?ec[a]:b;"parent"===cc?window.parent.postMessage(JSON.stringify({clickTag:a,isPostClickTag:!0}),"*"):window.open(a)};Y.prototype.exit=Y.prototype.w;Y.prototype.D=function(a,b){this.w(a,b)};Y.prototype.exitOverride=Y.prototype.D;Y.prototype.C=function(){};Y.prototype.counter=Y.prototype.C;Y.prototype.ea=function(){};Y.prototype.startTimer=Y.prototype.ea;Y.prototype.fa=function(){};Y.prototype.stopTimer=Y.prototype.fa;Y.prototype.J=function(){return"collapsed"};
Y.prototype.getContainerState=Y.prototype.J;Y.prototype.K=function(){return null};Y.prototype.getExpandDirection=Y.prototype.K;Y.prototype.Y=function(){};Y.prototype.requestExpand=Y.prototype.Y;Y.prototype.G=function(){};Y.prototype.finishExpand=Y.prototype.G;Y.prototype.X=function(){};Y.prototype.requestCollapse=Y.prototype.X;Y.prototype.F=function(){};Y.prototype.finishCollapse=Y.prototype.F;Y.prototype.close=function(){};Y.prototype.close=Y.prototype.close;Y.prototype.M=function(a){return a};
Y.prototype.getUrl=Y.prototype.M;Y.prototype.S=function(){};Y.prototype.loadModule=Y.prototype.S;Y.prototype.addEventListener=function(a,b,c,d){O(this,a,b,c,d)};Y.prototype.addEventListener=Y.prototype.addEventListener;Y.prototype.removeEventListener=function(a,b,c,d){kb(this,a,b,c,d)};Y.prototype.removeEventListener=Y.prototype.removeEventListener;Y.prototype.V=function(){};Y.prototype.queryFullscreenSupport=Y.prototype.V;Y.prototype.U=function(){};Y.prototype.queryFullscreenDimensions=Y.prototype.U;
Y.prototype.$=function(){};Y.prototype.requestFullscreenExpand=Y.prototype.$;Y.prototype.I=function(){};Y.prototype.finishFullscreenExpand=Y.prototype.I;Y.prototype.Z=function(){};Y.prototype.requestFullscreenCollapse=Y.prototype.Z;Y.prototype.H=function(){};Y.prototype.finishFullscreenCollapse=Y.prototype.H;Y.prototype.L=function(){var a;a:{for(a in pb)if("dcm"==pb[a]){a="dcm";break a}a=null}return a||"dcm"};Y.prototype.getSdk=Y.prototype.L;var gc=fc();l("Enabler",gc,void 0);var Z=function(a){K.call(this,a)};r(Z,K);l("studio.events.StudioEvent",Z,void 0);Z.INIT="init";Z.VISIBLE="visible";Z.HIDDEN="hidden";Z.VISIBILITY_CHANGE="visibilityChange";Z.VISIBILITY_CHANGE_WITH_INFO="visibilityChangeWithInfo";Z.EXIT="exit";Z.INTERACTION="interaction";Z.PAGE_LOADED="pageLoaded";Z.ORIENTATION="orientation";Z.ABOUT_TO_EXPAND="aboutToExpand";Z.EXPAND_START="expandStart";Z.EXPAND_FINISH="expandFinish";Z.COLLAPSE_START="collapseStart";Z.COLLAPSE_FINISH="collapseFinish";Z.COLLAPSE="collapse";
Z.FULLSCREEN_SUPPORT="fullscreenSupport";Z.FULLSCREEN_DIMENSIONS="fullscreenDimensions";Z.FULLSCREEN_EXPAND_START="fullscreenExpandStart";Z.FULLSCREEN_EXPAND_FINISH="fullscreenExpandFinish";Z.FULLSCREEN_COLLAPSE_START="fullscreenCollapseStart";Z.FULLSCREEN_COLLAPSE_FINISH="fullscreenCollapseFinish";Z.prototype.ga=function(a,b){this[a]=b;return this};Z.prototype.addProperty=Z.prototype.ga;})();
