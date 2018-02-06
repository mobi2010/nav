(function($){
    //##############对象方法##############	
    $.fn.extend({
        center:function(obj){//对象屏幕中央显示
            var obj = obj instanceof Object ? obj : {};//扩展用，暂时无用
            var x = obj['x'] ? obj['x'] : 0;//横坐标偏移量
            var y = obj['y'] ? obj['y'] : 0;//纵坐标偏移量
            var ow = obj['width'] || $(this).width();
            var oh = obj['height'] || $(this).height();
            var ww = $(window).width();  
            var wh = $(window).height(); 
            var dt = $(document).scrollTop();  
            var dl = $(document).scrollLeft();  
            var w = (ww-ow)/2+dl+(x);
            var h = (wh-oh)/2+dt+(y);
            var z = obj['z-index'] ? obj['z-index'] : 1;
            var p = obj['position'] ? obj['position'] : 'absolute';
            return $(this).css({'position':p,'left':w,'top':h,'z-index':z});
        },
        loading:function(obj){//加载图片            
            var obj = obj instanceof Object ? obj : {};//扩展用，暂时无用
            var ow = 31;
            var oh = 31;
            var ww = obj['width'] || $(this).width();  
            var wh = obj['height'] || $(this).height(); 
            var dt = $(this).scrollTop();  
            var dl = $(this).scrollLeft();  
            var w = (ww-ow)/2+dl;
            var h = (wh-oh)/2+dt;
            var czi = $(this).css('z-index') ? $(this).css('z-index') : 0;
            $img = $("<img>");
            $img.attr('src','/assets/images/common/loading.gif');
            $img.css({'position':"relative",'left':w,'top':h,'z-index':czi+1});
            $(this).append($img);
            return false;
        },
        inputToggle:function(val){//内容显示隐藏切换
            $(this).focus(function(){//获得焦点
                $(this).val() == val && $(this).val('');
            }).blur(function(){//失去焦点
                !($(this).val()) && $(this).val(val);
            })
            return false;
        },    
        memberInfoPanelMove:function(){//会员信息面板移动
            $(this).off('mousedown').on('mousedown',function(e){      
                if($(e.target).css('cursor') != 'move'){//连接返回false
                    return ;
                }

                var $upside = $('.ProInfoBanner.upside');       //背景层
                var mipmFlag = true;                            //触发移动事件
                var $mif = $('#memberInfoDiv');                 //用户信息对象
                // var $imlist = $('#div_impression');             //印象对象列表
                // var $imbtn = $('#impressionList');              //印象对象按钮
                // var imbtnStyle = $imbtn.attr('style');          //印象按钮的style
                var $subtn = $('#memberSetupButton');           //设置对象按钮
                var subtnStyle = $subtn.attr('style');          //设置按钮的style
                var $self = $(this);                            //当前对象
                var w = $upside.width()+64;//$self.width();                    //当前对象的宽
                var h = $upside.height()+40;                         //当前对象的高
                var mcX = Math.round(w/2);                      //当前对象的中线
                var $offset = $self.offset();                   //当前对象的偏移量
                var x = e.pageX;                                //当前鼠标的x坐标
                var y = e.pageY;                                //当前鼠标的y坐标
                var wW = $('body').width();                     //当前屏幕的宽
                var wH = $('#imgBgBox').height();               //可显示区域的高
                var minX = 0;                                   //x坐标最小值
                var maxX = wW-w;                                //x坐标最大值
                var minY = 0;                                   //y坐标最小值
                var maxY = wH-h;                                //y坐标最大值        
                var oL;                                         //当前对象移动时的左偏移量
                var oT;                                         //当前对象移动时的顶偏移量
                var bcX = Math.round(wW/2);                     //当前屏幕的中线
                var positionStyle = "";                         //位置的样式
                $(document).on('mousemove',function(e){//鼠标移动
                   /* if($('#lightBoxTmp').length == 0){
                        var newDiv = $('<div id="lightBoxTmp" style="width:100%;height:100%;position:fixed;left:0;top:0;background:rgba(0, 0, 0, 0.5) none repeat scroll 0 0 !important;filter:Alpha(opacity=50); background:#000;z-index:0;"><div style="width:1246px; margin:0 auto; height:100%; background:rgba(255, 255, 255, 0.5) none repeat scroll 0 0 !important;filter:Alpha(opacity=50); background:#FFF; relative;" id="lightCox"></div></div>');
                        $('body').append(newDiv);
                    }*/
                    if(mipmFlag){
                        //$imlist.hide();
                        oL = e.pageX-x + $offset.left;
                        oT = e.pageY-y + $offset.top-50;            
                        oL = oL < minX ? minX : oL; 
                        oL = oL > maxX ? maxX : oL;
                        oT = oT < minY ? minY : oT; 
                        oT = oT > maxY ? maxY : oT;
                        if(oL+mcX > bcX){//印象显示在左侧
                            $mif.css('float','right');
                            //$imbtn.attr('style',imbtnStyle.replace('right','left'));
                            $subtn.attr('style',subtnStyle.replace('right','left')+';border-radius:6px 0px 0px 6px;');
                            positionStyle = {'top':oT+"px",'left':'auto','right':(wW-oL)+"px"};
                            $self.css(positionStyle);
                        }else{//印象显示在右侧
                            $mif.css('float','left');
                            //$imbtn.attr('style',imbtnStyle.replace('left','right'));
                            $subtn.attr('style',subtnStyle.replace('left','right')+';border-radius:0px 6px 6px 0px;');     
                            positionStyle = {'top':oT+"px",'left':oL+"px",'right':'auto'};           
                            $self.css(positionStyle);
                        }
                    }
                    return ;
                })
                $(document).on('mouseup',function(e){//鼠标抬起
                    //$(this).off('mousemove');
                    mipmFlag = false;
                    if(positionStyle){
                        $.post('/users/setup/position',positionStyle);//保存位置
                        positionStyle = "";
                    }
                   /* if($('#lightBoxTmp').length != 0){
                        $('#lightBoxTmp').remove();
                    }*/
                    
                    return ;
                })
                return ;
            })
        },
        autoSearch:function(obj,callback){//检索提示            
            var $container = $(this).next("dl"); //结果列表容器
            var uri = obj['uri'];//请求地址 
            var $keyWord = $(this);//搜索关键字对象
            var itemKey = null; //选项的索引   
            var responseData = {};

            var searchItem = function(itemIndex){//选项列表
                itemKey = itemIndex;
                var itemLength = $container.find('dd').length;//结果长度                
                if(itemKey === null){
                    $container.hide();
                    return false;
                }else if(itemKey < 0){
                    itemKey = 0;
                }else if(itemKey >= itemLength){
                    itemKey = itemLength - 1;
                }
                $container.find("dd").removeClass('selected').eq(itemKey).addClass("selected");
                $container.show();
            }
            
            
            //选中后，将选项赋值给搜索框，隐藏列表
            var itemSelected = function (){
                $keyWord.val($container.find("dd").eq(itemKey).find("lable").text());
                $('#'+obj['hideValue']).val(JSON.stringify(responseData[itemKey]));
                searchItem(null);
            }
            
            //autocomplete = off 禁用浏览器内置的自动完成机制 
            $keyWord.attr("autocomplete","off").keyup(function(event){
                var keyCode = event.keyCode;                
                if(keyCode > 40 || keyCode == 8 || keyCode == 32){
                    //<=40 特殊键，8退格键 32空格
                    var query = $keyWord.val();
                    query && $.post(uri,{'query':query},function(data){
                        $container.empty();
                        if(data['data'].length){
                            responseData = data['data'];
                            var searchItemHtml = "";
                            $.each(data['data'],function(k,v){
                                searchItemHtml = '<lable>'+v['name']+'</lable>';
                                searchItemHtml = v['address'] ? searchItemHtml+'<span>--'+v['address']+'</span>' : v['name'];
                                $('<dd>')
                                .html(searchItemHtml)
                                .appendTo($container)
                                .mouseover(function(){searchItem(k);})
                                .click(itemSelected);
                            })
                            searchItem(0);
                        }else{
                            searchItem(null);
                        }
                    })
                }else if(itemKey !== null){
                    if(keyCode == 38){//上方向键
                        searchItem(itemKey -1 );
                    }else if(keyCode == 40){//下方向键
                        searchItem(itemKey + 1);
                    }else if(keyCode == 27){//退出键            
                        searchItem(null);
                    }else if(keyCode == 13){//回车键            
                        itemSelected();
                    }
                    event.preventDefault();
                }   
            }).blur(function(event){
                setTimeout(function(){searchItem(null);},300);
            })
        }
    })
  
  
    //##############功能方法##############
    $.common = {      	
    	init:function(){//全局脚本初始化
            $('.backBtn').unbind('click').bind('click',function(){
                window.history.back();return false;
            })
    		// //radio
      //       $('.html-radio').bind('click',function(){
      //           var radioName = $(this).attr('data-name');
      //           var radioId = $(this).attr('data-id');
      //           $("input[name='"+radioName+"']").prop("checked",false);
      //           $("#"+radioId).prop("checked",true);            
      //       })
      //       //tags
      //       $('.html-tags').bind('click',function(){
      //           var tagsName = $(this).attr('data-name');
      //           var tagsId = $(this).attr('id');
      //           var tagsValue = $(this).attr('data-value');
      //           $("a[data-name='"+tagsName+"']").removeClass("checked");
      //           $("#"+tagsId).addClass("checked");
      //           $("input[name='"+tagsName+"']").val(tagsValue);
      //       })
      //       //img
      //       $("img").error(function(){
      //           $(this).attr('src','/assets/images/common/notfind.jpg');
      //       });
      //       //report
      //       $('.report').unbind('click').bind('click',function(){                
      //           $('#reportCover').remove();$('.report-win').remove();
      //           var dataId = $(this).attr('data-id');
      //           var dataType = $(this).attr('data-type');
      //           var zindex = 1;
      //           var coverObj = cover.init({'id':'reportCover','z-index':zindex});
      //           coverObj.show();
      //           $.post("/util/common/report",{'dataId':dataId,'dataType':dataType},function(dt){
      //               $(dt).center({'z-index':(zindex+1),'y':-50,'height':200,'width':400}).appendTo('body');
      //           })
      //           $.common.onmousewheel(false);
      //           return false;
      //       })
    	},
        isdate:function(val,format){//验证日期
            var format = format ? format : '-';
            var arr = val.split(format);
            var flag = false;
            if(arr[0] && this.isnumber(arr[0],2020,2013)){
                if(arr[1] && this.isnumber(arr[1],12,1)){
                    if(arr[2] && this.isnumber(arr[2],31,1)){
                        flag = true;
                    }    
                }
            }
            return flag;
        },
        alert:function(obj){//弹出框
            alert(obj.message);
        	return false;
        },
    	submit:function(form,url,para,action){//提交表单
        	var para = para ? para : {};
        	var act = action ? action : "";
        	var $fm = form instanceof Object ? form : $("#"+form);
        	$.post(url,$fm.serialize()+para,function(dt){	
        	  if(dt){$.gy.alert(dt);}  
        	  if(act){
        	   	  if(isNaN(act)){act();}else{setTimeout(function(){location.reload();},act);}
        	  }
        	  return false;
 	        })
 	        return false;
        },
        post:function(url,para,action){//post 请求
        	var para = para ? para : {};
        	var act = action ? action : "";
          	$.post(url,para,function(dt){
        	  if(dt){$.gy.alert(dt);}  
        	  if(act){
        	   	  if(isNaN(act)){act();}else{setTimeout(function(){location.reload();},act);}
        	  }
        	  return false;
 	        })
 	        return false;
        },
        isnull:function(val,def){//验证是否为空
        	return (!$.trim(val) || val == def);
        },
        isurl:function(val){//验证合法连接
        	var reg = /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"])*$/;
        	return reg.test(val);
        },
        //lg最大的值，st最小的值
        isZlength:function(val,lg,st){//验证长度
            var val = val ? val : "";
            var lh = val.replace(/([^\x00-\xff])/ig,'0').length;   
            if(st && lh < st){return false;}
            if(lg && lh > lg){return false;}
            return true;  
        },
        //lg最大的值，st最小的值
        islength:function(val,lg,st){//验证长度
            var val = val ? val : "";
        	var lh = val.replace(/([^\x00-\xff])/ig,'00').length;   
        	if(st && lh < st){return false;}
        	if(lg && lh > lg){return false;}
	        return true;  
		},
		ischw:function(val){//验证中文数字字母下滑线
			var reg = /^[\u4E00-\u9FA5\uf900-\ufa2d\w]+$/g;
			return reg.test(val);
		},
		isw:function(val,max,min){//验证数字字母下滑线
			var reg = /^[\w\(\)\?\\\/\<\>\+-=\@\#\~\!\$\%\^\&\*\,\;\"\'\[\]]+$/g;
			var len = val.length;
			if(reg.test(val)){
        	  if(min && len < min){return false;}
        	  if(max && len > max){return false;}
        	  return true;
        	}else{
               return false;		
        	}
		},
		isnumber:function(val,max,min){//验证数字
			var reg = /^[-]?\d+$/;
        	if(reg.test(val)){
        	  if(min && val < min){return false;}
        	  if(max && val > max){return false;}
        	  return true;
        	}else{
               return false;		
        	}
		},
        isint:function(val){//正整数
            return /^\d+$/.test(val);
        },
        ischar:function(val){//验证26个字母字符
            return /^[A-Za-z]+$/.test(val);
        },
        isspecial:function(val){//验证字符串
            return /^[\(\)\?\\\/\<\>\+-=\@\#\~\!\$\%\^\&\*\,\;\"\'\[\]]+$/.test(val);
        },
		isext:function(val,arr){//验证后缀名是否在数组中
			var ext = val.substring(val.lastIndexOf('.')).toLowerCase();
			if(jQuery.inArray(ext,arr)<0){
				return false;
			}
			return true;
		},
		ismobile:function(val){//验证手机
			return /^1[3|4|5|8][0-9]\d{8}$/.test(val);
		},
        istel:function(val){//验证座机
            var nas = val.split('-');
            for(var key in nas){
                if(!/^[0-9]*$/.test(nas[key])){
                    return false;
                }
            }
            return true;
        },
		isemail:function(val){//验证邮箱
			return /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(val);
		},
        history:function(){
            window.history.back();
        },
		location:function(url){//重定向
			window.location.href = url;
			return false;
		},
		refresh:function(s){//重载
			var s = s ? s*1000 : 0;
			setTimeout(function(){window.location.reload()}, s);
			return false;
		},
        substr:function(str,len,start){//截取字符串(包括中文）
            if(!str){return '';}
            var strlen = 0; 
            var s = "";
            var start = start || 0;
            for(var i = 0;i < str.length;i++)
            {
                if(str.charCodeAt(i) > 128){
                    strlen += 2;
                }else{ 
                    strlen++;
                }
                s += str.charAt(i);
                if(strlen >= len){ 
                    return s ;
                }
            }
            return s;
        },
        popWin:function(url,name,options){//弹出窗口，options是个对象
            options = options instanceof Object ? options : {};
            var height = options.height || window.screen.height-110;
            var width = options.width || window.screen.width/2;
            var top = options.top || 0;
            var left = options.left || width/2;
            window.open(url,name,'height='+height+',width='+width+',top='+top+',left='+left)
        },
        onmousewheel:function(v){//滚轮禁用=false和启用true
            var fg = v == true ? true : false;
            document.onmousewheel = function(){return fg;}
            if(fg){
                $(document).off('scroll');
            }else{
                var st = $(document).scrollTop();  
                $(document).on('scroll',function(){
                    $(this).scrollTop(st);
                    return false;  
                })
            }
        },
        windowEvent:function(obj,fun,e){//document全局事件，obj对象，fun方法，e事件
            var e = e ? e : 'click'; 
            obj.on(e,function(){return false;})
            $(document).on(e,function(event) {
                if (!$(event.target).closest(obj).length) {
                    fun();
                }
            });
        },        
        downTime:function(dt,key){//倒计时,dt数据[1,12,44,10]，key索引
            var rule = [0,23,59,59];
            if(key<0){
                for(i in dt){dt[i] = 0;}
                return dt;
            }else{
                if(dt[key]-1>=0){
                    dt[key] = dt[key]-1;
                    return dt;
                }else{
                    dt[key] = rule[key];
                    this.downTime(dt,key-1);
                }
            }
            return dt;  
        },
        detailLayout:function($cObj,$mObj){//详细页详情           
            setTimeout(function(){ 
                var ch = $cObj.height(); 
                var mh = $mObj.height(); 
                ch > mh ? $mObj.height(ch) : $cObj.height(mh);
            }, 50);   
        }
    }    
})(jQuery)  

//cover 组件
var cover = {
    init : function(options){//初始化
        var options = options instanceof Object ? options : {};//扩展用，暂时无用
        var cw = $(document).width();
        var ch = $(document).height();
        var czi = options['z-index'] || 100*100; 
        var op = options['opacity'] || 5;
        this.cover = $('<div>');
        var id = options['id'] ? options['id'] : "cover";
        this.cover.attr({'id':id});
        this.cover.css({'width':cw,'height':ch,'background':"#000000",'position':"absolute",'left':0,'top':0,'z-index':czi,'filter':"alpha(opacity="+(op*10)+")",'opacity':(op/10)});            
        return this;
    },
    show : function(){//显示
        $('body').append(this.cover);
        return false;
    },
    remove: function(){//移除
        this.cover.remove();
        return false;
    }
}

//全选
var checkAll = {
    init: function(obj){//初始化
        var allBtn = obj['allBtn'];
        var oneName = obj['oneName'];
        $('#'+allBtn).off('click').on('click',function(){
            $("input[name='"+oneName+"[]']").prop("checked",$(this).prop('checked'));
        })  
        $("input[name='"+oneName+"[]']").off('click').on('click',function(){
            $('#'+allBtn).prop("checked",false);
        })  
    }   
} 

    
//loading组件
var loading = {
    init: function(obj){//初始化
        var obj = obj instanceof Object ? obj : {};//扩展用，暂时无用
        this.cover = cover.init(obj);        
        var czi = obj['z-index'] ? obj['z-index'] : 100*100;    
        var ow = 31;
        var oh = 31;
        var ww = $(window).width();  
        var wh = $(window).height(); 
        var dt = $(document).scrollTop();  
        var dl = $(document).scrollLeft();  
        var w = (ww-ow)/2+dl;
        var h = (wh-oh)/2+dt-50;
        this.img = $("<img>");
        this.img.attr({'src':'/assets/images/common/loading.gif','id':obj['id']+'_img'});
        this.img.css({'position':"absolute",'left':w,'top':h,'zIndex':czi+1});
        return this;            
    },
    show:function(){//显示
        this.cover.show();
        $('body').append(this.img);
        return false;
    },
    remove:function(){//移除
        this.cover.remove();
        this.img.remove();
        return false;
    }
}
