<?php 
$this->load->view('header',$data);

$commonParams = $initData['commonParams'];

?>  

<style type="text/css">
.signup{
    padding: 1em;
    background-color:#fff;
}

.detail-time{
	color:#999999;
	font-size:0.5em;
}

</style>

<div class="signup">
	<table class="table" style="width: 100%;" id="tag_table">
		<tr >
	        <td><label>Avatar:</label></td>
	        <td>
	        <?php
            if($dataModel['avatar_url']) {
                echo html_img(['src'=>$dataModel['avatar_url']]);
            }
            ?>
	        </td>
	    </tr>
	    <tr >
	        <td><label>Nickname:</label></td>
	        <td>
	        <?php 
	            echo $dataModel['nickname']."&nbsp;&nbsp;";  
	            if($followStatus == 'follow'){
	            	echo html_a(['text'=>'Unfollow','data-value'=>$m,'class'=>'unfollowBtn btn btn-danger btn-xs']);
	            }elseif(in_array($followStatus,['guest','none','followed'])){
	            	echo html_a(['text'=>'Follow','data-value'=>$m,'class'=>'followBtn btn btn-primary btn-xs']);
	            }
	        ?>
	        </td>
	    </tr>
	    
	     <tr >
	        <td><label>Gender:</label></td>
	        <td>
	        <?php 
	            echo $commonParams['gender'][$dataModel['gender']];
	        ?>
	        </td>
	    </tr>
	     <tr >
	        <td><label>Biography:</label></td>
	        <td>
	        <?php 
	            echo str_replace(["\r\n", "\r", "\n"], "<br/>", $dataModel['biography']);
	        ?>
	        </td>
	    </tr>
	</table>
	<table class="table table-striped">
    <tr>
        <th colspan="2">Posts</th>
    </tr>
    <?php 
    	$articleModel = $articleData['dataModel'];
        if(!empty($articleModel)){
            foreach ($articleModel as $key => $value) {
            
                
                $td = html_td(['body'=>html_a(['target'=>"_blank",'href'=>ci3_article_url(['article_id'=>$value['id']]),'text'=>$value['title']])]);

                $td .= html_td(['body'=>ci3_time($value['update_time'])]);
                echo html_tr(['body'=>$td]);
            }
        }
    ?>
</table>
<?php 

$pageData['totalCount'] = $articleData['totalCount'];
$pageData['pageSize'] = $pageSize;
$this->load->view('page',$pageData);

?>


</div>

<script type="text/javascript">
$(document).ready(function(){
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


<?php 
$this->load->view('footer',$data);
?>