/**
 * static.cms - v1.0.0  License By 
 * WEB小组 
 */
window.onload=function(){if($(".mui-action-menu").length>1){var t=parseInt($(".main-title").width()-$(".main-title .main-logo").width()-2*parseInt($(".main-title .mui-action-menu").width())-20);$(".main-title .mysrc").css("width",t)}else{var t=parseInt($(".main-title").width()-$(".main-title .main-logo").width()-$(".main-title .mui-action-menu").width()-20);$(".main-title .mysrc").css("width",t)}$(window).resize(function(){if($(".mui-action-menu").length>1){var t=parseInt($(".main-title").width()-$(".main-title .main-logo").width()-2*parseInt($(".main-title .mui-action-menu").width())-20);$(".main-title .mysrc").css("width",t)}else{var t=parseInt($(".main-title").width()-$(".main-title .main-logo").width()-$(".main-title .mui-action-menu").width()-20);$(".main-title .mysrc").css("width",t)}}),$(".mysrc").on("click",function(){$("body").css("overflow-y","hidden"),$(".search-pop").show(),$("body").bind("touchmove",function(t){t.preventDefault()}),$(".search-pop").find(".search_area").focus()});var i="input";navigator.userAgent.indexOf("MSIE")!=-1&&(i="propertychange"),$(".search-pop").find(".search_area").bind(i,function(){const t=$(this).val();var i="";i=t.replace(/\s+/g,""),0==i.length?($(".search .src-close-btn").hide(),$(".search-land").hide()):($(".search .src-close-btn").show(),$(".search-land").show()),$(".search-land").find("li").remove(),$.ajax({url:_url,type:"get",dataType:"json",data:{kw:t},success:function(t){if("1"==t.status){$(".search-land").find("li").remove();for(var i=0;i<t.data.length;i++){var a="<li>"+t.data[i]+"</li>";$(".search-land").append(a)}}}})}),$(".search .src-close-btn").click(function(){$(this).hide(),$(".search-land").hide(),$(".search-pop").find(".search_area").val("")}),$(".search-land").on("click","li",function(){$(".search_area").val($(this).text()),$(".wap-srcBtn.search_submit").trigger("click")});var a=(new Swiper(".myswiper",{direction:"horizontal",loop:!0,autoplay:1500,onlyExternal:!0}),new Swiper(".myswipers",{direction:"horizontal",loop:!0}),$(".zdy-block").find("a").length);if(1==a?$(".zdy-block").css("height",$(".zdy-block").width()/2.4):2==a?$(".zdy-block").css("height",$(".zdy-block").width()/4.8):$(".zdy-block").css("height",$(".zdy-block").width()/7.2),""==$(".bottomNav").children().text()?$(".bottomNav").hide():$(".bottomNav").show(),window.history.state){$(".goods-list").html(window.history.state.list);var n=window.history.state.page}else var n=2;var e=!1,o=!1,c=null,s=!1,d=0,l=0;$(document).ready(function(){function t(i,a,l){if(!e){o=!0,c||(c=i.find(".pullup-goods"));var r=$(c).find(".label");$.ajax(tPaht,{data:{t:"c",page:n,cac_id:my_cac_id},dataType:"json",type:"post",error:function(n,e,o){t(i,a,l)},success:function(t,i,a){s=!1,0==t.status?(t.data.pageStatus===!1&&(o=!1,$(".pullup-goods .label").html("没有更多商品啦"),e=!0),$(".goods-list").append(t.data.content),$("img.lazy").lazyload(),aClick(),d=$(document).height(),o=!1,n++,$(".goods-list").attr("data-page",n)):(d=$(document).height(),o=!1,$(r).html("没有更多商品啦"),e=!0)}})}}$(".goods-item-ads a").on("click",function(){xctj("tid=xc-dtk-cms-"+$(this).data("uid"),"at=crs","ds=wap","in="+$(this).data("in"),"ec=click","gid="+$(this).data("gid"),"ci="+$(this).data("ci"),"cn="+$(this).data("cn"),"position="+$(this).data("position"))}),$("#swiper-container a").on("click",function(){xctj("tid=xc-dtk-cms-"+$(this).data("uid"),"at=crs","ds=wap","in="+$(this).data("in"),"ec=click","gid="+$(this).data("gid"),"ci="+$(this).data("ci"),"cn="+$(this).data("cn"))});var i=new Swiper(".lunbo",{pagination:".swiper-pagination",loop:!0,autoplay:2500});document.getElementById("swiper-container").ontouchend=function(t){i.startAutoplay()},document.getElementById("swiper-container").ontouchstart=function(t){i.stopAutoplay()},d=$(document).height(),l=$(window).height(),$(window).on("resize",function(){l=$(window).height()}),$(document).scroll(function(i){if(!e&&!o){$(".scrollable").scrollTop();if($("img.lazy").lazyload(),$(document).scrollTop()<$(document).height()-$(window).height()-150)return!1;var a=$(".scrollable");c||(c=a.find(".pullup-goods"));var n=null;t(a,n,1)}})}),$("img.lazy").lazyload()};