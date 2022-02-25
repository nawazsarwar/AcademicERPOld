@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.hostel.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.hostels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hostel.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $hostel->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hostel.fields.hall') }}
                                    </th>
                                    <td>
                                        {{ $hostel->hall->code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hostel.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $hostel->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hostel.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $hostel->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hostel.fields.residential_status') }}
                                    </th>
                                    <td>
                                        {{ $hostel->residential_status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hostel.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $hostel->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hostel.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $hostel->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.hostels.index') }}">
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