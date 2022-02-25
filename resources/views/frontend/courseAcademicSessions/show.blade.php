@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.courseAcademicSession.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.course-academic-sessions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $courseAcademicSession->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.academic_session') }}
                                    </th>
                                    <td>
                                        {{ $courseAcademicSession->academic_session->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.course') }}
                                    </th>
                                    <td>
                                        {{ $courseAcademicSession->course->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $courseAcademicSession->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $courseAcademicSession->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.course-academic-sessions.index') }}">
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