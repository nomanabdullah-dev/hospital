<?php


namespace App\Repositories;

use App\Models\Speciality;
use App\Interfaces\SpecialityInterface;

class SpecialityRepository extends BaseRepository implements SpecialityInterface
{
    public function __construct(Speciality $speciality)
    {
        $this->model = $speciality;
    }
}
