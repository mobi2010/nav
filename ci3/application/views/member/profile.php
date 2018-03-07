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
	        <td><label>Username:</label></td>
	        <td>
	        <?php 
	            echo $dataModel['username'];   
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
	            echo $dataModel['biography'];
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



}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>