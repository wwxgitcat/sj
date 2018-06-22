
$(function(){
  var url =  "/index.php/index/index/detail";
    select_more(url);
})


function  select_more(url) {
  $(".btn-more").click(function(){
        var arr = {"search":"fz","size":1,"no":10};
        var arr_res = a_post(url,arr,"post");
        $.each(arr_res.data,function(i,item){
    　　　 　console.log(i, item);
     　　});
  });
}



/**
 * post
 * @param  {[type]} url [description]
 * @param  {[type]} arr [description]
 * @return {[type]}     [description]
 */
function a_post(url,arr,type) {
    var arr ;
    $.ajax({
       url : url,
       data:arr,
       cache : false,
       async : false,
       type : type,
       dataType : 'json',
       success : function (result){
            arr = result;
       }
   });
  return arr;
}

function dd(argument) {
    console.log(argument);
}
    // <ul class="am-avg-sm-2 my-shop-product-list">
    //     <li>
    //         <div class="am-panel am-panel-default">
    //             <div class="am-panel-bd">
    //                 <img class="am-img-responsive" src="{}" />
    //                 <h3><a href="{}">xxx</a></h3>
    //                 <div>
    //                     <!-- <span class="list-product-price-span">￥]}</span> -->
    //                     <span class="list-product-price-span">折扣价￥]}</span>
    //                     <span class="list-product-commission-span">销量<br/></span>
    //                     <!-- <span class="list-product-sorce-span">省份<br/></span> -->
    //                 </div>
    //                 <hr data-am-widget="divider" style="" class="am-divider am-divider-default am-cf"/>
    //                 <ol class="am-avg-sm-3 product-list-share">
    //                     <li><a href="#"><img src="__default__/icon1.png" class="am-img-responsive" /></a></li>
    //                     <li><a href="#"><img src="__default__/icon2.png" class="am-img-responsive" /></a></li>
    //                     <li><a href="#"><img src="__default__/icon3.png" class="am-img-responsive" /></a></li>
    //                 </ol>
    //             </div>
    //         </div>
    //     </li>
    // </ul>