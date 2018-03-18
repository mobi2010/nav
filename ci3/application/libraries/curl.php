<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * curl 
 */


class Curl
{
    /**
	 * [put]
	 * @param  array  $params [description]
	 * 
	 * url 		[必填] string 	请求的地址
	 * data 	[选填] array  	请求的数据，key value 对应
	 * option   [选填] array  	curl设置的选项，key value 对应
	 * body 	[选填] string    raw,默认form-data
	 * 
	 * @return [type]         [description]
	 */
	function put($params=[])
	{
		$url = $params['url'];
		$data = isset($params['data']) ? $params['data'] : [];
		$option = isset($params['option']) ? $params['option'] : [];

		if(isset($params['body']) && $params['body'] == 'raw'){
			$body = $data;
		}else{
			$body = http_build_query($data);
		}

	    $defaults = array(
	        CURLOPT_CUSTOMREQUEST => 'PUT',
	        CURLOPT_HEADER => 0,
	        CURLOPT_URL => $url,
	        CURLOPT_FRESH_CONNECT => 1,
	        CURLOPT_RETURNTRANSFER => 1,
	        CURLOPT_FORBID_REUSE => 1,
	        CURLOPT_TIMEOUT => 0,
	        CURLOPT_SSL_VERIFYPEER => false,
	        CURLOPT_POSTFIELDS => $body
	    );

	    $ch = curl_init();
	    curl_setopt_array($ch, ($option + $defaults));
	    if( ! $result = curl_exec($ch))
	    {
	        trigger_error(curl_error($ch));
	    }
	    curl_close($ch);
	    return $result;
	}
    /**
	 * [delete]
	 * @param  array  $params [description]
	 * 
	 * url 		[必填] string 	请求的地址
	 * data 	[选填] array  	请求的数据，key value 对应
	 * option   [选填] array  	curl设置的选项，key value 对应
	 * body     [选填] string    raw,默认form-data
	 * 
	 * @return [type]         [description]
	 */
	function delete($params=[])
	{
		$url = $params['url'];
		$data = isset($params['data']) ? $params['data'] : [];
		$option = isset($params['option']) ? $params['option'] : [];

		if(isset($params['body']) && $params['body'] == 'raw'){
			$body = $data;
		}else{
			$body = http_build_query($data);
		}

	    $defaults = array(
	        CURLOPT_CUSTOMREQUEST => 'DELETE',
	        CURLOPT_HEADER => 0,
	        CURLOPT_URL => $url,
	        CURLOPT_FRESH_CONNECT => 1,
	        CURLOPT_RETURNTRANSFER => 1,
	        CURLOPT_FORBID_REUSE => 1,
	        CURLOPT_TIMEOUT => 0,
	        CURLOPT_SSL_VERIFYPEER => false,
	        CURLOPT_POSTFIELDS => $body
	    );

	    $ch = curl_init();
	    curl_setopt_array($ch, ($option + $defaults));
	    if( ! $result = curl_exec($ch))
	    {
	        trigger_error(curl_error($ch));
	    }
	    curl_close($ch);
	    return $result;
	}
	/**
	 * [post]
	 * @param  array  $params [description]
	 * 
	 * url 		[必填] string 	请求的地址
	 * data 	[选填] array  	请求的数据，key value 对应
	 * option   [选填] array  	curl设置的选项，key value 对应
	 * body 	[选填] string    raw,默认form-data
	 * 
	 * @return [type]         [description]
	 */
	function post($params=[])
	{
		$url = $params['url'];
		$data = isset($params['data']) ? $params['data'] : [];
		$option = isset($params['option']) ? $params['option'] : [];

		if(isset($params['body']) && $params['body'] == 'raw'){
			$body = $data;
		}else{
			$body = http_build_query($data);
		}


	    $defaults = array(
	        CURLOPT_POST => 1,
	        CURLOPT_HEADER => 0,
	        CURLOPT_URL => $url,
	        CURLOPT_FRESH_CONNECT => 1,
	        CURLOPT_RETURNTRANSFER => 1,
	        CURLOPT_FORBID_REUSE => 1,
	        CURLOPT_TIMEOUT => 0,
	        CURLOPT_SSL_VERIFYPEER => true,
	        CURLOPT_POSTFIELDS => $body,
	        CURLOPT_HTTPHEADER =>$this->get_curlopt_httpheader(),
	        CURLOPT_HTTP_VERSION => '1.0'
	    );

	    $ch = curl_init();
	    $option = $option + $defaults;
	    curl_setopt_array($ch, $option);
	    if( ! $result = curl_exec($ch))
	    {
	        trigger_error(curl_error($ch));
	    }
	    curl_close($ch);
	    var_dump($option);
	    return $result;
	}


	/**
	 * [get]
	 * @param  array  $params [description]
	 * 
	 * url 		[必填] string 请求的地址
	 * data 	[选填] array  请求的数据，key value 对应
	 * option   [选填] array  curl设置的选项，key value 对应
	 * 
	 * @return [type]         [description]
	 */
	function get($params=[])
	{   
		$url = $params['url'];
		$data = isset($params['data']) ? $params['data'] : [];
		$option = isset($params['option']) ? $params['option'] : [];
		$url = empty($data) ? $url : $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($data);

	    $defaults = array(
	        CURLOPT_URL => $url,
	        CURLOPT_HEADER => 1,
	        CURLOPT_RETURNTRANSFER => 1,
	        CURLOPT_TIMEOUT => 0,
	        CURLOPT_SSL_VERIFYPEER => true,
	        CURLOPT_HTTPHEADER =>$this->get_curlopt_httpheader(),
	        CURLOPT_HTTP_VERSION => '1.0'
	    );   

	    $ch = curl_init();
	    curl_setopt_array($ch, ($option + $defaults));
	    $result = curl_exec($ch);
	    if( ! $result) {
	        var_dump(curl_error($ch));
	    }
	    curl_close($ch);
	    return $result;
	} 

	/**
	 * [get_curlopt_httpheader description]
	 * @return [type] [description]
	 */
    private function  get_curlopt_httpheader($params=[]){
    

    	// $defaults[] = "application/json, text/javascript, */*; q=0.01";
    	// $defaults[] = "Accept-Encoding:gzip, deflate";
    	// $defaults[] = "Accept-Language:zh-CN,zh;q=0.9";
    	// $defaults[] = "Content-Type:application/x-www-form-urlencoded; charset=UTF-8";

    	$defaults[] = "Connection:keep-alive";    	
    	$defaults[] = "Upgrade-Insecure-Requests:1";
    	$defaults[] = "User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.167 Safari/537.36";
    	$res = array_merge($defaults,$params);

    	return $res;
    } 
}	