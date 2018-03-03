<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends MY_Model {		
	public $table = 'article';	
	public $params;
	function __construct()
	{
		parent::__construct();
		$this->params['table'] = $this->table;
		$this->load->model('tag_model', 'tagModel');//服务

	}
	function getRow($id){
		$this->params['where'] = "id=".(int)$id;
		return $this->dataFetchRow($this->params);
	}

	function getInfo($id){
		$res = $this->getRow($id);
		$tagInfo = [];
		if(!empty($res)){
			$atrData = $this->ci3Model->dataFetchArray(['table'=>'article_tag_relation','where'=>'article_id='.$id]);
			if(!empty($atrData)){
				foreach ($atrData as $key => $value) {
					$row = $this->tagModel->getRow($value['tag_id']);
					if(!empty($row)){
						$tagInfo[$row['id']] = $row['name'];
					}
				}
			}
			$res['tags'] = $tagInfo;
		}
		return $res;
	}

	/**
	 * 上下文
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	function context($params){
		$id = $params['article_id'];
		if($params['type'] == 1){//下一个
			$where = "where a.id>{$id}";
			$order = " order by a.id asc";
		}else{//上一个
			$where = "where a.id<{$id}";
			$order = " order by a.id desc";
		}


		$sql = "select a.id from article a {$where} {$order} limit 1";

		if($params['tag_id']){
			$where = "article a left join article_tag_relation atr on a.id=atr.article_id $where ";
			$sql = "select a.id from {$where} {$order} limit 1";
		}


		$row = $this->dataFetchRow(['sql'=>$sql]);
		if(empty($row)){
			return [];
		}else{
			$info = $this->getRow($row['id']);
			return $info;
		}

	}


	function getList($params=[]){

		$pageSize = $params['pageSize'];
		$offset = $params['offset'];  

		$order = $params['order'] ? $params['order'] : "a.id desc";  
		$orderBy = " order by {$order} ";

		$total_sql = "select count(*) as total from article a  limit 1";
		$data_sql = "select * from article a {$orderBy} limit {$offset},{$pageSize}";	

		$whereArr = [];
		if($params['title']){
			$whereArr[] = " a.title like '%".ci3_string_filter($params['title'])."%'";
			$where = implode($whereArr,' and ');
			$total_sql = "select count(*) as total from article a where {$where} limit 1";
			$data_sql = "select * from article a where {$where} {$orderBy} limit {$offset},{$pageSize}";	
		}

		if($params['tag_id']){
			$join = "article a left join article_tag_relation atr on a.id=atr.article_id ";
			$whereArr[] = "atr.tag_id={$params['tag_id']}";
			$where = implode($whereArr,' and ');

			$total_sql = "select count(*) as total from {$join} where {$where} limit 1";
			$data_sql = "select *,a.id as id from {$join} where {$where} {$orderBy} limit {$offset},{$pageSize}";	
		}
		
		$res['totalCount'] = $this->dataFetchCount(['sql'=>$total_sql]);
		$res['dataModel'] = $this->dataFetchArray(['sql'=>$data_sql]);
		return $res;
	}

	function save($params=[]){
		$params['update_time'] = time(); 
		$this->params['data'] = $params;
		$id = $params['id'];unset($params['id']);
		if($id){
			$this->params['where'] = $id;
			$this->dataUpdate($this->params);
		}else{
			$this->params['data']['insert_time'] = time(); 
			$id = $this->dataInsert($this->params);
		}
		return $id;
	}
	function delete($params=[]){
		$this->params['where'] = $params['where'];
		$res = $this->dataDelete($this->params);
		return $res;
	}
}	