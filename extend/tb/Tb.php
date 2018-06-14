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
	function products($fz,$cate_id,$city_id)
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
		$req->setPlatform("2");
		// $req->setPageNo("123");
		// $req->setPageSize("20");
		$resp = $this->tc->execute($req);
		$res = json_encode($resp);
		return json_decode($res,true);
	}

	/**
	 * kouling
	 * @return [type] [description]
	 */
	public function getKou(){
	
		$req = new \TbkTpwdCreateRequest();
		// $req->setUserId("123");
		$req->setText("超值活动，惊喜活动多多");
		$req->setUrl("https://uland.taobao.com/");
		// $req->setLogo("https://uland.taobao.com/");
		$req->setExt("{}");
		$resp = $this->tc->execute($req);
		$res = json_encode($resp);
		return json_decode($res,true);
	}
}

?>