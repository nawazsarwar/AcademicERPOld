@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.registrationForm.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.registration-forms.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.course') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->course->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.opening_date') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->opening_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.closing_date') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->closing_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.academic_session') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->academic_session->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.programme_duration_type') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->programme_duration_type->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.fillable_current') }}
                                    </th>
                                    <td>
                                        {{ App\Models\RegistrationForm::FILLABLE_CURRENT_RADIO[$registrationForm->fillable_current] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.fillable_backlog') }}
                                    </th>
                                    <td>
                                        {{ App\Models\RegistrationForm::FILLABLE_BACKLOG_RADIO[$registrationForm->fillable_backlog] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $registrationForm->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.registration-forms.index') }}">
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