<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
// Route::alias('home','index/index/index');
// Route::alias('admin','admin/index');

// return [
//     'dmeo'   => 'index/index/hello',
//     'blog/:id'   => ['Blog/update',['method' => 'post|put'], ['id' => '\d+']],
// ];

Route::get('/',function(){
    return 'Hello,world!';
});


Route::get('demo2','index/index/index');