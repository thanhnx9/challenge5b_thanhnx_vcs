<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Roles
 * @package App\Models
 * @version February 6, 2021, 3:47 am UTC
 *
 * @property string $role_name
 */
class Messages extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'messages';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sender', 'receiver','message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sender' => 'string',
        'receiver' => 'string',
        'message'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sender' => 'required|string|max:255',
        'receiver'=>'required|string|max:255',
        'message'=>'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

}
