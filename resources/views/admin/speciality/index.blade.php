@extends('admin.layouts.master')

@section('title') @lang('common.index',['model' => trans('speciality.speciality')]) @endsection

@section('thead')
    <tr>
        <th width="5%">#</th>
        <th>@lang('common.title',['model' => trans('speciality.speciality')])</th>
        <th>@lang('speciality.code')</th>
        <th width="5%">@lang('common.status',['model' => trans('speciality.speciality')])</th>
        <th width="12%">@lang('common.action',['model' => trans('speciality.speciality')])</th>
    </tr>
@endsection


@section('content')

    @component('components.breadcrumb')
        @slot('title')@lang('common.index',['model' => trans('speciality.speciality')])@endslot
        @slot('create_button')
            <a href="{{route('admin.speciality.create')}}" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fa fa-plus-circle"></i> @lang('common.create',['model' => trans('speciality.speciality')])
            </a>
        @endslot
    @endcomponent

    <ul class="nav nav-tabs" id="Tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-primary" id="all_btn_tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">@lang('common.index_list',['model' => trans('speciality.speciality')])</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-primary" id="deleted_btn_tab" data-bs-toggle="tab" data-bs-target="#deleted_list" type="button" role="tab" aria-controls="deleted_list" aria-selected="false">@lang('common.deleted_list',['model' => trans('speciality.speciality')])</button>
        </li>
    </ul>

    <div class="tab-content" id="TabContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered table-hover dt-responsive nowrap w-100">
                                <thead class="thead-dark">
                                    @yield('thead')
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="deleted_list" role="tabpanel" aria-labelledby="deleted_list_tab">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="deleted_list_datatable" class="table table-bordered table-hover dt-responsive nowrap w-100">
                                <thead class="thead-dark">
                                    @yield('thead')
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        let datatable_columns = [
            {data: 'DT_RowIndex',name:"DT_RowIndex", orderable: false, searchable: false},
            {data: 'title',name: 'title',},
            {data: 'code',name: 'code',},
            {data: 'status',name: 'status',},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]

        let datatable_columns_defs = [
            {'bSortable': true, 'aTargets': [0,1,2,3]},
            {'bSearchable': false, 'aTargets': [0]},
            { className: 'text-center', targets: [0,2,3,4] },
        ]
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 25,
            serverMethod: 'get',
            lengthMenu: [10, 25, 50,100],
            order: [ 0, "asc" ],
            language: {
                'loadingRecords': '&nbsp;',
                'processing': 'Loading ...'
            },
            ajax: {
                url: '{{ route('admin.speciality.index') }}',
                type: 'get',
                dataType: 'JSON',
                cache: true,
            },
            columns: datatable_columns,
            search: {
                "regex": true
            },
            columnDefs: datatable_columns_defs,
        });

        function statusChange(id){
            statusUpdate(id, '{{route('admin.speciality.status')}}')
        }
    </script>
    @include('components.delete_script')
@endsection
