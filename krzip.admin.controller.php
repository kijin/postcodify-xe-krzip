<?php

class krzipAdminController extends krzip
{
    public function init()
    {
        // no-op
    }

    public function procKrzipAdminInsertConfig()
    {
        $args = Context::gets('krzip_server_url', 'krzip_map_provider', 'krzip_address_format', 'krzip_postcode_format', 'krzip_server_request_format', 'krzip_require_exact_query', 'krzip_use_full_jibeon');
        if (!$args->krzip_server_url) $args->krzip_server_url = $this->freeapi_url;
        if (!$args->krzip_address_format) $args->krzip_address_format = 'postcodify';
        if (!$args->krzip_postcode_format) $args->krzip_postcode_format = 6;
        if (!$args->krzip_server_request_format) $args->krzip_server_request_format = 'CORS';
        if (!$args->krzip_require_exact_query) $args->krzip_require_exact_query = 'N';
        if (!$args->krzip_use_full_jibeon) $args->krzip_use_full_jibeon = 'N';
        
    	if (!strncasecmp($args->krzip_server_url, '//api.poesis.kr/', 16))
    	{
    	    $args->krzip_server_url = 'https:' . $args->krzip_server_url;
    	}
    	
        $oModuleController = getController('module');
        $output = $oModuleController->insertModuleConfig('krzip', $args);
        if (!$output->toBool()) return $output;
        
        $this->setMessage('success_registed');
        
        if (Context::get('success_return_url'))
        {
            $this->setRedirectUrl(Context::get('success_return_url'));
        }
        else
        {
            $this->setRedirectUrl(getNotEncodedUrl('', 'module', 'krzip', 'act', 'dispKrzipAdminConfig'));
        }
    }
}
