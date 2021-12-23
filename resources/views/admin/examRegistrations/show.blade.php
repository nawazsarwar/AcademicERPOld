@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.examRegistration.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exam-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.id') }}
                        </th>
                        <td>
                            {{ $examRegistration->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.student') }}
                        </th>
                        <td>
                            {{ $examRegistration->student->guardian_mobile_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.course') }}
                        </th>
                        <td>
                            {{ $examRegistration->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.subsidiary_one') }}
                        </th>
                        <td>
                            {{ $examRegistration->subsidiary_one->internal_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.subsidiary_two') }}
                        </th>
                        <td>
                            {{ $examRegistration->subsidiary_two->internal_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\ExamRegistration::TYPE_SELECT[$examRegistration->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.academic_session') }}
                        </th>
                        <td>
                            {{ $examRegistration->academic_session->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.season') }}
                        </th>
                        <td>
                            {{ $examRegistration->season }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.faculty_no') }}
                        </th>
                        <td>
                            {{ $examRegistration->faculty_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.fraction') }}
                        </th>
                        <td>
                            {{ $examRegistration->fraction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.hall') }}
                        </th>
                        <td>
                            {{ $examRegistration->hall->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.hostel') }}
                        </th>
                        <td>
                            {{ $examRegistration->hostel->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.room_no') }}
                        </th>
                        <td>
                            {{ $examRegistration->room_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.reviewed') }}
                        </th>
                        <td>
                            {{ App\Models\ExamRegistration::REVIEWED_SELECT[$examRegistration->reviewed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.reviewed_by') }}
                        </th>
                        <td>
                            {{ $examRegistration->reviewed_by->username ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.reviewed_at') }}
                        </th>
                        <td>
                            {{ $examRegistration->reviewed_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.status') }}
                        </th>
                        <td>
                            {{ $examRegistration->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examRegistration.fields.remarks') }}
                        </th>
                        <td>
                            {{ $examRegistration->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exam-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection