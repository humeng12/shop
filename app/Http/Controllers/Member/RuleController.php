<?php

namespace App\Http\Controllers\Member;

use App\QiDian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Models\MlyUser;
use DB;

class RuleController extends Controller
{
    public function index(Request $request)
    {
        return view('member.rule');
    }
}
