<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['session'];

    public function courses()
    {
        return $this->belongsToMany(Session::class, null, null, 'session');
    }
}
