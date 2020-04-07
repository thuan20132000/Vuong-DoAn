<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductType;
use Cart;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $category = Category::where('status', 1)->get();
        $producttype = ProductType::where('status', 1)->get();
        $cart = Cart::getContent();

        view()->share(['category' => $category, 'producttype' => $producttype,'cart'=>$cart]);
    }
    public function index()
    {
        $producttl = Product::where('status', 1)->where('idProductType', 11)->get();
        $productdtip = Product::where('status', 1)->where('idProductType', 1)->get();
        $productml = Product::where('status', 1)->where('idProductType', 12)->get();
        $productall = Product::all();
        // dd($producttl);

        return view('client.pages.index', ['productdtip' => $productdtip, 'productml' => $productml,'producttl'=>$producttl,'productall'=>$productall]);
    }
    public function getListProductType($id){
        $producttype = Product::where('idProductType',$id)->get();
        return view('client.pages.producttype',['producttype'=>$producttype]);
    }
    public function getProductDetail($slug){
        $product_detail = Product::where('slug',$slug)->first();
        return view('client.pages.product_detail',['product_detail'=>$product_detail]);

    }
    public function getList(){
        $cart = Cart::getContent();
        return view('client.pages.cart',['cart'=>$cart]);
    }
    public function checkout(){
        return view('client.pages.checkout');
    }
    public function profile(){
        return view('client.pages.profile');
    }
    public function getSearch(Request $request){
        $product = Product::where('name','like','%'.$request->key.'%')->orWhere('price',$request->key)->get();
        return view('client.pages.search',['product'=>$product]);
    }
}
