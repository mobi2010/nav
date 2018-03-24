<?php 
$this->load->view('header',$data);
?>
<style type="text/css">
.home-line{
    background-color:#fff;
    margin: 0 0 2em 0;
    padding: .8em;
}
.home-line-member{

}
.home-line-content{
	height: 180px;
	line-height: 180px;
	margin: 1em 0;
	cursor: pointer;
}
.home-line-abstract{
	color: #666666;
	font-size:.8em;
	word-break:break-all; 
}
.home-line-time{
	clear: both;
	margin-top:.5em; 
	color: #999999;
}
</style>


    
<?php 
if(empty($dataModel)){
	echo html_div(['body'=>"No content.",'class'=>'home-line']);
}else{
	foreach ($dataModel as $key => $value) {
		//member
		$memberModel = $this->memberModel->getInfo($value['member_id']);
		$username = $memberModel['username'];
		$memberBody = html_a(['href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($memberModel['id'])]),'text'=>html_img(['src'=>$memberModel['avatar_url'],'width'=>'30'])])."&nbsp;";
		$memberBody .= html_a(['href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($memberModel['id'])]),'text'=>$username,'style'=>'color:#999999']);

		$body =  html_div(['body'=>$memberBody]);

		$article_url = ci3_article_url(['category_id'=>$c,'tag_id'=>$t,'article_id'=>$value['id']]);

		//content
		$contentHtml = null;
		if($value['video_url']){
		    $res = $this->videoUtils->parse($value['video_url'],'first');
		    if($res['url']){
		        $contentHtml = html_video(['src'=>$res['url'],'width'=>'320px','height'=>'180px']);
		    }
		}
		$contentHtml =  $contentHtml ? $contentHtml : ci3_content_index($value['content']);
		$body .=  html_div(['body'=>$contentHtml,"data-url"=>$article_url,'class'=>'home-line-content','onclick'=>"window.location.href = '{$article_url}'"]);

		//title
		$body .= "<h3>".html_a(['href'=>$article_url,'text'=>$value['title'],'target'=>"_blank"])."</h3>";

		//abstract
		$body .=  html_div(['body'=>$value['abstract'],'class'=>'home-line-abstract']);


		
		//time
		
		$detailTime = ci3_time($value['insert_time'])." come from ".$username;
		$body .= html_div(['body'=>$detailTime,'class'=>'home-line-time']);


		//body
		echo html_div(['body'=>$body,'class'=>'home-line']);
	}

	$pageData['totalCount'] = $totalCount;
	$pageData['pageSize'] = $pageSize;
	$this->load->view('page',$pageData);
}
?>

<?php 
    $this->load->view('footer',$data);
?>
<script type="text/javascript">
$(document).ready(function(){
    
}) 

</script>