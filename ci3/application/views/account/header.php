<?php 
$this->load->view('header',$data);

$commonParams = $initData['commonParams'];

?>  

<style type="text/css">
.account{
    padding: 1em;
    background-color:#fff;
}

.menu{
	list-style:none;
    margin: 0px; 
    padding: 0px;
    width: auto;
}
.menu li
{
    float:left;
    margin:1em;
}

.content{

}
</style>

<div class="account">
	<ul class="menu">
	<?php 
	foreach ($commonParams['memberMenu'] as $key => $value) {
		$profileParams['class'] = '';
		$profileParams['text'] = $value['title'];
		$profileParams['href'] = ci3_url($value['uri']);
		if(strtolower($value['title']) == $uriEntity['method']){
			$profileParams['class'] = 'current';
		}
		echo "<li>".html_a($profileParams)."</li>";
	}
	?>
	
	</ul>
	<div class="content">