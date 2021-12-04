@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hall.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.halls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hall.fields.id') }}
                        </th>
                        <td>
                            {{ $hall->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hall.fields.code') }}
                        </th>
                        <td>
                            {{ $hall->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hall.fields.name') }}
                        </th>
                        <td>
                            {{ $hall->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hall.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Hall::GENDER_SELECT[$hall->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hall.fields.campus') }}
                        </th>
                        <td>
                            {{ $hall->campus->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hall.fields.color') }}
                        </th>
                        <td>
                            {{ $hall->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hall.fields.status') }}
                        </th>
                        <td>
                            {{ $hall->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hall.fields.remarks') }}
                        </th>
                        <td>
                            {{ $hall->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.halls.index') }}">
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
            <a class="nav-link" href="#hall_hostels" role="tab" data-toggle="tab">
                {{ trans('cruds.hostel.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="hall_hostels">
            @includeIf('admin.halls.relationships.hallHostels', ['hostels' => $hall->hallHostels])
        </div>
    </div>
</div>

@endsection