<?php
include("./Tx.php");
header('Content-type:text');
define("TOKEN", "boboit");
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            header('content-type:text');
            echo $echoStr;
            exit;
        }
    }


    // kouling
    public function createKou($arr='')
    {
       include "TopSdk.php";
       include "./top/request/TbkTpwdCreateRequest.php";
        $c = new TopClient();
        $c->appkey = '23456114';
        $c->secretKey = '930a58600e04bda37ec2e19d49a82923';
        // $req = new TradeVoucherUploadRequest;
        // 
        $req = new TbkTpwdCreateRequest();
        // $req->setUserId("123");
        $req->setText("xxx");
        // $req->setText("xxx");
        // $req->setUrl("https://uland.taobao.com/");
        $req->setUrl($arr['url']);
        // $req->setLogo("https://uland.taobao.com/");
        $req->setExt("{}");
        $resp = $this->tc->execute($req);
        return $resp;
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 检测url
     * @param  [type] $text [description]
     * @return [type]       [description]
     */
    public function getUrl($text)
    {
        $preg = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        preg_match_all($preg, $text,$matches);
        return $matches;
    }
  
    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            file_put_contents("b1.txt", $postStr);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
          
            $msgType = $postObj->MsgType; //查看类型
            $Event = $postObj->Event; //查看订阅

            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";

            switch ($msgType) {
                case 'text':
                    $res = $this->getUrl($keyword);
                    if(empty($res)){
                        $contentStr ="未查询到该信息";
                    }else{
                        $contentStr ="url：".$res;
                    }
                    // if($keyword == "1"){
                    //    $contentStr ="支持查询城市";
                    //     // file_put_contents("b.txt", $tx);
                    // }
                    // if($keyword == "福州"){
                    //   $tx = new Tx();
                    //     $res = $tx->getInfo("福州");
                    //     $day = $res['result']['data']['weather'][0]['info']['day'];
                    //     $contentStr ="福州天气 "
                    //     .$day[1]."\n"
                    //     ."最高温度: ".$day[2]."\n"
                    //     ;
                    // }
                    
                    // else{
                    // }
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                    break;
                case 'event':
                        $msgType = "text";
                        if($Event == "subscribe"){
                            // $contentStr = "Hi,xxx\n"
                            // ."回复数字'1',查看天气\n"
                            // ."回复数字'2',查看定位\n"
                            // ."回复数字'0',小游戏\n";
                            
                            // $contentStr = "Hi,xxx\n"
                            // ."回复数字'1',查看天气\n"
                            // ."回复数字'2',查看定位\n"
                            // ."你的名字叫啥？\n";
                        }
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    break;
                default:
                    
                    if($getUrl)
                    break;
            }

            // $textTpl ="<xml>
            //         <ToUserName><![CDATA[%s]]></ToUserName>
            //         <FromUserName><![CDATA[%s]]></FromUserName>
            //         <CreateTime>%s</CreateTime>
            //         <MsgType><![CDATA[event]]></MsgType>
            //         <Event><![CDATA[subscribe]]></Event>
            //         <EventKey><![CDATA[%s]]></EventKey>
            //         </xml>";
           
            // switch ($msgType) {
            //     case 'event':
            //         $contentStr = date("demo:"."Y-m-d H:i:s",time());
            //         $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            //         echo $resultStr;
            //         break;
            //     case 'text':
            //        if($keyword == "?" || $keyword == "？")
            //        {
            //            $contentStr = date("当前时间:"."Y-m-d H:i:s",time());
            //            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            //            echo $resultStr;
            //        }
            //         break;
            // }
        }else{
            echo "";
            exit;
        }
    }
}
?>