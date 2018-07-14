<?php
namespace app\index\controller;
use tb\Tb;
use \think\Controller;
use think\Model;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $result = db("tb_info")->select();
        $this->assign("result",$result[0]);
        return view("app/index");
        // return view("app/index");
    }

    public function nine()
    {
        return view("app/9");
    }

    public function qg()
    {
        return view("app/qg");
    }

    public function jingxuan()
    {
        return view("app/jingxuan");
    }

    public function app_search()
    {
        return view("app/search");
    }

    public function app_detail()
    {
        return view("app/detail");
    }

    public function cate_list()
    {
        return view("app/cate_list");
    }

    public function cate()
    {
        return view("app/cate");
    }

    public function getinfo()
    {
        $result = db("tb_info")->select();
        return view("app/index",$result[0]);
        $file = fopen('test1.csv','r'); 
        while ($data = fgetcsv($file)) {
            $goods_list[] = $data;
        }
        unset($goods_list[0]);
        foreach ($goods_list as $value) {
            dump(!empty($value));
            // if(!empty($value)){
            //     $arr = [
            //         'title'                  => $value[1],
            //         'product_id'             => $value[0],
            //         'img_main'               => $value[2],        
            //         'img_detail'             => $value[3],
            //         'pro_cate'               => $value[4],
            //         'tb_link'                => $value[5],
            //         'pro_price'              => $value[6],
            //         'pro_sales'              => $value[7],
            //         'income_rate'            => $value[8],
            //         'commission'             => $value[9],
            //         'ww_id'                  => $value[10],
            //         'ww_name'                => $value[11],
            //         'shop_name'              => $value[12],
            //         'shop_type'              => $value[13],
            //         'coupon_id'              => $value[14],
            //         'coupon_num'             => $value[15],
            //         'coupon_surplus'         => $value[16],
            //         'coupon_price'           => $value[17],
            //         'coupon_start'           => $value[18],
            //         'coupon_end'             => $value[19],
            //         'coupon_link'            => $value[20],
            //         'coupon_tg_link'         => $value[21]
            //     ];
            //     db("tb_info")->insert($arr);
            // }
        }
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
        // $text = "【孜滋麦片】";
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

    public function index2()
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
        $res = $tb->getCate();
        dd($res);

        $content = input("content","述€TgGr0AvTxY9€后");
        
        // if(empty($content)){
        //     return "未知数据";
        // }
        $res = $tb->getResKou($content);
        // $res = $tb->shopList($res->content);
        dump($res);
        $price = $res->price;

        if(empty($res)){
            return "tb为解析到数据";
        }

        // $a = Index::post("search");
        // dd($a);
        $arr = [
            'search' => input("search",$res->content),
            // 'search' => input("search",""),
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
