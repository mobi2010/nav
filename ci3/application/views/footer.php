<?php 
$commonParams = $initData['commonParams'];


?>
</div>

<style type="text/css">
.nfooter{
	background-color:#666666; 
	color: #CCCCCC;
	text-align: center;
}	

.nfooter ul{
	list-style:none;
    width: auto;
    height: 20em;
    display: inline-block;
}
.nfooter li
{
	position:relative;
	top: 5em;
    float:left;
    margin:0 1em 0 0;
    padding: 0;
}
.nfooter li img{
	width: 8em;
}
</style>
<div class="nfooter">
	<ul >
		<?php 
		foreach ($commonParams['footer'] as $key => $value) {
			$url = $value['url'] ? $value['url'] : ci3_url($value['uri']);
			echo "<li>";
			echo "<a href='{$url}' target='_blank'><img src='{$value['image']}' /></a><br/>";
			echo $value['title'];
			echo "</li>";

		}

		?>
	</ul>
</div>






<!-- JiaThis Button BEGIN -->
<script type="text/javascript" >
var jiathis_config={
	siteNum:8,
	sm:"tsina,weixin,fb,twitter,tumblr,linkedin,tieba,douban",
	summary:"",
	showClose:true,
	shortUrl:false,
	hideMore:false
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?btn=r1.gif&move=0" charset="utf-8"></script>
<!-- JiaThis Button END -->

</body>
</html>