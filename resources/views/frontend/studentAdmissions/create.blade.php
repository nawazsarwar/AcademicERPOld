@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.studentAdmission.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.student-admissions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="roll_no">{{ trans('cruds.studentAdmission.fields.roll_no') }}</label>
                            <input class="form-control" type="number" name="roll_no" id="roll_no" value="{{ old('roll_no', '') }}" step="1">
                            @if($errors->has('roll_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roll_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.studentAdmission.fields.roll_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="application_no">{{ trans('cruds.studentAdmission.fields.application_no') }}</label>
                            <input class="form-control" type="number" name="application_no" id="application_no" value="{{ old('application_no', '') }}" step="1">
                            @if($errors->has('application_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('application_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.studentAdmission.fields.application_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.studentAdmission.fields.course') }}</label>
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
                            <span class="help-block">{{ trans('cruds.studentAdmission.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="enrolment_id">{{ trans('cruds.studentAdmission.fields.enrolment') }}</label>
                            <select class="form-control select2" name="enrolment_id" id="enrolment_id" required>
                                @foreach($enrolments as $id => $entry)
                                    <option value="{{ $id }}" {{ old('enrolment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('enrolment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('enrolment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.studentAdmission.fields.enrolment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="faculty_no">{{ trans('cruds.studentAdmission.fields.faculty_no') }}</label>
                            <input class="form-control" type="text" name="faculty_no" id="faculty_no" value="{{ old('faculty_no', '') }}" required>
                            @if($errors->has('faculty_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faculty_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.studentAdmission.fields.faculty_no_helper') }}</span>
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