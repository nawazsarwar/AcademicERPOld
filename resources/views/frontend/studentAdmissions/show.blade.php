@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.studentAdmission.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.student-admissions.index') }}">
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
                                <tr>
                                    <th>
                                        {{ trans('cruds.studentAdmission.fields.session') }}
                                    </th>
                                    <td>
                                        {{ $studentAdmission->session->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.studentAdmission.fields.admission_date') }}
                                    </th>
                                    <td>
                                        {{ $studentAdmission->admission_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.studentAdmission.fields.counselling_data') }}
                                    </th>
                                    <td>
                                        {{ $studentAdmission->counselling_data }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.student-admissions.index') }}">
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