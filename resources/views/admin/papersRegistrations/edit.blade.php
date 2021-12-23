@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.papersRegistration.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.papers-registrations.update", [$papersRegistration->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="paper_id">{{ trans('cruds.papersRegistration.fields.paper') }}</label>
                <select class="form-control select2 {{ $errors->has('paper') ? 'is-invalid' : '' }}" name="paper_id" id="paper_id" required>
                    @foreach($papers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('paper_id') ? old('paper_id') : $papersRegistration->paper->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper'))
                    <span class="text-danger">{{ $errors->first('paper') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.paper_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="registration_id">{{ trans('cruds.papersRegistration.fields.registration') }}</label>
                <select class="form-control select2 {{ $errors->has('registration') ? 'is-invalid' : '' }}" name="registration_id" id="registration_id" required>
                    @foreach($registrations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('registration_id') ? old('registration_id') : $papersRegistration->registration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('registration'))
                    <span class="text-danger">{{ $errors->first('registration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.registration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.papersRegistration.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $papersRegistration->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <span class="text-danger">{{ $errors->first('student') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.papersRegistration.fields.registration_mode') }}</label>
                @foreach(App\Models\PapersRegistration::REGISTRATION_MODE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('registration_mode') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="registration_mode_{{ $key }}" name="registration_mode" value="{{ $key }}" {{ old('registration_mode', $papersRegistration->registration_mode) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="registration_mode_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('registration_mode'))
                    <span class="text-danger">{{ $errors->first('registration_mode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.registration_mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile">{{ trans('cruds.papersRegistration.fields.profile') }}</label>
                <textarea class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile" id="profile">{{ old('profile', $papersRegistration->profile) }}</textarea>
                @if($errors->has('profile'))
                    <span class="text-danger">{{ $errors->first('profile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.profile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="faculty">{{ trans('cruds.papersRegistration.fields.faculty') }}</label>
                <input class="form-control {{ $errors->has('faculty') ? 'is-invalid' : '' }}" type="text" name="faculty" id="faculty" value="{{ old('faculty', $papersRegistration->faculty) }}">
                @if($errors->has('faculty'))
                    <span class="text-danger">{{ $errors->first('faculty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.faculty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department">{{ trans('cruds.papersRegistration.fields.department') }}</label>
                <input class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" type="text" name="department" id="department" value="{{ old('department', $papersRegistration->department) }}">
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_code">{{ trans('cruds.papersRegistration.fields.department_code') }}</label>
                <input class="form-control {{ $errors->has('department_code') ? 'is-invalid' : '' }}" type="text" name="department_code" id="department_code" value="{{ old('department_code', $papersRegistration->department_code) }}">
                @if($errors->has('department_code'))
                    <span class="text-danger">{{ $errors->first('department_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.department_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paper_code">{{ trans('cruds.papersRegistration.fields.paper_code') }}</label>
                <input class="form-control {{ $errors->has('paper_code') ? 'is-invalid' : '' }}" type="text" name="paper_code" id="paper_code" value="{{ old('paper_code', $papersRegistration->paper_code) }}">
                @if($errors->has('paper_code'))
                    <span class="text-danger">{{ $errors->first('paper_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.paper_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paper_title">{{ trans('cruds.papersRegistration.fields.paper_title') }}</label>
                <input class="form-control {{ $errors->has('paper_title') ? 'is-invalid' : '' }}" type="text" name="paper_title" id="paper_title" value="{{ old('paper_title', $papersRegistration->paper_title) }}">
                @if($errors->has('paper_title'))
                    <span class="text-danger">{{ $errors->first('paper_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.paper_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fraction">{{ trans('cruds.papersRegistration.fields.fraction') }}</label>
                <input class="form-control {{ $errors->has('fraction') ? 'is-invalid' : '' }}" type="number" name="fraction" id="fraction" value="{{ old('fraction', $papersRegistration->fraction) }}" step="1">
                @if($errors->has('fraction'))
                    <span class="text-danger">{{ $errors->first('fraction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.fraction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="credits">{{ trans('cruds.papersRegistration.fields.credits') }}</label>
                <input class="form-control {{ $errors->has('credits') ? 'is-invalid' : '' }}" type="number" name="credits" id="credits" value="{{ old('credits', $papersRegistration->credits) }}" step="1">
                @if($errors->has('credits'))
                    <span class="text-danger">{{ $errors->first('credits') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.credits_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.papersRegistration.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $papersRegistration->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.papersRegistration.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $papersRegistration->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.papersRegistration.fields.remarks_helper') }}</span>
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