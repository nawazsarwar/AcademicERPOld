@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.continuationCharge.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.continuation-charges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.id') }}
                        </th>
                        <td>
                            {{ $continuationCharge->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.course') }}
                        </th>
                        <td>
                            {{ $continuationCharge->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.code') }}
                        </th>
                        <td>
                            {{ $continuationCharge->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.nr_total') }}
                        </th>
                        <td>
                            {{ $continuationCharge->nr_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.nr_first_installment') }}
                        </th>
                        <td>
                            {{ $continuationCharge->nr_first_installment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.nr_second_installment') }}
                        </th>
                        <td>
                            {{ $continuationCharge->nr_second_installment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.resident_total') }}
                        </th>
                        <td>
                            {{ $continuationCharge->resident_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.resident_first_installment') }}
                        </th>
                        <td>
                            {{ $continuationCharge->resident_first_installment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.resident_second_installment') }}
                        </th>
                        <td>
                            {{ $continuationCharge->resident_second_installment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.status') }}
                        </th>
                        <td>
                            {{ $continuationCharge->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.continuationCharge.fields.remarks') }}
                        </th>
                        <td>
                            {{ $continuationCharge->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.continuation-charges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection