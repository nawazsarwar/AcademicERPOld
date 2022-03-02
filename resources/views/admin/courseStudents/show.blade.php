@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseStudent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.id') }}
                        </th>
                        <td>
                            {{ $courseStudent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.course') }}
                        </th>
                        <td>
                            {{ $courseStudent->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.user') }}
                        </th>
                        <td>
                            {{ $courseStudent->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.student') }}
                        </th>
                        <td>
                            {{ $courseStudent->student->enrolment_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.faculty_no') }}
                        </th>
                        <td>
                            {{ $courseStudent->faculty_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.session_admitted') }}
                        </th>
                        <td>
                            {{ $courseStudent->session_admitted->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.admitted_on') }}
                        </th>
                        <td>
                            {{ $courseStudent->admitted_on }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.duration_extension') }}
                        </th>
                        <td>
                            {{ $courseStudent->duration_extension }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.verification_status') }}
                        </th>
                        <td>
                            {{ $courseStudent->verification_status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.verified_by') }}
                        </th>
                        <td>
                            {{ $courseStudent->verified_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.verified_at') }}
                        </th>
                        <td>
                            {{ $courseStudent->verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.verification_remark') }}
                        </th>
                        <td>
                            {{ $courseStudent->verification_remark }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.status') }}
                        </th>
                        <td>
                            {{ $courseStudent->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.remarks') }}
                        </th>
                        <td>
                            {{ $courseStudent->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection