<?php

namespace App\Models;

use App\Models\Admin\Tenant;
use App\Models\Traits\Tenantable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Tenantable;
    use HasRoles;
    use HasApiTokens;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'cnh',
        'validityCnh',
        'mopp',
        'moppNumber',
        'tenant_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //Direciona a imagem do perfil do usuário
    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300'; 
    }

    //Subscreve o cargo do usuário logo abaixo da foto
    public function adminlte_desc()
    {
        return 'Super Admin';
    }

    //Libera atalho de ajustes do perfil de usuário
    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
