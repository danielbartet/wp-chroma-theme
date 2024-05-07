// facebook cookie tracker, layout adjuster, lazy ads
function setFBCookie() {
  var d = new Date();
  d.setTime(d.getTime() + 3600000);
  var expires = "expires="+d.toUTCString();
  document.cookie = "referred=facebook"; + expires + ";path=/";
}

function getFBCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
    return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkFBCookie() {
  var referred = getFBCookie("referred");
  if ( referred == "facebook" )
    return true;
  else
    return false;
}

//construct and append scripts
function appendScript(pathToScript, innerScript, allowAsync) {
  var theHead = document.getElementsByTagName("head")[0],
      theFoot = document.getElementsByTagName("body")[0],
      autoAdScript = document.createElement("script"),
      innerTextNode = document.createTextNode(innerScript);
  autoAdScript.type = "text/javascript";
  autoAdScript.async = allowAsync;
  if (pathToScript.length > 1) {
    autoAdScript.src = pathToScript;
  }
  autoAdScript.appendChild(innerTextNode);
  theFoot.appendChild(autoAdScript);
}

if (
  document.referrer.indexOf('facebook') > -1
  || window.location.href.indexOf('utm_source=Facebook') > -1
  && document.getElementsByClassName('page-1').length > 0
) {
  setFBCookie()
}



var lastPage =
(typeof document.getElementsByClassName('gallery-pagination')[0] == 'undefined')
? true : false

if(checkFBCookie()) {
  // var contentAds = '<div id="contentad461269"></div>';
  //
  // document.getElementById("content_ad_container").innerHTML = contentAds;
  // appendScript(window.location.protocol + "//" + window.location.hostname + "/wp-content/themes/chroma/dist/js/contentads.js", "", "");

  if (lastPage) {
    var styleNode = document.createElement('style')
    styleNode.type = "text/css";

    var styleText = document.createTextNode('.carousel-box {display: flex; flex-direction: column;} .comments-title, #disqus_thread, .disqus {display: none;} .ad-box{order: 1;} .win {order: 2;} #fb-box{order: 3; max-width: 500px;} .gallery-windows{order: 4;} .gallery-footer-ad{order: 6;} .gallery-footer-first{order: 5;}');

    styleNode.appendChild(styleText);
    document.getElementsByTagName('body')[0].appendChild(styleNode);
  }
}

if (window.location.href.indexOf('utm_source=Facebook') <= -1) {
  var revContentAdsense =
  '<!-- Ezoic - revcontent - native_bottom --><div id="ezoic-pub-ad-placeholder-107"><div id="rcjsload_030a3a"></div></div><!-- End Ezoic - revcontent - native_bottom -->';
  if (document.getElementById("content_ad_container") != null) {
    document.getElementById("content_ad_container").innerHTML = revContentAdsense;
    //appendScript(window.location.protocol + "//" + window.location.hostname + "/wp-content/themes/chroma/dist/js/rev-content.js", "", "");
  }
}

//push lazy adsense units
(adsbygoogle = window.adsbygoogle || []).onload = function () {
    [].forEach.call(document.getElementsByClassName("lazyad"), function () {
        adsbygoogle.push({})
    })
}
