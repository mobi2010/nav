<?php 
/**
* [分页]
* @param  [array] $pages [分页参数]
* array(
* totalCount => 1000,//记录总数
* pageSize => 10, //每页显示的记录数
* showPageSize => 8,//显示的页数
* unset => array('page'),//没用的参数
* page => 2,//当前页
* )
* 
* @return [string]        [html]
*/

$html = null;

$totalCount = $totalCount ? $totalCount : 0;//记录总数
if(!$totalCount){
	return ;
}

$pageSize = $pageSize ? $pageSize : 15; //每页显示的记录数
$totalPage = ceil($totalCount/$pageSize);//总页数
$showPageSize = $showPageSize ? $showPageSize : 10; //显示的页数

if($totalPage > 1){
	//当前页
	$page = $page ? $page : $_REQUEST['page']; 
	$page = $page>1 ? $page : 1;
	$page = $page > $totalPage ? $totalPage : $page;
	
	
	$unset = $unset ? $unset : ['page'];//需要upset掉的参数
	$url = $url ? $url : "?"; //链接地址
	$url .= ci3_query_string(['page']);

	$showPageSize = $showPageSize > $totalPage ? $totalPage : $showPageSize; //显示的页数
	$autoNumber = floor($showPageSize/2);//自动翻转的基数
	if(($page + $showPageSize) > $totalPage){     
		$countNumber = ($page + $showPageSize - $totalPage);
		$countNumber = $countNumber >$autoNumber ? $countNumber : ($autoNumber+1);
		$startPage = $page-$countNumber+1;
	}elseif($page > $autoNumber && $page<$totalPage){
		$startPage = $page-$autoNumber;
	} 
	$startPage = $startPage >0 ? $startPage : 1; //起始页      

	$html = '<ul class="pagination">';


	//第一页
	if($page <= 1){
		$html .= '<li class="first disabled"><span>first</span></li>';
	}else{
		$html .= '<li class="first"><a href="javascript:;" data-page="1">first</a></li>';
	}
	//上页
	if($page > 1){
		$html .= '<li class="prev"><a href="javascript:;" data-page="'.($page-1).'">&laquo;</a></li>';
	}else{
		$html .= '<li class="prev disabled"><span>&laquo;</span></li>';
	}

	//中间页

	for($i=0;$i<$showPageSize;$i++){
		$pi = $i+$startPage;
		if($page == $pi){
			$html .= '<li class="active"><a href="javascript:;" data-page="'.$pi.'">'.$pi.'</a></li>';
		}else{
			$html .= '<li><a href="javascript:;" data-page="'.$pi.'">'.$pi.'</a></li>';
		}
	}   

	//后页
	if($page < $totalPage){
		$html .= '<li class="next"><a href="javascript:;" data-page="'.($page+1).'">&raquo;</a></li>';
	}else{
		$html .= '<li class="next disabled"><span>&raquo;</span></li>';
	} 
	//尾页
	if($page >= $totalPage){
		$html .= '<li class="last disabled"><span>last</span></li>';
	}else{
		$html .= '<li class="last"><a href="javascript:;" data-page="'.$totalPage.'">last</a></li>';
	}
	$html .= '</ul>';
}
echo $html;
?>
