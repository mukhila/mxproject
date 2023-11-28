<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class tenant_denomination extends Model
{
    use HasFactory;

    
    public function denominations():Hasone
    {
         return $this->hasOne(Denomination::class,'id','denomination_id');
    }
    public function currencyname()
    {
        return $this->hasOneThrough(Currency::class, Denomination::class,'currency_id','id','id','currency_id',);
    }
}
