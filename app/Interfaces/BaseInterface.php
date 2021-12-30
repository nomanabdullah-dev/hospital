<?php


namespace App\Interfaces;


interface BaseInterface
{
    public function datatable(array $parameter = null);

    public function deletedDatatable(array $parameter = null);

    public function query();

    public function pluck(array $where_array = null);

    public function get(array $where_array = null);

    public function selectRawPluck(array $params = null);

    public function find($id);

    public function all();

    public function create(object $data, array $parameters = null);

    public function update($id, object $data, array $parameters = null);

    public function delete($id, array $relations = null);

    public function forceDelete($id, array $relations = null);

    public function restore($id, array $relations = null);

    public function with(array $array);

    public function status($id);

    public function multipleDelete(object $data);

    public function multipleRestore(object $data);
}
