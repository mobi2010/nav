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
	<table class="table  " style="width: 100%;" id="tag_table">
		<tr >
	        <td><label>Avatar:</label></td>
	        <td>
	        <?php
            if($dataModel['avatar_url']) {
                echo html_img(['src'=>$dataModel['avatar_url']]);
            }
            echo html_hidden(['name'=>'avatar_url','value'=>$dataModel['avatar_url']]);    
            echo html_file(['name'=>'Filedata']);
            ?>
	        </td>
	    </tr>
	    <tr >
	        <td><label>Username:</label></td>
	        <td>
	        <?php 
	            echo html_text(['name'=>'username','value'=>$dataModel['username']]);   
	        ?>
	        </td>
	    </tr>
	    <tr >
	        <td><label>Email:</label></td>
	        <td>
	        <?=html_text(['value'=>$dataModel['email'],'name'=>'email']);?>
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
	     <tr >
	        <td><label>Gender:</label></td>
	        <td>
	        <?php 
	            echo html_select(['selected'=>$dataModel['gender'],'name'=>'gender','options'=>$commonParams['gender']]);
	        ?>
	        </td>
	    </tr>
	     <tr >
	        <td><label>Biography:</label></td>
	        <td>
	        <?php 
	            echo html_textarea(['value'=>$dataModel['biography'],'name'=>'biography']);
	        ?>
	        </td>
	    </tr>
	    <tr >
	        <td align="center" colspan="2" >
	        	<?php 
	        	if($dataModel['id']){
	        		echo html_button(['id'=>'logout','value'=>'Sign out','class'=>'btn btn-default']);
	        		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	        	}

	        	?>
	            <button type="button" id="saveBtn" class="btn btn-success">Save</button> 
	        </td>
	    </tr>
	</table>
	</form> 
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#logout').click(function(){
		$.post("<?=base_url('member/signup/logout');?>",function(dt){
        	$.common.location("<?=base_url('index');?>");
        })
        
        return false; 
	})
    $('#saveBtn').click(function(){
    	var id = $('#id').val()
        var username = $('#username').val();
        if(!username){
            $.common.alert({'message':'Please enter the Username'});
            return false;
        }

        var email = $('#email').val();
        if(!email){
            $.common.alert({'message':'Please enter the Email'});
            return false;
        }

        if(!$.common.isemail(email)){
        	$.common.alert({'message':'Incorrect mailbox'});
            return false;
        }


        var password = $('#password').val();
        if(!password){
            $.common.alert({'message':'Please enter the Password'});
            return false;
        }

        $.post("<?=base_url('member/signup/check');?>",$('#ci3Form').serialize(),function(dt){
        	if(dt.code != 0){
        		$.common.alert(dt);
        	}else{
        		$('#ci3Form').submit();
        	}
        })
        
        return false;   
    })
}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>