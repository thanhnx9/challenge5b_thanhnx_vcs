<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Users
 * @package App\Models
 * @version February 6, 2021, 3:08 am UTC
 *
 * @property string $userName
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $image
 * @property integer $role_id
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 */
class Users extends Authenticatable
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'userName',
        'name',
        'phone',
        'email',
        'image',
        'role_id',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'userName' => 'string',
        'name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'image' => 'string',
        'role_id' => 'integer',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'userName' => 'required|string|max:255',
        'name' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'image' => 'nullable|string|max:255',
        'role_id' => 'nullable|integer',
        'email_verified_at' => 'nullable',
        'password' => 'nullable|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
