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
			$res += $this->ci3Model->dataFetchRow(['table'=>$this->getContentTable($id),'where'=>'member_id='.$id]);
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
		$dataModel = $this->dataFetchArray($this->params);

		if(!empty($dataModel)){
			foreach ($dataModel as $key => $value) {
				$id = $value['id'];
				$value += $this->ci3Model->dataFetchRow(['table'=>$this->getContentTable($id),'where'=>'member_id='.$id]);
				$dataModel[$key] = $value;

			}
		}
		$res['dataModel'] = $dataModel;

		return $res;
	}

	function save($params=[]){

		$contentParams = [];
		foreach ($params as $key => $value) {
			if(in_array($key,['avatar_url','biography','ip'])){
				$contentParams[$key] = $value;
				unset($params[$key]);
			}
		}

		$params['update_time'] = time(); 
		$this->params['data'] = $params;
		$id = $params['id'];unset($params['id']);
		if($id){
			$this->params['where'] = $id;
			$this->dataUpdate($this->params);

			if(!empty($contentParams)){
				$this->ci3Model->dataUpdate(['table'=>$this->getContentTable($id),'where'=>'member_id='.$id,'data'=>$contentParams]);
			}
		}else{
			$this->params['data']['insert_time'] = time(); 
			$this->params['data']['status'] = 0; 
			$this->params['data']['source'] = 0; 
			$id = $this->dataInsert($this->params);

			$contentParams['member_id'] = $id;
			$this->ci3Model->dataInsert(['table'=>$this->getContentTable($id),'data'=>$contentParams]);
		}
		return $id;
	}
	function delete($params=[]){
		$this->params['where'] = $params['where'];
		$res = $this->dataDelete($this->params);
		return $res;
	}

	function deleteOne($id){
		$id = (int)$id;
		$this->params['where'] = 'id='.$id;
		$res = $this->dataDelete($this->params);
		//删除内容
		$this->ci3Model->dataDelete(['table'=>$this->getContentTable($id),'where'=>"member_id={$id}"]);
		return $res;
	}	

	function getContentTable($member_id){
		$member_id = (int)$member_id;
		$member_id = substr($member_id,-1);
		return "member_content_{$member_id}";
	}


	function unfollow($own_id,$other_id){
		$where = "own_id={$own_id} and other_id={$other_id}";
		$res = $this->ci3Model->dataDelete(['table'=>'member_relation','where'=>$where]);
		return $res;
	}

	/**
	 * [getFollow description]
	 * @param  [type]  $member_id 	[description]
	 * @param  integer $dataType    [0我关注的人，1关注我的人]
	 * @return [type]             	[description]
	 */
	function followMemberIds($own_id){

		$own_id = intval($own_id);
		if($own_id){			
			$params['order'] = $params['order'] ? $params['order'] : "";  
			$params['table'] = 'member_relation';
			$params['where'] = 'own_id='.$own_id;
			$params['sval'] = 'other_id';
			$res = $this->ci3Model->dataFetchArray($params);
		}else{
			$res = [];
		}
		return $res;
	}

	/**
	 * [getFollow description]
	 * @param  [type]  $member_id 	[description]
	 * @param  integer $dataType    [0我关注的人，1关注我的人]
	 * @return [type]             	[description]
	 */
	function followList($params,$dataType=0){

		$pageSize = $params['pageSize'];
		$offset = $params['offset'];  

		$params['order'] = $params['order'] ? $params['order'] : "id desc";  
		$params['table'] = 'member_relation';
		$params['limit'] = "{$offset},{$pageSize}";

		$res['totalCount'] = $this->dataFetchCount($params);
		$dataModel = $this->ci3Model->dataFetchArray($params);
		if(!empty($dataModel)){
			foreach ($dataModel as $key => $value) {
				$member_id = $dataType == 1 ? 'own_id' : "other_id";
				$value += $this->getInfo($value[$member_id]);
				$dataModel[$key] = $value;
			}
		}
		$res['dataModel'] = $dataModel;
		return $res;
	}

	/**
	 * [followStatus description]
	 * @param  [type] $own_id   [description]
	 * @param  [type] $other_id [description]
	 * @return [type]           [guest,error,'self',follow','none','followed']
	 */
	function followStatus($own_id,$other_id){
		$own_id = (int)$own_id;
		$other_id = (int)$other_id;

		if(!$own_id){
			return 'guest';
		}

		if(!$other_id){
			return 'error';
		}

		if($own_id == $other_id){
			return "self";
		}

		$where = "own_id={$own_id} and other_id={$other_id}";

		$row = $this->ci3Model->dataFetchRow(['table'=>'member_relation','where'=>$where]);

		if(empty($row)){
			$where = "own_id={$other_id} and other_id={$own_id}";
			$row = $this->ci3Model->dataFetchRow(['table'=>'member_relation','where'=>$where]);
			if(empty($row)){
				return 'none';
			}else{
				return 'followed';
			}
		}else{//我关注的人
			return 'follow';
		}
	}

	function isFollow($own_id,$other_id){
		$own_id = (int)$own_id;
		$other_id = (int)$other_id;
		if(!$own_id || $other_id){
			return '10000';
		}
		$where = "own_id={$own_id} and other_id={$other_id}";

		$row = $this->ci3Model->dataFetchRow(['table'=>'member_relation','where'=>$where]);

		if(empty($row)){
			return false;
		}else{
			return ture;
		}
	}

	function follow($own_id,$other_id){
		$own_id = (int)$own_id;
		$other_id = (int)$other_id;
		if(!$own_id || !$other_id){
			return '10000';
		}
		$where = "own_id={$own_id} and other_id={$other_id}";

		$row = $this->ci3Model->dataFetchRow(['table'=>'member_relation','where'=>$where]);

		if(!empty($row)){
			return '10001';
		}

		$where = "own_id={$own_id}";
		$total = $this->ci3Model->dataFetchCount(['table'=>'member_relation','where'=>$where]);
		$upperLimitNumber = 100;
		if($total>=$upperLimitNumber){
			return '20001';
		}
		

		$relationParams['own_id'] = $own_id;
		$relationParams['other_id'] = $other_id;
		$relationParams['insert_time'] = time();
		$id = $this->ci3Model->dataInsert(['table'=>'member_relation','data'=>$relationParams]);

		return $id;
	}
}	