<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenant';
    
    public function tenantusers():HasManyThrough
    {
        return $this->hasManyThrough(User::class, userid, id);
    }
}
