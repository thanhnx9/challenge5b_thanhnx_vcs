<?php

namespace App\Repositories;

use App\Models\Solution;
use App\Models\Task;
use App\Models\Users;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version February 6, 2021, 3:08 am UTC
 */

class SolutionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'task_name',
        'student_name'
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
        return Solution::class;
    }

}
