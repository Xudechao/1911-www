<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getWxToken()
    {
        $appid = 'wx0a0d276f71eea575';
        $secret = '772b59b747feb34c5788faab6661158d';
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret.'';
        $cont = file_get_contents($url);
        echo $cont;
    }
}
