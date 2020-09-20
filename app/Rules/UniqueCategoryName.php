<?php

namespace App\Rules;

use App\Admin;
use Illuminate\Contracts\Validation\Rule;

class UniqueCategoryName implements Rule
{
        protected  $fullname;
        protected  $sex;
        protected  $birth;
        protected  $phone;
        protected  $identity_card;
        protected  $address;
        protected  $username;
        protected  $access;
        protected  $password;
    public function __construct($data=[])
    {
        $this->phone = $data['phone'];
        $this->identity_card = $data['identity_card'];
        $this->username = $data['username'];
    }

    public function passes($attribute, $value)
    {
        $admin = Admin::where([
            ['phone', $this->phone],
            ['identity_card', $this->identity_card],
            ['username', $this->username],

        ])->get();

        if ($admin->count()) {
            return false;
        }

        return true;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
