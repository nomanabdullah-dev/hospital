<?php


namespace App\Repositories;

use App\Interfaces\CountryInterface;
use App\Models\Country;


class SpecialityRepository extends BaseRepository implements SpecialityInterface
{
    public function __construct(Country $country)
    {
        $this->model = $country;
    }
}
