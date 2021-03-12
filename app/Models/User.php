<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userName',
        'name',
        'phone',
        'email',
        'image',
        'role_id',
        'email_verified_at',
        'password',
        'remember_token',
        'google2fa_secret',
        'fb_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo(Roles::class);
    }
//    public function setGoogle2faSecretAttribute($value)
//    {
//        $this->attributes['google2fa_secret'] = encrypt($value);
//    }
//
//
//    public function getGoogle2faSecretAttribute($value)
//    {
//        return decrypt($value);
//    }


}
