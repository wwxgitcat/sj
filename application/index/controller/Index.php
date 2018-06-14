<?php
namespace app\index\controller;
use tb\Tb;
use \think\Controller;

class Index extends Controller
{
    public function index()
    {
    	$tb = new Tb();
    	$res = $tb->products("服装","16,18","杭州");
        $res = $res['results']['n_tbk_item'];
        $this->assign("data",$res);
        return view("index");
    }

    /**
     * 口令
     * @return [type] [description]
     */
    public function kouling()
    {
        $tb = new Tb();
        $res = $tb->getKou();
        dump($res);exit;
        $res = $res['results']['n_tbk_item'];
        $this->assign("data",$res);
        return view("index");
    	return view("cate");
    }
}
