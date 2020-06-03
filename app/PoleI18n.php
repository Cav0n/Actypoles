<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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
}
