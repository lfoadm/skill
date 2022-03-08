<?php

namespace App\Models\Master;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discharges extends Model
{
    use HasFactory;
    use Tenantable;

    protected $guarded = ['id'];

    public function loading()
    {
        return $this->belongsTo(Loading::class);
    }
}
