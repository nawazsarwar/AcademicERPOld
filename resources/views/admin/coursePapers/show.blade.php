@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.coursePaper.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-papers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.coursePaper.fields.id') }}
                        </th>
                        <td>
                            {{ $coursePaper->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coursePaper.fields.course') }}
                        </th>
                        <td>
                            {{ $coursePaper->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coursePaper.fields.paper') }}
                        </th>
                        <td>
                            {{ $coursePaper->paper->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coursePaper.fields.fraction') }}
                        </th>
                        <td>
                            {{ $coursePaper->fraction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coursePaper.fields.academic_session') }}
                        </th>
                        <td>
                            {{ $coursePaper->academic_session->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coursePaper.fields.status') }}
                        </th>
                        <td>
                            {{ $coursePaper->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coursePaper.fields.remarks') }}
                        </th>
                        <td>
                            {{ $coursePaper->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-papers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection