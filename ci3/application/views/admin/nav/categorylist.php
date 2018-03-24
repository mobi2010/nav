<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>
    



<form id="ci3Form" method="post" action="<?=base_url('admin/nav/categorycreate');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">Name：</label>
        </td> 
        <td>
            <input type="text" id="name" class="form-control" name="name" >
        </td>
        <td>
            <button type="button" id='createBtn' class="btn btn-success">Create</button>
        </td>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Sort</th>
        <th>Status</th>
        <th>Hits</th>
    </tr>
    <?php 
        foreach ($dataModel as $key => $value) {
            echo '<tr>';
            echo html_td(['body'=>html_checkbox(['class'=>'ckbOne','data-name'=>$value['name'],'name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);
            $name = html_text(['name'=>"name[{$value['id']}]",'value'=>$value['name']]);
            echo html_td(['body'=>$name]);
            
            echo html_td(['body'=>html_text(['value'=>$value['sort_id'],'size'=>1,'name'=>"sort_id[{$value['id']}]"])]);
            echo html_td(['body'=>html_select(['options'=>[0=>'show',1=>'hide'],'selected'=>$value['status'],'name'=>"status[{$value['id']}]"])]);
            echo html_td(['body'=>$value['hits']]);
            echo '</tr>';
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
            $.post("<?=base_url('admin/nav/categorybatch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                $.common.refresh();
            }) 
        }
        return false;
    })

    $('#createBtn').click(function(){
        var name = $('#name').val();

         $.post("<?=base_url('admin/nav/categorycreate');?>",{'name':name},function(dt){
                $.common.refresh();
            }) 
        return false;
    })

    
})
</script> 
