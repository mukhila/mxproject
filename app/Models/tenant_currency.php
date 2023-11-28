<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class tenant_currency extends Model
{
    use HasFactory;

    public function currency():Hasone
    {
         return $this->hasOne(Currency::class,'id','currency_id');
    }
}
