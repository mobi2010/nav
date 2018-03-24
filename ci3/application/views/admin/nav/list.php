<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>
    



<form id="ci3Form" method="post" action="<?=base_url('admin/category/batch');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">Name：</label>
        </td> 
        <td>
            <input type="text" id="name" class="form-control" name="name" value="<?=$name?>">
        </td>
        <td>
            <label class="control-label">Uri：</label>
        </td> 
        <td>
            <input type="text" id="uri" class="form-control" name="uri" value="<?=$uri?>">
        </td>
         <td>
            <label class="control-label">Category：</label>
        </td> 
        <td>
            <?php 
            echo html_select(['name'=>'nav_category_id','options'=>$categoryKV,'selected'=>$nav_category_id]);

            ?>
        </td>
         <td>
            <label class="control-label">Type：</label>
        </td> 
        <td>
            <input type="text" id="type" class="form-control" name="type" value="<?=$type?>">
        </td>
    </tr>
    <tr>
        <th colspan="8" class="text-center">
            <button type="button" id='createBtn' class="btn btn-success">Create</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='searchBtn' class="btn btn-default">Search</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Uri</th>
        <th>Category</th>
        <th>Sort</th>
        <th>Type</th>
        <th>Hits</th>
        <th>Update</th>
        <th>Insert</th>
    </tr>
    <?php 
        foreach ($dataModel as $key => $value) {
            echo '<tr>';
            echo html_td(['body'=>html_checkbox(['class'=>'ckbOne','data-name'=>$value['name'],'name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);
            $name = html_text(['name'=>"name[{$value['id']}]",'value'=>$value['name']]);
            echo html_td(['body'=>$name]);
            
            $uri = html_text(['name'=>"uri[{$value['id']}]",'value'=>$value['uri']]);
            echo html_td(['body'=>$uri]);

            $category = html_select(['name'=>"nav_category_id[{$value['id']}]",'options'=>$categoryKV,'selected'=>$value['nav_category_id']]);
            echo html_td(['body'=>$category]);

            echo html_td(['body'=>html_text(['value'=>$value['sort_id'],'size'=>1,'name'=>"sort_id[{$value['id']}]"])]);

            echo html_td(['body'=>html_text(['value'=>$value['type'],'size'=>1,'name'=>"type[{$value['id']}]"])]);

            echo html_td(['body'=>$value['hits']]);
            echo html_td(['body'=>date("Y-m-d H:i:s",$value['update_time'])]);
            echo html_td(['body'=>date("Y-m-d H:i:s",$value['insert_time'])]);
            echo '</tr>';
        }
        $tdBody = html_checkbox(['name'=>'ckbAll','text'=>'All']);
        $tdBody .= str_repeat('&nbsp;',4);
        $tdBody .= html_a(['date-type'=>'update','text'=>'Update','class'=>'batchBtn btn btn-primary btn-xs']);
        $tdBody .= str_repeat('&nbsp;',4);
        $tdBody .= html_a(['date-type'=>'delete','text'=>'Delete','class'=>'batchBtn btn btn-danger btn-xs']);
        $td .= html_td(['body'=>$tdBody,'colspan'=>10]);
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
    var del_category = function(){
        var id = $(this).attr('data-value');
        $('.span-category-'+id).remove();
    }
$(document).ready(function() {
    checkAll.init({'allBtn':'ckbAll','oneName':'ckbOption'});  
    $('.batchBtn').click(function(){
        var type = $(this).attr('date-type');
        if($("input[name='ckbOption[]']:checked").length == 0){
            $.common.alert({"message":"请选择"});
        }else{
            $.post("<?=base_url('admin/nav/batch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                $.common.alert(dt);
                $.common.refresh();
            }) 
        }
        return false;
    })

    $('#searchBtn').click(function(){
        var name = $('#name').val();
        var nav_category_id = $('#nav_category_id').val();
        var url = "<?=ci3_url('admin/nav/index')?>?name="+name+"&nav_category_id="+nav_category_id;
        $.common.location(url);
        return false;
    })
    $('#createBtn').click(function(){
        var name = $('#name').val();
        var uri = $('#uri').val();
        var nav_category_id = $('#nav_category_id').val();
        var type = $('#type').val();
         $.post("<?=base_url('admin/nav/save');?>",{'name':name,'uri':name,'nav_category_id':nav_category_id,'type':type},function(dt){
                $.common.refresh();
            }) 
        return false;
    })
})
</script> 
