<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    public $timestamps = false;

    public function orderSave($product_id,$customer_id,$stastus,$customer_fullname, $customer_email,$customer_phone,$address,$count,$amount,$message,$created_at){
        $order = new Order();
            $order->product_id=$product_id;
            $order->customer_id=$customer_id;
            $order->stastus=$stastus;
            $order->customer_fullname=$customer_fullname;
            $order->customer_email=$customer_email;
            $order->customer_phone=$customer_phone;
            $order->address=$address;
            $order->count=$count;
            $order->amount=$amount;
            $order->message=$message;
            $order->created_at=$created_at;
           return $order->save();
    }
}
