<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestController extends Controller
{
     public function test1()
     {
         $url = 'http://api.1911.com/user/info';
         //$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET';
         $response = file_get_contents($url);
         var_dump($response);
     }

    public function test2()
    {
        echo Str::random(30);
    }

}
