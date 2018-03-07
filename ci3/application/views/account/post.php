<?php 
$this->load->view('account/header',$data);
$commonParams = $initData['commonParams'];

?>  

<table class="table">
    <tr>
        <td>
            <label class="control-label">Title：</label>
        </td> 
        <td>
            <input type="text" id="title" class="form-control" name="title" value="<?=$title?>">
        </td>
        
    </tr>
    <tr>
        <th colspan="4" class="text-center">
            <a href='<?=ci3_url('member/account/postedit')?>' type="button" id='addBtn' class="btn btn-success">Create</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='searchBtn'class="btn btn-default">Search</button>
        </th>
    </tr>
</table>

<table class="table table-striped table-hover">
    <tr>
        <th>Title</th>
        <th>Modify Time</th>
        <th>Operate</th>
    </tr>
    <?php 
        if(!empty($dataModel)){
            foreach ($dataModel as $key => $value) {
                $tdBody = html_a(['href'=>ci3_url('member/account/postedit',['a'=>ci3_encrypt($value['id'])]),'text'=>'Edit','class'=>'edit btn btn-primary btn-xs']);
                $tdBody .= str_repeat('&nbsp;',4);
                $tdBody .= html_a(['text'=>'Delete','data-value'=>ci3_encrypt($value['id']),'class'=>'deleteBtn btn btn-danger btn-xs']);
                
                $td = html_td(['body'=>html_a(['target'=>"_blank",'href'=>ci3_article_url(['article_id'=>$value['id']]),'text'=>$value['title']])]);

                $td .= html_td(['body'=>date("Y-m-d H:i:s",$value['update_time'])]);
                $td .= html_td(['body'=>$tdBody]);
                echo html_tr(['body'=>$td]);
            }
        }
    ?>
</table>
<?php 

$pageData['totalCount'] = $totalCount;
$pageData['pageSize'] = $pageSize;
$this->load->view('page',$pageData);

?>


<script type="text/javascript">
$(document).ready(function(){

    $('#searchBtn').click(function(){
        var title = $('#title').val();
        var url = "<?=ci3_url('member/account/post')?>?title="+title;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('Deletions?')){return false;}
        var id = $(this).attr('data-value');
        $.post("<?=ci3_url('member/account/postdelete')?>",{'a':id},function(dt){
            $.common.refresh();
        })
    })

}) 
</script>    


<?php 
$this->load->view('account/footer',$data);
?>