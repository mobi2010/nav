<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 首页
 *
 * @author by zsc
 */
class Index extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
	}
	public function index()
	{	
		$data = [];

		$this->load->view('index',$data);
	}	
	
}