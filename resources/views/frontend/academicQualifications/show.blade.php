@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.academicQualification.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.academic-qualifications.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.qualification_level') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->qualification_level->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.year') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.roll_no') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->roll_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.board') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->board->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.result') }}
                                    </th>
                                    <td>
                                        {{ App\Models\AcademicQualification::RESULT_SELECT[$academicQualification->result] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.grading_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\AcademicQualification::GRADING_TYPE_SELECT[$academicQualification->grading_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.grade') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->grade }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.certificate') }}
                                    </th>
                                    <td>
                                        @if($academicQualification->certificate)
                                            <a href="{{ $academicQualification->certificate->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.cdn_url') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->cdn_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicQualification.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $academicQualification->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.academic-qualifications.index') }}">
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