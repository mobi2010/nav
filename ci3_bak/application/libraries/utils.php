<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 工具
 *
 * @author by zsc
 */
class Utils{	
	function __construct($params = array()){
	}	
	/**
	 * Send a POST requst using cURL
	 * @param string $url to request
	 * @param array $data values to send
	 * @param array $options for cURL
	 * @return string
	 */
	function curlPost($url, array $data = array(), array $options = array())
	{
	    $defaults = array(
	        CURLOPT_POST => 1,
	        CURLOPT_HEADER => 1,
	        CURLOPT_URL => $url,
	        CURLOPT_FRESH_CONNECT => 1,
	        CURLOPT_RETURNTRANSFER => 1,
	        CURLOPT_FORBID_REUSE => 1,
	        CURLOPT_TIMEOUT => 30,
	        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.58 Safari/537.22',
	        CURLOPT_POSTFIELDS => http_build_query($data)
	    );


	    $ch = curl_init();
	    curl_setopt_array($ch, ($options + $defaults));
	    if( ! $result = curl_exec($ch))
	    {
	        echo curl_error($ch);
	    }
	    curl_close($ch);
	    return $result;
	}

	/**
	 * Send a GET requst using cURL
	 * @param string $url to request
	 * @param array $data values to send
	 * @param array $options for cURL
	 * @return string
	 */
	function curlGet($url, array $data = array(), array $options = array(CURLOPT_HEADER => ''))
	{   
	    $defaults = array(
	        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($data),
	        CURLOPT_HEADER => 1,
	        CURLOPT_RETURNTRANSFER => TRUE,
	        CURLOPT_TIMEOUT => 30,
	        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.58 Safari/537.22'
	    );   
	    $ch = curl_init();
	    curl_setopt_array($ch, ($options + $defaults));
	    if( ! $result = curl_exec($ch))
	    {
	        echo curl_error($ch);
	    }
	    curl_close($ch);
	    return $result;
	} 
	//中文转英文
	function gb2u($str){
		return iconv("GB2312", "UTF-8", $str); 
	}
	//英文转中文
	function u2gb($str){
		return iconv("UTF-8", "GB2312", $str); 
	}
}