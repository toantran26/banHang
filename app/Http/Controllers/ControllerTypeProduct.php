<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProduct;
use Illuminate\Support\Facades\Validator;


class ControllerTypeProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeProducts = \App\TypeProduct::all()->toArray();
        return view('backend/typeproduct/index', ['typeProducts' => $typeProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend/typeproduct/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name_type_product = strtoupper($request->input('nametypeproduct'));
        $quantity=$request->input('quantity');
        $rule = [
            'nametypeproduct' => 'required',
        ];
        $mssg = [
            'nametypeproduct.required' => 'tên hãng  không được để trống',

        ];
        $validator = Validator::make($request->all(), $rule, $mssg);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $typeProduct = new TypeProduct();
            $typeProduct->name_type_product=$name_type_product;
            $typeProduct->save();
            return redirect(route('loai-sanpham-list'))->with('success', 'thêm mới loại sản phẩm thành công');
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
}
