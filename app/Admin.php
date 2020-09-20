<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class Admin extends Model implements AuthenticatableContract
{
    use Notifiable;
    use Authenticatable;
    protected $table = 'admins';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function store_save($fullName, $sex, $birth, $phone, $identity_card, $address, $userName, $access, $password)
    {
        $nhanVien = new Admin();
        $nhanVien->fullname = $fullName;
        $nhanVien->sex = $sex;
        $nhanVien->birth = $birth;
        $nhanVien->phone = $phone;
        $nhanVien->identity_card = $identity_card;
        $nhanVien->address = $address;
        $nhanVien->username = $userName;
        $nhanVien->access = $access;
        $nhanVien->password = $password;
        return $nhanVien->save();
    }
    public function updateSave($id,$fullName, $sex, $birth, $phone, $identity_card, $address, $userName, $access, $password)
    {
        return DB::table('admins')->where('id' ,$id)->update(
          array('fullname'=>''.$fullName.'','sex'=>''.$sex.'','birth'=>''.$birth.'',
              'phone'=>''.$phone.'','identity_card'=>''.$identity_card.'','address'=>''.$address.'','username'=>''.$userName.'',
              'access'=>''.$access.'','password'=>''.$password.''
              )
        );
    }

    public static function rolesUpdate($id)
    {
        return array(
            'fullname'           =>'required',
            'sex'                => 'required',
            'birth'              =>'required',
            'phone'              => 'required|unique:admins,phone,'. $id,
            'identity_card'      => 'required|unique:admins,identity_card,'. $id,
            'username'           => 'required|unique:admins,username,' . $id,
            'password'           =>'required',
            'address'            =>'required',
            'access'             =>'required',
        );
    }
    public static function rolesStore($phone ,$identity_card,$username)
    {
        return array(
            'fullname'           =>'required',
            'sex'                => 'required',
            'birth'              =>'required',
            'phone'              =>Rule::unique('admins')->where(function ($query) use ($phone) {
                    return $query->where('phone', $phone);
                }),
            'identity_card'      =>  Rule::unique('admins')->where(function ($query) use ($identity_card) {
                    return $query->where('identity_card', $identity_card);
                }),
            'username'           =>  Rule::unique('admins')->where(function ($query) use ($username) {
                    return $query->where('username', $username);
                }),
            'password'           =>'required',
            'address'            =>'required',
            'access'             =>'required',
        );
    }
    public static function  mssg(){
        return array(
            'fullname.required' =>'họ và tên không được để trống',
            'sex.required'      =>'bạn chưa chọn giới tính',
            'birth.required'    =>'bạn chưa chọn ngày tháng năm sinh',
            'phone.unique'=>'số điện thoại của bạn bị trùng ',
            'phone.required'=>'số điện thoại không được để trống ',
            'identity_card.unique'=>'số chứng minh của bạn bị trùng ',
            'identity_card.required'=>'Số chứng minh không được để trống ',
            'username.unique'=>'Tên đăng nhập đã được sử dụng',
            'username.required'=>'Tên đăng nhập không được để trống ',
            'password.required' =>'mật khẩu không được để trống',
            'address.required' =>'địa chỉ không được để trống',
            'access.required' =>'bạn chưa chọn quyền cho tài khoản',
        );
    }


}
