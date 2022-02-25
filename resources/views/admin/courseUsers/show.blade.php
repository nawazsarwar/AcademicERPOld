@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseUser.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.id') }}
                        </th>
                        <td>
                            {{ $courseUser->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.course') }}
                        </th>
                        <td>
                            {{ $courseUser->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.user') }}
                        </th>
                        <td>
                            {{ $courseUser->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.faculty_no') }}
                        </th>
                        <td>
                            {{ $courseUser->faculty_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.admitted_in') }}
                        </th>
                        <td>
                            {{ $courseUser->admitted_in->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.admitted_on') }}
                        </th>
                        <td>
                            {{ $courseUser->admitted_on }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.duration_extension') }}
                        </th>
                        <td>
                            {{ $courseUser->duration_extension }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.verification_status') }}
                        </th>
                        <td>
                            {{ $courseUser->verification_status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.verified_by') }}
                        </th>
                        <td>
                            {{ $courseUser->verified_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.verified_at') }}
                        </th>
                        <td>
                            {{ $courseUser->verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.verification_remark') }}
                        </th>
                        <td>
                            {{ $courseUser->verification_remark }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.status') }}
                        </th>
                        <td>
                            {{ $courseUser->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseUser.fields.remarks') }}
                        </th>
                        <td>
                            {{ $courseUser->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection