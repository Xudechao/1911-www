<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

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

    public function getWxToken2()
    {
        $appid = 'wx0a0d276f71eea575';
        $secret = '772b59b747feb34c5788faab6661158d';
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret.'';

        // 创建一个新cURL资源
        $ch = curl_init();

        // 设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);      // 将返回结果通过变量接收

        // 抓取URL并把它传递给浏览器
        $response = curl_exec($ch);

        // 关闭cURL资源，并且释放系统资源
        curl_close($ch);

        echo $response;
    }

    public function getWxToken3()
    {
        $appid = 'wx0a0d276f71eea575';
        $secret = '772b59b747feb34c5788faab6661158d';
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret.'';

        $client = new Client();
        $response = $client->request('GET',$url);

        $data = $response->getBody();

        echo $data;


    }

    /**
     *  生成token
     */
    public function getAccessToken()
    {
        $token = Str::random(32);

        $data = [
            'token' => $token,
            'expire_in' => 7200
        ];
        echo json_encode($data);
    }

    public function userInfo()
    {
        echo 'userInfo';
    }

    public function test2()
    {
        $url = 'http://api.1911.com/test2';
        $response = file_get_contents($url);
        var_dump($response);
    }
}
