<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class tenant_denomination extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    public function denominations():Hasone
    {
         return $this->hasOne(Denomination::class,'id','denomination_id');
    }
    /*public function currencyname()
    {
        return $this->hasOneThrough(Currency::class, Denomination::class,'currency_id','id','id','currency_id',);
    }*/

    public function currency():Hasone
    {
         return $this->hasOne(Currency::class,'id','currency_id');
    }
}
