<?php
use Hashids\Hashids;

if (! function_exists('encrypt_id')) {
    function encrypt_id($id)
    {
        $hashids = new Hashids('', 10);
        return $hashids->encode($id);
    }
}

if (! function_exists('decrypt_id')) {
    function decrypt_id($id)
    {
        $hashids = new Hashids('', 10);
        $id  = $hashids->decode($id);
        return $id[0];
    }
}

function randomHash($num_bytes=8)
{
    return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}