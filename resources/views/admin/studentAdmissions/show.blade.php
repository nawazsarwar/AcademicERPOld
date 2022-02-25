@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.studentAdmission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.student-admissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.studentAdmission.fields.id') }}
                        </th>
                        <td>
                            {{ $studentAdmission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentAdmission.fields.roll_no') }}
                        </th>
                        <td>
                            {{ $studentAdmission->roll_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentAdmission.fields.application_no') }}
                        </th>
                        <td>
                            {{ $studentAdmission->application_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentAdmission.fields.course') }}
                        </th>
                        <td>
                            {{ $studentAdmission->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentAdmission.fields.enrolment') }}
                        </th>
                        <td>
                            {{ $studentAdmission->enrolment->number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentAdmission.fields.faculty_no') }}
                        </th>
                        <td>
                            {{ $studentAdmission->faculty_no }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.student-admissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection