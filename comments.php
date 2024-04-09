<script>
/**************************************************************/
/*AM22 Named Function to load Disqus - START*/
var disqus_identifier = window.location.url; //Use current page URL as Disqus_URL_Identifier. You can change it as per your requirement.
var ds_loaded = false; //To track loading only once on a page.
function loadDisqus()
{
    var disqus_div = $("#disqus_thread"); //The ID of the Disqus DIV tag
    var top = disqus_div.offset().top;
    var disqus_data = disqus_div.data();
    if ( !ds_loaded && $(window).scrollTop() + $(window).height() > top ) 
    {
        ds_loaded = true;
        for (var key in disqus_data) 
        {
            if (key.substr(0,6) == 'disqus') 
            {
                window['disqus_' + key.replace('disqus','').toLowerCase()] = disqus_data[key];
            }
        }
        var dsq = document.createElement('script');
        dsq.type = 'text/javascript';
        dsq.async = true;
        dsq.src = 'https://' + window.disqus_shortname + '.disqus.com/embed.js?https';
//    dsq.src = 'https://idropnews.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    }  
}
/*AM22 Named Function to load Disqus - END*/
/*AM22 Disqus lazy load - START*/
$(function () 
{
    var disqus_div = $("#disqus_thread");
    if (disqus_div.size() > 0) 
    {
        $(window).scroll(loadDisqus);      
    }  
}
);
/*AM22 Disqus lazy load - END*/
</script>
