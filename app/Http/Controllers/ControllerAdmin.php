<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class ControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getLogin(){
        return view('backend/login');
    }
    public function postLogin(Request $request)
    {
        $rule = [
            'username' => 'required',
            'password' => 'required'
        ];
        $mssg = [
            'username.required' => 'usernam  không được để trống',
            'password.required' => 'mật khẩu không được để trống ',
        ];
        $validator = Validator::make($request->all(), $rule, $mssg);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $username = $request->input('username');
            $password = $request->input('password');
            if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
                $_SESSION['admin'] = $username;
                return redirect(route('khachhang-list'))->with('success', 'đăng nhập  thành công');
            } else {
                Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
                return redirect('admin/login');
            }
            return redirect('admin/login');
        }
    }
    public function getLogout(){
        Auth::guard('admin')->logout();
        return redirect(route('login-get'))->with('success', 'đăng xuất  thành công');
    }
    public function index()
    {
        $nhanvienList = \App\Admin::all()->toArray();
        return view('backend/nhanvien/index', ['nhanvienList' => $nhanvienList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend/nhanvien/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Admin  $admin)
    {
        $fullName = $request->input('fullname');
        $sex = $request->input('sex');
        $birth= $request->input('birth');
        $phone = $request->input('phone');
        $identity_card = $request->input('identity_card');
        $address = $request->input('address');
        $userName = $request->input('username');
        $password = Hash::make($request->input('password'));
        $access = $request->input('access');
        $admin = Admin::all();
        $validation = Validator::make($request->all(), Admin::rolesStore($phone,$identity_card,$userName) ,Admin::mssg());
        if ($validation->passes())
        {
            $admin = new  Admin();
            $store_save = $admin->store_save($fullName,$sex ,$birth ,$phone ,$identity_card ,$address ,$userName,$access,$password);
            return redirect(route('nhanvien-list'))->with('success', 'thêm mới nhân viên thành công');
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
        $nhanvien = new Admin();
        $getNhanVienById = $nhanvien->find($id)->toArray();
        return view('backend/nhanvien/edit')->with('getNhanVienById', $getNhanVienById);
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
        $identity_card = $request->input('identity_card');
        $address = $request->input('address');
        $userName = $request->input('username');
        $password = Hash::make($request->input('password'));
        $access = $request->input('access');
        $admin = Admin::find($id);
        $validation = Validator::make($request->all(), Admin::rolesUpdate($admin->id) ,Admin::mssg());

        if ($validation->passes())
        {

            $update = $admin->updateSave($id,$fullName,$sex ,$birth ,$phone ,$identity_card ,$address ,$userName,$access,$password);
            Session::flash('success', 'sửa thành công');
            return Redirect(route('nhanvien-list'));
        }

        return redirect()->back()->withInput()->withErrors($validation);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedRows = Admin::where('id', $id)->delete();
        if ($deletedRows>0){
            return redirect(route('nhanvien-list'))->with('success', 'xóa  nhân viên thành công');
        }
        else{
            return redirect()->back()->with('error' ,' xóa Nhân viên thất bại');
        }

    }
}
