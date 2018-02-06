<?php
/**
 * 加密解密
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gycrypt {
	//发邮件和短线短信的验证码
	public function sendcode($n=4,$type=0){
		if($type == 0){
			$str = '1234567890';
		}else{
			$str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		}
		$len = strlen($str)-1;
		$code = null;		
		for($i=0;$i<$n;$i++){
			$codo .= $str[mt_rand(0,$len)];
		}
		return $codo;
	}
	/**
	 * [解密]
	 * @param  [type]  $str  [description]
	 * @param  integer $code [description]
	 * @return [type]        [description]
	 */
    public function decrypt($str,$code=20140823){
		$nstr = null;
		$str = base64_decode($str);
		$length = strlen($str);
		for ($i=0; $i<$length; $i++) {
			$ord = ord($str[$i]);
			$ord = $ord ^ $code;
			$nstr .= chr($ord);
		}
		return base64_decode($nstr);
	}
	/**
	 * [加密]
	 * @param  [type]  $str  [description]
	 * @param  integer $code [description]
	 * @return [type]        [description]
	 */
	public function encrypt($str,$code=20140823){
		$nstr = null;	
		$str = base64_encode($str);	
		$length = strlen($str);
		for($i=0; $i<$length; $i++){
			$ord = ord($str[$i]);
			$ord = $ord ^ $code;
			$nstr .= chr($ord);
		}
		return base64_encode($nstr);
	}

}
?>