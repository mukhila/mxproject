<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Exchange_Rate extends Model
{
    use HasFactory;

    public function currency():Hasone
    {
         return $this->hasOne(Currency::class,'id','currency_id');
    }

    public function denominations():Hasone
    {
         return $this->hasOne(Denomination::class,'id','denomination_id');
    }

    public function branch():Hasone
    {
         return $this->hasOne(Branch::class,'id','tenant_id');
    }
    public function tenant_denominations():Hasone
    {
        return $this->hasOne(tenant_denomination::class,'id','tenant_denomination_id');
    }
}
