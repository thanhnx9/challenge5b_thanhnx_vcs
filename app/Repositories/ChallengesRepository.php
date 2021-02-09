<?php

namespace App\Repositories;

use App\Models\Challenges;
use App\Models\Classes;
use App\Models\Messages;
use App\Repositories\BaseRepository;

/**
 * Class ClassesRepository
 * @package App\Repositories
 * @version February 5, 2021, 6:30 pm UTC
 */

class ChallengesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'filename',
        'suggest'
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
        return Challenges::class;
    }
    public function getChallenge($name){
        return Challenges::where(['filename' => $name])->orderBy('created_at', 'asc')->first();
        // return Messages::where('sender',$name)->get();
    }
}
