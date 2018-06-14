<?php 
namespace tb;
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set("Asia/Shanghai");

include("/top/TopClient.php");
// include("./top/request/TbkItemInfoGetRequest.php");
// include("./top/request/TbkJuTqgGetRequest.php");
// include("./top/request/TbkUatmFavoritesGetRequest.php");
// include("./top/request/RequestCheckUtil.php");
// include("./top/request/AlibabaDataCouponGetRequest./php");
// include("./top/request/TbkCouponGetRequest.php");
include("/top/request/TbkItemGetRequest.php");
// include("./top/request/TbkItemRecommendGetRequest.php");
// include("./top/request/AlibabaWholesaleCategoryGetRequest.php");
// include("./top/request/TbkUatmFavoritesItemGetRequest.php");
// include("./top/RequestCheckUtil.php");
// include("./top/TopLogger.php");

include("/conf/config.php");

/**
 * 
 */
class Tb 
{
	/**
	 * 显示
	 * @return [type] [description]
	 */
	function dis()
	{
		// dump(APP_KEY);

		$c = new top\TopClient;
		dump(APP_KEY);
		dump(SECRETKEY);exit;
		
		$c->appkey = APP_KEY;
		$c->secretKey = SECRETKEY;
		$req = new top\request\TbkItemGetRequest;
	
		$req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick");
		$req->setQ("xx");
		$req->setCat("16,18");
		$req->setItemloc("beijing");
		// $req->setSort("tk_rate_des");
		// $req->setIsTmall("true");
		// $req->setIsOverseas("false");
		// $req->setStartPrice("1");
		// $req->setEndPrice("30");
		// $req->setStartTkRate("123");
		// $req->setEndTkRate("123");
		// $req->setPlatform("1");
		// $req->setPageNo("1");
		// $req->setPageSize("20");
		$resp = $c->execute($req);

		// https://item.taobao.com/item.htm?id=559643833415&ali_trackid=2:mm_26826841_10856508_54376929:1518426024_367_1390232722&pvid=10_110.90.104.119_6021_1518425941168
		// $req = new TbkUatmFavoritesItemGetRequest;
		// $req->setPlatform("1");
		// $req->setPageSize("20");
		// $req->setAdzoneId("54376929");
		// $req->setUnid("101");
		// $req->setFavoritesId("10010");
		// $req->setPageNo("2");
		// $req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick,shop_title,zk_final_price_wap,event_start_time,event_end_time,tk_rate,status,type");
		// $resp = $c->execute($req);


		// $req = new TbkItemGetRequest;
		// $req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick");
		// $req->setQ("xx");
		// $req->setCat("16,18");

		// $req->setItemloc("杭州");
		// $req->setSort("tk_rate_des");
		// $req->setIsTmall("false");
		// $req->setIsOverseas("false");
		// $req->setStartPrice("10");
		// $req->setEndPrice("10");
		// $req->setStartTkRate("123");
		// $req->setEndTkRate("123");
		// $req->setPlatform("1");
		// $req->setPageNo("123");
		// $req->setPageSize("20");
		// $resp = $c->execute($req);
		// $resp = json_encode($resp);
		// $resp = json_decode($resp,true);
		// var_dump($resp);
		// 
		// 

		// https:\/\/s.click.taobao.com/t?e=m%3D2%26s%3DnUzs72c02VccQipKwQzePOeEDrYVVa64LKpWJ%2Bin0XLjf2vlNIV67qXahy7R%2BjWKPLNzIt%2Fz56i2Ra%2F5jC1Qpx%2BgzMNgOqBEXKTfKVkszZVH7CL%2Bieqzurp90tfrrDjFlrfKbc84rlch0opud7L4pPBNCOqFo7SkxiXvDf8DaRs%3D&pvid=10_125.77.84.106_10303_1521796361151

		// $req = new TbkJuTqgGetRequest;
		// $req->setAdzoneId("10");
		// // $req->setAdzoneId("http://club.alimama.com/read.php?spm=0.0.0.0.npQdST&tid=6306396&ds=1&page=1&toread=1");
		// $req->setFields("click_url,pic_url,reserve_price,zk_final_price,total_amount,sold_num,title,category_name,start_time,end_time");
		// $req->setStartTime("2017-08-09 09:00:00");
		// $req->setEndTime("2018-03-09 16:00:00");
		// $req->setPageNo("1");
		// $req->setPageSize("40");
		// $resp = $c->execute($req);
		// 


		// $req = new TbkUatmFavoritesGetRequest;
		// $req->setPageNo("1");
		// $req->setPageSize("20");
		// $req->setFields("favorites_title,favorites_id,type");
		// $req->setType("1");
		// $resp = $c->execute($req);

		$resp = json_decode(json_encode($resp),true);
		return $resp;
		// $arr = json_encode($resp);
		// var_dump(json_decode($arr,true));

	}
}

?>