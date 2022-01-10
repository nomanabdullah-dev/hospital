@extends('admin.layouts.master')

@section('title') @lang('common.edit',['model' => trans('speciality.speciality')]) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1_link'){{route('speciality.index')}}@endslot
        @slot('li_1')@lang('common.index',['model' => trans('speciality.speciality')])@endslot
        @slot('li_2')@lang('common.edit',['model' => trans('speciality.speciality')])@endslot
        @slot('title')@lang('common.edit',['model' => trans('speciality.speciality')])@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($speciality,['url' => route('speciality.update',$speciality->id), 'method' => 'patch','class' => 'custom-validation']) }}
                        @include('admin.speciality.form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection


