<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Pole extends Model
{
    /**
     * PoleI18ns that belong to the pole.
     */
    public function i18ns()
    {
        return $this->hasMany('App\PoleI18n');
    }

    public function getTitleAttribute()
    {
        $lang = strtoupper(App::getLocale());

        return $this->i18ns()->where('lang', $lang)->first()->title;
    }

    public function getDescriptionAttribute()
    {
        $lang = strtoupper(App::getLocale());

        return $this->i18ns()->where('lang', $lang)->first()->description;
    }


}
