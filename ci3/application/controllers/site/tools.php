<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Tools extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));
		//配置参数
		$this->initData['navData'] = require(APPPATH.'/config/nav_data.php');
		$this->load->vars('initData',$this->initData);//映射到模板
	}
	public function index()
	{	
		$data['btnData'] = $this->btnData;
		$this->load->view('tools/index',$data);
	}

	public function parse(){
		//header('content-type:application/json;charset=utf8');    

		$content = trim($_POST['content']);
		$type = trim($_POST['type']);

		if(empty($content)){
			$code = 10000;
			$message = "Data error";
			$this->cResponse($res);
		}

		switch ($type) {
			case 'jf'://json format
				$content = json_decode($content);
				$data = json_encode($content, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
				break;
			
			case 'be'://base64 encode
				$data = base64_encode($content);
				break;

			case 'bd'://base64 decode
				$data = base64_decode($content);
				break;

			case 'gb2u'://gb2u

				$data = iconv("GB2312", "UTF-8", $content);
				$data = $data ? $data : $content;

				break;	
				
			case 'u2gb'://u2gb
				$data = iconv("UTF-8", "GB2312", $content); 
				$data = $data ? $data : $content;
				break;

			case 'u2d'://Unix => Date
				$content = (int)$content;
				$data = $this->unicode_decode($content);
				break;

			case 'd2u'://Date => Unix
				$data = strtotime($content);
				break;
			
			case 'md5'://md5
				$data = md5($content);
				break;

			case 'sha1'://sha1
				$data = sha1($content);
				break;

			case 'ue'://Url Encode
				$data = urlencode($content);
				break;

			case 'ud'://Url Decode
				$data = urldecode($content);
				break;		

			case 'au'://ASCII => Unicode
				$data = $this->unicode_encode($content);
				break;

			case 'ua'://Unicode => ASCII
				$data = $this->unicode_decode($content);
				break;

			case 'uc'://Unicode => CN
				$data = $this->unicode_decode($content,'utf-8','\\u','');
				break;

			case 'cu'://CN => Unicode
				$data = $this->unicode_encode($content,'utf-8','\\u','');
				break;								
			default:
				# code...
				break;
		}
		$res['code'] = $code;
		$res['message'] = $message;
		$res['data'] = $data;
		$this->cResponse($res);
	}
	/**
	 * [unicode_encode description]
	 * @param  [type] $str      [description]
	 * @param  string $encoding [description]
	 * @param  string $prefix   [description]
	 * @param  string $postfix  [description]
	 * @return [type]           [description]
	 */
	function unicode_encode($str, $encoding = "UTF-8", $prefix = '&#', $postfix = ';') {
	    $str = iconv($encoding, 'UCS-2', $str);
	    $arrstr = str_split($str, 2);
	    $unistr = '';
	    for($i = 0, $len = count($arrstr); $i < $len; $i++) {
	        $dec = hexdec(bin2hex($arrstr[$i]));
	        $unistr .= $prefix . $dec . $postfix;
	    } 
	    return $unistr;
	}
	/**
	 * [unicode_decode description]
	 * @param  [type] $unistr   [description]
	 * @param  string $encoding [description]
	 * @param  string $prefix   [description]
	 * @param  string $postfix  [description]
	 * @return [type]           [description]
	 */
	function unicode_decode($unistr, $encoding = "UTF-8", $prefix = '&#', $postfix = ';') {
	    $arruni = explode($prefix, $unistr);
	    $unistr = '';
	    for($i = 1, $len = count($arruni); $i < $len; $i++) {
	        if (strlen($postfix) > 0) {
	            $arruni[$i] = substr($arruni[$i], 0, strlen($arruni[$i]) - strlen($postfix));
	        } 
	        $temp = intval($arruni[$i]);
	        $unistr .= ($temp < 256) ? chr(0) . chr($temp) : chr($temp / 256) . chr($temp % 256);
	    } 
	    return iconv('UCS-2', $encoding, $unistr);
	}

	/**
	 * [video description]
	 * @return [type] [description]
	 */
	public function video(){
		$data['btnData'] = $this->btnData;
		$this->load->view('tools/video',$data);
	}

	/**
	 * [videoparse description]
	 * @return [type] [description]
	 */
	public function videoparse(){

		$content = trim($_POST['content']);
		$type = trim($_POST['type']);

		if(empty($content)){
			$code = 10000;
			$message = "Data error";
			$this->cResponse($res);
		}

		$videoRes = $this->videoUtils->parse($content);
		$res['code'] = $code;
		$res['message'] = $message;
		$res['data'] = $videoRes['url'];
		$this->cResponse($res);			
	}		
}		