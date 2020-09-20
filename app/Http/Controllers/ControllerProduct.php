<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TypeProduct;
use Carbon\Carbon;

class ControllerProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Product::all()->toArray();
        return view('backend/product/index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeProducts = \App\TypeProduct::all()->toArray();

        return view('backend/product/create',['typeProducts' => $typeProducts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id=$request->input('id_sp');
        $nameproduct=$request->input('nameproduct');
        $type_product_id = $request->input('type_product_id');
        $category =$request->input('category');
        $description=$request->input('description');
        $price= $request->input('price');
        $discount =$request->input('discount');
        $quantity =$request->input('quantity');
        $views = $request->input('views');
        $end_img =$request->file('img_link')->getClientOriginalExtension();
        $img_link =$id.'.'.$end_img;
        $created_at =Carbon::now('Asia/Ho_Chi_Minh');
        if ($request->hasFile('img_link')){
            $file =$request->file('img_link');
            $file->move('img_product',''.$img_link.'');
            $product = new Product();
            $store_save = $product->store_product($id,$nameproduct,$type_product_id,$category,$description,$price,$discount,$quantity,$img_link,$views,$created_at);
            return redirect(route('sanpham-list'))->with('success', 'thêm mới sản phẩm thành công');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = new Product();
        $getProductById = $product->find($id)->toArray();
        $typeProducts = \App\TypeProduct::all()->toArray();
        return view('backend/product/edit',['typeProducts' => $typeProducts ,'getProductById' =>$getProductById] );

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
        $deletedRows = Product::where('id', $id)->delete();
        if ($deletedRows>0){
            return redirect(route('sanpham-list'))->with('success', 'xóa sản phẩm thành công');
        }
        else{
            return redirect()->back()->with('error' ,' xóa sản phẩm thất bại');
        }
    }
}
