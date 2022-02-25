@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.nominee.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.nominees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $nominee->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $nominee->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $nominee->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.relationship') }}
                                    </th>
                                    <td>
                                        {{ $nominee->relationship }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.age') }}
                                    </th>
                                    <td>
                                        {{ $nominee->age }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.witness_name_1') }}
                                    </th>
                                    <td>
                                        {{ $nominee->witness_name_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.designation_witness_1') }}
                                    </th>
                                    <td>
                                        {{ $nominee->designation_witness_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.department_witness_1') }}
                                    </th>
                                    <td>
                                        {{ $nominee->department_witness_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.witness_name_2') }}
                                    </th>
                                    <td>
                                        {{ $nominee->witness_name_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.designation_witness_2') }}
                                    </th>
                                    <td>
                                        {{ $nominee->designation_witness_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.department_witness_2') }}
                                    </th>
                                    <td>
                                        {{ $nominee->department_witness_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.employee') }}
                                    </th>
                                    <td>
                                        {{ $nominee->employee->employee_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $nominee->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $nominee->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.nominees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection