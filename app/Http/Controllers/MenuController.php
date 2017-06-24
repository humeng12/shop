<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use EasyWeChat\Foundation\Application;

use App\Http\Requests;

class MenuController extends Controller
{
    public $menu;

    public function __construct(Application $app)
    {
    	$this->menu = $app->menu;
    }


    public function menu()
    {
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
		$this->menu->add($buttons);
    }


    public function all()
    {
    	return $this->menu->current();
    }
}
