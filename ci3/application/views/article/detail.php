<?php 
$this->load->view('header',$data);
?>  

<style type="text/css">
.article-title{
    clear: both;
    font-size:3em;
    font-weight:bold;
}

.detail{
	clear: both;
    padding: 1em;
    background-color:#fff;
}

.detail-time{
	color:#999999;
	font-size:.8em;
}
.context{
    clear: both;
	font-size:1.3em;
    margin: .5em;
}
.pre-context{
	float: right;
	
}
.next-context{
	float: left;
}

.content{
    margin: 1.5em 0;
}

.comment{
	clear: both;
    position: relative;
    top:1em;  
}
.comment-button{
	margin-top: 1em; 
	float: right;
}

.member-panel{
    padding-top:1em; 
    clear: both;
}

.abstract{
    padding-bottom: 1em; 
}
.cover_image{
    display: block;
}
</style>


<div class="detail">

<?php 



$pnBody = null;

if(!empty($previousModel)){
	$article_url = ci3_article_url(['category_id'=>$category_id,'tag_id'=>$tag_id,'article_id'=>$previousModel['id']]);
	$prehtml = html_a(['href'=>$article_url,'text'=>$previousModel['title']."&gt;&gt;"]);
	$pnBody .= html_span(['body'=>$prehtml,'class'=>'pre-context']); 
}

if(!empty($nextModel)){
	$article_url = ci3_article_url(['category_id'=>$category_id,'tag_id'=>$tag_id,'article_id'=>$nextModel['id']]);
	$nexthtml = html_a(['href'=>$article_url,'text'=>"&lt;&lt;".$nextModel['title']]); 
	$pnBody .= html_span(['body'=>$nexthtml,'class'=>'next-context']); 
}

$detailBody .= html_div(['body'=>$pnBody,'class'=>'context']);

//member
$nickname = $memberData['nickname'];
$memberBody = html_a(['href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($memberData['id'])]),'text'=>html_img(['src'=>$memberData['avatar_url'],'width'=>'25']),'title'=>$nickname]);
//$memberBody .= html_a(['href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($memberData['id'])]),'text'=>$nickname,'style'=>'color:#999999']);

$memberBody .= "&nbsp;";  
if($followStatus == 'follow'){
    $memberBody .= html_a(['text'=>'Unfollow','data-value'=>$m,'class'=>'unfollowBtn btn btn-danger btn-xs']);
}elseif(in_array($followStatus,['guest','none','followed'])){
    $memberBody .= html_a(['text'=>'Follow','data-value'=>$m,'class'=>'followBtn btn btn-primary btn-xs']);
}




$detailBody .= html_div(['body'=>$dataModel['title'],'class'=>'article-title']);




$detailTime = ci3_time($dataModel['insert_time']);

// $detailTime .= html_a(['href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($memberData['id'])]),'text'=>$memberData['nickname']]);

$detailTime .= "&nbsp;".$dataModel['hits'].' hits come from &nbsp;';
$detailTime .= $memberBody;
$detailBody .= html_div(['body'=>$detailTime,'class'=>'detail-time']);

$contentHtml = null;

if($dataModel['video_url']){
    $res = $this->videoUtils->parse($dataModel['video_url'],'first');
    if($res['url']){
        $contentHtml .= html_video(['src'=>$res['url'],"preload"=>"auto","autoplay"=>"autoplay",'width'=>'640px','height'=>'360px']);
    }
}

if($dataModel['cover_image']){
    $contentHtml .= html_img(['src'=>$dataModel['cover_image'],'class'=>'cover_image']);
}


$contentHtml .= ci3_content($dataModel['content']);

$detailBody .= html_div(['body'=>$contentHtml,'class'=>'content']);

$detailBody .= $dataModel['abstract'] ? html_div(['body'=>ci3_content($dataModel['abstract']),'class'=>'abstract']) : null;
if(!empty($dataModel['tags'])){
	$tagBody = null;
	foreach ($dataModel['tags'] as $key => $value) {
		$tagBody .=  html_a(['href'=>ci3_url('index',['t'=>ci3_encrypt($key)]),'text'=>$value,'class'=>' btn btn-warning btn-xs'])."&nbsp;&nbsp;"; 

	}
	$detailBody .= html_div(['body'=>$tagBody]);

}



$detailBody .= html_div(['body'=>$pnBody,'class'=>'context']);




echo $detailBody;

?>

<form id="ci3Form" enctype="multipart/form-data" action="<?=ci3_url('article/detail/comment')?>" method="post">

<?php 

$commentHtml = html_textarea(['name'=>'comment']);
$commentHtml .=  html_div(['body'=>html_button(['name'=>'commentBtn','class'=>'btn btn-success','value'=>'Submit']),'class'=>'comment-button']);;
$commentHtml .= html_hidden(['name'=>'article_id','value'=>$dataModel['id']]);
$commentHtml .= html_hidden(['name'=>'reply_id','value'=>'0']);
$commentDiv = html_div(['body'=>$commentHtml,'class'=>'comment']);
$commentDiv .= html_div(['style'=>'height:5em']);
echo $commentDiv;
?>

</form>

    <div class="comment-list">
        

    </div>

</div>

<?php 
$this->load->view('footer',$data);
?>

<script type="text/javascript">
$(document).ready(function(){
	
    $('#commentBtn').click(function(){
        var logined = "<?=$current_user_id;?>";

        if(logined == 0){
        	$.common.alert({'message':'Please log in first'});
            return false;
        }



        var article_id = $('#article_id').val()
        var comment = $('#comment').val()
        var reply_id = $('#reply_id').val()

        if(!comment){
            $.common.alert({'message':'Please enter the content'});
            return false;
        }

        $.post("<?=base_url('article/detail/comment');?>",{"article_id":article_id,"comment":comment,"reply_id":reply_id},function(dt){
        	if(dt.code != 0){
        		$.common.alert(dt);
        	}else{
                
        		showCommentList(1);
        	}
        })
        
        return false;   
    })

    var showCommentList = function(page){
        var article_id = $('#article_id').val();
        $.post("<?=base_url('article/detail/commentList');?>",{"article_id":article_id,'page':page},function(dt){
            $('.comment-list').empty();
            $('#comment').val("");
            $('.comment-list').append(dt);
            $('.pagination a').off().on('click',function(){
                var page = $(this).attr('data-page');
                showCommentList(page);
                return false;
            })
            $('.replyBtn').off().on('click',function(){
                var r = $(this).attr('data-r');
                var m = $(this).attr('data-m');
                var n = $(this).attr('data-n');
                $('#comment').val("Reply@"+n+": ").focus();
                $('#reply_id').val(r);
                return false;
            })

        })
    }
    showCommentList(1);


    $('.followBtn').click(function(){
        var m = $(this).attr('data-value');
        $.post("<?=ci3_url('member/profile/follow')?>",{'m':m},function(dt){
            if(dt['code'] !=0){
                $.common.alert(dt);
            }else{
                $.common.refresh();
            }
            
        })
    })
    $('.unfollowBtn').click(function(){
        var m = $(this).attr('data-value');
        if(!confirm('Unfollow?')){return false;}
        $.post("<?=ci3_url('member/profile/unfollow')?>",{'m':m},function(dt){
            if(dt['code'] !=0){
                $.common.alert(dt);
            }else{
                $.common.refresh();
            }
            
        })
    })

}) 
</script>  


<link rel="stylesheet" href="/assets/plugins/emoji/lib/css/bootstrap.css"/>
<link rel="stylesheet" href="/assets/plugins/emoji/lib/css/jquery.mCustomScrollbar.min.css"/>
<link rel="stylesheet" href="/assets/plugins/emoji/dist/css/jquery.emoji.css"/>
<link rel="stylesheet" href="/assets/plugins/emoji/lib/css/railscasts.css"/>
<link rel="stylesheet" href="/assets/plugins/emoji/dist/css/index.css"/>
<script src="/assets/plugins/emoji/lib/script/highlight.pack.js"></script>
<script src="/assets/plugins/emoji/lib/script/jquery.mousewheel-3.0.6.min.js"></script>
<script src="/assets/plugins/emoji/lib/script/jquery.mCustomScrollbar.min.js"></script>
<script src="/assets/plugins/emoji/dist/js/jquery.emoji.min.js"></script>
<script>
    hljs.initHighlightingOnLoad();

    $("#comment").emoji({
            showTab: true,
            animation: 'fade',
            icons: [{
                path: "/assets/plugins/emoji/dist/img/qq/",
                name: "normal",
                maxNum: 91,
                excludeNums: [41, 45, 54],
                file: ".gif",
                placeholder: "[GIF:{alias}]"
            }]
        });

    $("#btnParse").click(function () {
        $("#sourceText").emojiParse({
            icons: [{
                path: "/assets/plugins/emoji/dist/img/qq/",
                file: ".gif",
                placeholder: "[GIF:{alias}]"
            }]
        });
    });
</script>