<?php
namespace app\index\controller;
use tb\Tb;
use \think\Controller;

class Index extends Controller
{
    public function hello()
    {
    }

    public function search()
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
    }  

    public function demo()
    {
        $tb = new Tb();
        // $text = "【孜滋味进口混合水果燕麦片即食代早餐冲饮干吃烘焙营养食品燕麦片】";
        $res = $tb->products($text);
        $res = _arr_json($res);
        
    }

    /**
     * [createId description]
     * @return [type] [description]
     */
    public function createId()
    {
        $res = input::get("arr");
    }

    public function index()
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
        $res = _arr_json($res);
        $res = json_decode($res,true);
        dd($res);
        $this->assign("data",$res['status']['result_list']['map_data']);
        return view("index");
    }

    public function tqg()
    {
        $tb = new Tb();
        $res = $tb->tqgapi();
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
        $url = "http://m.tb.cn/h.3YRMviT";
        $tb = new Tb();
        $res = $tb->getKou($url);
        dd($res);
    }

    /**
     * 生成
     * @return [type] [description]
     */
    public function createKl()
    {
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
            'search' => input("search",$text),
            'cate' => "16,18",
            'has_coupon' => "false",
            // 'has_coupon' => "true",
            'ip' => "127.0.0.1",
        ];
        $tb = new Tb();
        $res = $tb->dgMaterialGet($arr);
        dd($res);
        $res = _arr_json($res);
        $res = json_decode($res,true);
        $this->assign("data",$res['status']['result_list']['map_data']);
        return view("index");
    }

    public function getUrl()
    {
        $url = "http://m.tb.cn/h.3YRMviT";
        $tb = new Tb();
        $res = $tb->speradGet($url);
        dd($res);
        
    }

    // 查询优惠
    public function jx()
    {
        $tb = new Tb();
        $content = input("content","€o5XZ0AdLuu5€");
        // if(empty($content)){
        //     return "未知数据";
        // }
        $res = $tb->getResKou($content);
        dump($res);
        $price = $res->price;

        if(empty($res)){
            return "tb为解析到数据";
        }

        $arr = [
            'search' => input("search",$res->content),
            'has_coupon' => "true",
        ];

        $res = $tb->dgMaterialGet($arr);
        dd($res);
        $res = $res->result_list->map_data;
        $res_new2 = json_decode(json_encode($res),true);
        $res_new = array_column($res_new2, "volume");
        $key = array_search(max($res_new),$res_new); 
        $arr_rew =  $res[$key];
        dd($arr_rew);

        // $kl = $tb->getKou($arr_rew->coupon_share_url,$arr_rew->title);
        $kl = $tb->getKou($res->url,$res->content);
        if(isset($kl['code'])){
            dd($kl['sub_msg']);
        }
        dd($kl);
    }
}
