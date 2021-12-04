@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.campus.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.campuses.index') }}">
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
                <a class="btn btn-default" href="{{ route('admin.campuses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#campus_halls" role="tab" data-toggle="tab">
                {{ trans('cruds.hall.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="campus_halls">
            @includeIf('admin.campuses.relationships.campusHalls', ['halls' => $campus->campusHalls])
        </div>
    </div>
</div>

@endsection