<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 地图
 *
 * @author by zsc
 */
class Maps{	
	public $akey = "531ed0f5ba22dccd7e200dd973bf826a";
	function __construct($params = array()){
	}
	/**
	 * [关键字搜索]
	 * @return [type] [description]
	 */
	function search($params=array()){
		$url = 'http://api.map.baidu.com/place/v2/search';
		$data['query'] = $params['query'];//检索关键字
		$data['region'] = $params['region'];//检索城市
		$data['output'] = 'json';//返回数据类型
		$data['ak'] = $this->akey;//密钥
		return $this->curlGet($url, $data);
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
	        CURLOPT_HEADER => 0,
	        CURLOPT_URL => $url,
	        CURLOPT_FRESH_CONNECT => 1,
	        CURLOPT_RETURNTRANSFER => 1,
	        CURLOPT_FORBID_REUSE => 1,
	        CURLOPT_TIMEOUT => 30,
	        CURLOPT_POSTFIELDS => http_build_query($data)
	    );

	    $ch = curl_init();
	    curl_setopt_array($ch, ($options + $defaults));
	    if( ! $result = curl_exec($ch))
	    {
	        trigger_error(curl_error($ch));
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
	function curlGet($url, array $data = array(), array $options = array())
	{   
	    $defaults = array(
	        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($data),
	        CURLOPT_HEADER => 0,
	        CURLOPT_RETURNTRANSFER => TRUE,
	        CURLOPT_TIMEOUT => 30
	    );   
	    $ch = curl_init();
	    curl_setopt_array($ch, ($options + $defaults));
	    if( ! $result = curl_exec($ch))
	    {
	        trigger_error(curl_error($ch));
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