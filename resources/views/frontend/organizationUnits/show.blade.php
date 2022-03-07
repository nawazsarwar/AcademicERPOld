@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.organizationUnit.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.organization-units.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organizationUnit.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $organizationUnit->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organizationUnit.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $organizationUnit->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organizationUnit.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $organizationUnit->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organizationUnit.fields.title_hindi') }}
                                    </th>
                                    <td>
                                        {{ $organizationUnit->title_hindi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organizationUnit.fields.title_urdu') }}
                                    </th>
                                    <td>
                                        {{ $organizationUnit->title_urdu }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organizationUnit.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $organizationUnit->category }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organizationUnit.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $organizationUnit->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organizationUnit.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $organizationUnit->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.organization-units.index') }}">
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