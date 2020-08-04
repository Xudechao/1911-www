<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarModel;
use App\Model\GoodsModel;

class CarController extends Controller
{
    public function goshop($goods_id){
        $goods = GoodsModel::find($goods_id);
        $data = [
            "name" =>$goods->goods_name,
            "image"=>$goods->goods_img,
            "quantity"=>1,
            "price"=>$goods->shop_price*0.8,
            "goods_id"=>$goods->goods_id,
            "time" => time()
        ];
        $add = CarModel::where("goods_id",'=',$goods->goods_id)->first();
        $car = new CarModel();
        if($add){
            $add = CarModel::where("goods_id",$goods_id)->increment("quantity",1);
            if($add){
                $shop_price= $goods->shop_price;
                $quantity = CarModel::where("goods_id",$goods->goods_id)->sum("quantity");
                $count = $shop_price*$quantity*0.8;
                CarModel::where("goods_id",$goods_id)->update(["price"=>$count,"time"=>time()]);
            }
        }else{
            $add = $car->insert($data);
        }
        if($add){
            return redirect("http://www.1911.com/user/car");
        }else{
            return redirect("http://www.1911.com/user/index");
        }
    }

    public function car(){
        $car = CarModel::orderBy("time","desc")->get();
        return view("car.car",compact("car"));
    }
}
