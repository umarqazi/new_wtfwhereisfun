<?php

use Illuminate\Support\Facades\Crypt;

if (! function_exists('encrypt_id')) {
    function encrypt_id($id)
    {
        return Crypt::encrypt($id);
    }
}

if (! function_exists('decrypt_id')) {
    function decrypt_id($id)
    {
        return Crypt::decrypt($id);
    }
}