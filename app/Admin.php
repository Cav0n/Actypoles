<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class Admin extends Model
{
    const PASSWORD_REGEX = '^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8}$';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'nickname', 'email', 'password',
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
            'nickname' => 'required|min:4|unique:admins',
            'email' => 'required|email:filter|unique:admins',
            'password' => 'required|confirmed|regex:/'.self::PASSWORD_REGEX.'/i'
        ]);
    }

    public static function check(\Illuminate\Http\Request $request): bool
    {
        if (! $request->session()->has('admin')) {
            return false;
        }

        $admin = $request->session()->get('admin');

        if (! Admin::where('id', $admin->id)->where('sessionToken', $admin->sessionToken)->exists()) {
            return false;
        }

        return true;
    }
}
