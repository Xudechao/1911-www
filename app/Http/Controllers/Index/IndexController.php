<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Model\CarModel;

class IndexController extends Controller
{
    /**
     * 首页
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //查询表中的数据
        $g = GoodsModel::orderBy('goods_id','desc')->limit(6)->get();
        //传值
        return view('index.home',['g'=>$g]);
    }


    /**
     * 详情
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function desc($goods_id)
    {
        $goods = GoodsModel::find($goods_id);
        $data = [
            "name" =>$goods->goods_name,
            "image"=>$goods->goods_img,
            "quantity"=>$goods->goods_number,
            "price"=>$goods->shop_price,
            "goods_id"=>$goods->goods_id
        ];
        $a = GoodsModel::find($data);

        return view('index.add',['a'=>$a]);

    }
}
