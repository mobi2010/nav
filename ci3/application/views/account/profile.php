<?php 
$this->load->view('account/header',$data);
$commonParams = $initData['commonParams'];

?>  

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
    <td><label>Email:</label></td>
    <td>
    <?php 
        echo $dataModel['email'];   
    ?>
    </td>
</tr>
<tr >
    <td><label>Nickname:</label></td>
    <td>
    <?php 
        echo $dataModel['nickname'];   
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
        echo str_replace(["\r\n", "\r", "\n"], "<br/>", $dataModel['biography']);
    ?>
    </td>
</tr>

 <tr >
    <td colspan="2" align="center" >
    <?php 
        echo html_a(['href'=>ci3_url('member/signup'),'text'=>'Edit','class'=>'btn btn-success']);
    ?>
    </td>
</tr>

</table>



<script type="text/javascript">
$(document).ready(function(){



}) 
</script>    


<?php 
$this->load->view('account/footer',$data);
?>