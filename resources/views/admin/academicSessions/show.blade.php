@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.academicSession.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.academic-sessions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.academicSession.fields.id') }}
                        </th>
                        <td>
                            {{ $academicSession->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicSession.fields.name') }}
                        </th>
                        <td>
                            {{ $academicSession->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicSession.fields.sequence') }}
                        </th>
                        <td>
                            {{ $academicSession->sequence }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicSession.fields.status') }}
                        </th>
                        <td>
                            {{ $academicSession->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicSession.fields.remarks') }}
                        </th>
                        <td>
                            {{ $academicSession->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.academic-sessions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection