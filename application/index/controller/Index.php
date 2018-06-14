<?php
namespace app\index\controller;
use tb\Tb;
class Index
{
    public function index()
    {
    	$tb = new Tb();
    	$res = $tb->dis();

    	// return view("index");
    	// $arr = [
    	// 	''
    	// ]
    }

    public function cate()
    {
    	return view("cate");
    }
}
