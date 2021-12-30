<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecialityRequest;
use App\Interfaces\SpecialityInterface;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    protected $speciality;

    public function __construct(SpecialityInterface $speciality)
    {
        $this->speciality = $speciality;
        $this->middleware('auth');
    }

    protected function path(string $link)
    {
        return "admin.speciality.{$link}";
    }

    public function index()
    {
        if(request()->ajax()){
            return $this->speciality->datatable();
        }
        return view($this->path('index'));
    }

    public function deletedListIndex()
    {
        if (request()->ajax()){
            return $this->speciality->deletedDatatable();
        }
    }

    public function create()
    {
        $data['specialities'] = $this->speciality->pluck();
        return view($this->path('create'))->with($data);
    }

    public function store(specialityRequest $request)
    {
        return $this->speciality->create($request);
    }

    public function show(speciality $speciality)
    {
        //
    }

    public function edit(speciality $speciality)
    {
        $data['speciality'] = $speciality;
        $data['specialities'] = $this->speciality->pluck();
        return view($this->path('edit'))->with($data);
    }

    public function update(SpecialityRequest $request, Speciality $speciality)
    {
        return $this->speciality->update($speciality->id,$request);
    }

    public function destroy(Speciality $speciality)
    {
        return $this->speciality->delete($speciality->id);
    }

    public function restore($id)
    {
        return $this->speciality->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->speciality->forceDelete($id);
    }

    public function status(Request $request)
    {
        return $this->speciality->status($request->id);
    }
}
