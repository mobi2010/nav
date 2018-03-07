<?php 
$this->load->view('admin/header');
?>
<form id="ci3Form" method="post" action="<?=base_url('admin/comment/batch');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">Content：</label>
        </td> 
        <td>
            <input type="text" id="content" class="form-control" name="content" value="<?=$content?>">
        </td>
    </tr>
    <tr>
        <th colspan="4" class="text-center">
            <button type="button" id='searchBtn'class="btn btn-default">Select</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Content</th>
        <th>Article</th>
        <th>Member</th>
        <th>Operate</th>
    </tr>
    <?php 
        if(!empty($dataModel)){
            foreach ($dataModel as $key => $value) {

                $tdBody = html_a(['text'=>'删除','data-value'=>$value['id'],'class'=>'deleteBtn btn btn-danger btn-xs']);
                
                $td = html_td(['body'=>html_checkbox(['class'=>'ckbOne','data-name'=>$value['name'],'name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);
                $td .= html_td(['body'=>$value['content']]);
                $td .= html_td(['body'=>html_a(['target'=>"_blank",'href'=>ci3_url('admin/article/edit',['id'=>$value['article_id']]),'text'=>$value['article_id']])]);
                $td .= html_td(['body'=>html_a(['target'=>"_blank",'href'=>ci3_url('admin/member/index',['member_id'=>$value['member_id']]),'text'=>$value['member_id']])]);
                $td .= html_td(['body'=>$tdBody]);
                echo html_tr(['body'=>$td]);
            }
            $tdBody = html_checkbox(['name'=>'ckbAll','text'=>'All']);
            $tdBody .= str_repeat('&nbsp;',4);
            $tdBody .= html_a(['date-type'=>'delete','text'=>'Delete','class'=>'batchBtn btn btn-danger btn-xs']);
            $td = html_td(['body'=>$tdBody,'colspan'=>6]);
            echo html_tr(['body'=>$td]);   
        }
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
$(document).ready(function() {

    checkAll.init({'allBtn':'ckbAll','oneName':'ckbOption'});  
    $('.batchBtn').click(function(){
        
        var type = $(this).attr('date-type');
        if($("input[name='ckbOption[]']:checked").length == 0){
            $.common.alert({"message":"请选择"});
        }else{
            if(!confirm('确定删除?')){return false;}
            $.post("<?=base_url('admin/comment/batch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                $.common.alert(dt);
                $.common.refresh();
            }) 
        }
        return false;
    })


    $('#searchBtn').click(function(){
        var content = $('#content').val();
        var url = "<?=ci3_url('admin/comment/index')?>?content="+content;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('确定删除?')){return false;}
        var id = $(this).attr('data-value');
        $.post("<?=ci3_url('admin/comment/delete')?>",{'id':id},function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/comment/index')?>");
        })
    })
})
</script> 
