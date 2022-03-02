@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.registrationPaper.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.registration-papers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.paper') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->paper->code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.registration') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->registration->type ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.student') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->student->enrolment_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.mode') }}
                                    </th>
                                    <td>
                                        {{ App\Models\RegistrationPaper::MODE_RADIO[$registrationPaper->mode] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.profile') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->profile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.faculty') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->faculty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.department') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->department }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.department_code') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->department_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.paper_code') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->paper_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.paper_title') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->paper_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.part') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->part }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.credits') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->credits }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $registrationPaper->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.registration-papers.index') }}">
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