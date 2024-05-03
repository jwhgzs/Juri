<?php
    
    error_reporting(0);
    
    /* 公共处理 */
    // 跨域检测，参考：https://www.gxlcms.com/PHPjiqiao-375366.html
    /*
    $__origin = $_SERVER['HTTP_ORIGIN'];
    $__origin_domain = text_url2host(isset($__origin) ? $__origin : '');
    if ($__origin_domain && __parseDomain($__origin_domain)) {
        header('Access-Control-Allow-Origin: ' . $__origin);
    }
    */
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    // 正则表达式长度限制解除，参考：https://blog.csdn.net/leafgw/article/details/50381298
    ini_set('pcre.backtrack_limit', -1);
    
    /* 这里可以放置自定义函数集 */
    
?>