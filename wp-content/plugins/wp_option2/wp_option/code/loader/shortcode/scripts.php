  <!--[if lte IE 9]>
    <script src="//static.optionlift.com/xdomain.js" data-slave="http://safe.crm.optionlift.com/xdomain/proxy.php"></script>
    <script>
        xdomain.slaves({
            "http:<?php echo str_replace('/api', '',$api_url);?>": "/xdomain/proxy.php",
            "https://<?php echo str_replace('/api', '',$api_url);?>": "/xdomain/proxy.php",
            "http://rates.optionlift.com": "/xdomain/proxy.php",
            "https://rates.optionlift.com": "/xdomain/proxy.php",
            "http://sockets.optionlift.com": "/xdomain/proxy.php",
            "https://sockets.optionlift.com": "/xdomain/proxy.php"
        });
    </script>    <![endif]-->
<script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.17/require.min.js"></script>

<script type="text/javascript">
/*global define */
    (function (document, window, callbacks) {

        (window[callbacks] = window[callbacks] || []).push(function () {
            try {
                new OptionLift.App({ id: 1, containerId: 'ol_<?php echo $a['id'];?>', staticUrl: STATIC_URL, apiUrl: API_URL, marketUrl: MARKET_DATA_URL, settings: SETTINGS});
            } catch (e) {
                console.error(e);
            }
        });

        /* Insert script */
        var after = document.getElementsByTagName("script")[0],
            script = document.createElement("script"),
            func = function () {
                after.parentNode.insertBefore(script, after);
            };

        var STATIC_URL = '<?php echo $static_url;?>';
        var API_URL = '<?php echo $api_url;?>';
        var MARKET_DATA_URL = '<?php echo $rates_url;?>';

        var SETTINGS = <?php echo json_encode($settings);?>;

        script.type = "text/javascript";
        script.async = true;
        script.src = STATIC_URL + "/loader.js";
 

        if (window.opera == "[object Opera]") {
            document.addEventListener("DOMContentLoaded", func, false);
        } else {
            func();
        }
        /* End insert script */

    })(document, window, "optionlift_callbacks");

</script>