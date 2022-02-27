@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.admissionCharge.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.admission-charges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.id') }}
                        </th>
                        <td>
                            {{ $admissionCharge->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.course') }}
                        </th>
                        <td>
                            {{ $admissionCharge->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.code') }}
                        </th>
                        <td>
                            {{ $admissionCharge->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.boys_nr_external') }}
                        </th>
                        <td>
                            {{ $admissionCharge->boys_nr_external }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.boys_nr_internal') }}
                        </th>
                        <td>
                            {{ $admissionCharge->boys_nr_internal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.boys_resident_external') }}
                        </th>
                        <td>
                            {{ $admissionCharge->boys_resident_external }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.boys_resident_internal') }}
                        </th>
                        <td>
                            {{ $admissionCharge->boys_resident_internal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.girls_nr_external') }}
                        </th>
                        <td>
                            {{ $admissionCharge->girls_nr_external }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.girls_nr_internal') }}
                        </th>
                        <td>
                            {{ $admissionCharge->girls_nr_internal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.girls_resident_external') }}
                        </th>
                        <td>
                            {{ $admissionCharge->girls_resident_external }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.girls_resident_internal') }}
                        </th>
                        <td>
                            {{ $admissionCharge->girls_resident_internal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.status') }}
                        </th>
                        <td>
                            {{ $admissionCharge->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admissionCharge.fields.remarks') }}
                        </th>
                        <td>
                            {{ $admissionCharge->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.admission-charges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection