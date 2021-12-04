@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qualification.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qualifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.id') }}
                        </th>
                        <td>
                            {{ $qualification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.user') }}
                        </th>
                        <td>
                            {{ $qualification->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.qualification_level') }}
                        </th>
                        <td>
                            {{ $qualification->qualification_level->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.name') }}
                        </th>
                        <td>
                            {{ $qualification->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.year') }}
                        </th>
                        <td>
                            {{ $qualification->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.roll_no') }}
                        </th>
                        <td>
                            {{ $qualification->roll_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.board') }}
                        </th>
                        <td>
                            {{ $qualification->board->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.result') }}
                        </th>
                        <td>
                            {{ $qualification->result }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.percentage') }}
                        </th>
                        <td>
                            {{ $qualification->percentage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.cdn_url') }}
                        </th>
                        <td>
                            {{ $qualification->cdn_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.status') }}
                        </th>
                        <td>
                            {{ $qualification->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualification.fields.remarks') }}
                        </th>
                        <td>
                            {{ $qualification->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qualifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection