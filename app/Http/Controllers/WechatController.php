<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use EasyWeChat\Foundation\Application;

use App\Http\Requests;

// "barryvdh/laravel-debugbar": "^2.2",Barryvdh\Debugbar\ServiceProvider::class,'Debugbar' => Barryvdh\Debugbar\Facade::class,

class WechatController extends Controller
{
    public function serve()
    {
   
        $wechat = app('wechat');
        $userApi = $wechat->user;
        $wechat->server->setMessageHandler(function($message){


        	switch ($message->MsgType) {
		        case 'event':
		        {
		        	if ($message->Event == 'subscribe') {
		        		$user_openid = $message->FromUserName;
		        		return '你好,欢迎关注我的微信公众号'.$user_openid;
		        	}else{
		        		return '你好,欢迎关注我的微信公众号1';
		        	}
		        }
		            break;
		        case 'text':
		        	$user_openid = $message->FromUserName;
		            return '收到文字消息';
		            break;
		        case 'image':
		            return '收到图片消息';
		            break;
		        case 'voice':
		            return '收到语音消息';
		            break;
		        case 'video':
		            return '收到视频消息';
		            break;
		        case 'location':
		            return '收到坐标消息';
		            break;
		        case 'link':
		            return '收到链接消息';
		            break;
		        // ... 其它消息
		        default:
		            return '收到其它消息';
		            break;
		    }

        });

        return $wechat->server->serve();
    }


    public  function  menu_add(){
       	$app = app('wechat');
       	$menu = $app->menu;
       	$buttons = [
		    [
		        "type" => "click",
		        "name" => "点击我",
		        "key"  => "YOU_CLICK_ME"
		    ],
		    [
		        "name"       => "菜单",
		        "sub_button" => [
		            [
		                "type" => "view",
		                "name" => "搜索",
		                "url"  => "http://www.soso.com/"
		            ],
		            [
		                "type" => "view",
		                "name" => "视频",
		                "url"  => "http://v.qq.com/"
		            ],
		            [
		                "type" => "click",
		                "name" => "赞一下我",
		                "key" => "YOU_VOTED_FOR_US"
		            ],
		        ],
		    ],
		];

       $menu->add($buttons);
    }


    /**
     * 删除菜单
     */
    public  function  menu_destroy(){
    	$app = app('wechat');
        $menu = $app->menu;
        $menu->destroy();
    }


    /**
 	* 查看微信公众号当前的菜单
 	*/
	public  function  menu_current(){
	    $app = app('wechat');
	    $menu = $app->menu;
	    $menus = $menu->all();
	    
	    var_dump($menus);
	}

}

