<?php 
namespace tb;
// include("/top/TopClient.php");
// include("./top/request/TbkItemInfoGetRequest.php");
// include("./top/request/TbkJuTqgGetRequest.php");
// include("./top/request/TbkUatmFavoritesGetRequest.php");
// include("./top/request/RequestCheckUtil.php");
// include("./top/request/AlibabaDataCouponGetRequest./php");
// include("./top/request/TbkCouponGetRequest.php");
// include("/top/request/TbkItemGetRequest.php");
// include("./top/request/TbkItemRecommendGetRequest.php");
// include("./top/request/AlibabaWholesaleCategoryGetRequest.php");
// include("./top/request/TbkUatmFavoritesItemGetRequest.php");
// include("./top/RequestCheckUtil.php");
// include("./top/TopLogger.php");

// include("/conf/config.php");
include "TopSdk.php";
include __DIR__."/top/TopClient.php";
include __DIR__."/top/request/TbkItemGetRequest.php";
include __DIR__."/top/request/TbkTpwdCreateRequest.php";
include __DIR__."/top/request/WirelessShareTpwdCreateRequest.php";
include __DIR__."/top/domain/GenPwdIsvParamDto.php";
include __DIR__."/top/request/TbkUatmFavoritesItemGetRequest.php";

class Tb 
{
	private $appkey;
	private $secretKey;
	private $tc;

	public function __construct(){
		$this->tc = new \TopClient();
		$this->tc->appkey = "23456114";
		$this->tc->secretKey = "930a58600e04bda37ec2e19d49a82923";
	}

	/**
	 * 显示商品
	 * @return [type] [description]
	 */
	function products($fz,$cate_id,$city_id,$no,$size)
	{
		$req = new \TbkItemGetRequest();
		$req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick");
		$req->setQ($fz);
		$req->setCat($cate_id);
		$req->setItemloc($city_id);

		// $req->setSort("tk_rate_des");
		// $req->setIsTmall("false");
		// $req->setIsOverseas("false");
		// $req->setStartPrice("10");
		// $req->setEndPrice("10");
		// $req->setStartTkRate("123");
		// $req->setEndTkRate("123");

		$req->setPlatform(1);  //链接形式：1：PC，2：无线，默认：１
		$req->setPageNo($no);
		$req->setPageSize($size);
		$resp = $this->tc->execute($req);
		$res = json_encode($resp);
		return json_decode($res,true);
	}

	/**
	 * kouling
	 * @return [type] [description]
	 */
	public function getKou($url){
		$req = new \WirelessShareTpwdCreateRequest();
		$tpwd_param = new \GenPwdIsvParamDto();
		// $tpwd_param->ext="{\"xx\":\"xx\"}";
		// $tpwd_param->logo="http://m.taobao.com/xxx.jpg";
		$tpwd_param->url=$url;
		// $tpwd_param->url="http://m.taobao.com";
		$tpwd_param->text="test1";
		// $tpwd_param->user_id="24234234234";
		$req->setTpwdParam(json_encode($tpwd_param));
		$resp = $this->tc->execute($req);
		$res = json_encode($resp);
		$res =  json_decode($res,true);

		$res =   $this->getResKou($res['model']);

		$res = json_encode($res);
		$res =  json_decode($res,true);
		return $this->createKou($res);
	}


	public function getResKou($res='')
	{
		$req = new \WirelessShareTpwdQueryRequest();
		// $content = "【taobao号】，复制这条信息".$res."后打开手机tb";
		$content = "【taobao号】，copy info".$res;
		$req->setPasswordContent($content);
		$resp = $this->tc->execute($req);
		dump($resp);
		return $resp;
	}

	// 淘宝客淘口令
	public function createKou($arr='')
	{
		// dump($arr['native_url']);
		// dump($arr['url']);exit;
		$req = new \TbkTpwdCreateRequest();
		$req->setUserId("123");
		$req->setText("长度大于5个字符");
		// $req->setUrl("https://uland.taobao.com/");
		$req->setUrl($arr['url']);
		// $req->setLogo("https://uland.taobao.com/");
		$req->setExt("{}");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	// public function tgq()
	// {
	// 	$req = new \TbkCouponGetRequest();
	// 	$req->setMe("nfr%2BYTo2k1PX18gaNN%2BIPkIG2PadNYbBnwEsv6mRavWieOoOE3L9OdmbDSSyHbGxBAXjHpLKvZbL1320ML%2BCF5FRtW7N7yJ056Lgym4X01A%3D");
	// 	$req->setItemId("123");
	// 	$req->setActivityId("sdfwe3eefsdf");
	// 	$resp = $c->execute($req);
	// }
	
	// 关联查询
	public function recommend()
	{
		$req = new \TbkItemRecommendGetRequest();
		$req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url");
		$req->setNumIid("123");  //pro_id
		$req->setCount("20");
		$req->setPlatform("1");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	// 商品详情
	public function simpleInfo()
	{
		$req = new \TbkItemInfoGetRequest();
		$req->setNumIids("123,456"); //pro_id ID串，用,分割，最大40个
		$req->setPlatform("1");
		$req->setIp("11.22.33.43");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	// 商铺查询
	public function shopList($q)
	{
		$req = new \TbkShopGetRequest();
		$req->setFields("user_id,shop_title,shop_type,seller_nick,pict_url,shop_url","coupon_end_time","coupon_info");
		$req->setQ($q);  //查询词
		$req->setSort("commission_rate_des");
		$req->setIsTmall("false");
		$req->setStartCredit("1");
		$req->setEndCredit("20");
		$req->setStartCommissionRate("2000");
		$req->setEndCommissionRate("123");
		$req->setStartTotalAction("1");
		$req->setEndTotalAction("100");
		$req->setStartAuctionCount("123");
		$req->setEndAuctionCount("200");
		$req->setPlatform("1");
		$req->setPageNo("1");
		$req->setPageSize("20");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	/**
	 * 关联商铺
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function getReleateShop($value='')
	{
		$req = new \TbkShopRecommendGetRequest();
		$req->setFields("user_id,shop_title,shop_type,seller_nick,pict_url,shop_url");
		$req->setUserId("123");  //卖家Id
		$req->setCount("20");
		$req->setPlatform("1");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	// 淘宝联盟 招商活动
	public function zsActive($value='')
	{
		$req = new \TbkUatmEventGetRequest();
		$req->setPageNo("1");
		$req->setPageSize("20");
		$req->setFields("event_id,event_title,start_time,end_time");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	/**
	 * 淘宝联盟 定向招商活动
	 * @return [type] [description]
	 */
	public function zsActiveInfo()
	{
		$req = new \TbkUatmEventItemGetRequest();
		$req->setPlatform("1");
		$req->setPageSize("20");
		//推广位id，需要在淘宝联盟后台创建；且属于appkey对应的备案媒体id（siteid），如何获取adzoneid，请参考：http://club.alimama.com/read-htm-tid-6333967.html?spm=0.0.0.0.msZnx5
		$req->setAdzoneId("34567");
		$req->setUnid("3456");
		$req->setEventId("123456"); //招商活动id
		$req->setPageNo("1");
		$req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick,shop_title,zk_final_price_wap,event_start_time,event_end_time,tk_rate,type,status");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	/**
	 * 获取淘宝联盟选品库的宝贝信息
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function chooseInfo($value='')
	{
		$req = new \TbkUatmFavoritesItemGetRequest();
		$req->setPlatform("1");
		$req->setPageSize("20");
		$req->setAdzoneId("34567"); //推广位id，需要在淘宝联盟后台创建；且属于appkey备案的媒体id（siteid），如何获取adzoneid，请参考，http://club.alimama.com/read-htm-tid-6333967.html?spm=0.0.0.0.msZnx5
		$req->setUnid("3456");
		$req->setFavoritesId("10010");
		$req->setPageNo("2");
		$req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick,shop_title,zk_final_price_wap,event_start_time,event_end_time,tk_rate,status,type");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	// 淘抢购
	public function tqg()
	{
		$req = new \TbkJuTqgGetRequest();
		// 推广位id（推广位申请方式：http://club.alimama.com/read.php?spm=0.0.0.0.npQdST&tid=6306396&ds=1&page=1&toread=1）
		$req->setAdzoneId("123");
		$req->setFields("click_url,pic_url,reserve_price,zk_final_price,total_amount,sold_num,title,category_name,start_time,end_time");
		$req->setStartTime("2016-08-09 09:00:00");  //最早开团时间
		$req->setEndTime("2016-08-09 16:00:00");
		$req->setPageNo("1");
		$req->setPageSize("40");
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	/**
	 * 聚划算商品
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function jhsSearch($value='')
	{
		$req = new \JuItemsSearchRequest();
		$param_top_item_query = new \TopItemQuery();
		// $param_top_item_query->current_page="1";
		// $param_top_item_query->page_size="20";
		// $param_top_item_query->pid="-";
		// $param_top_item_query->postage="true";
		// $param_top_item_query->status="2";
		// $param_top_item_query->taobao_category_id="1000";
		// $param_top_item_query->word="test";
		$req->setParamTopItemQuery(json_encode($param_top_item_query));
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	/**
	 * 好券清单API【导购】 
	 * @return [type] [description]
	 */
	public function couponGet($q)
	{
		$req = new \TbkDgItemCouponGetRequest();
		$req->setAdzoneId("123"); //mm_xxx_xxx_xxx的第三位
		// $req->setPlatform("1");
		// $req->setCat("16,18");
		// $req->setPageSize("1");
		$req->setQ($q); //	查询词
		// $req->setPageNo("1"); 
		$resp = $this->tc->execute($req);
		dump($resp);exit;
	}

	public function flowInfo()
	{
		$req = new \TbkContentGetRequest();
		$req->setAdzoneId("123");  //推广位
		$req->setType("1");
		$req->setBeforeTimestamp("1491454244598");
		$req->setCount("10");
		$req->setCid("2");
		$req->setImageWidth("300");
		$req->setImageHeight("300");
		$req->setContentSet("1");
		$resp = $c->execute($req);
	}
}

?>