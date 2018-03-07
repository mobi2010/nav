<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>
    



<form id="ci3Form" method="post" action="<?=base_url('admin/tag/batch');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">Name：</label>
        </td> 
        <td>
            <input type="text" id="name" class="form-control" name="name" value="<?=$name?>">
        </td>
    </tr>
    <tr>
        <th colspan="4" class="text-center">
            <a href='<?=ci3_url('admin/tag/edit',['type'=>$tagType])?>' type="button" id='addBtn' class="btn btn-success">Create</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='searchBtn'class="btn btn-default">Search</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Sort</th>
        <th>Operate</th>
    </tr>
    <?php 
        foreach ($dataModel as $key => $value) {
            echo '<tr>';
            echo html_td(['body'=>html_checkbox(['class'=>'ckbOne','data-name'=>$value['name'],'name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);
            $name = html_text(['name'=>"name[{$value['id']}]",'value'=>$value['name']]);
            echo html_td(['body'=>$name]);
            $type = html_select(['name'=>"tag_type_id[{$value['id']}]",'selected'=>$value['tag_type_id'],'options'=>$tagtypeModel]);
            echo html_td(['body'=>$type]);
            echo html_td(['body'=>html_text(['value'=>$value['sort_id'],'size'=>1,'name'=>"sort_id[{$value['id']}]"])]);
            echo "<td>";
            echo '<a class="edit btn btn-primary btn-xs" href="'.ci3_url('admin/tag/edit',['id'=>$value['id']]).'" >Edit</a>';
            echo str_repeat('&nbsp;',4);
            echo '<button class="deleteBtn btn btn-danger btn-xs" data-url="'.ci3_url('admin/tag/delete',['id'=>$value['id']]).'" >Delete</button></td></tr>';
        }
        $tdBody = html_checkbox(['name'=>'ckbAll','text'=>'All']);
        $tdBody .= str_repeat('&nbsp;',4);
        $tdBody .= html_a(['date-type'=>'update','text'=>'Update','class'=>'batchBtn btn btn-primary btn-xs']);
        $tdBody .= str_repeat('&nbsp;',4);
        $tdBody .= html_a(['date-type'=>'delete','text'=>'Delete','class'=>'batchBtn btn btn-danger btn-xs']);
        $td .= html_td(['body'=>$tdBody,'colspan'=>6]);
        echo html_tr(['body'=>$td]);     
    ?>
    
</table>
</form>
<?php
    $pageData['totalCount'] = $totalCount;
    $pageData['pageSize'] = $pageSize;
    $this->load->view('admin/page',$pageData);
    $this->load->view('admin/footer');
?>
<script type="text/javascript">
    var del_tag = function(){
        var id = $(this).attr('data-value');
        $('.span-tag-'+id).remove();
    }
$(document).ready(function() {
    checkAll.init({'allBtn':'ckbAll','oneName':'ckbOption'});  
    $('.batchBtn').click(function(){
        var type = $(this).attr('date-type');
        if($("input[name='ckbOption[]']:checked").length == 0){
            $.common.alert({"message":"请选择"});
        }else{
            $.post("<?=base_url('admin/tag/batch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                $.common.alert(dt);
                $.common.refresh();
            }) 
        }
        return false;
    })

    $('#searchBtn').click(function(){
        var name = $('#name').val();
        var url = "<?=ci3_url('admin/tag/index',['type'=>$tagType])?>&name="+name;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('确定删除?')){return false;}
        var url = $(this).attr('data-url');
        $.get(url,function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/tag/index',['type'=>$tagType])?>");
        })
    })
    

    $('.ckbOne').click(function(){
        var obj = {};
        var id = $(this).val();
        var name = $(this).attr('data-name');

        //$("#select_tag", window.parent.document).html('');
        html = "<span class='span-tag-"+id+"'>\n\
                        <a href='javascript:;' class='delTag' data-value='"+id+"' onclick='del_tag("+id+")'>["+id+":"+name+"]</a>\n\
                        <input type='hidden' name='tag[]' value='"+id+"'/></span>"
        $("#select_tag", window.parent.document).append(html); 
    })
})
</script> 
