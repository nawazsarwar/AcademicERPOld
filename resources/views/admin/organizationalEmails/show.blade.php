@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.organizationalEmail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizational-emails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.id') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.user') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.email') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\OrganizationalEmail::TYPE_SELECT[$organizationalEmail->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.alias') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->alias }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.first_password') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->first_password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.avatar_url') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->avatar_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.recovery_email') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->recovery_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.recovery_phone') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->recovery_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.gender') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.office_365') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->office_365 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.office_365_uid') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->office_365_uid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.office_365_object_uid') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->office_365_object_uid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.office_365_deployed_at') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->office_365_deployed_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.gsuite') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->gsuite }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.gsuite_uid') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->gsuite_uid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.gsuite_deployed_at') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->gsuite_deployed_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizationalEmail.fields.remarks') }}
                        </th>
                        <td>
                            {{ $organizationalEmail->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizational-emails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection