<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use Session;
use Carbon\Carbon;
use App\Order;
class ControllerFrontend extends Controller
{
    public function index()
    {
        if(Auth::guard('customer')->check()){
            $customer_id = Auth::guard('customer')->user()->id;
            $product['cart'] = DB::table('carts')->select('carts.id','carts.customer_id','carts.product_id','carts.count','carts.amount','products.name','products.img_link')
                ->where('carts.customer_id','=',$customer_id)
                ->join('products','products.id' ,'=','carts.product_id')
                ->get()->toArray();
            $product['cart']=array_map(function($item){
                return (array) $item;
            },$product['cart']);
        }
        $pruducts = \App\Product::all()->toArray();
        $product['sale']= Product::where('discount','>',0)->get()->toArray();
        $product['new'] =Product::SELECT ('*')->orderBy('created_at', 'desc')->take(10)->get()->toArray();
        $product['telephone']=Product::where('category','=','telephone')->get()->toArray();
        return view('frontend/home', ['pruducts' => $pruducts],['product'=>$product]);
    }
    public function cart_add(Request $request)
    {
        $created_at =Carbon::now('Asia/Ho_Chi_Minh');
        $customer_id = $request->input('customer_id_cart');
        $product_id = $request->input('product_id');
        $products = Product::where('id', '=', '' . $product_id . '')->get()->toArray();
        $products = array_map(function ($item) {
            return (array)$item;
        }, $products);
        foreach ($products as $teamp)
        if ($teamp['quantity'] > 1) {
                if ($teamp['discount']){
                    $gia=$teamp['discount'];
                }else{
                    $gia=$teamp['price'];
                }
            $query = Cart::where('product_id', '=', '' . $product_id . '')->where('customer_id','=',''.$customer_id.'')->get()->toArray();
            $query = array_map(function ($item) {
                return (array)$item;
            }, $query);
            if ($query)
                {
                    foreach ($query as $cart){
                        $count = $cart['count'] + 1;
                        $id_cart = $cart['id'];
                    }
                    $amount =$count*$gia;

                    DB::table('carts')->where('id',$id_cart)->update(array('count'=>$count,'amount'=>$amount));
                }
            else{
                    $cart_add = new Cart();
                    $cart_add->customer_id=$customer_id;
                    $cart_add->product_id=$product_id;
                    $cart_add->count=1;
                    $cart_add->amount=$gia;
                    $cart_add->created_at=$created_at;
                    $cart_add->save();
            }
            echo "thêm vào giỏ hàng  thành công";
        }else{
            echo "mặt hàng này đã hết";
        }
    }
    public function cart_delete(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $query = Cart::where('id', '=', '' . $cart_id . '')->get()->toArray();
        $query = array_map(function ($item) {
            return (array)$item;
        }, $query);
        foreach ($query as $cart){
            $count = $cart['count'];
            $amount=$cart['amount'];
        }
        if ($count>1){
            $countTemp=$count-1;
            $amount = $amount/$count*$countTemp;
            DB::table('carts')->where('id',$cart_id)->update(array('count'=>$countTemp,'amount'=>$amount));
        }else{
            DB::table('carts')->where('id', '=', $cart_id)->delete();
        }
        echo "xóa 1 sản phẩm trong giỏ thành công";

    }
    public function login(Request $request)
    {
        $rule = [
            'username' => 'required',
            'password' => 'required|min:3'
        ];
        $mssg = [
            'username.required' => 'số điện thoại  không được để trống',
            'password.required' => 'mật khẩu không được để trống ',
            'password.min' => 'mật khẩu phải chứa ít nhất 3 ký tự'
        ];
        $validator = Validator::make($request->all(), $rule, $mssg);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $username = $request->input('username');
            $password = $request->input('password');
            if (Auth::guard('customer')->attempt(['username' => $username, 'password' => $password])) {
                return redirect(route('home'))->with('success', 'đăng nhập  thành công');
            } else {
                Session::flash('error', 'Tên tài khoản hoặc mật khẩu không đúng!');
                return redirect('/login.html');
            }
            return redirect('/login.html');
        }
    }
    public function cart(Request $request){
        $customer_id=$request->input('customer_id');
        $product['cart'] = DB::table('carts')->select('carts.id','carts.customer_id','carts.product_id','carts.count','carts.amount','products.name','products.img_link')
            ->where('carts.customer_id','=',$customer_id)
            ->join('products','products.id' ,'=','carts.product_id')
            ->get()->toArray();
        $product['cart']=array_map(function($item){
            return (array) $item;
        },$product['cart']);
        return view('frontend/cart', ['product' => $product]);
    }
    public function logout(){
        Auth::guard('customer')->logout();
        return redirect(route('home'))->with('success', 'đăng xuất  thành công');
    }
    public function order(Request $request){
        $customer_id =$request->input('customer_id');
        $customer_fullname =$request->input('customer_fullname');
        $customer_email =$request->input('customer_email');
        $customer_phone =$request->input('customer_phone');
        $address =$request->input('address');
        $message =$request->input('message');
        $stastus =0;
        $created_at =Carbon::now('Asia/Ho_Chi_Minh');
        $order_saves = new Order();
        $query = Cart::where('customer_id', '=', '' . $customer_id . '')->get()->toArray();
        $query = array_map(function ($item) {
            return (array)$item;
        }, $query);
        foreach ($query as $cart){
            $product_id = $cart['product_id'];
            $count = $cart['count'];
            $amount = $cart['amount'];
            $orders =$order_saves->orderSave($product_id,$customer_id,$stastus,$customer_fullname, $customer_email,$customer_phone,$address,$count,$amount,$message,$created_at);
        }
        DB::table('carts')->where('customer_id', '=', $customer_id)->delete();
        return redirect(route('home'))->with('success', 'đặt hàng thành công');

    }
    public function register(Request $request){
        $customer = new  Customer();
        $fullName = $request->input('fullname');
        $sex = $request->input('sex');
        $birth= $request->input('birth');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $userName = $request->input('username');
        $password = Hash::make($request->input('password'));
        $admin = Customer::all();
        $validation = Validator::make($request->all(), Customer::rolesStoreCustomer($phone,$email,$userName) ,Customer::mssg());
        if ($validation->passes())
        {
            $customer = new  Customer();
            $store_save = $customer->storeCustomer($fullName,$sex ,$birth ,$phone ,$email ,$address ,$userName,$password);
            $username = $request->input('username');
            $password = $request->input('password');
             Auth::guard('customer')->attempt(['username' => $username, 'password' => $password]);
             return redirect(route('home'))->with('success', 'đăng ký  thành công');
        }
        return redirect()->back()->withInput()->withErrors($validation);

    }
    public function product($id){

    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $product['search'] = DB::table('products')
            ->where('id', 'like', "%$search%")
            ->orWhere('name', 'like', "%$search%")
            ->orWhere('category', 'like', "%$search%")->get()->toArray();
        if ($product['search']){
            if(Auth::guard('customer')->check()){
                $customer_id = Auth::guard('customer')->user()->id;
                $product['cart'] = DB::table('carts')->select('carts.id','carts.customer_id','carts.product_id','carts.count','carts.amount','products.name','products.img_link')
                    ->where('carts.customer_id','=',$customer_id)
                    ->join('products','products.id' ,'=','carts.product_id')
                    ->get()->toArray();
                $product['cart']=array_map(function($item){
                    return (array) $item;
                },$product['cart']);
            }
            $product['search']=array_map(function($item){
                return (array) $item;
            },$product['search']);
            return view('frontend/list_product_seach',['product'=>$product]);
        }

        dd('sdfasdfdasf');

    }


}
