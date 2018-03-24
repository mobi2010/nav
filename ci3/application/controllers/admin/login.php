<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 登录.
 */
class Login extends Admin_Controller {
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$this->load->view('admin/login');
	}
	/**
	 * 验证
	 * @return [type] [description]
	 */
	public function checked(){
		$uname = ci3_string_filter($_POST['uname']);
		$upwd = ci3_string_filter($_POST['upwd']);		
		$pin = ci3_string_filter($_POST['pin']);		
		if($uname == 'admin' && $upwd == 'admin@ci3' && $pin == "iav18"){			
			$_SESSION['logined'] = true;
			$this->cResponse($res);
		}
		$res['code'] = 400;
		$res['message'] = 'Account or Password is error';
		$this->cResponse($res);
	}
	/**
	 * 登出
	 * @return [type] [description]
	 */
	public function logout(){
		unset($_SESSION['logined']);
		redirect('admin/login');
	}
}