<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends MY_Model {		
	public $table = 'comment';	
	public $params;
	function __construct()
	{
		parent::__construct();
		$this->params['table'] = $this->table;
	}
	function getRow($id){
		$where = is_numeric($id) ? "id=".(int)$id : $id;

		$this->params['where'] = $where;
		return $this->dataFetchRow($this->params);
	}

	function getInfo($id){
		$res = $this->getRow($id);
		if(!empty($res)){
			if(!$res['avatar_url']){
				$host = "http://".$_SERVER['HTTP_HOST'];

				$commonParams = require(APPPATH.'/config/common_params.php');
				$res['avatar_url'] = $host."/assets/common/images/".$commonParams['gender'][$res['gender']].".jpg";
			}
		}

		return $res;
	}

	function getList($params=[]){

		$pageSize = $params['pageSize'];
		$offset = $params['offset'];  
		$source = $params['source'];

		if($source == 'backend'){
			$table  = "comment";
		}else{
			$table = $this->getTableName($params['article_id']);
			$this->params['where'] = "article_id=".$params['article_id'];
		}
		
		$this->params['table'] = $table;

		$this->params = $this->params + $params;
		$res['totalCount'] = $this->dataFetchCount($this->params);
		$this->params['order'] = $params['order'] ? $params['order'] : "id desc";
		$this->params['limit'] = "{$offset},{$pageSize}";

		$res['totalCount'] = $this->dataFetchCount($this->params);
		$res['dataModel'] = $this->dataFetchArray($this->params);
		return $res;
	}

	function save($params=[]){
		$table = $this->getTableName($params['article_id']);
		$this->params['table'] = $table;
		$this->params['data'] = $params;
		$id = $params['id'];unset($params['id']);
		if($id){
			$this->params['where'] = $id;
			$this->dataUpdate($this->params);
		}else{
			$this->params['data']['insert_time'] = time(); 
			$this->params['data']['ip'] = $_SERVER['REMOTE_ADDR'];
			$id = $this->dataInsert($this->params);
		}
		return $id;
	}
	function delete($params=[]){
		if($params['article_id']){
			$article_id = $params['article_id'];
		}else{
			$id = (int)$params['where'];
			$row = $this->getRow($id);
			$article_id = $row['article_id'];
		}
		$table = $this->getTableName($article_id);
		$this->params['table'] = $table;
		$this->params['where'] = $params['where'];
		$res = $this->dataDelete($this->params);
		return $res;
	}

	function getTableName($article_id){
		$article_id = (int)$article_id;
		//$article_id = str_pad($article_id,2,"0",STR_PAD_LEFT);
		$article_id = substr($article_id,-1);
		return "comment_{$article_id}";
	}
}	