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
	    <ul class="breadcrumb"><li class="active">Sign in</li></ul>       
	</div> -->
	<form id="ci3Form" enctype="multipart/form-data" action="<?=ci3_url('member/signup/save')?>" method="post">
	<table class="table  table-bordered" style="width: 100%;" id="tag_table">
		
	    <tr >
	        <td><label>Username:</label></td>
	        <td>
	        <?php 
	            echo html_text(['name'=>'username','value'=>$dataModel['username']]);   
	        ?>
	        </td>
	    </tr>
	    <tr >
	        <td><label>Password:</label></td>
	        <td>
	        <?php 
	            echo html_password(['value'=>$dataModel['password'],'name'=>'password','class'=>'form-control']);
	        ?>
	        </td>
	    </tr>
	    
	        <td align="center" colspan="2" >
	            <button type="button" id="signInBtn" class="btn btn-success">Sign in</button> 
	        </td>
	    </tr>
	</table>
	</form> 
</div>

<script type="text/javascript">
$(document).ready(function(){
	
    $('#signInBtn').click(function(){
        var username = $('#username').val();
        if(!username){
            $.common.alert({'message':'Please enter the Username'});
            return false;
        }

        var password = $('#password').val();
        if(!password){
            $.common.alert({'message':'Please enter the Password'});
            return false;
        }

        $.post("<?=base_url('member/signin/login');?>",$('#ci3Form').serialize(),function(dt){
        	if(dt.code != 0){
        		$.common.alert(dt);
        	}else{
        		$.common.location("<?=base_url('index');?>");
        	}
        })
        
        return false;   
    })
}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>