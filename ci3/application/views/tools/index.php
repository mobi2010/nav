<?php 
$this->load->view('header',$data);
$navData = $initData['navData'];

?>  
<style type="text/css">

.nav{
    padding: 1em;
    background-color:#fff;
}

.title{
    font-size:large; 
    font-weight:bold; 
    color:#333;
}
.parseBtns{
    font-weight:bold; 
    display:inline-block;
    margin: 1em 2em 1em 0em;
}
.res{
	padding: 1em;
    background-color:#fff;
}

</style>


<div class="nav">
	<table class="table" >
		<tr >
	        <td colspan="2" align="center"><label>Codec</label></td>
	    </tr>
	    <tr >
	        <td width="10%"><label>Content:</label></td>
	        <td>
	        	<?php 
	        	echo html_textarea(['name'=>'content','rows'=>'15']);
	        	?>
	        </td>
	    </tr>
	    <tr>
	    	<td width="10%"><label>Operate:</label></td>
	    	<td >
	    		<?php 
	    		foreach ($navData['Codec']['sub'] as $key => $value) {
					echo html_button(['value'=>$value['title'],'data-type'=>$value['type'],'class'=>'btn btn-success parseBtns']);
				}
	    		?>
	    	</td>
	    </tr>
	    <tr >
	        <td><label>Result:</label></td>
	        <td>
	        	<?php 
	        	echo html_textarea(['name'=>'result','rows'=>'15']);
	        	?>
	        </td>
	    </tr>
	</table> 
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('.parseBtns').click(function(){
		var content = $('#content').val();
		var type = $(this).attr('data-type');
		if(!content){
			alert('Please enter the content');
			return false;
		}
		$.post("<?=ci3_url('site/tools/parse')?>",{'type':type,'content':content},function(dt){
			if(dt.code != 0){
				$.common.alert(dt);
			}else{
				$('#result').text(dt.data);
			}
        })
        return false;
	})

}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>	