<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TenantUsers extends Model
{
    use HasFactory;
    protected $table = 'tenantusers';
    public function tenant():Hasone
    {
         return $this->hasOne(Tenant::class,'id','tenant_id');
    }
    public function Branch():Hasone
    {
         return $this->hasOne(Branch::class,'id','branch_id');
    }   
    public function User():Hasone
    {
         return $this->hasOne(User::class,'id','user_id');
    }  
}
