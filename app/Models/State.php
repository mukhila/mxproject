<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class State extends Model
{
    use HasFactory;
    protected $table = 'state';

    public function country():Hasone
    {
         return $this->hasOne(Country::class,'id','country_id');
    }
}
