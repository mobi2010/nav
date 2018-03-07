<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>
    



<form id="ci3Form" method="post" action="<?=base_url('admin/feedback/batch');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">content：</label>
        </td> 
        <td>
            <input type="text" id="content" class="form-control" name="content" value="<?=$content;?>">
        </td>
    </tr>
    <tr>
        <th colspan="4" class="text-center">
            <a href='<?=ci3_url('admin/feedback/edit',['type'=>$feedbackType])?>' type="button" id='addBtn' class="btn btn-success">Create</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='searchBtn'class="btn btn-default">Search</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>content</th>
        <th>member_id</th>
        <th>ip</th>
        <th>reply_content</th>
        <th>insert_time</th>
    </tr>
    <?php 
        foreach ($dataModel as $key => $value) {
            echo '<tr>';


            echo html_td(['body'=>html_checkbox(['class'=>'ckbOne','data-name'=>$value['name'],'name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);

            $content = html_text(['name'=>"content[{$value['id']}]",'value'=>$value['content']]);
            echo html_td(['body'=>$content]);

            echo html_td(['body'=>$value['member_id']]);

            echo html_td(['body'=>$value['ip']]);

            echo html_td(['body'=>html_text(['name'=>"reply_content[{$value['id']}]",'value'=>$value['reply_content']])]);
            echo html_td(['body'=>date("Y-m-d H:i:s",$value['insert_time'])]);
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
    var del_feedback = function(){
        var id = $(this).attr('data-value');
        $('.span-feedback-'+id).remove();
    }
$(document).ready(function() {
    checkAll.init({'allBtn':'ckbAll','oneName':'ckbOption'});  
    $('.batchBtn').click(function(){
        var type = $(this).attr('date-type');
        if(type == 'delete' && !confirm('确定删除?')){return false;}


        if($("input[name='ckbOption[]']:checked").length == 0){
            $.common.alert({"message":"请选择"});
        }else{
            $.post("<?=base_url('admin/feedback/batch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                $.common.alert(dt);
                $.common.refresh();
            }) 
        }
        return false;
    })

    $('#searchBtn').click(function(){
        var content = $('#content').val();
        var url = "<?=ci3_url('admin/feedback/index')?>?content="+content;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('确定删除?')){return false;}
        var url = $(this).attr('data-url');
        $.get(url,function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/feedback/index',['type'=>$feedbackType])?>");
        })
    })
    

    $('.ckbOne').click(function(){
        var obj = {};
        var id = $(this).val();
        var name = $(this).attr('data-name');

        //$("#select_feedback", window.parent.document).html('');
        html = "<span class='span-feedback-"+id+"'>\n\
                        <a href='javascript:;' class='delFeedback' data-value='"+id+"' onclick='del_feedback("+id+")'>["+id+":"+name+"]</a>\n\
                        <input type='hidden' name='feedback[]' value='"+id+"'/></span>"
        $("#select_feedback", window.parent.document).append(html); 
    })
})
</script> 
