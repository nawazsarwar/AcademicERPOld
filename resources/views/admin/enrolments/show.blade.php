@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.enrolment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.enrolments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.enrolment.fields.id') }}
                        </th>
                        <td>
                            {{ $enrolment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.enrolment.fields.number') }}
                        </th>
                        <td>
                            {{ $enrolment->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.enrolment.fields.status') }}
                        </th>
                        <td>
                            {{ $enrolment->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.enrolment.fields.remarks') }}
                        </th>
                        <td>
                            {{ $enrolment->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.enrolments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection