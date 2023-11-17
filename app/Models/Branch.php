<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branch';

    public function tenant():Hasone
    {
         return $this->hasOne(Tenant::class,'id','tenant_id');
    }
}
