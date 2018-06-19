<?php
namespace app\index\controller;
use tb\Tb;
use \think\Controller;
// use \think\request;

class Index extends Controller
{
    public function index()
    {
    	$tb = new Tb();
        $search = input("search");
        $pos = input("pos");

        $no = input("no",1);
        $size = input("size",6);

    	$res = $tb->products($search,"16,18","杭州",$no,$size);
        $res = $res['results']['n_tbk_item'];
        dump($res);exit;
        // dump(json_encode($res));exit;
        $this->assign("data",$res);
        return view("index");
    }

    public function yhq()
    {
        $tb = new Tb();
        // $search = input("search");
        $res = $tb->shopList("衣服");
        dump($res);exit;
        $this->assign("data",$res);
        return view("index");
    }

    /**
     * 搜素
     * @return [type] [description]
     */
    public function coupon()
    {
        $tb = new Tb();
        // $search = input("search");
        $res = $tb->couponGet("衣服");
        dump($res);exit;
        $this->assign("data",$res);
        return view("index");
    }

    /**
     * 口令
     * @return [type] [description]
     */
    public function kouling()
    {
        $url = input("url");

        $tb = new Tb();
        $res = $tb->getKou($url);
        dump($res);exit;
        $res = $res['results']['n_tbk_item'];
        $this->assign("data",$res);
        return view("index");
    	return view("cate");
    
    }


    public function likeItem()
    {
        $tb = new Tb();
        return $tb->favorites_item();
    }

    public function getProductDetail()
    {
        $tb = new Tb();
        return $tb->product_detail();
    }

    public function appip()
    {
        $tb = new Tb();
        $req = new AppipGetRequest;
        $resp = $c->execute($req);
    }
}
