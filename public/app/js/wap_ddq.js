/**
 * static.cms - v1.0.0  License By 
 * WEB小组 
 */
function text_sj(t){t.each(function(s){"【"==t.eq(s).text().split("")[0]&&t.eq(s).css("text-indent","-0.5em")})}$(".img-block").height($(".img-block .img").width()),$(window).resize(function(){$(".img-block").height($(".img-block .img").width())}),$(".swiper-slide").click(function(){var t=$(this);$(window).width()<321?$(window).scrollTop()>=100&&$(window).scrollTop("100"):320<$(window).width()&&$(window).width()<376?$(window).scrollTop()>=110&&$(window).scrollTop("110"):$(window).scrollTop()>=130&&$(window).scrollTop("130"),$(".my-goods-list").hide();var s=$(this).attr("data-type"),e=$(this).attr("data-types");$(this).attr("data-check");if($(".rec-goods.rec .list").children().remove(),$(".rec-goods.bkfc .list").children().remove(),$(".goods-block").children(".goods-list").remove(),data[s].commend_arr.length<3)$(".rec-goods.rec").hide();else{$(".rec-goods.rec").show();for(var a=0;a<data[s].commend_arr.length;a++){var i=$(".rec_list.tp").clone().removeClass("tp").addClass("bt");$(".rec-goods.rec .list").append(i)}}if($(".rec_list.bt").each(function(t){$(".rec_list.bt .img-block img").eq(t).attr("src",data[s].commend_arr[t].pic+size),$(".rec_list.bt .img-block span").eq(t).text(data[s].commend_arr[t].new_words),$(".rec_list.bt .tit").eq(t).text(data[s].commend_arr[t].d_title),$(".rec_list.bt .pri").eq(t).text(parseFloat(data[s].commend_arr[t].jiage)),$(".rec_list.bt").eq(t).find("a").attr("href",route+data[s].commend_arr[t].id),text_sj($(".rec_list.bt .tit"))}),data[s].host_arr.length<3)$(".rec-goods.bkfc").hide();else{$(".rec-goods.bkfc").show();for(var a=0;a<data[s].host_arr.length;a++){var o=$(".hb_list.tp").clone().removeClass("tp").addClass("bt");$(".rec-goods.bkfc .list").append(o)}}$(".hb_list.bt").each(function(t){$(".hb_list.bt .img-block .img").eq(t).attr("src",data[s].host_arr[t].pic+size),$(".hb_list.bt .img-block span b").eq(t).html("上场疯抢"+data[s].host_arr[t].last_num+"件"),$(".hb_list.bt .tit").eq(t).text(data[s].host_arr[t].d_title),$(".hb_list.bt .pri").eq(t).text(parseFloat(data[s].host_arr[t].jiage)),$(".hb_list.bt").eq(t).find("a").attr("href",route+data[s].host_arr[t].id),text_sj($(".hb_list.bt .tit"))}),"0"==data[s].list.length?($(".hasNogoods").find("p").text("(ง •̀_•́)ง 亲！本场好货还在精心挑选中"),$(".nogoods").addClass("ranking_ullit_default_icon")):($(".nogoods").removeClass("ranking_ullit_default_icon"),$(".hasNogoods").find("p").text("都是小编精心挑选的超值好货哦~(｡･∀･)ﾉﾞ"));for(var l=0;l<data[s].list.length;l++){var d=$(".mylist").clone().removeClass("mylist").addClass("bestlist");$(".goods-block").append(d)}$(".bestlist").each(function(a){if($(".bestlist .zsz").eq(a).css("display","none"),$(".bestlist .gl-img").eq(a).find("img").attr("src",data[s].list[a].pic+size),$(".bestlist .glc-title").eq(a).text(data[s].list[a].d_title),null==data[s].list[a].new_words?$(".bestlist .glc-des").eq(a).text():$(".bestlist .glc-des").eq(a).text(data[s].list[a].new_words),"1"==data[s].list[a].host_tag?$(".bestlist").eq(a).find(".goods-list-ico.bcbk").show():"5"==data[s].list[a].tubiao?$(".bestlist").eq(a).find(".goods-list-ico.rec").show():$(".bestlist").eq(a).find(".goods-list-ico").hide(),"1"==t.attr("data-check")){var i=(new Date).getMinutes(),o=(new Date).getHours(),l=parseInt(t.attr("data-hour"));o-l>0||(i>9?"1"==data[csh_num].list[a].host_tag&&$(".bestlist").eq(a).find(".goods-list-ico.bcbk").show():$(".bestlist").eq(a).find(".goods-list-ico.bcbk").hide())}$(".bestlist .hasq").eq(a).find("span").html(data[s].list[a].xiaoliang),$(".bestlist .priceNum").eq(a).text(parseFloat((data[s].list[a].yuanjia-data[s].list[a].quan_jine).toFixed(2))),$(".bestlist .priceNum").eq(a).siblings("span").text("券后价 ￥"),$(".bestlist .qunjine").eq(a).text(parseInt(data[s].list[a].quan_jine)),$(".bestlist").eq(a).attr("href",route+data[s].list[a].id),"0"==e?($(".bestlist .glc-price .qh").css("color","#2AC064").siblings(".priceNum").css("color","#2AC064"),$(".bestlist .glc-des").css("color","#888"),$(".bestlist .goods_coupon").addClass("jks"),$(".bestlist .glc-btn").eq(a).text("即将开始").removeClass("msq"),$(".bestlist .hasq").eq(a).hide()):($(".bestlist .glc-btn").eq(a).text("马上抢").addClass("msq"),$(".bestlist .hasq").eq(a).show()),text_sj($(".bestlist .glc-title")),text_sj($(".bestlist .glc-des"))}),$(".bestlist").eq(3).after($(".rec-goods.bkfc"))}),$(window).scroll(function(){$(window).width()<321?85<$(window).scrollTop()?($(".wap-banner").addClass("myfixed").css("marginTop",0),$(".banner_2").addClass("banner_fixed"),$(".wap-navTime").addClass("navFixed"),$(".goods-block").addClass("goods-list-fixed"),$(".rec-goods.rec").addClass("rec-list-fixed"),$(".zw-block").show()):($(".wap-banner").removeClass("myfixed").css("marginTop","44px"),$(".banner_2").removeClass("banner_fixed"),$(".wap-navTime").removeClass("navFixed"),$(".goods-block").removeClass("goods-list-fixed"),$(".rec-goods.rec").removeClass("rec-list-fixed"),$(".zw-block").hide()):320<$(window).width()&&$(window).width()<376?100<$(window).scrollTop()?($(".wap-banner").addClass("myfixed").css("marginTop",0),$(".wap-navTime").addClass("navFixed"),$(".banner_2").addClass("banner_fixed"),$(".goods-block").addClass("goods-list-fixed"),$(".rec-goods.rec").addClass("rec-list-fixed"),$(".zw-block").show()):($(".wap-banner").removeClass("myfixed").css("marginTop","44px"),$(".wap-navTime").removeClass("navFixed"),$(".banner_2").removeClass("banner_fixed"),$(".goods-block").removeClass("goods-list-fixed"),$(".rec-goods.rec").removeClass("rec-list-fixed"),$(".zw-block").hide()):95<$(window).scrollTop()?($(".wap-banner").addClass("myfixed").css("marginTop",0),$(".banner_2").addClass("banner_fixed"),$(".wap-navTime").addClass("navFixed"),$(".goods-block").addClass("goods-list-fixed"),$(".rec-goods.rec").addClass("rec-list-fixed"),$(".zw-block").show()):($(".wap-banner").removeClass("myfixed").css("marginTop","44px"),$(".banner_2").removeClass("banner_fixed"),$(".wap-navTime").removeClass("navFixed"),$(".goods-block").removeClass("goods-list-fixed"),$(".rec-goods.rec").removeClass("rec-list-fixed"),$(".zw-block").hide())});var csh_num=$("a[data-check='1']").attr("data-type"),csh_type=$("a[data-check='1']").attr("data-types"),csh_cc=parseInt($("a[data-check='1']").attr("data-hour"));if(data[csh_num].commend_arr.length<3)$(".rec-goods.rec").hide();else{$(".rec-goods.rec").show();for(var i=0;i<data[csh_num].commend_arr.length;i++){var rec_list=$(".rec_list.tp").clone().removeClass("tp").addClass("ct");$(".rec-goods.rec .list").append(rec_list)}}if($(".rec_list.ct").each(function(t){$(".rec_list.ct .img-block img").eq(t).attr("src",data[csh_num].commend_arr[t].pic+size),$(".rec_list.ct .img-block span").eq(t).text(data[csh_num].commend_arr[t].new_words),$(".rec_list.ct .tit").eq(t).text(data[csh_num].commend_arr[t].d_title),$(".rec_list.ct .pri").eq(t).text(parseFloat(data[csh_num].commend_arr[t].jiage)),$(".rec_list.ct").eq(t).find("a").attr("href",route+data[csh_num].commend_arr[t].id),text_sj($(".rec_list.ct .tit"))}),data[csh_num].host_arr.length<3)$(".rec-goods.bkfc").hide();else{$(".rec-goods.bkfc").show();for(var i=0;i<data[csh_num].host_arr.length;i++){var fcb_list=$(".hb_list.tp").clone().removeClass("tp").addClass("ct");$(".rec-goods.bkfc .list").append(fcb_list)}}$(".hb_list.ct").each(function(t){$(".hb_list.ct .img-block .img").eq(t).attr("src",data[csh_num].host_arr[t].pic+size),$(".hb_list.ct .img-block span b").eq(t).html("上场疯抢"+data[csh_num].host_arr[t].last_num+"件"),$(".hb_list.ct .tit").eq(t).text(data[csh_num].host_arr[t].d_title),$(".hb_list.ct .pri").eq(t).text(parseFloat(data[csh_num].host_arr[t].jiage)),$(".hb_list.ct").eq(t).find("a").attr("href",route+data[csh_num].host_arr[t].id),text_sj($(".hb_list.ct .tit"))}),"0"==data[csh_num].list.length?($(".hasNogoods").find("p").text("(ง •̀_•́)ง 亲！本场好货还在精心挑选中"),$(".nogoods").addClass("ranking_ullit_default_icon")):($(".nogoods").removeClass("ranking_ullit_default_icon"),$(".hasNogoods").find("p").text("都是小编精心挑选的超值好货哦~(｡･∀･)ﾉﾞ"));for(var j=0;j<data[csh_num].list.length;j++){var goods_list=$(".mylist").clone().removeClass("mylist").addClass("bestlist1");$(".goods-block").append(goods_list)}$(".bestlist1").each(function(t){$(".bestlist1 .zsz").eq(t).css("display","none"),$(".bestlist1 .gl-img").eq(t).find("img").attr("src",data[csh_num].list[t].pic+size),$(".bestlist1 .glc-title").eq(t).text(data[csh_num].list[t].d_title),null==data[csh_num].list[t].new_words?$(".bestlist1 .glc-des").eq(t).text():$(".bestlist1 .glc-des").eq(t).text(data[csh_num].list[t].new_words),"1"==data[csh_num].list[t].host_tag?$(".bestlist1").eq(t).find(".goods-list-ico.bcbk").show():"5"==data[csh_num].list[t].tubiao?$(".bestlist1").eq(t).find(".goods-list-ico.rec").show():$(".bestlist1").eq(t).find(".goods-list-ico").hide();var s=(new Date).getMinutes(),e=(new Date).getHours();e-csh_cc>0||(s>9?"1"==data[csh_num].list[t].host_tag&&$(".bestlist1").eq(t).find(".goods-list-ico.bcbk").show():$(".bestlist1").eq(t).find(".goods-list-ico.bcbk").hide()),$(".bestlist1 .hasq").eq(t).find("span").html(data[csh_num].list[t].xiaoliang),$(".bestlist1 .priceNum").eq(t).text(parseFloat((data[csh_num].list[t].yuanjia-data[csh_num].list[t].quan_jine).toFixed(2))),$(".bestlist1 .priceNum").eq(t).siblings("span").text("券后价 ￥"),$(".bestlist1 .qunjine").eq(t).text(parseInt(data[csh_num].list[t].quan_jine)),$(".bestlist1").eq(t).attr("href",route+data[csh_num].list[t].id),"0"==csh_type?($(".bestlist1 .glc-price .qh").css("color","#2AC064").siblings(".priceNum").css("color","#2AC064"),$(".bestlist1 .glc-des").css("color","#888"),$(".bestlist1 .goods_coupon").addClass("jks"),$(".bestlist1 .glc-btn").eq(t).text("即将开始").removeClass("msq"),$(".bestlist1 .hasq").eq(t).hide()):($(".bestlist1 .glc-btn").eq(t).text("马上抢").addClass("msq"),$(".bestlist1 .hasq").eq(t).show()),text_sj($(".goods-list.bestlist1 .glc-title")),text_sj($(".goods-list.bestlist1 .glc-des"))}),$(".bestlist1").eq(3).after($(".rec-goods.bkfc"));