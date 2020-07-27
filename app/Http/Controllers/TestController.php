<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
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
        $url = 'http://api.1911.com/test1';
        $response = file_get_contents($url);
        var_dump($response);
    }

    public function test()
    {
        $goods_info = [
            'goods_id' => 123456,
            'goods_name' => 'IPhonex',
            'price' => 800000,
            'add_time' => time()
        ];

        $key = 'goods_12345';

        Redis::hmset($key,$goods_info);

    }

    /**
     * 对称加密
     * @param Request $request
     */
    public function aes1(Request $request)
    {
        $url = 'http://api.1911.com/test/dec';
        $data = 'hello PHP';
        //$data = '先擦鼻涕后提裤，从此走上社会路。';

        $mehod = 'AES-256-CBC';
        $keye = '1911www';
        $lv = '1233211233211231';
        $option = OPENSSL_RAW_DATA;

        $enc = openssl_encrypt($data,$mehod,$keye,$option,$lv);
         //echo "密文：".$enc;echo '</br>';
        $b64_str = base64_encode($enc);
         //echo "base64:".$b64_str;echo '</br>';

        $api = $url.'?data='.urlencode($b64_str);
        $response = file_get_contents($api);

        var_dump($response);
    }

    /**
     * 非对称加密
     */
    public function rsa(){
        $data = "先擦鼻涕后提裤，从此走上社会路。";
        echo "原密:".$data."<br>"."<hr>";
        $content = openssl_get_privatekey(file_get_contents(storage_path("keys/www_priv.key")));

        $priv_key = openssl_get_privatekey($content);
        openssl_private_encrypt($data,$enc_data,$priv_key);
        echo "加密:".$enc_data."<br>"."<hr>";
        $enc_data = [
            "data"=>  $enc_data,
        ];
        $url="http://api.1911.com/test/dersa";
        $ch=curl_init();
        //设置参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $enc_data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //发送请求
        $response=curl_exec($ch);
        echo $response;
        //提示错误
        $errno=curl_errno($ch);
        if($errno){
            $errmsg=curl_error($ch);
            var_dump($errmsg);
        }
        curl_close($ch);
        ####################################################################
        $one_pub_key = file_get_contents(storage_path("keys/api_pub.key"));
        openssl_public_decrypt($response,$dec_data,$one_pub_key);
        echo "<br>";
        echo "<hr>";
        echo $dec_data;

    }

    /**
     * 签名测试
     */
    public function sign1()
    {
        $data = "hello PHP how";
        $key = "1911www";

        $sing_s1 = md5($data . $key);

        //发送数据
        $url = 'http://api.1911.com/test/sign1?data='.$data.'&sign='.$sing_s1;
        $response = file_get_contents($url);
        echo $response;

    }

}
