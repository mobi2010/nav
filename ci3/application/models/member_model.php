<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends MY_Model {		
	public $table = 'member';	
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
		$this->params = $this->params + $params;
		$res['totalCount'] = $this->dataFetchCount($this->params);
		$res['dataModel'] = $this->dataFetchArray($this->params);
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
			$this->params['data']['status'] = 0; 
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