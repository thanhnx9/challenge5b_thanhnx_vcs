<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version February 6, 2021, 3:08 am UTC
*/

class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Users::class;
    }

    public function getuserbyRoleid($role_id){
        return Users::where(['role_id' => $role_id])->orderBy('name', 'asc')->get();
    }
}
