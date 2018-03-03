
<style type="text/css">
.comment-line{
	clear:both;
    background-color:#fff;
    margin: 1em 1em 0 1em;
    height: 90px;
    border-radius:5px 5px 5px 5px;
	border:#CCCCCC thin solid;
}

.member-info{
	position:relative;
	width: 80px;
	height: 80px;
	text-align: center;
	float: left;
	top: 5px;
}
.member-avatar{
	display: block;
}
.member-name{
	text-align: center;
}
.comment-content{
	height: 90px;
	
	padding:2em;

}

.comment-operate{
	float: right;
	position:relative;
	top: 35px;
	display: none;
}
</style>


    
<?php 

foreach ($dataModel as $key => $value) {

	$memberModel = $this->memberModel->getInfo($value['member_id']);
	$avatarBody = html_img(['src'=>$memberModel['avatar_url'],'height'=>'60px']);
	$memberBody = html_div(['body'=>$avatarBody,'class'=>'member-avatar']);
	$usernameBody = html_a(['href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($memberModel['id'])]),'text'=>$memberModel['username']]);
	$memberBody .= html_div(['body'=>$usernameBody,'class'=>'member-name']);

	$body = html_div(["body"=>$memberBody,'class'=>'member-info']);
	
	$content = ci3_emoji($value['content']);
	if($member_id == $value['member_id']){
		$deleteBody = html_a(['data-value'=>ci3_encrypt($value['id']),'text'=>'Delete','style'=>'color: #999999;','class'=>'deleteBtn']);
		$content .=html_div(["body"=>$deleteBody,"class"=>"comment-operate"]);
	}
	$contentBody = html_div(["body"=>$content,'class'=>'comment-content']);
	$body .= $contentBody;
	echo html_div(['body'=>$body,'class'=>'comment-line']);
}

$pageData['totalCount'] = $totalCount;
$pageData['pageSize'] = $pageSize;
$this->load->view('article/page',$pageData);
?>

<script type="text/javascript">
$(document).ready(function(){
	$('.comment-line').hover(function(){
	    //$(this).css("background-color","#F0F0F0");
	    $(this).find('.comment-operate').show();
	},function(){
	    //$(this).css("background-color","#fff");
	    $(this).find('.comment-operate').hide();
	});

	
    $('.deleteBtn').click(function(){
    	if(!confirm('Deletions?')){return false;}
    	var $ts = $(this);
    	var c = $(this).attr("data-value");
    	var article_id = "<?=$article_id;?>";
    	$.post("<?=base_url('article/detail/commentDel');?>",{"c":c,'article_id':article_id},function(dt){
            $ts.parents('.comment-line').remove();
        })
    })
})
</script>	
