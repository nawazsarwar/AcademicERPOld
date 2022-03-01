@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.studentAdmission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.student-admissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="roll_no">{{ trans('cruds.studentAdmission.fields.roll_no') }}</label>
                <input class="form-control {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="number" name="roll_no" id="roll_no" value="{{ old('roll_no', '') }}" step="1">
                @if($errors->has('roll_no'))
                    <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentAdmission.fields.roll_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="application_no">{{ trans('cruds.studentAdmission.fields.application_no') }}</label>
                <input class="form-control {{ $errors->has('application_no') ? 'is-invalid' : '' }}" type="number" name="application_no" id="application_no" value="{{ old('application_no', '') }}" step="1">
                @if($errors->has('application_no'))
                    <span class="text-danger">{{ $errors->first('application_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentAdmission.fields.application_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.studentAdmission.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentAdmission.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="enrolment_id">{{ trans('cruds.studentAdmission.fields.enrolment') }}</label>
                <select class="form-control select2 {{ $errors->has('enrolment') ? 'is-invalid' : '' }}" name="enrolment_id" id="enrolment_id" required>
                    @foreach($enrolments as $id => $entry)
                        <option value="{{ $id }}" {{ old('enrolment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('enrolment'))
                    <span class="text-danger">{{ $errors->first('enrolment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentAdmission.fields.enrolment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="faculty_no">{{ trans('cruds.studentAdmission.fields.faculty_no') }}</label>
                <input class="form-control {{ $errors->has('faculty_no') ? 'is-invalid' : '' }}" type="text" name="faculty_no" id="faculty_no" value="{{ old('faculty_no', '') }}" required>
                @if($errors->has('faculty_no'))
                    <span class="text-danger">{{ $errors->first('faculty_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentAdmission.fields.faculty_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="session_id">{{ trans('cruds.studentAdmission.fields.session') }}</label>
                <select class="form-control select2 {{ $errors->has('session') ? 'is-invalid' : '' }}" name="session_id" id="session_id" required>
                    @foreach($sessions as $id => $entry)
                        <option value="{{ $id }}" {{ old('session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('session'))
                    <span class="text-danger">{{ $errors->first('session') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentAdmission.fields.session_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="admission_date">{{ trans('cruds.studentAdmission.fields.admission_date') }}</label>
                <input class="form-control date {{ $errors->has('admission_date') ? 'is-invalid' : '' }}" type="text" name="admission_date" id="admission_date" value="{{ old('admission_date') }}">
                @if($errors->has('admission_date'))
                    <span class="text-danger">{{ $errors->first('admission_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentAdmission.fields.admission_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="counselling_data">{{ trans('cruds.studentAdmission.fields.counselling_data') }}</label>
                <textarea class="form-control {{ $errors->has('counselling_data') ? 'is-invalid' : '' }}" name="counselling_data" id="counselling_data">{{ old('counselling_data') }}</textarea>
                @if($errors->has('counselling_data'))
                    <span class="text-danger">{{ $errors->first('counselling_data') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentAdmission.fields.counselling_data_helper') }}</span>
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