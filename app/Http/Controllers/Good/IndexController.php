<?php

namespace App\Http\Controllers\Good;

use App\QiDian;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index()
    {
        return view('good.index');
    }
}
