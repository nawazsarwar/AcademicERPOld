@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.registrationForm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.registration-forms.update", [$registrationForm->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.registrationForm.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $registrationForm->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.registrationForm.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $registrationForm->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="opening_date">{{ trans('cruds.registrationForm.fields.opening_date') }}</label>
                <input class="form-control date {{ $errors->has('opening_date') ? 'is-invalid' : '' }}" type="text" name="opening_date" id="opening_date" value="{{ old('opening_date', $registrationForm->opening_date) }}" required>
                @if($errors->has('opening_date'))
                    <span class="text-danger">{{ $errors->first('opening_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.opening_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="closing_date">{{ trans('cruds.registrationForm.fields.closing_date') }}</label>
                <input class="form-control date {{ $errors->has('closing_date') ? 'is-invalid' : '' }}" type="text" name="closing_date" id="closing_date" value="{{ old('closing_date', $registrationForm->closing_date) }}" required>
                @if($errors->has('closing_date'))
                    <span class="text-danger">{{ $errors->first('closing_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.closing_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="academic_session_id">{{ trans('cruds.registrationForm.fields.academic_session') }}</label>
                <select class="form-control select2 {{ $errors->has('academic_session') ? 'is-invalid' : '' }}" name="academic_session_id" id="academic_session_id" required>
                    @foreach($academic_sessions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('academic_session_id') ? old('academic_session_id') : $registrationForm->academic_session->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic_session'))
                    <span class="text-danger">{{ $errors->first('academic_session') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.academic_session_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="programme_duration_type_id">{{ trans('cruds.registrationForm.fields.programme_duration_type') }}</label>
                <select class="form-control select2 {{ $errors->has('programme_duration_type') ? 'is-invalid' : '' }}" name="programme_duration_type_id" id="programme_duration_type_id" required>
                    @foreach($programme_duration_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('programme_duration_type_id') ? old('programme_duration_type_id') : $registrationForm->programme_duration_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('programme_duration_type'))
                    <span class="text-danger">{{ $errors->first('programme_duration_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.programme_duration_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.registrationForm.fields.fillable_current') }}</label>
                @foreach(App\Models\RegistrationForm::FILLABLE_CURRENT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('fillable_current') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="fillable_current_{{ $key }}" name="fillable_current" value="{{ $key }}" {{ old('fillable_current', $registrationForm->fillable_current) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="fillable_current_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('fillable_current'))
                    <span class="text-danger">{{ $errors->first('fillable_current') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.fillable_current_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.registrationForm.fields.fillable_backlog') }}</label>
                @foreach(App\Models\RegistrationForm::FILLABLE_BACKLOG_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('fillable_backlog') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="fillable_backlog_{{ $key }}" name="fillable_backlog" value="{{ $key }}" {{ old('fillable_backlog', $registrationForm->fillable_backlog) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="fillable_backlog_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('fillable_backlog'))
                    <span class="text-danger">{{ $errors->first('fillable_backlog') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.fillable_backlog_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.registrationForm.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $registrationForm->status) }}" step="1">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.registrationForm.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.registrationForm.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $registrationForm->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection