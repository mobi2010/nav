<?php 
$this->load->view('/article/header',$data);
?>
    
    
<div class="container" id="container" style="min-height: 638px;">
    <div class="area aVideoList">
        <div class="areaContent clearfix">
            <div class="colL fl">
                <div class="menu">
                        <?php 

                            foreach ($categoryData as $key => $value) {
                                $menuParams = ['href'=>ci3_url('article/index',['cid'=>$key,'sort'=>$sort]),'text'=>$value];
                                $menuParams['class'] = $key == $cid ? 'cur' : "";
                                echo html_a($menuParams);
                            }

                        ?>
                </div>
            </div>
            <div class="colR fr">
                <div class="module mAllCourse">
                    <div class="titleBar">
                        <span class="line"></span>
                        <h2 class="fl">全部微课</h2>
                        <div class="filter fl">
                            <?php 
                                $sortParams = ['最新上线','最受欢迎'];
                                foreach ($sortParams as $key => $value) {
                                    echo html_a(['href'=>ci3_url('article/index',['cid'=>$cid,'sort'=>$key]),'text'=>$value]);
                                }
                            ?>
                        </div>
                        <div class="searchbox">
                            <form action="http://zhannei.baidu.com/cse/search" method="get" target="_blank">
                                <input type="hidden" name="s" value="8644837122450305134">
                                <input type="hidden" name="entry" value="1">
                                <input type="hidden" name="nsid" value="2">
                                <span class="holderBox" style="position:relative;zoom:1;overflow:hidden;display:inline-block;float:left"><input type="text" name="q" id="inputSearch" class="searchinpt" data-holder="请输入关键字"></span>
                                <button type="submit" id="searchBtn" class="searchbtn"></button>
                            </form>
                        </div>
                    </div>
                    <div class="moduleContent clearfix" data-loadmore="">
    <?php 
        foreach ($dataModel as $key => $value) {
            $detail_url = "/article-{$value['id']}.html";//ci3_url('video/detail',['id'=>$value['id']]); 
            echo <<<ETO
<div class="item fl">
        <a href="{$detail_url}" target="_blank" class="pic" data-fadein="icon">
            <img src="{$value['image_url']}" alt="{$value['title']}">
        </a>
        <em class="icon" style="display: none;"><i class="iconfont"></i></em>
        <span class="t">
            <a href="{$detail_url}" target="_blank" class="pic" data-fadein="icon" data-cut="20">{$value['title']}</a>
        </span>
        <div class="data clearfix">
            <div class="playCountBox fl"><i class="iconfont"></i><em class="playCoun">{$value['views']}</em></div>
            <a href="javascript:void(0)" class="likeCountBox fl" onclick="onLike(this,1361,2)"><i class="iconfont"></i><em class="likeCount">{$value['likes']}</em></a>
        </div>
        <div class="info clearfix">
            <div class="name fl">
                <i class="iconfont"></i><a href="http://video.3uol.com/expert/469.html">谢衍铭</a>
            </div>
            <div class="title fl" data-cut="12">主任医师</div>
        </div>
    </div>
ETO;
        }

    ?> 


    

    

                    </div>
                        
                        <?php
                            $pageData['totalCount'] = $totalCount;
                            $this->load->view('article/page',$pageData);
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    $this->load->view('/article/footer',$data);
?>