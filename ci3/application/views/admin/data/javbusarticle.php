<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>
    



<form id="ci3Form" method="post" enctype="multipart/form-data" action="<?=base_url('admin/data/javbusarticlesave');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">url：</label>
        </td> 
        <td>
            <input type="text" id="url" class="form-control" name="url" >
        </td>
        <td>
            <label class="control-label">member_id：</label>
        </td> 
        <td>
            <input type="text" id="member_id" class="form-control" name="member_id" >
        </td>
        <td>
            <label class="control-label">article_id：</label>
        </td> 
        <td>
            <input type="text" id="article_id" class="form-control" name="article_id" >
        </td>
        <td>
            <label class="control-label">cover_image：</label>
        </td> 
        <td>
            <?php 
            echo html_file(['name'=>'Filedata','id'=>'cover_image']);
            ?>
        </td>
    </tr>
    <tr>
        <th colspan="8" class="text-center">
            <button type="button" id='saveBtn' class="btn btn-primary">Save</button>
        </th>
    </tr>
</table>
</form>

<script type="text/javascript">
$(document).ready(function() {
    
    $('#saveBtn').click(function(){
        var url = $('#url').val();
        if(!url){
            alert("input url");
            return false;
        }
        // var member_id = $('#member_id').val();
        // if(!member_id){
        //     alert("input member_id");
        //     return false;
        // }
        var cover_image = $('#cover_image').val();
        if(!cover_image){
            alert("input cover_image");
            return false;
        }

        $('#ci3Form').submit();
    })
})
</script> 
