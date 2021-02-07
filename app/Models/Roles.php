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
class Roles extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'roles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $primaryKey='role_id';


    public $fillable = [
        'role_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'role_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role_name' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
