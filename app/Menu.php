<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'permission_id','name','uri', 'display_name', 'description','is_able','cat','icon','sort',
    ];
}
