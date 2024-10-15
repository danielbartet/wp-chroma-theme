<?php 

function nativeAd() {
    $revcontent = '
        <div data-type="_mgwidget" data-widget-id="1607722"></div> 
        <script>
                (function(w,q){w[q]=w[q]||[];w[q].push(["_mgc.load"])})(window,"_mgq");
        </script>';

        return $revcontent;
}


function nativeAd_bak() {
    $revcontent = '
    <div id="rc-widget-a5a9b2" data-rc-widget data-widget-host="habitat" data-endpoint="//trends.revcontent.com" data-widget-id="90320" style="background: white;"></div>
    <script type="text/javascript" src="https://assets.revcontent.com/master/delivery.js" defer="defer"></script>';

    return $revcontent;
}


function tbn_ads_inside_content( $content ) {
        
    //We don't want to modify the_content in de admin area
    if( !is_admin() ) {
        $ads = '
        <div style="background: white;">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4229549892174356"
            crossorigin="anonymous"></script>
            <!-- Streaming_2 -->
            <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-4229549892174356"
            data-ad-slot="8654698374"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        ';
        $p_array = explode('</p>', $content );
        $p_count = 0;
        $p_count_two = 10;

        if( !empty( $p_array ) ){

            array_splice( $p_array, $p_count, 0, $ads );
            $output = '';

            foreach( $p_array as $key=>$value ){

                $output .= $value;

             }
        }

    }

    return $output;

}

?>
