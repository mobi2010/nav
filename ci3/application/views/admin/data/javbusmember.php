<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>
    



<form id="ci3Form" method="post" enctype="multipart/form-data" action="<?=base_url('admin/data/javbusmembersave');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">url：</label>
        </td> 
        <td>
            <input type="text" id="url" class="form-control" name="url" value="<?=$url?>">
        </td>
        <td>
            <label class="control-label">nickname：</label>
        </td> 
        <td>
            <input type="text" id="nickname" class="form-control" name="nickname" value="<?=$nickname?>">
        </td>
        <td>
            <label class="control-label">avatar：</label>
        </td> 
        <td>
            <?php 
            echo html_file(['name'=>'Filedata','id'=>'avatar']);
            ?>
        </td>
    </tr>
    <tr>
        <th colspan="6" class="text-center">
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
        var nickname = $('#nickname').val();
        if(!nickname){
            alert("input nickname");
            return false;
        }
        var avatar = $('#avatar').val();
        if(!avatar){
            alert("input avatar");
            return false;
        }
        $('#ci3Form').submit();
    })
})
</script> 
