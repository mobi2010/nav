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
		echo "<li>".html_a(['text'=>$value['title'],'href'=>ci3_url($value['uri'])])."</li>";
	}
	?>
	
	</ul>
	<div class="content">