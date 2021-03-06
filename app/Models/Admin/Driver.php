<?php

namespace App\Models\Admin;

use App\Models\Traits\Tenantable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Driver extends Model
{
    use HasFactory;
    use Tenantable;
    use HasRoles;

    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

}
