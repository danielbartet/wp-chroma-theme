"use strict";function setFBCookie(){var e=new Date;e.setTime(e.getTime()+36e5),e.toUTCString(),document.cookie="referred=facebook"}function getFBCookie(e){for(var t=e+"=",o=decodeURIComponent(document.cookie).split(";"),a=0;a<o.length;a++){for(var n=o[a];" "==n.charAt(0);)n=n.substring(1);if(0==n.indexOf(t))return n.substring(t.length,n.length)}return""}function checkFBCookie(){return"facebook"==getFBCookie("referred")}function appendScript(e,t,o){document.getElementsByTagName("head")[0];var a=document.getElementsByTagName("body")[0],n=document.createElement("script"),d=document.createTextNode(t);n.type="text/javascript",n.async=o,1<e.length&&(n.src=e),n.appendChild(d),a.appendChild(n)}(-1<document.referrer.indexOf("facebook")||-1<window.location.href.indexOf("utm_source=Facebook")&&0<document.getElementsByClassName("page-1").length)&&setFBCookie();var lastPage=void 0===document.getElementsByClassName("gallery-pagination")[0];if(checkFBCookie()&&(document.getElementById("fb-box").innerHTML='<div class="fb-like" data-href="https://www.facebook.com/idropnews/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>&nbsp;<div class="fb-share-button" data-href="'+window.location.href+'" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>',lastPage)){var styleNode=document.createElement("style");styleNode.type="text/css";var styleText=document.createTextNode(".carousel-box {display: flex; flex-direction: column;} .comments-title, #disqus_thread, .disqus {display: none;} .ad-box{order: 1;} .win {order: 2;} #fb-box{order: 3; max-width: 500px;} .gallery-windows{order: 4;} .gallery-footer-ad{order: 6;} .gallery-footer-first{order: 5;}");styleNode.appendChild(styleText),document.getElementsByTagName("body")[0].appendChild(styleNode)}if(window.location.href.indexOf("utm_source=Facebook")<=-1){var revContentAdsense='\x3c!-- Ezoic - revcontent - native_bottom --\x3e<div id="ezoic-pub-ad-placeholder-107"><div id="rcjsload_030a3a"></div></div>\x3c!-- End Ezoic - revcontent - native_bottom --\x3e';null!=document.getElementById("content_ad_container")&&(document.getElementById("content_ad_container").innerHTML=revContentAdsense,appendScript(window.location.protocol+"//"+window.location.hostname+"/wp-content/themes/chroma/dist/js/rev-content.js","",""))}(adsbygoogle=window.adsbygoogle||[]).onload=function(){[].forEach.call(document.getElementsByClassName("lazyad"),function(){adsbygoogle.push({})})};