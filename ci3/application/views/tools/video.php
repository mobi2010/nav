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
.alt{
	font-size: 0.5em;
	color:#999999;
}
</style>

   
	

<div class="nav">
	<table class="table" >
		<tr >
	        <td colspan="2" align="center"><label>Video Parse</label></td>
	    </tr>
		<tr >
	        <td ><label>e.g.</label></td>
	        <td>
	        	<span class="alt">
	        	微博视频地址&nbsp;:&nbsp;https://weibo.com/tv/v/G8isa0Dap?fid=1034:58ec07ecf455dca6443674731f8949fa<br/>
	        	秒拍视频地址&nbsp;:&nbsp;https://www.miaopai.com/show/okED0mPI2Pjic2fzuNQIXbX1FIgORA7slOJoQg__.htm<br/>
	        	Facebook视频地址&nbsp;:&nbsp;https://www.facebook.com/davi.rodrigues.900/videos/1626632580790440/
	        	</span>
	        </td>
	    </tr>
	    <tr >
	        <td ><label>Video Url:</label></td>
	        <td>
	        	<?php 
	        	echo html_text(['name'=>'content']);
	        	?>
	        </td>
	    </tr>
	    <tr>
	    	<td width="10%"><label>Operate:</label></td>
	    	<td >
	    		<?php 
	    		foreach ($navData['VideoParse']['sub'] as $key => $value) {
					echo html_button(['value'=>$value['title'],'data-type'=>$value['type'],'class'=>'btn btn-success parseBtns']);
				}
	    		?>
	    	</td>

	    </tr>

	    <tr >
	        <td><label>Result:</label></td>
	        <td>
	        	<?php 
	        	echo html_a(['id'=>'result',"target"=>"_blank"]);
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
		$.post("<?=ci3_url('site/tools/videoparse')?>",{'type':type,'content':content},function(dt){
			if(dt.code != 0){
				$.common.alert(dt);
			}else{
				$('#result').text(dt.data);
				$('#result').attr('href',dt.data);
			}
        })
        return false;
	})

}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>	