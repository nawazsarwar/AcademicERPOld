@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reevaluation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reevaluations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.id') }}
                        </th>
                        <td>
                            {{ $reevaluation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.exam_registration') }}
                        </th>
                        <td>
                            {{ $reevaluation->exam_registration->type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.student') }}
                        </th>
                        <td>
                            {{ $reevaluation->student->enrolment_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.course') }}
                        </th>
                        <td>
                            {{ $reevaluation->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.examination_name') }}
                        </th>
                        <td>
                            {{ $reevaluation->examination_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.examination_year') }}
                        </th>
                        <td>
                            {{ $reevaluation->examination_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.examination_part') }}
                        </th>
                        <td>
                            {{ $reevaluation->examination_part }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.result_declaration_date') }}
                        </th>
                        <td>
                            {{ $reevaluation->result_declaration_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.submitted') }}
                        </th>
                        <td>
                            {{ $reevaluation->submitted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.status') }}
                        </th>
                        <td>
                            {{ $reevaluation->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluation.fields.remarks') }}
                        </th>
                        <td>
                            {{ $reevaluation->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reevaluations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection