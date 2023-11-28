<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class tenant_denomination extends Model
{
    use HasFactory;

    
    public function denomination():Hasone
    {
         return $this->hasOne(Denomination::class,'id','denomination_id');
    }

    public function currency():Hasone
    {
         return $this->hasOne(Currency::class,'id','currency_id');
    }
}
