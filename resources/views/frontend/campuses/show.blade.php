@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.campus.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.campuses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campus.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $campus->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campus.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $campus->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campus.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $campus->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campus.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $campus->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campus.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $campus->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.campuses.index') }}">
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