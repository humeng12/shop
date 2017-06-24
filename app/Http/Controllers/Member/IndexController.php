<?php

namespace App\Http\Controllers\Member;

use App\QiDian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Models\MlyUser;
use DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
    	//查询
    	$username = $request->get('username');
    	$where = '';
    	if ($username) {

    		$where .= $username;
    	}

    	$users = MlyUser::where('username', 'like', '%'.$where.'%')->paginate(10);

        return view('member.index')->with('users',$users);
    }
}
