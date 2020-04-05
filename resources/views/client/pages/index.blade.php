@extends('client.layouts.master')
@section('title')
    Trang chủ
@endsection
@section('slide')
    @include('client.layouts.slide')
@endsection
@section('content')
	<!-- tittle heading -->
    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
        <span>S</span>ản
        <span>P</span>hẩm</h3>
    <!-- //tittle heading -->
    <div class="row">
        <!-- product left -->
        <div class="agileinfo-ads-display col-lg-9">
            <div class="wrapper">
                <!-- first section -->
                <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                <h3 class="heading-tittle text-center font-italic">{{$productdtip[0]->productType->name}}</h3>
                    <div class="row">
                        @foreach ($productdtip as $iphone)
                        <div class="col-md-4 product-men mt-5">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item text-center">
                                <img class="img-fluid" src="img/upload/product/{{$iphone->image}}" alt="{{$iphone->name}}">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                        <a href="{{$iphone->slug}}.html" class="link-product-add-cart">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                @if($iphone->promotional>0)
                                <span class="product-sale-top">Sale</span>
                                @endif
                                <div class="item-info-product text-center border-top mt-4">
                                    <h4 class="pt-1">
                                        <a class="d-inline-block text-truncate" style="max-width: 200px" href="{{$iphone->slug}}.html">{{$iphone->name}}</a>
                                    </h4>
                                    <div class="info-product-price my-2">
                                        @if ($iphone->promotional>0)
                                        <span class="item_price">{{number_format($iphone->promotional)}}</span>
                                        <del>{{number_format($iphone->price)}}</del>
                                        @else
                                        <span class="item_price">{{number_format($iphone->price)}}</span>
                                        @endif
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <a href="{{asset('cart/add/'.$iphone->id)}}"><input type="button" name="button" value="Thêm vào giỏ hàng" class="button btn" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
                <!-- //first section -->
                <!-- second section -->
                <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                    <h3 class="heading-tittle text-center font-italic">{{$productml[0]->productType->name}}</h3>
                        <div class="row">
                            @foreach ($productml as $ml)
                            <div class="col-md-4 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                    <img class="img-fluid" src="img/upload/product/{{$ml->image}}" alt="{{$ml->name}}">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{$ml->slug}}.html" class="link-product-add-cart">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if($ml->promotional>0)
                                    <span class="product-sale-top">Sale</span>
                                    @endif
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <a href="{{$ml->slug}}.html" class="d-inline-block text-truncate" style="max-width: 200px">{{$ml->name}}</a>
                                        </h4>
                                        <div class="info-product-price my-2">
                                            @if ($ml->promotional>0)
                                            <span class="item_price">{{number_format($ml->promotional)}}</span>
                                            <del>{{number_format($ml->price)}}</del>
                                            @else
                                            <span class="item_price">{{number_format($ml->price)}}</span>
                                            @endif

                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <a href="{{asset('cart/add/'.$ml->id)}}"><input type="button" name="button" value="Thêm vào giỏ hàng" class="button btn" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                <!-- //second section -->
                <!-- fourth section -->
                <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                    <h3 class="heading-tittle text-center font-italic">{{$producttl[0]->productType->name}}</h3>
                        <div class="row">
                            @foreach ($producttl as $tl)
                            <div class="col-md-4 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                    <img class="img-fluid" src="img/upload/product/{{$tl->image}}" alt="{{$tl->name}}">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{$tl->slug}}.html" class="link-product-add-cart">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if($tl->promotional>0)
                                    <span class="product-sale-top">Sale</span>
                                    @endif
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <a href="{{$tl->slug}}.html" class="d-inline-block text-truncate" style="max-width: 200px">{{$tl->name}}</a>
                                        </h4>
                                        <div class="info-product-price my-2">
                                            @if ($tl->promotional>0)
                                            <span class="item_price">{{number_format($tl->promotional)}}</span>
                                            <del>{{number_format($tl->price)}}</del>
                                            @else
                                            <span class="item_price">{{number_format($tl->price)}}</span>
                                            @endif

                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <a href="cart/add/{{$tl->id}}"><input type="button" name="button" value="Thêm vào giỏ hàng" class="button btn" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                <!-- //fourth section -->
            </div>
        </div>
        <!-- //product left -->

        <!-- product right -->
        <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
            <div class="side-bar p-sm-4 p-3">
                <div class="search-hotel border-bottom py-2">
                    <h3 class="agileits-sear-head mb-3">Search Here..</h3>
                    <form action="#" method="post">
                        <input type="search" placeholder="Product name..." name="search" required="">
                        <input type="submit" value=" ">
                    </form>
                </div>
                <!-- price -->
                <div class="range border-bottom py-2">
                    <h3 class="agileits-sear-head mb-3">Price</h3>
                    <div class="w3l-range">
                        <ul>
                            <li>
                                <a href="#">Under $1,000</a>
                            </li>
                            <li class="my-1">
                                <a href="#">$1,000 - $5,000</a>
                            </li>
                            <li>
                                <a href="#">$5,000 - $10,000</a>
                            </li>
                            <li class="my-1">
                                <a href="#">$10,000 - $20,000</a>
                            </li>
                            <li>
                                <a href="#">$20,000 $30,000</a>
                            </li>
                            <li class="mt-1">
                                <a href="#">Over $30,000</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //price -->
                <!-- electronics -->
                <div class="left-side border-bottom py-2">
                    <h3 class="agileits-sear-head mb-3">Electronics</h3>
                    <ul>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Accessories</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Cameras & Photography</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Car & Vehicle Electronics</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Computers & Accessories</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">GPS & Accessories</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Headphones</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Home Audio</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Home Theater, TV & Video</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Mobiles & Accessories</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Portable Media Players</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Tablets</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Telephones & Accessories</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Wearable Technology</span>
                        </li>
                    </ul>
                </div>
                <!-- //electronics -->
                <!-- arrivals -->
                <div class="left-side border-bottom py-2">
                    <h3 class="agileits-sear-head mb-3">New Arrivals</h3>
                    <ul>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Last 30 days</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Last 90 days</span>
                        </li>
                    </ul>
                </div>
                <!-- //arrivals -->
                <!-- best seller -->
                <div class="f-grid py-2">
                    <h3 class="agileits-sear-head mb-3">Best Seller</h3>
                    <div class="box-scroll">
                        <div class="scroll">
                            <div class="row">
                                @foreach ($productall->take(4) as $pall)
                                @if ($pall->promotional>0)
                                <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                   <a href="{{$pall->slug}}.html"><img src="{{asset('img/upload/product/'.$pall->image)}}" alt="" class="img-fluid"></a>
                                </div>
                                <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                    <a href="{{$pall->slug}}.html">{{$pall->name}}</a>
                                    <a href="{{$pall->slug}}.html" class="price-mar mt-2">{{number_format($pall->promotional)}}</a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //best seller -->
            </div>
            <!-- //product right -->
        </div>
    </div>
@endsection
