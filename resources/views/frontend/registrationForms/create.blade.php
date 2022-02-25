@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.registrationForm.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.registration-forms.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.registrationForm.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                @foreach($courses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.registrationForm.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="opening_date">{{ trans('cruds.registrationForm.fields.opening_date') }}</label>
                            <input class="form-control date" type="text" name="opening_date" id="opening_date" value="{{ old('opening_date') }}" required>
                            @if($errors->has('opening_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('opening_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.opening_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="closing_date">{{ trans('cruds.registrationForm.fields.closing_date') }}</label>
                            <input class="form-control date" type="text" name="closing_date" id="closing_date" value="{{ old('closing_date') }}" required>
                            @if($errors->has('closing_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('closing_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.closing_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="academic_session_id">{{ trans('cruds.registrationForm.fields.academic_session') }}</label>
                            <select class="form-control select2" name="academic_session_id" id="academic_session_id" required>
                                @foreach($academic_sessions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('academic_session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_session'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('academic_session') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.academic_session_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="programme_duration_type_id">{{ trans('cruds.registrationForm.fields.programme_duration_type') }}</label>
                            <select class="form-control select2" name="programme_duration_type_id" id="programme_duration_type_id" required>
                                @foreach($programme_duration_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('programme_duration_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('programme_duration_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('programme_duration_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.programme_duration_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.registrationForm.fields.fillable_current') }}</label>
                            @foreach(App\Models\RegistrationForm::FILLABLE_CURRENT_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="fillable_current_{{ $key }}" name="fillable_current" value="{{ $key }}" {{ old('fillable_current', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="fillable_current_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('fillable_current'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fillable_current') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.fillable_current_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.registrationForm.fields.fillable_backlog') }}</label>
                            @foreach(App\Models\RegistrationForm::FILLABLE_BACKLOG_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="fillable_backlog_{{ $key }}" name="fillable_backlog" value="{{ $key }}" {{ old('fillable_backlog', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="fillable_backlog_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('fillable_backlog'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fillable_backlog') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.fillable_backlog_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.registrationForm.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.registrationForm.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.registrationForm.fields.remarks_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection