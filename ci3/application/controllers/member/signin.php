<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Signin extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
	}

	public function index()
	{	
		$this->load->view('member/signin',$data);
	}	

	public function login(){
		$username = ci3_string_filter($_POST['username']);
		$password = ci3_string_filter($_POST['password']);
		$row = $this->memberModel->getRow("username like '{$username}' and password like '{$password}'");
		if($row['id']){
			$identity = $this->aes->encrypt($row['id']);
			$expire = 3600*24*30;
			ci3_setcookie('identity',$identity,$expire);
			$this->cResponse();
			
		}else{
			$this->cResponse(['code'=>'10000','message'=>'Account or password error']);
		}
		
	}
}