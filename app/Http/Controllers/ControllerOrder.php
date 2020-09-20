<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use Carbon\Carbon;
class ControllerOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderLists = \App\Order::all()->toArray();
        return view('backend/order/index', ['orderLists' => $orderLists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products =  Product::select('id', 'name')->get()->toArray();
        $customers = Customer::select('id', 'fullname')->get()->toArray();

        return view('backend/order/create', ['products' => $products], ['customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $customer_id = $request->input('customer_id');
        $stastus=$request->input('stastus');
        $customer_fullname = $request->input('customer_fullname');
        $customer_email = $request->input('customer_email');
        $customer_phone = $request->input('customer_phone');
        $address = $request->input('address');
        $count = $request->input('count');
        $amount = $request->input('amount');
        $message = $request->input('message');
        $created_at =Carbon::now('Asia/Ho_Chi_Minh');
        if ($amount===null){
            $product_price =  Product::select('price', 'discount')->where('id','=',''.$product_id.'')->get()->toArray();
            $product_price=array_map(function($item){
                return (array) $item;
            },$product_price);
            foreach ($product_price as $priceItem)
                $price = $priceItem['price'];
            $discount=$priceItem['discount'];
            if ($discount > 0){
                $amount= $discount*$count;
            }
            else{
                $amount= $price*$count;
            }
        }
        $orders = new Order();
        $orderSaver =$orders->orderSave($product_id,$customer_id,$stastus,$customer_fullname, $customer_email,$customer_phone,$address,$count,$amount,$message,$created_at);
        return redirect(route('order-list'))->with('success', 'bạn đã đặt hàng  cho  khách hàng thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function amount(Request $request)
    {
        $product_id =$request->post('product_id');
        $count =$request->post('count');

        $product_price =  Product::select('price', 'discount')->where('id','=',''.$product_id.'')->get()->toArray();
        $product_price=array_map(function($item){
            return (array) $item;
        },$product_price);
        foreach ($product_price as $priceItem)
            $price = $priceItem['price'];
            $discount=$priceItem['discount'];
        if ($discount > 0){
            echo $discount*$count;
        }
        else{
            echo $price*$count;
        }

    }
}
