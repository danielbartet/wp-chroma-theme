//content.ads
(function(d) {
    var params = {
        id: "051e51d4-dcdd-4df8-9e05-632342c7344f",
        d: "aWRyb3BuZXdzLmNvbQ==",
        wid: "461269",
        cb: (new Date()).getTime()
    };
    var qs = Object.keys(params).reduce(function(a, k) { a.push(k + '=' + encodeURIComponent(params[k])); return a }, []).join(String.fromCharCode(38));
    var s = d.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    var p = 'https:' == document.location.protocol ? 'https' : 'http';
    s.src = p + "://api.content-ad.net/Scripts/widget2.aspx?" + qs;
    d.getElementById("contentad461269").appendChild(s);
})(document);
