<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

    public $sqls = array();  

    function __construct()
    {
        parent::__construct();         
        $this->load->database();
        //$this->load->driver('cache');
    }     

    /**
    * [自定义key取memcache缓存]
    * @param [type]  $key  [description]
    * @param [type]  $data [description]
    * @param integer $long [description]
    */
    function getMemcache($key){
        return $this->cache->memcached->get($key);  
    }

    /**
    * [自定义key设置memcache缓存]
    * @param [type]  $key  [description]
    * @param [type]  $data [description]
    * @param integer $long [description]
    */
    function setMemcache($key, $data, $long=3600){
        return $this->cache->memcached->save($key, $data,$long); 
    }
    /**
    * 执行sql...
    */
    function query($sql){
        return $this->db->query($sql);
    }
    /**
    * 查询总数...
    * $param["table"] = "table_name";
    * $param["where"] = "id=1";
    */
    function dataFetchCount($param=array()){     
        if(!isset($param['sql'])){
            $table = $param['table'];   
            $where = $this->dataWhere($param['where']);        
            $sql = "select count(*) as total from {$table} $where limit 1";
        }else{
            $sql = $param['sql'];
        } 
        $this->sqls[] = $sql;
        $res = $this->db->query($sql)->row_array();
        return intval($res['total']);
    }

    /**
    * 查询单条记录...
    * $param["field"] = "id,uname";默认*;
    * $param["table"] = "table_name";
    * $param["where"] = "id=1";
    * 
    */
    function dataFetchRow($param=array()){
        if(!isset($param['sql'])){
            $table = $param['table'];
            $field = $param['field'] ? $param['field'] : "*" ;
            $where = $this->dataWhere($param['where']);  
            $order = $param['order'] ? " order by ".$param['order'] : null;
            $sql = "select $field from {$table} {$where} {$order} limit 1"; 
        }else{
            $sql = $param['sql'];
        }
        $this->sqls[] = $sql;
        return $this->db->query($sql)->row_array();
    }

    /**
    * 查询多条数据...
    *
    * @param array
    * $param['field'] = 'id,uname';默认*
    * $param['table'] = 'table_name';
    * $param['where'] = 'id<100';
    * $param['limit'] = '0,10';默认1
    * $param['skey'] = 'id';以id作为索引返回结果
    * params['sval'] = 'names';以names作为值返回结果
    */
    function dataFetchArray($param=array()){
        if(!isset($param['sql'])){
            $table = $param['table'];    
            $field = $param['field'] ? $param['field'] : "*" ;        
            $where = $this->dataWhere($param['where']);  
            $order = $param['order'] ? " order by ".$param['order'] : null;
            $limit = $param['limit'] ? " limit ".$param['limit'] : null;   
            $sql = "select $field from {$table} {$where} {$order} {$limit}";
        }else{
            $sql = $param['sql'];
        }
        $this->sqls[] = $sql;
        $res = $this->db->query($sql)->result_array();

        if(is_array($res) && $param['skey']){
            $result = array();
            foreach ($res as $k=>$v){
                $result[$v[$param['skey']]] = $param['sval'] ? $v[$param['sval']] : $v;
            }
            return $result;
        }
        return $res;
    }

    /**
    *删除数据...
    *
    * $param['table'] = 'table_name';
    * $param['where'] = 'id <100';
    * $param['limit'] = '0,10';默认所有
    */
    function dataDelete($param=array()){
        $table = $param['table'];  
        $where = $this->dataWhere($param['where']);  
        $order = $param['order'] ? " order by ".$param['order'] : null;
        $limit = $param['limit'] ? " limit ".$param['limit'] : null;
        $this->sqls[] = $sql = "DELETE FROM {$table} {$where} {$order} {$limit}";
        return $this->db->query($sql);
    }

    /**
    * 写入数据...
    * $param['table'] = 'table_name';
    * $param['data'] = array("uname"=>"root","upwd"=>123456);
    */
    function dataInsert($param){
        $table = $param['table'];         
        $sql = "insert into {$table} set ";
        if(!empty($param['data'])){
            foreach ($param['data'] as $key => $value) {
                $dataArray[] = "`{$key}`='{$value}'";
            }
            $this->sqls[] = $sql .= implode(',', $dataArray);
            if($this->db->query($sql)){
                return $this->db->insert_id();
            }
        }
    }

    /**
    * 修改数据...
    * $param['table'] = 'table_name';
    * $param['data'] = array("uname"=>"root","upwd"=>123456);
    * $param['where'] = 'id <100';
    * $param['limit'] = '0,10';默认所有
    */
    function dataUpdate($param=array()){     
        $table = $param['table'];
        $where = $this->dataWhere($param['where']);        
        $limit = $param['limit'] ? " limit ".$param['limit'] : null;

        $sql = "update {$table} set ";
        if(!empty($param['data'])){
            foreach ($param['data'] as $key => $value) {
                $dataArray[] = "`{$key}`='{$value}'";
            }
            $sql .= implode(',', $dataArray);
        }    
        $this->sqls[] = $sql .= $where.$limit;
        return  $this->db->query($sql);        
    }   
    /**
     * [where 条件处理]
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    private function dataWhere($where){
        if($where){
            $where = is_numeric($where) ? " where id=".$where : " where ".$where;
        } else {
            $where = null;
        }
        return $where;
    }   

}
?>