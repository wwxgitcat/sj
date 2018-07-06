<?php 
use think\Route;
// Route::any("index","index/index/index");
return [
	'' => "index/index/index",

	// // 'index' => "index/index/index"
	'[index]'     => [
	    'index:id'   => ['index/index/index', ['method' => 'get'], ['id' => '\d+']],
	    '/' => ['index/index/index', ['method' => 'post']],
	    'demo' => ['index/index/hello', ['method' => 'get']],
	],
];

 ?>