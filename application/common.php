<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * arr_json
 */
if (! function_exists('_arr_json'))
{
    function _arr_json($status = 200, $msg = '请求成功', $data = [])
    {
       if (sizeof($data)) {
            $arr = [
                'status' => $status,
                'msg' => $msg,
                'data' => $data
            ];
       } else {
            $arr = [
                'status' => $status,
                'msg' => $msg,
            ];
       }
       return json_encode($arr, JSON_UNESCAPED_UNICODE); 
    }
}

/**
 * dd
 */
if (! function_exists('dd'))
{
    function dd($info)
    {
       echo "<pre>";
       print_r($info);
       echo "</pre>";
       exit;
    }
}
