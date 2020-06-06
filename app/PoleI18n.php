<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class PoleI18n extends Model
{
    /**
     * Pole of the i18n.
     */
    public function pole()
    {
        return $this->belongsTo('App\Pole');
    }

    public function setLangAttribute($value)
    {
        $this->attributes['lang'] = $value;

        if (null === $value) {
            $this->attributes['lang'] = App::getLocale();
        }
    }

    public static function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|min:2|unique:pole_I18ns',
            'description' => 'required|min:10',
        ]);
    }
}
