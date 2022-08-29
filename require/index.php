<?php
    
    // 函数集
    function text_url2host($url = '') {
        return strtolower(explode('/', $url)[2]);
    }
    function text_format_dir($dir = '') {
        if (! $dir) return '/';
        return preg_replace('/\\/+/iu', '/', $dir);
    }
    
    if (c::$CROSS_DOMAIN_CONTROL) {
        // 跨域检测、设置
        $__origin = $_SERVER['HTTP_ORIGIN'];
        $__origin_domain = text_url2host(isset($__origin) ? $__origin : '');
        if ($__origin_domain && __parseDomain($__origin_domain)) {
            header('Access-Control-Allow-Origin: ' . $__origin);
        }
    }
?>