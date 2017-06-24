<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Models\MlyWeixin;
use DB;


class IndexController extends Controller
{
    public function index(Request $request)
    {
    	
    	$appid = $request->get('appid');

    	$where = '';

    	if ($appid) {

    		$where .= $appid;
    	}

    	$res = MlyWeixin::where('appid', 'like', '%'.$where.'%')->paginate(10);

        return view('system.index')->with('res',$res);
    }


    public function create()
    {
    	return view('system.create');
    }

    public function setting(Request $request)
    {
    	$appid = $request->get('appid');

    	$res = DB::table('mly_weixin')->where('appid',$appid)->get();

    	$count = count($res);

    	$tmp = array();

    	if ($count == 0) {
    		
    		DB::beginTransaction();
    		try
    		{
    			$region = $request->get('region');
	            $appsecret = $request->get('appsecret');

	            $weixin = new MlyWeixin;
	            $weixin->region = $request->get('region');
	            $weixin->appid = $appid;
	            $weixin->appsecret = $request->get('appsecret');

	            if ($weixin->save()) 
	            {
	            	DB::commit();

	            	$tmp['status'] = 0;
	        		$tmp['message'] = '添加成功';

	                return $tmp;
	            }
	            else
	            {
	            	DB::rollBack();
	            	$tmp['status'] = 1;
	         		$tmp['message'] = '添加失败';

	                return $tmp;
	            }
	    		}
	    		catch (\Exception $e) 
	    		{
	    			DB::rollBack();
	            	$tmp['status'] = 1;
	         		$tmp['message'] = '添加失败';

	                return $tmp;
	    		}
    	}
    	else
    	{
    		$tmp['status'] = 1;
        	$tmp['message'] = '已存在';

            return $tmp;
    	}
    }
}
