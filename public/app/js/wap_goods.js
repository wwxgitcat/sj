/**
 * static.cms - v1.0.0  License By 
 * WEB小组 
 */
!function(){var $api={page:1,catSort:"t",cac_id:"",loaditem:[],getUrl:"",getCatItem:function(t){var a=this;return $.ajax({url:this.getUrl,type:"GET",dataType:"json",data:t||{}}).error(function(){$cmsLayer.msg("服务器繁忙请稍后再试！")}).done(function(i){return a.setLoadItem(a.getNumberId(t.cid),i)})},setLoadItem:function(t,a){var i=0;for(var e in this.loaditem)i>15&&this.loaditem.splice(0,1),i++;this.loaditem.push({key:t,item:a});var o=new Date;return localStorage&&localStorage.setItem("WAPGOODSCAT",JSON.stringify({time:o.getTime(),data:this.loaditem})),this.loaditem[t]},getLoadItem:function(id){var ret,loaditem=this.loaditem;if(localStorage){var item=eval("("+localStorage.getItem("WAPGOODSCAT")+")"),time=new Date;loaditem=item?time.getTime()-item.time>59e3?this.loaditem:item.data:this.loaditem,this.loaditem=loaditem}for(var key in loaditem)loaditem[key].key==id&&(ret=loaditem[key].item);return ret},getNumberId:function(t){return this.page+this.catSort+t}},cmsCat=function(t,a){this.el=".goods-list",this.pageStatus=!0,this.cid=t.cid,$api.page=1,$api.cac_id=a,$api.getUrl=t.getUrl,$api.catSort=t.catSort,$(this.el).html(""),this.init()};cmsCat.prototype.init=function(){var t=this,a=".order-nav-bg",i=".order-nav";this.scroll(),$(document).unbind("scroll").scroll(function(){var e=$(a).offset().top;$(document).scrollTop()>=e-47-98?($(".orderNavBg").css("height","47px"),$(i).css({top:"88px",position:"fixed"})):($(".orderNavBg").css("height","0"),$(i).css({top:"0px",position:"relative"})),$(document).scrollTop()>=$(document).height()-$(window).height()-150&&t.scroll()}),$(".order-nav a").unbind("click").on("click",function(){return $api.catSort=$(this).data("sort"),$api.cac_id="",$(this).parents("ul").find("li").removeClass("theme-border-bottom-color-1").removeClass("cur").find("a").removeClass("theme-color-1").find("span").removeClass("ico-down").removeClass("ico-up"),$(this).addClass("theme-color-1").parents("li").addClass("theme-border-bottom-color-1").addClass("cur"),"price"==$api.catSort?($(this).find("span").addClass("ico-up").removeClass("ico-down"),$(this).data("sort","price_h")):"price_h"==$api.catSort&&($(this).find("span").addClass("ico-down").removeClass("ico-up"),$(this).data("sort","price")),$api.page=1,$(t.el).html(""),t.scroll(),!1})},cmsCat.prototype.scroll=function(t){var a=this;if(0==this.pageStatus)return $(a.el).append('<div class="pullup-goods"><div class="label">商品已经加载完毕！</div></div>'),!1;if(this.isAjax)return!1;this.isAjax=!0;var i=$api.getLoadItem($api.getNumberId(this.cid));return i?(this.showItem(i),!1):($(".cat_tab_list_load").show(),void $api.getCatItem({px:$api.catSort,cid:this.cid,page:$api.page,cac_id:$api.cac_id||""}).done(this.showItem.bind(this)).error(function(){$(".cat_tab_list_load").hide()}))},cmsCat.prototype.showItem=function(t){var a=this,i=$("<div>"+t.data.content+"</div>").addClass("lazy"+$api.page);$(a.el).append(i),$(".lazy"+$api.page+" img.lazy").lazyload({effect:"fadeIn"}),a.pageStatus=t.data.pageStatus,$api.cac_id=t.data.cac_id,$api.page=$api.page+1,a.isAjax=!1,$(".cat_tab_list_load").fadeOut(400)},window.cmsCat=cmsCat}();