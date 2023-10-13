<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Notifiable;
    protected $guarded = [];

    public function permissions()
    {
    	return $this->belongsToMany('App\Models\Permission');
    }
}
