<?php
if (! function_exists('getDirectory')) {
    function getDirectory($type, $id)
    {
        $relative_path = 'public/uploads/'.$type.'/'.$id.'/';
        $web_path = asset('storage/uploads/'.$type.'/'.$id).'/';
        return ['relative_path' => $relative_path, 'web_path' => $web_path];
    }
}