var mediaWikiLoadStart=(new Date()).getTime(),mwPerformance=(window.performance&&performance.mark)?performance:{mark:function(){}};mwPerformance.mark('mwLoadStart');function isCompatible(ua){if(ua===undefined){ua=navigator.userAgent;}return!((ua.indexOf('MSIE')!==-1&&parseFloat(ua.split('MSIE')[1])<8)||(ua.indexOf('Firefox/')!==-1&&parseFloat(ua.split('Firefox/')[1])<3)||(ua.indexOf('Opera/')!==-1&&(ua.indexOf('Version/')===-1?parseFloat(ua.split('Opera/')[1])<10:parseFloat(ua.split('Version/')[1])<12))||(ua.indexOf('Opera ')!==-1&&parseFloat(ua.split(' Opera ')[1])<10)||ua.match(/BlackBerry[^\/]*\/[1-5]\./)||ua.match(/webOS\/1\.[0-4]/)||ua.match(/PlayStation/i)||ua.match(/SymbianOS|Series60/)||ua.match(/NetFront/)||ua.match(/Opera Mini/)||ua.match(/S40OviBrowser/)||ua.match(/MeeGo/)||(ua.match(/Glass/)&&ua.match(/Android/)));}(function(){if(!isCompatible()){document.documentElement.className=document.documentElement.className.replace(/(^|\s)client-js(\s|$)/,'$1client-nojs$2');return;}
function startUp(){mw.config=new mw.Map(true);mw.loader.addSource({"local":"/load.php"});mw.loader.register([["site","CnfRyAya"],["noscript","dmA7f3t9",[],"noscript"],["filepage","q20fGrBM"],["user.groups","iPYxP6rw",[],"user"],["user","xi8fs5VS",[],"user"],["user.cssprefs","gy3rpGMz",[],"private"],["user.defaults","tDhN1dYz"],["user.options","+JoudQIu",[6],"private"],["user.tokens","LJhtZ+kG",[],"private"],["mediawiki.language.data","pJtq8AIz",[168]],["mediawiki.skinning.elements","2YM4bUOP"],["mediawiki.skinning.content","v7D5ynLw"],["mediawiki.skinning.interface","F9HYJLsb"],["mediawiki.skinning.content.parsoid","iGEfecXV"],["mediawiki.skinning.content.externallinks","QraYAvRh"],["jquery.accessKeyLabel","UqOS01HU",[25,129]],["jquery.appear","7TILlVfB"],["jquery.arrowSteps","LsLdBH4M"],["jquery.async","UReYXn9/"],["jquery.autoEllipsis","A77xuJFa",[37]],["jquery.badge","NXf7meV5",[165]],["jquery.byteLength","dDWdAh/6"],["jquery.byteLimit","cWPpxnXy",[21]],["jquery.checkboxShiftClick",
"rMpA9wtY"],["jquery.chosen","T07xkFTv"],["jquery.client","G+i5CWuZ"],["jquery.color","yaEGfFIX",[27]],["jquery.colorUtil","jnSEyGWl"],["jquery.confirmable","5rvRsarC",[169]],["jquery.cookie","rT5o68ph"],["jquery.expandableField","GYZRbCZq"],["jquery.farbtastic","xDMW7Jsv",[27]],["jquery.footHovzer","aqJ8eKNa"],["jquery.form","wst2iXWt"],["jquery.fullscreen","mINvk9Pw"],["jquery.getAttrs","uwXiwybu"],["jquery.hidpi","OiQplpWe"],["jquery.highlightText","gHYl5jWw",[227,129]],["jquery.hoverIntent","xEkqDoDO"],["jquery.i18n","6JDOmQil",[167]],["jquery.localize","OGHzIfuR"],["jquery.makeCollapsible","oo8Hd4pX"],["jquery.mockjax","BVL/mJSG"],["jquery.mw-jump","cslt35xk"],["jquery.mwExtension","34K0G36s"],["jquery.placeholder","ez6X84Cd"],["jquery.qunit","vZ57Kdf+"],["jquery.qunit.completenessTest","5ubc5+T1",[46]],["jquery.spinner","J8ux1vTA"],["jquery.jStorage","y2DMIHA9",[93]],["jquery.suggestions","xaFxfAJf",[37]],["jquery.tabIndex","usX6YvEy"],["jquery.tablesorter","9d3ToLoi",[227,129,
170]],["jquery.textSelection","uY7wZaug",[25]],["jquery.throttle-debounce","6UZEzIz6"],["jquery.validate","gKEIdgaw"],["jquery.xmldom","SieA4XP+"],["jquery.tipsy","gbYF5Kt9"],["jquery.ui.core","FlrplJl0",[59],"jquery.ui"],["jquery.ui.core.styles","TQw9Dl4X",[],"jquery.ui"],["jquery.ui.accordion","AHi9Lvam",[58,78],"jquery.ui"],["jquery.ui.autocomplete","M+SUN1eS",[67],"jquery.ui"],["jquery.ui.button","dxr1Yt6Y",[58,78],"jquery.ui"],["jquery.ui.datepicker","ch8oXSOj",[58],"jquery.ui"],["jquery.ui.dialog","lxsCEcPp",[62,65,69,71],"jquery.ui"],["jquery.ui.draggable","6thvX4Q6",[58,68],"jquery.ui"],["jquery.ui.droppable","QOGnFfGF",[65],"jquery.ui"],["jquery.ui.menu","QHMnVrx0",[58,69,78],"jquery.ui"],["jquery.ui.mouse","QH7SUkGt",[78],"jquery.ui"],["jquery.ui.position","RrWUZMmA",[],"jquery.ui"],["jquery.ui.progressbar","zVbaFAHk",[58,78],"jquery.ui"],["jquery.ui.resizable","xRyETeUj",[58,68],"jquery.ui"],["jquery.ui.selectable","GTfT6lZZ",[58,68],"jquery.ui"],["jquery.ui.slider",
"JXdWLwY/",[58,68],"jquery.ui"],["jquery.ui.sortable","vwRmQfEc",[58,68],"jquery.ui"],["jquery.ui.spinner","+wV9427U",[62],"jquery.ui"],["jquery.ui.tabs","RmnLuPSU",[58,78],"jquery.ui"],["jquery.ui.tooltip","T568cm3e",[58,69,78],"jquery.ui"],["jquery.ui.widget","FU91WArz",[],"jquery.ui"],["jquery.effects.core","oYcaRpO4",[],"jquery.ui"],["jquery.effects.blind","d0OmpLGN",[79],"jquery.ui"],["jquery.effects.bounce","47vlsXqp",[79],"jquery.ui"],["jquery.effects.clip","3QQaKInA",[79],"jquery.ui"],["jquery.effects.drop","qzPKsS8B",[79],"jquery.ui"],["jquery.effects.explode","n5iHGum6",[79],"jquery.ui"],["jquery.effects.fade","/7tpzS+6",[79],"jquery.ui"],["jquery.effects.fold","3GCNi2M9",[79],"jquery.ui"],["jquery.effects.highlight","3Px3tqLQ",[79],"jquery.ui"],["jquery.effects.pulsate","FNIF4f48",[79],"jquery.ui"],["jquery.effects.scale","dKlZpfjJ",[79],"jquery.ui"],["jquery.effects.shake","aG3onlOi",[79],"jquery.ui"],["jquery.effects.slide","64Ne9MP6",[79],"jquery.ui"],[
"jquery.effects.transfer","NGRWKmJo",[79],"jquery.ui"],["json","knIP7AWR",[],null,null,"return!!(window.JSON\u0026\u0026JSON.stringify\u0026\u0026JSON.parse);"],["moment","o3yG9JNN"],["mediawiki.apihelp","s61/BJ6W",[119]],["mediawiki.template","mnejNgoj"],["mediawiki.template.mustache","ThyTfcmg",[96]],["mediawiki.template.regexp","Jr6HJUHz",[96]],["mediawiki.apipretty","gc9uObOF"],["mediawiki.api","uC1rhKbx",[145,8]],["mediawiki.api.category","GzKizevU",[134,100]],["mediawiki.api.edit","rjRxJJu6",[134,100]],["mediawiki.api.login","mtI9o7Uy",[100]],["mediawiki.api.options","DQ4Bf/0L",[100]],["mediawiki.api.parse","hPg/rxQF",[100]],["mediawiki.api.upload","TrH1uOTU",[227,93,102]],["mediawiki.api.watch","SgxSLUW4",[100]],["mediawiki.content.json","kwmmfBMl"],["mediawiki.confirmCloseWindow","ZfTWO9gb"],["mediawiki.debug","XZa0qE3b",[32,57]],["mediawiki.debug.init","dF2oezwD",[110]],["mediawiki.feedback","4WXtuc7/",[134,125,229]],["mediawiki.feedlink","OSlSgS4V"],["mediawiki.filewarning",
"2+XaAus/",[229]],["mediawiki.ForeignApi","boIBp80e",[116]],["mediawiki.ForeignApi.core","Z1Z8HDvG",[100,228]],["mediawiki.helplink","cqm7RZiR"],["mediawiki.hidpi","lIQ7FwXK",[36],null,null,"return'srcset'in new Image();"],["mediawiki.hlist","ST8c5gp4",[25]],["mediawiki.htmlform","EKAfDhjf",[22,129]],["mediawiki.htmlform.styles","//yey2Dn"],["mediawiki.htmlform.ooui.styles","zReE5wkc"],["mediawiki.icon","Mf3gkFWc"],["mediawiki.inspect","nG5LUweV",[21,93,129]],["mediawiki.messagePoster","loBsH1Hu",[100,228]],["mediawiki.messagePoster.wikitext","UKzY22Wi",[102,125]],["mediawiki.notification","sr/ni2c+",[177]],["mediawiki.notify","kGYX1ekI"],["mediawiki.RegExp","dI4DAvf/"],["mediawiki.pager.tablePager","JOZ67ZOl"],["mediawiki.searchSuggest","iG8FwB5a",[35,45,50,100]],["mediawiki.sectionAnchor","G5k14z2L"],["mediawiki.storage","PytqJrxO"],["mediawiki.Title","jz4Acx7B",[21,145]],["mediawiki.Upload","4M8XLt5C",[106]],["mediawiki.ForeignUpload","2H1wGvIp",[115,135]],[
"mediawiki.ForeignStructuredUpload","vu8Y1ARF",[136]],["mediawiki.Upload.Dialog","YdfMcsvX",[139]],["mediawiki.Upload.BookletLayout","goSGxfJm",[135,169,229]],["mediawiki.ForeignStructuredUpload.BookletLayout","PVlcY0Hd",[137,139,224,223]],["mediawiki.toc","qBvRxPS5",[146]],["mediawiki.Uri","iUO0Am0E",[145,98]],["mediawiki.user","Jlm8/jhx",[100,146,7]],["mediawiki.userSuggest","ZxCmv4t6",[50,100]],["mediawiki.util","Lio4EWc2",[15,128]],["mediawiki.cookie","XUFb7N4N",[29]],["mediawiki.toolbar","5RsVMdEi"],["mediawiki.experiments","//R4/lzl"],["mediawiki.action.edit","HkVHXgK7",[22,53,150]],["mediawiki.action.edit.styles","NveRqVMa"],["mediawiki.action.edit.collapsibleFooter","3PU1rb+3",[41,146,123]],["mediawiki.action.edit.preview","d3XZ5GpR",[33,48,53,155,100,169]],["mediawiki.action.edit.stash","l9KFoLa4",[35,100]],["mediawiki.action.history","EbgJBpQD"],["mediawiki.action.history.diff","PvXdL+3A"],["mediawiki.action.view.dblClickEdit","uow5MdfL",[177,7]],[
"mediawiki.action.view.metadata","MRhA1WON"],["mediawiki.action.view.categoryPage.styles","Lfzzci83"],["mediawiki.action.view.postEdit","mYUNDAKk",[146,169,96]],["mediawiki.action.view.redirect","iXiL7Cm+",[25]],["mediawiki.action.view.redirectPage","zouc0TkR"],["mediawiki.action.view.rightClickEdit","Xj4sCr73"],["mediawiki.action.edit.editWarning","EdCOCQOw",[53,109,169]],["mediawiki.action.view.filepage","zFOX/7l4"],["mediawiki.language","oF9MnJCD",[166,9]],["mediawiki.cldr","CMdFTR30",[167]],["mediawiki.libs.pluralruleparser","XWh+gW0N"],["mediawiki.language.init","JquWlw79"],["mediawiki.jqueryMsg","EjtXgyaf",[227,165,145,7]],["mediawiki.language.months","xEmKbkxy",[165]],["mediawiki.language.names","PEZBZtR9",[168]],["mediawiki.language.specialCharacters","lfy9K43n",[165]],["mediawiki.libs.jpegmeta","+2037YS+"],["mediawiki.page.gallery","GPGzBJPl",[54,175]],["mediawiki.page.gallery.styles","k6xVqyJf"],["mediawiki.page.ready","dXOHWNPB",[15,23,41,43,45]],["mediawiki.page.startup",
"/ltFDEcF",[145]],["mediawiki.page.patrol.ajax","4OH1j5H3",[48,134,100,177]],["mediawiki.page.watch.ajax","vMqx5ozt",[107,177]],["mediawiki.page.image.pagination","9Z35KPLp",[48,142]],["mediawiki.special","QScM3NdY"],["mediawiki.special.block","KovsbFiR",[145]],["mediawiki.special.changeemail","wk+ehKrn",[145]],["mediawiki.special.changeslist","EdatnKIH"],["mediawiki.special.changeslist.legend","sirnbv7X"],["mediawiki.special.changeslist.legend.js","+LqdkZik",[41,146]],["mediawiki.special.changeslist.enhanced","akYexbQQ"],["mediawiki.special.edittags","vCtIyoeC",[24]],["mediawiki.special.edittags.styles","9XUpWCIY"],["mediawiki.special.import","YIntE50v"],["mediawiki.special.movePage","A//CuU+H",[221]],["mediawiki.special.movePage.styles","Y+zatv0Q"],["mediawiki.special.pageLanguage","/wWaiDVM"],["mediawiki.special.pagesWithProp","YWL1aFTg"],["mediawiki.special.preferences","5LStvbcU",[109,165,127]],["mediawiki.special.recentchanges","y2PyMrud",[181]],["mediawiki.special.search",
"ADQlPS2Q"],["mediawiki.special.undelete","9uSxknpc"],["mediawiki.special.upload","ryr+kt+Y",[48,134,100,109,169,173,96]],["mediawiki.special.userlogin.common.styles","ZzZafJb9"],["mediawiki.special.userlogin.signup.styles","ZBQlQ8dG"],["mediawiki.special.userlogin.login.styles","b8eelADM"],["mediawiki.special.userlogin.signup.js","VT8PC+wN",[54,100,169]],["mediawiki.special.unwatchedPages","WDAdxuVF",[134,107]],["mediawiki.special.javaScriptTest","P+BZVczG",[142]],["mediawiki.special.version","l24tAvWp"],["mediawiki.legacy.config","YhtKGt70"],["mediawiki.legacy.commonPrint","fLmQdiFI"],["mediawiki.legacy.protect","7V/dLzhg",[22]],["mediawiki.legacy.shared","/daK7tz/"],["mediawiki.legacy.oldshared","x++9Ua3O"],["mediawiki.legacy.wikibits","fK+05Caw",[145]],["mediawiki.ui","5mH6ZHa+"],["mediawiki.ui.checkbox","/Um7Uu46"],["mediawiki.ui.radio","a4grgnQh"],["mediawiki.ui.anchor","HXEi2mCV"],["mediawiki.ui.button","lEucyaa2"],["mediawiki.ui.input","KqC+cQNs"],["mediawiki.ui.icon",
"vMvqJWix"],["mediawiki.ui.text","j2hM/eTh"],["mediawiki.widgets","mmvnEM49",[19,22,224,222]],["mediawiki.widgets.styles","Mrc+l/nA"],["mediawiki.widgets.DateInputWidget","8JJR5RU4",[94,229]],["mediawiki.widgets.CategorySelector","SVJlaZfe",[115,134,229]],["mediawiki.widgets.UserInputWidget","hK8qt6Ar",[229]],["es5-shim","J1+eI4IF",[],null,null,"return(function(){'use strict';return!this\u0026\u0026!!Function.prototype.bind;}());"],["dom-level2-shim","rkP6PEpB",[],null,null,"return!!window.Node;"],["oojs","3AkkIezR",[226,93]],["oojs-ui","iPxKHX/p",[228,230,231,232,233]],["oojs-ui.styles","rgXYbMe0"],["oojs-ui.styles.icons","ofJlEPQw"],["oojs-ui.styles.indicators","dAIR+nWp"],["oojs-ui.styles.textures","KuodqfYh"],["oojs-ui.styles.icons-accessibility","5bM2XxsO"],["oojs-ui.styles.icons-alerts","i+KG3nw7"],["oojs-ui.styles.icons-content","S1YLoO01"],["oojs-ui.styles.icons-editing-advanced","8Xly9vlk"],["oojs-ui.styles.icons-editing-core","CvX8mdAg"],["oojs-ui.styles.icons-editing-list",
"5TSA6MN6"],["oojs-ui.styles.icons-editing-styling","qzAEKi4G"],["oojs-ui.styles.icons-interactions","Jb120rL+"],["oojs-ui.styles.icons-layout","0cnbGUjU"],["oojs-ui.styles.icons-location","jvIu/JsZ"],["oojs-ui.styles.icons-media","XNyq1t5G"],["oojs-ui.styles.icons-moderation","jHqHHVaH"],["oojs-ui.styles.icons-movement","wVubxf99"],["oojs-ui.styles.icons-user","sEHzxHwM"],["oojs-ui.styles.icons-wikimedia","lkxNQ/+5"],["skins.archlinux.styles","RGDJGXjF"],["ext.nuke","TTF95brw"],["ext.checkUser","86BeVTWJ",[145]],["ext.interwiki.specialpage","5ccliwHl",[41]],["ext.abuseFilter","UXreA/7W"],["ext.abuseFilter.edit","5tphQGa3",[48,53,100]],["ext.abuseFilter.tools","oxMLVDZG",[48,100]],["ext.abuseFilter.examine","9z0cC7pQ",[48,100]]]);;mw.config.set({"wgLoadScript":"/load.php","debug":!1,"skin":"archlinux","stylepath":"/skins","wgUrlProtocols":
"bitcoin\\:|ftp\\:\\/\\/|ftps\\:\\/\\/|geo\\:|git\\:\\/\\/|gopher\\:\\/\\/|http\\:\\/\\/|https\\:\\/\\/|irc\\:\\/\\/|ircs\\:\\/\\/|magnet\\:|mailto\\:|mms\\:\\/\\/|news\\:|nntp\\:\\/\\/|redis\\:\\/\\/|sftp\\:\\/\\/|sip\\:|sips\\:|sms\\:|ssh\\:\\/\\/|svn\\:\\/\\/|tel\\:|telnet\\:\\/\\/|urn\\:|worldwind\\:\\/\\/|xmpp\\:|\\/\\/","wgArticlePath":"/index.php/$1","wgScriptPath":"","wgScriptExtension":".php","wgScript":"/index.php","wgSearchType":null,"wgVariantArticlePath":!1,"wgActionPaths":{},"wgServer":"https://wiki.archlinux.org","wgServerName":"wiki.archlinux.org","wgUserLanguage":"en","wgContentLanguage":"en","wgTranslateNumerals":!0,"wgVersion":"1.26.4","wgEnableAPI":!0,"wgEnableWriteAPI":!0,"wgMainPageTitle":"Main page","wgFormattedNamespaces":{"-2":"Media","-1":"Special","0":"","1":"Talk","2":"User","3":"User talk","4":"ArchWiki","5":"ArchWiki talk","6":"File","7":"File talk","8":"MediaWiki","9":"MediaWiki talk","10":"Template","11":"Template talk","12":"Help","13":
"Help talk","14":"Category","15":"Category talk"},"wgNamespaceIds":{"media":-2,"special":-1,"":0,"talk":1,"user":2,"user_talk":3,"archwiki":4,"archwiki_talk":5,"file":6,"file_talk":7,"mediawiki":8,"mediawiki_talk":9,"template":10,"template_talk":11,"help":12,"help_talk":13,"category":14,"category_talk":15,"image":6,"image_talk":7,"project":4,"project_talk":5},"wgContentNamespaces":[0],"wgSiteName":"ArchWiki","wgDBname":"archwiki","wgExtraSignatureNamespaces":[],"wgAvailableSkins":{"archlinux":"ArchLinux","fallback":"Fallback","apioutput":"ApiOutput"},"wgExtensionAssetsPath":"/extensions","wgCookiePrefix":"archwiki","wgCookieDomain":"","wgCookiePath":"/","wgCookieExpiration":15552000,"wgResourceLoaderMaxQueryLength":-1,"wgCaseSensitiveNamespaces":[],"wgLegalTitleChars":" %!\"$&'()*,\\-./0-9:;=?@A-Z\\\\\\^_`a-z~+\\u0080-\\uFFFF","wgResourceLoaderStorageVersion":1,"wgResourceLoaderStorageEnabled":!1,"wgResourceLoaderLegacyModules":["mediawiki.legacy.wikibits"],"wgForeignUploadTargets":
[],"wgEnableUploads":!0});window.RLQ=window.RLQ||[];while(RLQ.length){RLQ.shift()();}window.RLQ={push:function(fn){fn();}};}var script=document.createElement('script');script.src="/load.php?debug=false&lang=en&modules=jquery%2Cmediawiki&only=scripts&skin=archlinux&version=8%2FFpbfdn";script.onload=script.onreadystatechange=function(){if(!script.readyState||/loaded|complete/.test(script.readyState)){script.onload=script.onreadystatechange=null;script=null;startUp();}};document.getElementsByTagName('head')[0].appendChild(script);}());
/* Cached 20170304032810 */