<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>
<form id="ci3Form" method="post" action="<?=base_url('admin/member/batch');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">Username：</label>
        </td> 
        <td>
            <input type="text" id="username" class="form-control" name="username" value="<?=$username?>">
        </td>
        <td>
            <label class="control-label">Member Id：</label>
        </td> 
        <td>
            <input type="text" id="member_id" class="form-control" name="member_id" value="<?=$member_id?>">
        </td>
    </tr>
    <tr>
        <th colspan="4" class="text-center">
            <button type="button" id='searchBtn' class="btn btn-default">Select</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Avatar</th>
        <th>Username</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Pwd</th>
        <th>Biography</th>
        <th>Ip</th>
        <!-- <th>Update_time</th> -->
        <th>Insert_time</th>
        <th>Status</th>
        <th>Source</th>
        <th>Operate</th>
    </tr>
    <?php 
        if(!empty($dataModel)){
            foreach ($dataModel as $key => $value) {

                $tdBody = html_a(['text'=>'login','target'=>"_blank",'href'=>ci3_url('admin/member/login',['member_id'=>$value['id']]),'class'=>'btn btn-primary btn-xs']);
                //$tdBody .= html_a(['text'=>'view','target'=>"_blank",'href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($value['id'])]),'class'=>'btn btn-primary btn-xs']);
                
                $td = html_td(['body'=>html_checkbox(['class'=>'ckbOne','data-name'=>$value['name'],'name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);
                $avatar = html_a(['text'=>html_img(['src'=>$value['avatar_url'],'height'=>'60']),'target'=>"_blank",'href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($value['id'])]),'class'=>'btn btn-primary btn-xs']);
                
                $td .= html_td(['body'=>$avatar]);
                $td .= html_td(['body'=>html_text(['name'=>"username[{$value['id']}]",'value'=>$value['username'],'size'=>'10'])]);
                $td .= html_td(['body'=>html_text(['name'=>"email[{$value['id']}]",'value'=>$value['email'],'size'=>'10'])]);
                $td .= html_td(['body'=>html_select(['name'=>"gender[{$value['id']}]",'selected'=>$value['gender'],'options'=>$adminParams['gender']])]);
                $td .= html_td(['body'=>html_text(['name'=>"password[{$value['id']}]",'value'=>$value['password'],'size'=>'10'])]);
                $td .= html_td(['body'=>html_text(['name'=>"biography[{$value['id']}]",'value'=>$value['biography']])]);
                $td .= html_td(['body'=>$value['ip']]);
                //$td .= html_td(['body'=>date("Y-m-d H:i:s",$value['update_time'])]);
                $td .= html_td(['body'=>date("Y-m-d H:i:s",$value['insert_time'])]);
                $td .= html_td(['body'=>html_select(['name'=>"status[{$value['id']}]",'selected'=>$value['status'],'options'=>$adminParams['status']])]);
                $td .= html_td(['body'=>html_select(['name'=>"source[{$value['id']}]",'selected'=>$value['source'],'options'=>$adminParams['source']])]);
                $td .= html_td(['body'=>$tdBody]);
                echo html_tr(['body'=>$td]);
            }
            $tdBody = html_checkbox(['name'=>'ckbAll','text'=>'All']);
            $tdBody .= html_a(['date-type'=>'update','text'=>'Update','class'=>'batchBtn btn btn-primary btn-xs']);
            $tdBody .= str_repeat('&nbsp;',4);
            $tdBody .= html_a(['date-type'=>'delete','text'=>'Delete','class'=>'batchBtn btn btn-danger btn-xs']);
            $td = html_td(['body'=>$tdBody,'colspan'=>20]);
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
            if(type == 'delete' && !confirm('确定删除?')){return false;}
            $.post("<?=base_url('admin/member/batch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                // $.common.alert(dt);
                $.common.refresh();
            }) 
        }
        return false;
    })


    $('#searchBtn').click(function(){
        var username = $('#username').val();
        var member_id = $('#member_id').val();
        var url = "<?=ci3_url('admin/member/index')?>?username="+username+"&member_id="+member_id;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('确定删除?')){return false;}
        var id = $(this).attr('data-value');
        $.post("<?=ci3_url('admin/member/delete')?>",{'id':id},function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/member/index')?>");
        })
    })
})
</script> 
