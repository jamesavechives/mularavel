<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    //
    protected $fillable = [
        'site_name','name','reseller_id', 'menus', 'description','theme','logo',
    ];
}
