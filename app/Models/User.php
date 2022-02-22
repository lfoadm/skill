<?php

namespace App\Models;

use App\Models\Admin\Tenant;
use App\Models\Traits\Tenantable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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
        //return 'https://picsum.photos/300/300'; 
        $path = Auth::user()->profile_photo_path;
        //dd($path);
        if ($path)
        {
            return url('storage/'.$path);
        }
        else
        {
            return url('storage/profile-photos/user.png');
        }
    }

    //Subscreve o cargo do usuário logo abaixo da foto
    public function adminlte_desc()
    {
        $user = Auth::user();
        if( $user->HasRole('motorista'))
        {return 'Motorista';}
        elseif( $user->HasRole('secretaria'))
        {return 'Secretária (o)';}
        elseif( $user->HasRole('gerente'))
        {return 'Gerente';}
        elseif( $user->HasRole('admin'))
        {return 'Administrador do sistema';}
        elseif( $user->HasRole('superadmin'))
        {return 'Super Admin';}
        else
        {return 'Não atribuído';}
    }

    //Libera atalho de ajustes do perfil de usuário
    public function adminlte_profile_url()
    {
        //return 'profile/username';
        return 'user/profile';
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
