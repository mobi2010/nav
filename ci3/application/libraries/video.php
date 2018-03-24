<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * 视频解析
 */
class Video {	

	public $source = ['weibo','miaopai','facebook','youtube'];

	public function __construct()
    {
    }

	public function parse($url,$dataType="") {   
		$res = [];
		foreach ($this->source as $key => $value) {
			if(strpos($url,$value) !== false){
				$res = $this->{$value}($url);
				break;
			}
		}
		if(!empty($res) && $dataType=="first"){
			foreach ($res as $key => $value) {
				return $value;
			}
		}
		return $res;
	}
	public function youtube($url){
		$res = [];
		$params['url'] = $url;
		$info = $this->get($params);
		if(empty($info)){
			return $res;
		}

		preg_match('/adaptive_fmts":"(.*?)"/is',$info,$matche);

		if(empty($matche[1])){
			return $res;
		}

		$data = explode(',', $matche[1]);
		if(empty($data)){
			return $res;
		}
		foreach ($data as $key => $value) {
			preg_match('/url=(.*?)\\\u0026/is',$value,$urls);
			preg_match('/size=(.*?)\\\u0026/is',$value,$size);
			if($urls[1] && $size[1]){
				$url = urldecode($urls[1]);
				$res[$size[1]] = ['url'=>$url,'name'=>$size[1]];
			}

		}
		return $res;
	}
	public function facebook($url){
		$res = [];
		$params['url'] = $url;
		$info = $this->get($params);
		if(empty($info)){
			return $res;
		}
		preg_match('/hd_src_no_ratelimit:"(.*?)"/is',$info,$matche);
		if(!empty($matche[1])){
			$url = urldecode($matche[1]);
			$res[] = ['url'=>$url,'name'=>'HD'];
		}

		preg_match('/sd_src_no_ratelimit:"(.*?)"/is',$info,$matche);
		if(!empty($matche[1])){
			$url = urldecode($matche[1]);
			$res[] = ['url'=>$url,'name'=>'SD'];
		}
		return $res;
	}
	

	public function weibo($url){
		$url = "https://m.weibo.cn/status".strrchr($url,'/');

		$res = [];
		$params['url'] = $url;
		$info = $this->get($params);
		if(empty($info)){
			return $res;
		}

		preg_match('/"stream_url_hd": "(.*?)"/is',$info,$matche);

		if(!empty($matche[1])){
			$url = $matche[1];
			$res[] = ['url'=>$url,'name'=>'HD'];
		}

		preg_match('/"stream_url": "(.*?)"/is',$info,$matche);
		if(!empty($matche[1])){
			$url = $matche[1];
			$res[] = ['url'=>$url,'name'=>'SD'];
		}
		return $res;
	}

	public function miaopai($url){
		$res = [];
		$params['url'] = $url;
		$info = $this->get($params);

		if(empty($info)){
			return $res;
		}

		preg_match('/"videoSrc":"(.*?)"/is',$info,$matche);
		if($matche[1]){
			$url = $matche[1];
			$res[] = ['url'=>$url,'name'=>'SD'];
		}

		return $res;
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
		$header = $params['header'];
	    $defaults = array(
	        CURLOPT_URL => $url,
	        CURLOPT_HEADER => 1,
	        CURLOPT_RETURNTRANSFER => 1,
	        CURLOPT_TIMEOUT => 0,
	        CURLOPT_SSL_VERIFYPEER => true,
	        CURLOPT_HTTPHEADER =>$this->get_curlopt_httpheader($header),
	        CURLOPT_HTTP_VERSION => '1.0'
	    );   
	    $ch = curl_init();
	    $option = $option + $defaults;
	    curl_setopt_array($ch, $option);
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
    	
    	$params = is_array($params) ? $params : [];

    	$defaults[] = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
    	
    	$defaults[] = "Accept-Language:zh-CN,zh;q=0.9";
    	$defaults[] = "Connection:keep-alive";
    	$defaults[] = "Upgrade-Insecure-Requests:1";
    	$defaults[] = "User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.167 Safari/537.36";
    	$res = array_merge($defaults,$params);

    	return $res;
    } 

    private function get_weibo_header(){
    	$time = microtime(true);
    	$md5 = md5($time);
    	$key = base64_encode($md5);
    	$defaults[] = "Accept-Encoding:gzip, deflate, br";
    	$defaults[] = "Cookie:SUB={$key};";
    	$defaults[] = "Host:weibo.com";
    	$defaults[] = "Referer:https://passport.weibo.com/visitor/visitor?entry=miniblog&a=enter&url=https%3A%2F%2Fweibo.com%2Ftv%2Fv%2F{$md5}%3Ffid%3D1034%3A{$md5}&domain=.weibo.com&ua=php-sso_sdk_client-0.6.23&_rand={$time}";
    	return $defaults;    
    }

    /**
     * [weibo_web description]
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    public function weibo_web($url){
		$res = [];
		$params['url'] = $url;
		$params['header'] = $this->get_weibo_header();
		$info = $this->get($params);

		if(empty($info)){
			return $res;
		}

		preg_match('/video_src=(.*?)&cover_img/is',$info,$matche);
		$res['url'] = "http:".urldecode($matche[1]);
		return $res;
	}
}	