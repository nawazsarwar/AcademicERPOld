@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paper.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.papers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.id') }}
                        </th>
                        <td>
                            {{ $paper->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.code') }}
                        </th>
                        <td>
                            {{ $paper->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.title') }}
                        </th>
                        <td>
                            {{ $paper->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.paper_type') }}
                        </th>
                        <td>
                            {{ $paper->paper_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.fraction') }}
                        </th>
                        <td>
                            {{ $paper->fraction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.teaching_status') }}
                        </th>
                        <td>
                            {{ App\Models\Paper::TEACHING_STATUS_SELECT[$paper->teaching_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.credits') }}
                        </th>
                        <td>
                            {{ $paper->credits }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.status') }}
                        </th>
                        <td>
                            {{ $paper->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.remarks') }}
                        </th>
                        <td>
                            {{ $paper->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.administrable') }}
                        </th>
                        <td>
                            {{ $paper->administrable->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paper.fields.administrable_type') }}
                        </th>
                        <td>
                            {{ $paper->administrable_type }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.papers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection