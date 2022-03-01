@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.hallStudent.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.hall-students.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.hall') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->hall->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.hostel') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->hostel->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.room_no') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->room_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.student') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->student->enrolment_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.allotment_date') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->allotment_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.allotted_by') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->allotted_by->username ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.allotted_on') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->allotted_on }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $hallStudent->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.hall-students.index') }}">
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