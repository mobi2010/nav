<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">Uri：</label>
        </td> 
        <td>
            <input type="text" id="uri" class="form-control" name="uri" value="<?=$uri?>">
        </td> 
    </tr>
     <tr>
        <th colspan="6" class="text-center">
            <button type="button" id='fetchBtn' class="btn btn-success">Fetch</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='configBtn' class="btn btn-default">Config</button>
        </th>
    </tr>
</table>    

<script type="text/javascript">
$(document).ready(function() {
   
    $('#configBtn').click(function(){
        if(!confirm('Sure?')){return false;}

         $.post("<?=base_url('admin/nav/dataconfig');?>",function(dt){
            $.common.alert(dt);
        }) 
        return false;
    })

    $('#fetchBtn').click(function(){
        if(!confirm('Sure?')){return false;}
        var uri = $('#uri').val();
         $.post("<?=base_url('admin/nav/datafetch');?>",{'uri':uri},function(dt){
            $.common.alert(dt);
        }) 
        return false;
    })
})
</script> 