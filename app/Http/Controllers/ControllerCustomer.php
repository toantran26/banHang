<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class ControllerCustomer extends Controller
{
    public function index()
    {
        $khachHangList = \App\Customer::all()->toArray();
        return view('backend/customer/index', ['khachHangList' => $khachHangList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend/customer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            return redirect(route('khachhang-list'))->with('success', 'thêm mới Khách hàng thành công');
        }
        return redirect()->back()->withInput()->withErrors($validation);

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
        $customer = new Customer();
        $getCustomerId = $customer->find($id)->toArray();
        return view('backend/customer/edit')->with('getCustomerId', $getCustomerId);
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
        $fullName = $request->input('fullname');
        $sex = $request->input('sex');
        $birth= $request->input('birth');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $userName = $request->input('username');
        $password = Hash::make($request->input('password'));
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
