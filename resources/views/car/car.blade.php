@extends('lyouts.all')
@section('title',"购物车列表")
@section('content')
    <!-- cart menu -->
    <div class="menus" id="animatedModal">
        <div class="close-animatedModal close-icon">
            <i class="fa fa-close"></i>
        </div>
        <div class="modal-content">
            <div class="cart-menu">
                <div class="container">
                    <div class="content">
                        <div class="cart-1">
                            <div class="row">
                                <div class="col s5">
                                    <img src="/admin/img/cart-menu1.png" alt="">
                                </div>
                                <div class="col s7">
                                    <h5><a href="">Fashion Men's</a></h5>
                                </div>
                            </div>
                            <div class="row quantity">
                                <div class="col s5">
                                    <h5>Quantity</h5>
                                </div>
                                <div class="col s7">
                                    <input value="1" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s5">
                                    <h5>Price</h5>
                                </div>
                                <div class="col s7">
                                    <h5>$20</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s5">
                                    <h5>Action</h5>
                                </div>
                                <div class="col s7">
                                    <div class="action"><i class="fa fa-trash"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="cart-2">
                            <div class="row">
                                <div class="col s5">
                                    <img src="/admin/img/cart-menu2.png" alt="">
                                </div>
                                <div class="col s7">
                                    <h5><a href="">Fashion Men's</a></h5>
                                </div>
                            </div>
                            <div class="row quantity">
                                <div class="col s5">
                                    <h5>Quantity</h5>
                                </div>
                                <div class="col s7">
                                    <input value="1" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s5">
                                    <h5>Price</h5>
                                </div>
                                <div class="col s7">
                                    <h5>$20</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s5">
                                    <h5>Action</h5>
                                </div>
                                <div class="col s7">
                                    <div class="action"><i class="fa fa-trash"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        <div class="row">
                            <div class="col s7">
                                <h5>Fashion Men's</h5>
                            </div>
                            <div class="col s5">
                                <h5>$21.00</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s7">
                                <h5>Fashion Men's</h5>
                            </div>
                            <div class="col s5">
                                <h5>$21.00</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s7">
                                <h6>Total</h6>
                            </div>
                            <div class="col s5">
                                <h6>$41.00</h6>
                            </div>
                        </div>
                    </div>
                    <button class="btn button-default">Process to Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart menu -->

    <!-- cart -->
    <div class="cart section">
        <div class="container">
            <div class="pages-head">
                <h3>CART</h3>
            </div>
            <div class="content">

                @foreach($car as $v)
                    <div class="cart-1">
                        <div class="row" >

                            <div class="col s5">
                                <h5>Image</h5>
                            </div>
                            <div class="col s7">
                                <img width="100px" height="100px" src="{{env('UPLOADS_URL')}}{{$v->image}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Name</h5>
                            </div>
                            <div class="col s7">
                                <h5><a href="{{url('/user/desc/'.$v->goods_id)}}">{{$v->name}}</a></h5>
                            </div>
                        </div>
                        <div class="row" id="price">
                            <div class="col s5">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col s7">
                                <input type="text" value="{{$v->quantity}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Price</h5>
                            </div>
                            <div class="col s7">
                                <h5>${{$v->price}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Action</h5>
                            </div>
                            <div class="col s7">
                                <h5><i class="fa fa-trash">{{$v->is_delete==1?"删除":""}}</i></h5>
                            </div>

                        </div>
                    </div>
                    <div>
                        <hr>
                        <br>
                    </div>
                @endforeach
            </div>
            <a href="{{url('http://www.1911.com/test/pay')}}" class="btn button-default">确认结算</a>
        </div>
    </div>
    <!-- end cart -->

    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->
@endsection
