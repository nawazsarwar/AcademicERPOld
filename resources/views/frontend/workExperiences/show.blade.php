@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.workExperience.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.work-experiences.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.employer') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->employer }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.employer_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\WorkExperience::EMPLOYER_TYPE_SELECT[$workExperience->employer_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.designation') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->designation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.employed_from') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->employed_from }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.employed_to') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->employed_to }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.responsibilities') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->responsibilities }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.reason_for_leaving') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->reason_for_leaving }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.pay_band') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->pay_band }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.basic_pay') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->basic_pay }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.workExperience.fields.gross_pay') }}
                                    </th>
                                    <td>
                                        {{ $workExperience->gross_pay }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.work-experiences.index') }}">
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