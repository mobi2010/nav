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
	
	<!-- <div class="breadcrumbContainer">
	    <ul class="breadcrumb"><li class="active">Sign up</li></ul>       
	</div> -->
	<form id="ci3Form" enctype="multipart/form-data" action="<?=ci3_url('member/signup/save')?>" method="post">
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
	</form> 
</div>

<script type="text/javascript">
$(document).ready(function(){



}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>