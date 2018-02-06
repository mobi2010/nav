<?php
/**
 * 短信接口
 * 
 * @author zsc
 * @since 2014-04-30
 */

class Sms{
	private $userName;//用户名
	private $userPwd;//用户密码

	public function __construct()
    {
    	$this->userName = "gywh";
    	$this->userPwd = md5('Vb9WQKJ1');
    }
    /**
     * [用短信发送邀请码]
     * @return [type] [description]
     */
    public function codeSmsSend($phone,$code){
    	$msg = $code."（概艺验证码）此短信验证码只用于绑定手机，转发将导致你的概艺账号被盗【概艺网】";
    	return $this->smsSend($phone,$msg);
    }
    /**
     * [发短信]
     * @param  [type] $phone [手机号，1个string，多个array]
     * @param  [type] $msg   [内容]
     * @return [type]        [description]
     */
    public function smsSend($phone,$msg){
		$data['pwd'] = $this->userPwd;
		$data['username'] = $this->userName;
		$data['p'] = is_array($phone) ? implode(',', $phone) : $phone;
		$data['msg'] = urlencode($this->u2gb($msg));
		return $this->curlGet('http://api.app2e.com/smsSend.api.php',$data);
    }
    /**
	 * [查询余额]
	 * @param  string $p   [description]
	 * @param  string $msg [description]
	 * @return [type]      [description]
	 */
	public function getBalance(){		
		$data['pwd'] = $this->userPwd;
		$data['username'] = $this->userName;		
		return $this->curlGet('http://api.app2e.com/getBalance.api.php',$data);
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





?>