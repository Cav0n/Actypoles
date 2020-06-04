<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    const PASSWORD_REGEX = '^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8}$';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getFirstnameAttribute($value) {
        return ucfirst($value);
    }

    public function getLastnameAttribute($value) {
        return strtoupper($value);
    }

    public static function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email:filter|unique:users',
            'password' => 'required|confirmed|regex:/'.self::PASSWORD_REGEX.'/i'
        ]);
    }

    public static function validatorPersonalInformations(Request $request)
    {
        return Validator::make($request->all(), [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
        ]);
    }

    public static function validatorNewPassword(Request $request)
    {
        return Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|confirmed|regex:/'.self::PASSWORD_REGEX.'/i',
        ]);
    }
}
