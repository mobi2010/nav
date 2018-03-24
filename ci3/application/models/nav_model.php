<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav_model extends MY_Model {		
	public $table = 'nav';	
	public $params;
	function __construct()
	{
		parent::__construct();
		$this->params['table'] = $this->table;
	}

	function getList($params=[]){
		$pageSize = $params['pageSize'];
		$offset = $params['offset'];  



		$this->params = $this->params + $params;
		$res['totalCount'] = $this->dataFetchCount($this->params);
		$this->params['order'] = "sort_id desc";
		$this->params['limit'] = "{$offset},{$pageSize}";

		$res['dataModel'] = $this->dataFetchArray($this->params);
		return $res;
	}
	function getCategoryKV($params=[]){
		$categoryParams['order'] = "sort_id desc";
		$categoryParams['skey'] = "id";
		$categoryParams['sval'] = "name";
		$categoryParams['table'] = 'nav_category';
		$res = $this->ci3Model->dataFetchArray($categoryParams);
		return $res;
	}
	function getData($type_id=0){
		if($type_id){
			$this->params['where']='type_id='.$type_id;
		}
		$this->params['skey']='id';
		$this->params['sval']='name';
		return $this->dataFetchArray($this->params);
	}
	function getRow($id){
		$this->params['where'] = (int)$id;
		return $this->dataFetchRow($this->params);
	}

	function getMore($params=[]){
		
		$params['order'] = $params['order'] ? $params['order'] : "sort_id desc";  

		$params['table'] = 'nav';
		$res = $this->ci3Model->dataFetchArray($params);

		return $res;
	}

	function getMoreCategory($params=[]){
		$params['order'] = $params['order'] ? $params['order'] : "sort_id desc";  

		$params['table'] = 'nav_category';


		$res = $this->ci3Model->dataFetchArray($params);

		return $res;
	}
	function categoryList($params=[]){
		$pageSize = $params['pageSize'];
		$offset = $params['offset'];  

		$order = $params['order'] ? $params['order'] : "sort_id desc";  
		$where = $params['where'];

		$categoryParams['table'] = 'nav_category';
		$categoryParams['where'] = $where;
		$res['totalCount'] = $this->ci3Model->dataFetchCount($categoryParams);

		$categoryParams['order'] = $order;
		$categoryParams['limit'] = "{$offset},{$pageSize}";

		$res['dataModel'] = $this->ci3Model->dataFetchArray($categoryParams);

		return $res;
	}
	function categorySave($params=[]){
		$categoryParams['table'] = 'nav_category';

		
		$id = $params['id'];unset($params['id']);
		$categoryParams['data'] = $params;
		if($id){
			$categoryParams['where'] = $id;
			$this->ci3Model->dataUpdate($categoryParams);
		}else{
			$id = $this->ci3Model->dataInsert($categoryParams);
		}
		return $id;
	}	
	function categorydelete($params=[]){
		$categoryParams['table'] = 'nav_category';

		
		$categoryParams['where'] = $params['where'];
		$res = $this->ci3Model->dataDelete($categoryParams);		
		return $res;
	}

	function save($params=[]){
		$this->params['data'] = $params;
		$id = $params['id'];unset($params['id']);
		$time = time();
		if($id){
			$this->params['where'] = $id;
			$this->params['data']['update_time'] = $time;
			$this->dataUpdate($this->params);
		}else{
			$this->params['data']['update_time'] = $time;
			$this->params['data']['insert_time'] = $time;
			$id = $this->dataInsert($this->params);
		}
		return $id;
	}

	function update($params){
		$this->params['where'] = $params['where'];
		$this->params['data'] = $params['data'];
		return $this->dataUpdate($this->params);
	}
	function delete($params=[]){
		$this->params['where'] = $params['where'];
		$res = $this->dataDelete($this->params);		
		return $res;
	}
}	