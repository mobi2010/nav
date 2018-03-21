<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Navigation extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
		//配置参数
		$this->initData['navData'] = require(APPPATH.'/config/nav_data.php');
		$this->load->vars('initData',$this->initData);//映射到模板
	
	}
	public function index()
	{	
		$this->load->view('site/nav',$data);
	}

}

