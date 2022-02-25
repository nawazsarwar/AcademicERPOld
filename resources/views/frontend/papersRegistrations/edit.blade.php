@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.papersRegistration.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.papers-registrations.update", [$papersRegistration->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="paper_id">{{ trans('cruds.papersRegistration.fields.paper') }}</label>
                            <select class="form-control select2" name="paper_id" id="paper_id" required>
                                @foreach($papers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('paper_id') ? old('paper_id') : $papersRegistration->paper->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.paper_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="registration_id">{{ trans('cruds.papersRegistration.fields.registration') }}</label>
                            <select class="form-control select2" name="registration_id" id="registration_id" required>
                                @foreach($registrations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('registration_id') ? old('registration_id') : $papersRegistration->registration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('registration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('registration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.registration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.papersRegistration.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $papersRegistration->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('student'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('student') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.student_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.papersRegistration.fields.registration_mode') }}</label>
                            @foreach(App\Models\PapersRegistration::REGISTRATION_MODE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="registration_mode_{{ $key }}" name="registration_mode" value="{{ $key }}" {{ old('registration_mode', $papersRegistration->registration_mode) === (string) $key ? 'checked' : '' }} required>
                                    <label for="registration_mode_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('registration_mode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('registration_mode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.registration_mode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="profile">{{ trans('cruds.papersRegistration.fields.profile') }}</label>
                            <textarea class="form-control" name="profile" id="profile">{{ old('profile', $papersRegistration->profile) }}</textarea>
                            @if($errors->has('profile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('profile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.profile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="faculty">{{ trans('cruds.papersRegistration.fields.faculty') }}</label>
                            <input class="form-control" type="text" name="faculty" id="faculty" value="{{ old('faculty', $papersRegistration->faculty) }}">
                            @if($errors->has('faculty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faculty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.faculty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="department">{{ trans('cruds.papersRegistration.fields.department') }}</label>
                            <input class="form-control" type="text" name="department" id="department" value="{{ old('department', $papersRegistration->department) }}">
                            @if($errors->has('department'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.department_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="department_code">{{ trans('cruds.papersRegistration.fields.department_code') }}</label>
                            <input class="form-control" type="text" name="department_code" id="department_code" value="{{ old('department_code', $papersRegistration->department_code) }}">
                            @if($errors->has('department_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.department_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paper_code">{{ trans('cruds.papersRegistration.fields.paper_code') }}</label>
                            <input class="form-control" type="text" name="paper_code" id="paper_code" value="{{ old('paper_code', $papersRegistration->paper_code) }}">
                            @if($errors->has('paper_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.paper_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paper_title">{{ trans('cruds.papersRegistration.fields.paper_title') }}</label>
                            <input class="form-control" type="text" name="paper_title" id="paper_title" value="{{ old('paper_title', $papersRegistration->paper_title) }}">
                            @if($errors->has('paper_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.paper_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fraction">{{ trans('cruds.papersRegistration.fields.fraction') }}</label>
                            <input class="form-control" type="number" name="fraction" id="fraction" value="{{ old('fraction', $papersRegistration->fraction) }}" step="1">
                            @if($errors->has('fraction'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fraction') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.fraction_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="credits">{{ trans('cruds.papersRegistration.fields.credits') }}</label>
                            <input class="form-control" type="number" name="credits" id="credits" value="{{ old('credits', $papersRegistration->credits) }}" step="1">
                            @if($errors->has('credits'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('credits') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.credits_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.papersRegistration.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $papersRegistration->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.papersRegistration.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.papersRegistration.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $papersRegistration->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection