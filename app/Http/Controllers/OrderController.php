<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function postBuyy(Request $request){

            $carts = Cart::getContent();



            // thuan created
            if(!$this->checkQuanity($carts)){
                return redirect()->back()->with("message","Lớn hơn số lượng sản phẩm còn lại trong kho.");
            }
            if(!$this->checkStockOut($carts)){
                return redirect()->back()->with("message","Hết sản phẩm trong kho");
            }
            $this->updateQuantityInStock($carts);


            // author:thuan
            // message : add code_order
            $monney = str_replace(',','',Cart::getTotal());
            $order = new Order();
            $order->idUser = Auth::user()->id;
            $order->name = $request->name;
            $order->code_order = "ORDER".random_int(10000,99999);
            $order->email = $request->email;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->monney = $monney;
            $order->save();

            $tt = Order::orderBy('created_at', 'desc')->first();


            foreach($carts as $cart){
                $order_detail = new OrderDetail();
                $order_detail->idOrder = $tt->id;
                $order_detail->idProduct = $cart->id;
                $order_detail->quantity = $cart->quantity;
                $order_detail->price = $cart->price;
                $qtyproductInStock = DB::table('product')->where('id',$cart->id)->select('quantity')->get()[0]->quantity;

                $qty = $qtyproductInStock - $cart->quantity;


                $order_detail->save();
            }


        $cart = Cart::clear();
        return redirect('checkout');
    }
    public function getList()
    {
        $order = Order::paginate(5);
        return view('admin.pages.order.order_list',['order'=>$order]);
    }
    public function getEdit($id){
        $order = Order::find($id);
        return view('admin.pages.order.edit',['order'=>$order]);
    }
    public function postEdit(Request $request,$id){
        $order = Order::find($id);
        $order->name = $request->name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->monney = $request->monney;
            $order->status = $request->status;
            $order->save();
            return redirect('admin/order/list');
    }
    public function getOrderDetail($id){
        $order_detail = OrderDetail::where('idOrder',$id)->get();
        return view('admin.pages.order.order_detail',['order_detail'=>$order_detail]);
    }


    // author :thuantruong
    // created at :  7 - 04 - 2020
    public function checkQuanity($carts){

        $check = true;

        foreach($carts as $c){
            $quantityInStock = DB::table('product')->where('id',$c->id)->select('quantity')->get()[0]->quantity;

                if($c->quantity > $quantityInStock ){
                    $check = false;

                }
        }

        return $check;

    }

    // author :thuantruong
    // created at :  7 - 04 - 2020
    public function checkStockOut($carts){

        $check = true;

        foreach($carts as $c){
            $quantityInStock = DB::table('product')->where('id',$c->id)->select('quantity')->get()[0]->quantity;

                if($quantityInStock <=0 ){
                    $check = false;
                }
        }

        return $check;

    }

    // author :thuantruong
    // created at :  7 - 04 - 2020
    public function updateQuantityInStock($carts){

        foreach($carts as $c){

            $quantityInStock = Product::find($c->id)->quantity;

            $product = Product::find($c->id)->update(['quantity'=>$quantityInStock - $c->quantity]);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function postBuy(Request $request){

    }
}
