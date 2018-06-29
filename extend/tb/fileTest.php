<?php
    include "TopSdk.php";
    date_default_timezone_set('Asia/Shanghai'); 

    $c = new TopClient;
    $c->appkey = '23456114';
    $c->secretKey = '930a58600e04bda37ec2e19d49a82923';
    // $req = new TradeVoucherUploadRequest;
    // $req->setFileName("example");
    // $req->setFileData("@/Users/xt/Downloads/1.jpg");
    // $req->setSellerNick("xxx");
    // $req->setBuyerNick("101NufynDYcbjf2cFQDd62j8M/mjtyz6RoxQ2OL1c0e/Bc=");
    // var_dump($c->execute($req));

    $req2 = new TradeVoucherUploadRequest;
    $req2->setFileName("example");

    $myPic = array(
            'type' => 'application/octet-stream',
            'content' => file_get_contents('/Users/xt/Downloads/1.jpg')
            );
    $req2->setFileData($myPic);
    $req2->setSellerNick("xxxx");
    $req2->setBuyerNick("101NufynDYcbjf2cFQDd62j8M/mjtyz6RoxQ2OL1c0e/Bc=");
    var_dump($c->execute($req2));
?>