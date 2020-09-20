<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class Customer extends Model implements AuthenticatableContract
{
    use Notifiable;
    use Authenticatable;
    protected $table='customers';
    protected $primaryKey='id';
    public $timestamps = false;
    public function storeCustomer($fullName, $sex, $birth, $phone, $email, $address, $userName, $password)
    {
        $customer = new Customer();
        $customer->fullname = $fullName;
        $customer->sex = $sex;
        $customer->birth = $birth;
        $customer->phone = $phone;
        $customer->email = $email;
        $customer->address = $address;
        $customer->username = $userName;
        $customer->password = $password;
        return $customer->save();
    }
    public function updateCustomer($id,$fullName, $sex, $birth, $phone, $email, $address, $userName, $password)
    {
        return DB::table('customers')->where('id' ,$id)->update(
            array('fullname'=>''.$fullName.'','sex'=>''.$sex.'','birth'=>''.$birth.'',
                'phone'=>''.$phone.'','email'=>''.$email.'','address'=>''.$address.'',
                'username'=>''.$userName.'', 'password'=>''.$password.'')
        );
    }

    public static function rolesUpdateCustomer($id)
    {
        return array(
            'fullname'           =>'required',
            'sex'                => 'required',
            'birth'              =>'required',
            'phone'              => 'required|unique:customer,phone,'. $id,
            'email'      => 'required|unique:customer,email,'. $id,
            'username'           => 'required|unique:customer,username,' . $id,
            'password'           =>'required',
            'address'            =>'required',

        );
    }
    public static function rolesStoreCustomer($phone ,$email,$username)
    {
        return array(
            'fullname'           =>'required',
            'sex'                => 'required',
            'birth'              =>'required',
            'phone'              =>Rule::unique('customers')->where(function ($query) use ($phone) {
                return $query->where('phone', $phone);
            }),
            'email'      =>  Rule::unique('customers')->where(function ($query) use ($email) {
                return $query->where('email', $email);
            }),
            'username'           =>  Rule::unique('customers')->where(function ($query) use ($username) {
                return $query->where('username', $username);
            }),
            'password'           =>'required',
            'address'            =>'required',
        );
    }
    public static function  mssg(){
        return array(
            'fullname.require' =>'họ và tên không được để trống',
            'sex.require'      =>'bạn chưa chọn giới tính',
            'birth.require'    =>'bạn chưa chọn ngày tháng năm sinh',
            'phone.unique'=>'số điện thoại của bạn bị trùng ',
            'phone.required'=>'số điện thoại không được để trống ',
            'email.unique'=>'email của bạn đã được sử dụng ',
            'email.required'=>'email không được để trống ',
            'username.unique' =>'Tên đăng nhập của bạn đã được sử dụng ',
            'username.required'=>'tên đăng nhập  không được để trống ',
            'password.required' =>'mật khẩu không được để trống',
            'address.require' =>'địa chỉ không được để trống',
        );
    }

}
