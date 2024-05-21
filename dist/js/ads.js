/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {


//content.ads
(function (d) {
  var params = {
    id: "051e51d4-dcdd-4df8-9e05-632342c7344f",
    d: "aWRyb3BuZXdzLmNvbQ==",
    wid: "461269",
    cb: new Date().getTime()
  };
  var qs = Object.keys(params).reduce(function (a, k) {
    a.push(k + '=' + encodeURIComponent(params[k]));
    return a;
  }, []).join(String.fromCharCode(38));
  var s = d.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  var p = 'https:' == document.location.protocol ? 'https' : 'http';
  s.src = p + "://api.content-ad.net/Scripts/widget2.aspx?" + qs;
  d.getElementById("contentad461269").appendChild(s);
})(document);
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {


(function () {
  var referer = "";
  try {
    if (referer = document.referrer, "undefined" == typeof referer || "" == referer) throw "undefined";
  } catch (exception) {
    referer = document.location.href, ("" == referer || "undefined" == typeof referer) && (referer = document.URL);
  }
  referer = referer.substr(0, 700);
  var rcel = document.createElement("script");
  rcel.id = 'rc_' + Math.floor(Math.random() * 1000);
  rcel.type = 'text/javascript';
  rcel.src = "https://trends.revcontent.com/serve.js.php?w=90320&t=" + rcel.id + "&c=" + new Date().getTime() + "&width=" + (window.outerWidth || document.documentElement.clientWidth) + "&referer=" + referer;
  rcel.async = true;
  var rcds = document.getElementById("rcjsload_030a3a");
  rcds.appendChild(rcel);
})();
})();

/******/ })()
;