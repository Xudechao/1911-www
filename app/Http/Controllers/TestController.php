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
     * 签名测试1
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

    /**
     * 传参
     */
    public function header1()
    {
        $url = 'http://api.1911.com/test1';
        $uid = 666666;
        $token = Str::random(16);
        //header 传参
        $header = [
            'uid:'.$uid,
            'token:'.$token,
        ];
        //curl
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        curl_exec($ch);
        curl_close($ch);

    }

    /**
     * 支付页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testPay()
    {
        return view('test.goods');
    }

    /**
     * 跳转支付宝支付
     */
    public function pay(Request $request)
    {
        $oid = $request->get('oid');
//        echo '订单ID： '. $oid;
        //根据订单查询到订单信息  订单号  订单金额

        //调用 支付宝支付接口

        // 1 请求参数
        $param2 = [
            'out_trade_no'      => time().mt_rand(),
            'out_trade_no'      => time().mt_rand(00000,99999),
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
            'total_amount'      => 0.01,
            'subject'           => '1911-测试订单-'.Str::random(16),
        ];

        // 2 公共参数
        $param1 = [
            'app_id'        => '2016101800717609',
            'method'        => 'alipay.trade.page.pay',
            'return_url'    => 'http://1911xdc.comcto.com/alipay/return',   //同步通知地址
            'charset'       => 'utf-8',
            'sign_type'     => 'RSA2',
            'timestamp'     => date('Y-m-d H:i:s'),
            'version'       => '1.0',
            'notify_url'    => 'http://1911www.comcto.com/alipay/notify',   // 异步通知
            'biz_content'   => json_encode($param2),
        ];

//        echo '<pre>';print_r($param1);echo '</pre>';
        // 计算签名
        ksort($param1);
//        echo '<pre>';print_r($param1);echo '</pre>';
//        die;
        $str = "";
        foreach($param1 as $k=>$v)
        {
            $str .= $k . '=' . $v . '&';
        }

        $str = rtrim($str,'&');     // 拼接待签名的字符串

        $sign = $this->sign($str);
        echo $sign;echo '<hr>';

        //沙箱测试地址
//        $url = 'https://openapi.alipaydev.com/gateway.do?';
        $url = 'https://openapi.alipaydev.com/gateway.do?'.$str.'&sign='.urlencode($sign);
        return redirect($url);
//        echo $url;die;
    }

    protected function sign($data)
    {
        $priKey = file_get_contents(storage_path('keys/ali_priv.key'));
        $res = openssl_get_privatekey($priKey);
        var_dump($res);echo '<hr>';

        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');

        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        openssl_free_key($res);
        $sign = base64_encode($sign);
        return $sign;
    }
}
