@extends('lyouts.all')
@section('title',"大约")
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
                                    <img src="img/cart-menu1.png" alt="">
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
                                    <img src="img/cart-menu2.png" alt="">
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


    <!-- about us -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>ABOUT US</h3>
            </div>
            <div class="about-us">
                <img src="img/about.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore consequuntur praesentium dignissimos voluptatum esse, perspiciatis mollitia repellendus rerum magni aspernatur ipsam maxime dolorem iure laudantium at veritatis doloribus, numquam, dicta?</p>
            </div>
        </div>
    </div>
    <!-- end about us -->


    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->
@endsection
