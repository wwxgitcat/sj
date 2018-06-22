<?php
namespace app\index\controller;
use tb\Tb;
use \think\Controller;
// use \think\request;

class Index extends Controller
{
    public function index()
    {
    	// $tb = new Tb();
     //    $search = input("search");
     //    $pos = input("pos");

     //    $no = input("no",1);
     //    $size = input("size",6);

    	// $res = $tb->products($search,"16,18","杭州",$no,$size);
     //    $res = $res['results']['n_tbk_item'];
     //    dump($res);exit;
     //    $this->assign("data",$res);
     //    
        return view("index");
        $arr = [
            'size' => input("size",1),
            'no' => input("no",10),
            'search' => input("search",""),
            'cate' => "16,18",
            'has_coupon' => "true",
            'ip' => "127.0.0.1",
        ];
        $tb = new Tb();
        $res = $tb->dgMaterialGet($arr);
        $res = _arr_json($res);
        $res = json_decode($res,true);
        $this->assign("data",$res['status']['result_list']['map_data']);
        return view("index");
    }

    public function tqg()
    {
        $tb = new Tb();
        $res = $tb->tqg();
        dd($res);
    }

    public function detail()
    {
        $arr = [
            'size' => input("size",1),
            'no' => input("no",10),
            'search' => input("search",""),
            'cate' => "16,18",
            'has_coupon' => "true",
            'ip' => "127.0.0.1",
        ];
        $tb = new Tb();
        $res = $tb->dgMaterialGet($arr);
        $res = $res->result_list->map_data;
        echo _arr_json(200,"请求成功",$res);
    }

    public function product()
    {
        return view("product");
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
    }

    /**
     * 生成
     * @return [type] [description]
     */
    public function createKl()
    {
        $url = input("url");
        $tb = new Tb();
        $arr['url'] = $url;
        $res = $tb->createKou($arr);
        return $res;
    }

    /**
     * dg搜索
     * @return [type] [description]
     */
    public function dgSearch()
    {
        $arr = [
            'size' => input("size",1),
            'no' => input("no",10),
            'search' => input("search","小米"),
            'cate' => "16,18",
            'has_coupon' => "true",
            'ip' => "127.0.0.1",
        ];
        $tb = new Tb();
        $res = $tb->dgMaterialGet($arr);
        dd($res);
        $res = _arr_json($res);
        $res = json_decode($res,true);
        $this->assign("data",$res['status']['result_list']['map_data']);
        return view("index");

        // return _arr_json($req);
        // return $req;
    }
}
