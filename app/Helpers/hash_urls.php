<?php
use Hashids\Hashids;

if (! function_exists('encrypt_id')) {
    /**
     * @param $id
     * @return string
     */
    function encrypt_id($id)
    {
        $hashids = new Hashids('', 10);
        return $hashids->encode($id);
    }
}

if (! function_exists('decrypt_id')) {
    /**
     * @param $id
     * @return mixed
     */
    function decrypt_id($id)
    {
        $hashids = new Hashids('', 10);
        $id  = $hashids->decode($id);
        return $id[0];
    }
}

/**
 * @param int $num_bytes
 * @return string
 */
function randomHash($num_bytes=8)
{
    return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}

/**
 * @param $url
 * @param $subdomain
 * @return string
 */
function injectSubdomain($url,$subdomain){
   $url_parts = explode('://www',$url);
   $url_parts2 = explode('://',$url);
   if(count($url_parts) > 1){
       return $url_parts[0].'//'.$subdomain.'.'.$url_parts[1];
   }
   return $url_parts2[0].'//'.$subdomain.'.'.$url_parts2[1];
}

if (! function_exists('parseUrl')) {
    /**
     * @param $id
     * @return mixed
     */
    function parseUrl($url)
    {
        $parsed = parse_url($url);
        return $parsed['host'];
    }
}
