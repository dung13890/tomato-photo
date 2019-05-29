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

if (!function_exists('get_id_form_link_youtube')) {
    function get_id_form_link_youtube($url)
    {
        /**
        * Pattern matches
        * https://gist.github.com/leogopal/b429f9700d473a55f70819dc6e5195f0
        */
        $pattern = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";

        // Checks if it matches a pattern and returns the value
        if (preg_match($pattern, $url, $match)) {
            return $match[1] ?? null;
        }

        return null;
    }
}
