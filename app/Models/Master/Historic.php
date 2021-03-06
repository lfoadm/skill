<?php

namespace App\Models\Master;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    use HasFactory;
    use Tenantable;

    protected $guarded = ['id'];

}
