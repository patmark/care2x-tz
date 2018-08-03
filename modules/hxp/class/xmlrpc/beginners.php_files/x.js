var hcUpdateState = 0;

var hcControlImage;
var hcIsImage = false;
var hcCounter = 0;
var hcCmd = "knockPage";
var scriptType = "SERVERBASED";
var hcTimeout = 5;
var hcSendCounter = 0;

var hcPageID = null;

var hcLeft = -1;
var hcTop = -1;

var hcNS = (document.layers) ? true : false;
var hcIE = (document.all) ? true : false;
var hcDOM = (document.getElementById) ? true : false;
if (hcIE)
	hcDOM = false;
var hcMAC = (navigator.platform) && (navigator.platform.toUpperCase().indexOf("MAC") >= 0);
if (hcNS)
	hcMAC = false;
var hcShowImage = false;

var hcPos = - 30;
var HumanStep = 3;
var hcDir = HumanStep;
var hcBorder = 100;
var hcAnimate = false;

var hcNeedImage;
var hcCloseImage;
var hcImageFetched = false;

var hcimage = hcGetImage("hcIcon");
if (hcimage)
	hcicon = hcimage.src;

var hcParam = null;
var hcOpenVars = null;

var hcLoadingImage = false;

var hcLayerWidth = 400;
var hcLayerHeight = 300;

var hcClickURL;

var HCinit = true;

var lpForcePopup = ("{forcePopup}" == "true");

var	visitorStatus = "INSITE_STATUS";
var	lpActivePlugin = "none";

if ("{newChannel}" == "true") {
	var lpPosY = 100;
	var lpPosX = 100;
	var lpOperatorViewable= 'true';
	var lpOperatorPageType= 'CoBrowse';
}

if (hcDOM)
{
	hcControlImage = document.createElement('IMG');
	hcControlImage.style.visibility = "hidden";
	document.body.appendChild(hcControlImage);
} else
if (hcMAC)
{
	document.writeln("<div style='visibility:hidden'><img src='http://server.iad.liveperson.net/hcp/window/common/spacer.gif' id='hcControlImage' name='hcControlImage'></div>");
	hcControlImage = document.hcControlImage;
}


function hcGetObj(id)
{
	if (document.getElementById)
		return document.getElementById(id);
	else
	if (document.all)
		return document.all(id);
}

function hcObjShow(obj)
{
	if (hcNS)
		obj.visibility="show";
	else
		obj.style.visibility="visible";
}

function hcDate()
{
	var d = new Date();

	return d.getTime();
}

function hcSendRequest()
{
	hcSendCounter++;
	if (hcSendCounter == 5)
		hcIsImage = false;

	if (! hcIsImage) {
		if ((! hcDOM) && (! hcMAC))
			hcControlImage= new Image;
		if (hcPageID==null) hcPageID=Math.round(Math.random()*9999999999);
		var windowname = window.name;
		if (windowname.length > 256)
			windowname = windowname.substring(0, 255);
		var u = 'http://server.iad.liveperson.net/hc/52472728/?site=52472728' +
					'&cmd=' + hcCmd +
					'&page=' + escape(document.location) +
					'&title=' + escape(document.title) +
					'&visitorStatus=' + escape(visitorStatus) +
					'&activePlugin=' + escape(lpActivePlugin) +
					'&pageWindowName=' + escape(windowname) +
					'&referrer=' + escape(document.referrer) +
					'&id=' + hcPageID +
					'&d=' + hcDate();
        if (hcCmd == "knockPage")
			hcCmd = "startPage";
        else {
			if ((typeof(tagVars) != "undefined") && (tagVars != "")) {
				u = u + "&" + tagVars;
				tagVars = "";
			}
			var activateCobrowse = false;
			if ( true ) {
				u = u + "&cobrowse=true";
				activateCobrowse = true;
			}

	        if ( (typeof(lpOperatorViewable) != "undefined") && (lpOperatorViewable == "true") ) {
				if (! activateCobrowse) {
					u = u + "&cobrowse=true";
					activateCobrowse = true;
				}
	            if (typeof(lpOperatorPageType) != "undefined") {
	                u = u  + "&cobrowsetitle=" + escape(lpOperatorPageType);
	            }
	            if (typeof(lpOperatorPageUrl) != "undefined") {
	                u = u  + "&cobrowseurl=" + escape(lpOperatorPageUrl);
	            }
	        }
			if (scriptType != null) {
				u = u + "&scriptType=" + scriptType;
				scriptType = null;
			}
			hcCmd = "inPage";
			if (activateCobrowse) {
				var cookies = document.cookie;
				if ((typeof(cookies) == "undefined") || (cookies == null)) 
					cookies = "";
				if (u.length <= 1990)
					while (escape(cookies).length + u.length > 1990) {
						var idx = cookies.lastIndexOf(";");
						if (idx >= 0)
							cookies = cookies.substring(0, idx);
						else
							cookies = "";
					}
				u = u + "&cookie=" + escape(cookies);
			}
		}
		hcControlImage.src = u;
		hcIsImage = true;
		hcSendCounter = 0;
	}
}

function hcPlaceLayersIE()
{
}
function hcPlaceLayersNS()
{
}
function hcHandlePopup(w, h)
{
}



var hcImg30Sequence = 0;
function hcHandleWidthHeight(w,h)
{
    if (h==1) {
        var wCode = w-w%2;
        var more = w%2;
        if (wCode == 30) {
			hcImg30Sequence++;
			if (hcImg30Sequence == 2)
				hcTimeout = -1;
        } else if (wCode == 40) {
		hcTimeout = 15;
        } else if (wCode == 50) {
		hcTimeout = 30;
        } else if (wCode == 60) {
            openChat(null, null);
        } else if (wCode == 70) {
            openEngageChat("engage", null);
        } else if (wCode == 80) {
			hcReloadIcon();
		} else if (wCode == 90) {
            hcCounter=0;
            hcTimeout = 1;
		} else if (wCode == 100) {
			lpActivePlugin = "none";
		} else if (wCode == 110) {
			lpActivePlugin = "PCB";
			setTimeout('activateCobrowsePlugin()', 10);
		} else if (wCode == 130) {
			handleRedirectCommand();
		}
		if (wCode != 30)
		    hcImg30Sequence = 0;
        if (more==1) {
            hcCounter=0;
            hcTimeout=1;
        }
    } else hcHandlePopup(w, h);
}

function handleRedirectCommand() {
	var s = 'http://server.iad.liveperson.net/hc/52472728/?site=52472728' +
					'&cmd=visitorRedirect' +
					'&defaultURL=' + escape(document.location) +
					'&d=' + hcDate();
	document.location = s;
}

function activateCobrowsePlugin() {
	if ((typeof(document["CBAgent"]) == "undefined") || (document["CBAgent"] == null) || (typeof(document["CBAgent"].connect) == "undefined")) {
		var scrtag = '<script src="http://server.iad.liveperson.net/hcp/html/lpcb.js" defer></script>';
        var screlem=document.createElement(scrtag);
		var tag = '<applet code="CBAgent.class" codeBase="http://server.iad.liveperson.net/applets/v6.1" archive="cbagent.jar" name="CBAgent" style="HEIGHT: 1px; LEFT: 0px; TOP: 0px; WIDTH: 2px; POSITION: absolute" mayscript></applet>';
		var elem = document.createElement(tag);
		elem["site"] =     "52472728";
		elem["charSet"] =  "ISO-8859-1";
		elem["encoding"] = "{encoding}";
		elem["connectionType"]="http";
		elem["loglevel"]="{cbDebug}";
		elem["cabbase"]="cbagent.cab";
		if (window.name == "") {
			window.name = "LPCB" + (new Date().getTime());
		}
		var appletInstanceID = window.name;
		elem["appletInstanceID"] = escape(appletInstanceID);
		document.body.appendChild(screlem);
		document.body.appendChild(elem);
	} else {
		document["CBAgent"].connect();
	}
}

function hcCheckImages()
{
	if (hcIsImage) {
		if (((hcDOM) || (hcMAC)) && (! hcControlImage.complete))
		{
			hcLoadingImage = true;
			return;
		}
		var w = hcControlImage.width;
		var h = hcControlImage.height;
		hcLoadingImage = false;

		if (w == 0)
			return;
		hcIsImage = false;
		hcHandleWidthHeight(w,h);
	}
}

var hcLoadTimer = 0;

function hcloop()
{
	if (hcTimeout < 0)
		return;

	if (hcCounter == 0)
	{
		if (! hcLoadingImage)
		{
			hcSendRequest();
			hcLoadTimer = 0;
		}
		else
		{
			hcLoadTimer++;
			if (hcLoadTimer == 5)
			{
				hcIsImage = false;
				hcSendRequest();
				hcLoadTimer = 0;
			}
		}
	}
	hcCounter = (hcCounter + 1) % hcTimeout;
	hcCheckImages();

	setTimeout('hcloop()', 1000);
}

function hcReloadIcon()
{
	if (hcimage)
		hcimage.src = hcicon + "&monitor=1&d=" + hcDate();
}

function openChat(param, openVars)
{
	visitorStatus = "CHAT_STATUS";
	var s = document.location;
	if (param != null)
		s = "(" + param + ") " + s;
	s = escape(s);

    var oparms = "";
    if (openVars != null)
        oparms = oparms + "&" + openVars;

    var url = 'http://server.iad.liveperson.net/hc/52472728/?cmd=file&file=visitorWantsToChat' + oparms + '&site=52472728&d=' + hcDate()+'&referrer='+s;
    var name = 'chat52472728';
    var params = 'width=472,height=320,menubar=no,scrollbars=0';

    if (typeof(lpOpenChat) == "function") {
        lpOpenChat(url, name, params);
    } else {
        window.open(url, name, params);
    }
}

function openCredit()
{
	document.location = "http://www.liveperson.com/ref/lppb.asp";
}

function openEngageChat(param, openVars) {
	hcParam = param;
	hcOpenVars = openVars;
	if ((! lpForcePopup) && (hcIE || hcNS || hcDOM)) {
		hcShowTheImage();
	} else {
		window.open('http://server.iad.liveperson.net/hc/52472728/?cmd=file&file=wantsToChat&site=52472728&d=' + hcDate(), 'wanttochat52472728', 'width=273,height=138,menubar=no,scrollbars=no');
	}
}

function openWantsToChat()
{
	openEngageChat(null, null);
}

function hcPreload()
{
	hcNeedImage = new Image();
	hcNeedImage.src = "http://server.iad.liveperson.net/hcp/woman/2/en/need_help_on.gif";

	hcCloseImage = new Image();
	hcCloseImage.src = "http://server.iad.liveperson.net/hcp/woman/2/en/close_on.gif";
}

function hcSetImageGo(name, image, go)
{
	hcAnimate = go;
	hcSetImage(name, image);
}

function hcSetImage(name, image)
{
	hcGetImage(name).src = "http://server.iad.liveperson.net/hcp/woman/2/en/" + image;
}


function hcWriteDoc(str)
{
	document.writeln(str);
}

if (hcIE || hcDOM) {
	hcWriteDoc('<div id="mylayer" style="z-index:90;position:absolute;visibility:hidden;left:10;top:10">');
	hcWriteDoc('<table border="0" cellspacing="0" cellpadding="0">');
	hcWriteDoc('<tr><td><a name="needRef" href="#" onClick="return hcAcceptCall()" target="_self" onmouseover=hcSetImageGo("need_help","need_help_on.gif",false) onmouseout=hcSetImageGo("need_help","need_help_off.gif",true)><img name="need_help" onload="hcFloatIconLoaded()" border="0"></a></td></tr>');
	hcWriteDoc('<tr><td><a href="#" onClick="return hcRejectCall()" target="_self" onmouseover=hcSetImageGo("need_close","close_on.gif",false) onmouseout=hcSetImageGo("need_close","close_off.gif",true)><img name="need_close" border="0"></a></td></tr>');
	hcWriteDoc('</table></div>');
	hcPlaceLayersIE();
} else if (hcNS) {
	hcWriteDoc('<layer name="mylayer" z-index="90" left="10" top="10" visibility="hidden">');
	hcWriteDoc('<table border="0" cellspacing="0" cellpadding="0">');
	hcWriteDoc('<tr><td><a href="#" onClick="return hcAcceptCall()" target="_self" onmouseover=hcSetImageGo("need_help","need_help_on.gif",false) onmouseout=hcSetImageGo("need_help","need_help_off.gif",true)><img name="need_help" src="http://server.iad.liveperson.net/hcp/woman/2/en/need_help_off.gif" onload="hcFloatIconLoaded()" border="0"></a></td></tr>');
	hcWriteDoc('<tr><td><a href="#" onClick="return hcRejectCall()" target="_self" onmouseover=hcSetImageGo("need_close","close_on.gif",false) onmouseout=hcSetImageGo("need_close","close_off.gif",true)><img name="need_close" src="http://server.iad.liveperson.net/hcp/woman/2/en/close_off.gif" border="0"></a></td></tr>');
	hcWriteDoc('</table></layer>');
	hcPlaceLayersNS();
}
function hcFloatIconLoaded()
{
	hcImageFetched = true;
}

function hcImageTimer()
{
	if (hcShowImage && hcImageFetched) {
		var top;
		var left;

		if (hcIE) {

			top = document.body.scrollTop;
			left = document.body.scrollLeft;

			if ((hcTop < 0) || ((hcTop == top) && (hcLeft == left))) {
				document.all.mylayer.style.visibility = "visible";
			} else {
				document.all.mylayer.style.visibility = "hidden";
			}

		} else if (hcNS) {

			top = pageYOffset;
			left = pageXOffset;

			if ((hcTop < 0) || ((hcTop == top) && (hcLeft == left))) {
				document.layers.mylayer.visibility = "visible";
			} else {
				document.layers.mylayer.visibility = "hidden";
			}
		} else if (hcDOM){
			top = pageYOffset;
			left = pageXOffset;
			if ((hcTop < 0) || ((hcTop == top) && (hcLeft == left))) {
				hcGetObj("mylayer").style.visibility = "visible";
			} else {
				hcGetObj("mylayer").style.visibility = "hidden";
			}
		}

		hcPlaceImage();

		hcTop = top;
		hcLeft = left;
	}

	setTimeout('hcImageTimer()', 250);
}

function hcAcceptCall()
{
	hcHideTheImage();

	openChat(hcParam, hcOpenVars);

	return false;
}

function hcRejectCall()
{
	visitorStatus = "REJECT_STATUS";

	hcHideTheImage();

	hcCmd = "rejectChat";
	hcCounter = 0;

	return false;
}

function hcInvitationTimeout()
{
	if (visitorStatus != "ENGAGE_STATUS")
		return;

	hcHideTheImage();

	hcCmd = "inviteTimeout&timeout=" +lpInviteTimeout;
	visitorStatus = "REJECT_STATUS";
	hcCounter = 0;

	return false;
}

function hcHideTheImage()
{
	hcShowImage = false;

	if (hcIE) {
		document.all.mylayer.style.visibility = "hidden";
	} else if (hcNS) {
		document.layers.mylayer.visibility = "hidden";
	} else if (hcDOM) {
		hcGetObj("mylayer").style.visibility = "hidden";
	}
}

function hcShowTheImage()
{
	visitorStatus = "ENGAGE_STATUS";

	hcShowImage = true;

	hcSetImage("need_help","need_help_off.gif");
	hcSetImage("need_close","close_off.gif");

	hcAnimate = true;

	hcPreload();

	hcAnimateStart();
	if ((typeof(lpInviteTimeout) != "undefined") && (lpInviteTimeout != "") && (lpInviteTimeout > 0)) {
		setTimeout('hcInvitationTimeout()', 1000 * lpInviteTimeout);
	}
}

function hcAnimateStart()
{
	if (hcIE) {
		hcBorder = document.body.clientWidth;
	} else if (hcNS) {
		hcBorder = window.innerWidth;
	} else if (hcDOM) {
		hcBorder = window.innerWidth;
	}

	hcAnimateImage();
}

function getImageWidth(name)
{
	if (hcDOM)
		return (document.getElementsByTagName("IMG")[name]).width;
	else
	if (hcIE)
		return (document.all(name)).width;
	else
	if (hcNS)
		return (document[name]).width;
	else
		return null;
}

function hcAnimateImage()
{
	if (hcImageFetched && hcAnimate)
		hcPos = hcPos + hcDir;

	if (hcPos > hcBorder - 160)
		hcDir = - HumanStep;

	hcPlaceImage();

	if ((hcPos > 30) || (hcDir > 0))
		setTimeout("hcAnimateImage()", 20);
}

function hcPlaceImage()
{
	var y = 40;
	var x = hcPos;
	if (typeof(lpPosX) != "undefined")
		x = lpPosX;
	if (typeof(lpPosY) != "undefined")
		y = lpPosY;
	var obj = null;
	if (hcIE) {
		obj = document.all.mylayer.style;
	} else if (hcNS) {
		obj = document.layers.mylayer;
	} else if (hcDOM) {
		obj = hcGetObj("mylayer").style;
	}
    if (typeof(lpPlacementFunctionHook) == "function") {
		lpPlacementFunctionHook(obj);
 	} else {
		if (hcIE) {
			obj.left = document.body.scrollLeft + x;
			obj.top = document.body.scrollTop + y;
		} else if (hcNS) {
			obj.left = pageXOffset + x;
			obj.top = pageYOffset + y;
		} else if (hcDOM) {
			obj.left = pageXOffset + x;
			obj.top = pageYOffset + y;
		}
	}
}

function hcGetImage(name)
{
	return hcFindImage(document, name);
}

function hcFindImage(doc, name)
{
	if (hcDOM)
		return doc.getElementsByTagName("IMG")[name];
	var lays = doc.layers;

	if (! lays)
		return doc[name];

	for (var i = 0; i < doc.images.length; i++) {
		if (doc.images[i].name == name)
			return doc.images[i];
	}

	for (var l = 0; l < lays.length; l++) {
		img = hcFindImage(lays[l].document, name);
		if (img != null)
			return img;
	}

	return null;
}


function hcgo()
{
    var startAfter=1;
    var x = new String(document.location).indexOf("lpAutoChat=1");
    if (x >= 0)
        startAfter = 10000;

	if (typeof(lpCobrowsedPage) != "undefined")
		return;
	setTimeout('hcloop()', startAfter);
	setTimeout('hcImageTimer()', 250);
}
function hcLegalPage() {
	return true;
}

if (true) {
	if (hcLegalPage()) hcgo();
}

