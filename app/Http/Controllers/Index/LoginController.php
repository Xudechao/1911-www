<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * 登录
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){
        if(request()->isMethod("get")){
            return view("login.login");
        }

    }

    /**
     * 注册
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reg(){
        if(request()->isMethod("get")){
            return view("login.reg");
        }

    }

    public function center()
    {
        echo 111111;
    }
}
