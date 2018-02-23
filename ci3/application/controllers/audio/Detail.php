<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Audio_Controller.php');


class Detail extends Audio_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
		$this->load->model('Category_model', 'categoryModel');//服务
	}
	public function index()
	{	

		$this->load->view('audio/detail',$data);
	}	
	
}