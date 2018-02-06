<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header( 'Content-type: text/html;charset=utf-8' );
session_start();

class Article_Controller extends MY_Controller
{
	public $uriEntity = null;//uri 实体
	function  __construct($params = array())
	{
		parent::__construct();
		
		$this->init();
		$this->uriEntity();//uri实体数据

		
		$this->load->model('article_model', 'articleModel');//服务

		$this->load->library('image');
	}
	/**
	 * [验证]
	 * @return [type] [description]
	 */
	protected function auth(){
		// if ($this->uriEntity['class'] != 'login' && !$_SESSION['logined']) {
		// 	redirect('admin/login');
		// }
	}
	/**
	* [初始数据]
	* @return [type] [description]
	*/
	protected function init(){
		//配置参数
		$this->initData['articleParams'] = require(APPPATH.'/config/article_params.php');
		$this->load->vars('initData',$this->initData);//映射到模板
		return $this->initData;
	}
	/**
	 * [uri实体数据整理]
	 * @return boolean [description]
	 */
	private function uriEntity(){
		$RTR = $GLOBALS['RTR'];//路由对象		
		$segments = $RTR->uri->segments;//路由参数
		$this->uriEntity['class'] = $RTR->class;//控制器
		$this->uriEntity['method'] = $RTR->method;//action
		$this->uriEntity['base_url'] = $RTR->config->config['base_url'];//域名
		$this->uriEntity['uri_string'] = $RTR->uri->uri_string;//路由参数string
		$this->uriEntity['segments'] = $segments;//路由参数array
		$this->load->vars('uriEntity',$this->uriEntity);//映射到模板
		return $this->uriEntity;
	}
	/**
	 * [输出]
	 * @return [type] [description]
	 */
    protected function cResponse($params=array(), $exit = true, $contentType='json'){
    	$params['data'] = empty($params['data']) ? "" : $params['data'];
    	$params['code'] = $params['code'] ? $params['code'] : 0;
    	$params['message'] = $params['message'] ? $params['message'] : 'success';
    	switch ($contentType) {
    		case 'json':
    			header('Content-type: application/json;charset=utf-8');
    			echo json_encode($params);
    			break;
    		case 'dump':
    			echo "<pre>";
    			var_dump($params);
    			echo "</pre>";
    			break;
    		case 'return':
    			return $params;
    			break;	
    	}
    	$exit && exit; 
    }
}	