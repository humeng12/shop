<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;


class ApiController extends Controller
{


	public function apiReturn($status,$message='',$data=''){

        $res = array();

        $res['status'] = $status;
        $res['message'] = $message;
        $res['data'] = $data;
        
        return $res;
    }


     /** 
     * 发送get请求 
     * @param string $url 
     * @return bool|mixed 
     */  
    function request_get($url = '')  
    {  
        if (empty($url)) {  
            return false;  
        }  
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_TIMEOUT, 500);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        $data = curl_exec($ch);  
        curl_close($ch);  
        return $data;  
    }


    public function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    //取中间字符串
    public function getSubstr($str, $leftStr, $rightStr)
    {
        $left = strpos($str, $leftStr);
        $right = strpos($str, $rightStr,$left);
        if($left < 0 or $right < $left) return '';
        return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
    }

    /******************************************
	****AuThor : 胡猛
	****Title  : 测试方法
	*******************************************/
	public function demo(Request $request)
	{
		return $this->apiReturn('0','1521');
	}


	/******************************************
	****AuThor : 胡猛
	****Title  : 获取openid
	*******************************************/
	public function getOpenid(Request $request){

        $appid = 'wx01d524b6a46a3884';
        $code = $request->get('code');
        $appsecret = 'ab6dcc21ccc1f0a965725eb7960d18a5';
        
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';

        $res = $this->request_get($url);

        $openid = $this->getSubstr($res,'"openid":"','",');

        $access_token = $this->getSubstr($res,'"access_token":"','",');

        $expires_in = $this->getSubstr($res,'"expires_in":"','",');


        $arr = array(
            'openid' => $openid,
            'access_token' => $access_token,
            'expires_in' => $expires_in
        );
        
        return $this->apiReturn('0','成功',$arr);
    }

	/******************************************
	****AuThor : 胡猛
	****Title  : 获取accesstoken
	*******************************************/
	public function get_access_token(){

        $appid = "wx01d524b6a46a3884";
        $appsecret = "ab6dcc21ccc1f0a965725eb7960d18a5";

        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);

        return $jsoninfo['access_token'];
    }

    /******************************************
	****AuThor : 胡猛
	****Title  : 获取微信用户的基本信息
	*******************************************/
    public function getUserBaseInfo(Request $request){

        $access_token = $this->get_access_token();

        $openid = $request->get('wxopenid');

        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid;

        $res = $this->https_request($url);

        $nickname = $this->getSubstr($res,'"nickname":"','",');

        $headimgurl = $this->getSubstr($res,'"headimgurl":"','",');

        $tmpArr = array(

            'nickname' => $nickname,
            'headimgurl' => $headimgurl
        );

        return $this->apiReturn('0','成功',$tmpArr);
    }
}