<?php 
$this->load->view('header',$data);

?>  
<style type="text/css">

.nav{
    /*padding: 0px 1em 1em 1em;
    background-color:#fff;*/
}

.title{
    margin-top:1em; 
    font-size:large; 
    font-weight:bold; 
    color:#FFFFFF;
    background-color:#337ab7;
    padding: .5em 1em;
    width: 10em;
    overflow: hidden;
}
.navurl{
    font-weight:bold; 
    display:inline-block;
    margin: 1em 2em 0px 0px;
    background-color:#FFFFFF;
    padding: 1em 1em;
    width: 12em;
    overflow: hidden;
}
.navurl:hover{
    color: red;
}

</style>
<div class="nav">
<?php 
foreach ($navData as $k => $v) {
    echo html_div(['body'=>$v['name'],'class'=>'title']);
    $sub = $v['sub'];
    if(!empty($sub)){
        $subHtml = null;
        foreach ($sub as $key => $value) {
            $url = ci3_url('site/navigation/dis',['u'=>ci3_encrypt($value['id'])]);
            $subHtml .= html_a(['text'=>$value['name'],'href'=>$url,'target'=>"_blank",'class'=>'navurl']);
        }
        echo html_div(['body'=>$subHtml]);
    }
}


?>
</div>

<script type="text/javascript">
$(document).ready(function(){


}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>