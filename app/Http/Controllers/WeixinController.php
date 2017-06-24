<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WeixinController extends Controller
{
    
    public function api()
    {
        // $echoStr = $_GET["echostr"];
        // if($this->checkSignature()){
        //     echo $echoStr;
        //     exit;
        // }



        header('content-type:text');		
        $echoStr = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = 'weixindemo';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature && $echoStr){
            exit;
        } else {
            //回复消息
            $this->responseMsg();
        }

    }
    //检查签名
    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = "weixindemo";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature){
            return true;

        }else{
            return false;
        }
    }


    public function responseMsg()
    {
    	$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

    	error_log(var_export($postStr,1),3,'php_log.txt');

    	if (!empty($postStr)){

    		libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);


            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();


            $textTpl = "<xml>
                           <ToUserName><![CDATA[%s]]></ToUserName>
                           <FromUserName><![CDATA[%s]]></FromUserName>
                           <CreateTime>%s</CreateTime>
                           <MsgType><![CDATA[%s]]></MsgType>
                           <Content><![CDATA[%s]]></Content>
                           <FuncFlag>0</FuncFlag>
                           </xml>";

            //订阅事件
            if($postObj->Event=="subscribe")
            {
                $msgType = "text";
                $contentStr = "欢迎关注胡猛的微信公众号";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }


            //语音识别
            if($postObj->MsgType=="voice"){
                $msgType = "text";
                $contentStr = trim($postObj->Recognition,"。");
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo  $resultStr;
            }


            //自动回复
            if(!empty( $keyword ))
            {
                $msgType = "text";
                $contentStr = "小朋友你好！";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }
    	}else{
    		echo "";
           	exit;
    	}
    }
}
