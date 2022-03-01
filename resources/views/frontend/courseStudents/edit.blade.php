@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.courseStudent.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.course-students.update", [$courseStudent->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.courseStudent.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                @foreach($courses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $courseStudent->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.courseStudent.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $courseStudent->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.courseStudent.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $courseStudent->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('student'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('student') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.student_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="faculty_no">{{ trans('cruds.courseStudent.fields.faculty_no') }}</label>
                            <input class="form-control" type="text" name="faculty_no" id="faculty_no" value="{{ old('faculty_no', $courseStudent->faculty_no) }}" required>
                            @if($errors->has('faculty_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faculty_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.faculty_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="session_admitted_id">{{ trans('cruds.courseStudent.fields.session_admitted') }}</label>
                            <select class="form-control select2" name="session_admitted_id" id="session_admitted_id" required>
                                @foreach($session_admitteds as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('session_admitted_id') ? old('session_admitted_id') : $courseStudent->session_admitted->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('session_admitted'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('session_admitted') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.session_admitted_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="admitted_on">{{ trans('cruds.courseStudent.fields.admitted_on') }}</label>
                            <input class="form-control date" type="text" name="admitted_on" id="admitted_on" value="{{ old('admitted_on', $courseStudent->admitted_on) }}">
                            @if($errors->has('admitted_on'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('admitted_on') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.admitted_on_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="duration_extension">{{ trans('cruds.courseStudent.fields.duration_extension') }}</label>
                            <input class="form-control" type="number" name="duration_extension" id="duration_extension" value="{{ old('duration_extension', $courseStudent->duration_extension) }}" step="1">
                            @if($errors->has('duration_extension'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('duration_extension') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.duration_extension_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verification_status_id">{{ trans('cruds.courseStudent.fields.verification_status') }}</label>
                            <select class="form-control select2" name="verification_status_id" id="verification_status_id">
                                @foreach($verification_statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('verification_status_id') ? old('verification_status_id') : $courseStudent->verification_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verification_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verification_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.verification_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_by_id">{{ trans('cruds.courseStudent.fields.verified_by') }}</label>
                            <select class="form-control select2" name="verified_by_id" id="verified_by_id">
                                @foreach($verified_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('verified_by_id') ? old('verified_by_id') : $courseStudent->verified_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verified_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.verified_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_at">{{ trans('cruds.courseStudent.fields.verified_at') }}</label>
                            <input class="form-control date" type="text" name="verified_at" id="verified_at" value="{{ old('verified_at', $courseStudent->verified_at) }}">
                            @if($errors->has('verified_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.verified_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verification_remark">{{ trans('cruds.courseStudent.fields.verification_remark') }}</label>
                            <textarea class="form-control" name="verification_remark" id="verification_remark">{{ old('verification_remark', $courseStudent->verification_remark) }}</textarea>
                            @if($errors->has('verification_remark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verification_remark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.verification_remark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.courseStudent.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $courseStudent->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.courseStudent.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $courseStudent->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseStudent.fields.remarks_helper') }}</span>
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