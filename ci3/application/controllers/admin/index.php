<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 主页
 */
class Index extends Admin_Controller {	
	function __construct()
	{
		parent::__construct();
	}	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['index'] = $_GET['i'] ? base64_decode($_GET['i']) : 'content';

		$this->load->view('/admin/index',$data);
	}

	public function welcome(){
		$this->load->view('/admin/welcome',$data);
	}
}