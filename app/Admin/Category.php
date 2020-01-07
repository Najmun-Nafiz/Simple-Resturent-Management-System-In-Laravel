<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function item()
    {
    	return $this->hasMany('App\Admin\Item');
    }
}
