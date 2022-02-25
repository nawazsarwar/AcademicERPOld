@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.examinationSchedule.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.examination-schedules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.id') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.academic_session') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->academic_session->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.paper') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->paper->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.mode') }}
                        </th>
                        <td>
                            {{ App\Models\ExaminationSchedule::MODE_SELECT[$examinationSchedule->mode] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.centre') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->centre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.start') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.end') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.booklet_pages') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->booklet_pages }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.season') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->season }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examinationSchedule.fields.remarks') }}
                        </th>
                        <td>
                            {{ $examinationSchedule->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.examination-schedules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection