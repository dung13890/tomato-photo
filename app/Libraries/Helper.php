<?php

/**
 * Format data response
 *
 * @param string $asset
 * @return string path
 */
if (!function_exists('publicSrc')) {
    function publicSrc($src, $path = 'statics/files/')
    {
        if (!$src) {
            return asset('images/static/no-image.jpg');
        }
        return asset("{$path}{$src}");
    }
}

if (!function_exists('isActiveRoute')) {
    function isActiveRoute(array $routes, $output = 'active')
    {
        if (in_array(Request::url(), $routes) || in_array(parse_url(\Request::url(), PHP_URL_PATH), $routes)) {
            return $output;
        }
    }
}
