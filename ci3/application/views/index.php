<?php 
$this->load->view('header',$data);
?>
<style type="text/css">
.home-line{

    background-color:#fff;
    margin: 0 0 2em 0;
    padding: 1em;
}
.home-time{
	margin-top:1em; 
	color: #999999;
}
</style>


    
<?php 
foreach ($dataModel as $key => $value) {
	//$article_url = ci3_url('article/detail',['id'=>$value['id']]);
	$article_url = ci3_article_url(['tag_id'=>$t,'article_id'=>$value['id']]);
	//'target'=>"_blank",
	$body = "<h3>".html_a(['href'=>$article_url,'text'=>$value['title']])."</h3>";

	if($value['cover_image']){
		$htmlimage = html_img(['src'=>$value['cover_image'],'height'=>'125px']);
		$body .= $htmlimage;
	}else{
		$images = ci3_content_images($value['content']);
		if(!empty($images)){
			$i = 0;
			foreach ($images as $image_url) {
				$htmlimage = html_img(['src'=>$image_url,'height'=>'125px']);
				$body .= $htmlimage;
				if(++$i>2){
					break;
				}
			}
			
		}
	}
	$member_id = $value['member_id'] ? $value['member_id'] : 1;
	$memberModel = $this->memberModel->getInfo($member_id);
	$username = html_a(['href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($memberModel['id'])]),'text'=>$memberModel['username'],'style'=>'color:#999999']);

	$detailTime = ci3_time($value['insert_time'])." come from ".$username;


	$body .= html_div(['body'=>$detailTime,'class'=>'home-time']);

	echo html_div(['body'=>$body,'class'=>'home-line']);
}

$pageData['totalCount'] = $totalCount;
$pageData['pageSize'] = $pageSize;
$this->load->view('page',$pageData);
?>

<?php 
    $this->load->view('footer',$data);
?>