<?php
if (! function_exists('getDirectory')) {
    function getDirectory($type, $id = null)
    {
        if($id == null){
            $relative_path = 'public/uploads/'.$type.'/';
            $web_path = asset('storage/uploads/'.$type).'/';
        }else{
            $relative_path = 'public/uploads/'.$type.'/'.$id.'/';
            $web_path = asset('storage/uploads/'.$type.'/'.$id).'/';
        }
        return ['relative_path' => $relative_path, 'web_path' => $web_path];
    }
}