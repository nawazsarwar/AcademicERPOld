@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.papersRegistration.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.papers-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.id') }}
                        </th>
                        <td>
                            {{ $papersRegistration->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.paper') }}
                        </th>
                        <td>
                            {{ $papersRegistration->paper->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.registration') }}
                        </th>
                        <td>
                            {{ $papersRegistration->registration->type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.student') }}
                        </th>
                        <td>
                            {{ $papersRegistration->student->enrolment_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.mode') }}
                        </th>
                        <td>
                            {{ App\Models\PapersRegistration::MODE_RADIO[$papersRegistration->mode] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.profile') }}
                        </th>
                        <td>
                            {{ $papersRegistration->profile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.faculty') }}
                        </th>
                        <td>
                            {{ $papersRegistration->faculty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.department') }}
                        </th>
                        <td>
                            {{ $papersRegistration->department }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.department_code') }}
                        </th>
                        <td>
                            {{ $papersRegistration->department_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.paper_code') }}
                        </th>
                        <td>
                            {{ $papersRegistration->paper_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.paper_title') }}
                        </th>
                        <td>
                            {{ $papersRegistration->paper_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.part') }}
                        </th>
                        <td>
                            {{ $papersRegistration->part }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.credits') }}
                        </th>
                        <td>
                            {{ $papersRegistration->credits }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.status') }}
                        </th>
                        <td>
                            {{ $papersRegistration->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.papersRegistration.fields.remarks') }}
                        </th>
                        <td>
                            {{ $papersRegistration->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.papers-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection