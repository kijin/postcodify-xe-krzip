<?php

class krzip extends ModuleObject
{
    public $freeapi_url = '//api.poesis.kr/post/search.php';
    public $plugin_url = '//cdn.poesis.kr/post/popup.min.js';
    
    public function moduleInstall()
    {
        return new Object();
    }
    
    public function checkUpdate()
    {
        return false;
    }
    
    public function moduleUpdate()
    {
        return new Object(0, 'success_updated');
    }
    
    public function recompileCache()
    {
        // no-op
    }
}
