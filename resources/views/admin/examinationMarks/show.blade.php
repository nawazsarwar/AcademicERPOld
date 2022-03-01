@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.examinationMark.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.examination-marks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.id') }}
                        </th>
                        <td>
                            {{ $examinationMark->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.student') }}
                        </th>
                        <td>
                            {{ $examinationMark->student->enrolment_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.academic_session') }}
                        </th>
                        <td>
                            {{ $examinationMark->academic_session->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.season') }}
                        </th>
                        <td>
                            {{ $examinationMark->season }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.registration') }}
                        </th>
                        <td>
                            {{ $examinationMark->registration->faculty_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.paper') }}
                        </th>
                        <td>
                            {{ $examinationMark->paper->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.sessional') }}
                        </th>
                        <td>
                            {{ $examinationMark->sessional }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.theory') }}
                        </th>
                        <td>
                            {{ $examinationMark->theory }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.total') }}
                        </th>
                        <td>
                            {{ $examinationMark->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.grade') }}
                        </th>
                        <td>
                            {{ $examinationMark->grade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.grade_point') }}
                        </th>
                        <td>
                            {{ $examinationMark->grade_point }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.result') }}
                        </th>
                        <td>
                            {{ $examinationMark->result }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.part') }}
                        </th>
                        <td>
                            {{ $examinationMark->part }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.status') }}
                        </th>
                        <td>
                            {{ $examinationMark->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.final_result') }}
                        </th>
                        <td>
                            {{ $examinationMark->final_result }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.entered_by') }}
                        </th>
                        <td>
                            {{ $examinationMark->entered_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.entered_at') }}
                        </th>
                        <td>
                            {{ $examinationMark->entered_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.verified_by') }}
                        </th>
                        <td>
                            {{ $examinationMark->verified_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.verified_at') }}
                        </th>
                        <td>
                            {{ $examinationMark->verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationMark.fields.result_declaration_date') }}
                        </th>
                        <td>
                            {{ $examinationMark->result_declaration_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.examination-marks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection