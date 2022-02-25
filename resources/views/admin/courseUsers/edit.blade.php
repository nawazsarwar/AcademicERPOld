@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.courseUser.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-users.update", [$courseUser->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.courseUser.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $courseUser->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.courseUser.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $courseUser->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="faculty_no">{{ trans('cruds.courseUser.fields.faculty_no') }}</label>
                <input class="form-control {{ $errors->has('faculty_no') ? 'is-invalid' : '' }}" type="text" name="faculty_no" id="faculty_no" value="{{ old('faculty_no', $courseUser->faculty_no) }}" required>
                @if($errors->has('faculty_no'))
                    <span class="text-danger">{{ $errors->first('faculty_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.faculty_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="admitted_in_id">{{ trans('cruds.courseUser.fields.admitted_in') }}</label>
                <select class="form-control select2 {{ $errors->has('admitted_in') ? 'is-invalid' : '' }}" name="admitted_in_id" id="admitted_in_id" required>
                    @foreach($admitted_ins as $id => $entry)
                        <option value="{{ $id }}" {{ (old('admitted_in_id') ? old('admitted_in_id') : $courseUser->admitted_in->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('admitted_in'))
                    <span class="text-danger">{{ $errors->first('admitted_in') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.admitted_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="admitted_on">{{ trans('cruds.courseUser.fields.admitted_on') }}</label>
                <input class="form-control date {{ $errors->has('admitted_on') ? 'is-invalid' : '' }}" type="text" name="admitted_on" id="admitted_on" value="{{ old('admitted_on', $courseUser->admitted_on) }}">
                @if($errors->has('admitted_on'))
                    <span class="text-danger">{{ $errors->first('admitted_on') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.admitted_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="duration_extension">{{ trans('cruds.courseUser.fields.duration_extension') }}</label>
                <input class="form-control {{ $errors->has('duration_extension') ? 'is-invalid' : '' }}" type="text" name="duration_extension" id="duration_extension" value="{{ old('duration_extension', $courseUser->duration_extension) }}">
                @if($errors->has('duration_extension'))
                    <span class="text-danger">{{ $errors->first('duration_extension') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.duration_extension_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verification_status_id">{{ trans('cruds.courseUser.fields.verification_status') }}</label>
                <select class="form-control select2 {{ $errors->has('verification_status') ? 'is-invalid' : '' }}" name="verification_status_id" id="verification_status_id">
                    @foreach($verification_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('verification_status_id') ? old('verification_status_id') : $courseUser->verification_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('verification_status'))
                    <span class="text-danger">{{ $errors->first('verification_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.verification_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_by_id">{{ trans('cruds.courseUser.fields.verified_by') }}</label>
                <select class="form-control select2 {{ $errors->has('verified_by') ? 'is-invalid' : '' }}" name="verified_by_id" id="verified_by_id">
                    @foreach($verified_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('verified_by_id') ? old('verified_by_id') : $courseUser->verified_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('verified_by'))
                    <span class="text-danger">{{ $errors->first('verified_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.verified_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_at">{{ trans('cruds.courseUser.fields.verified_at') }}</label>
                <input class="form-control date {{ $errors->has('verified_at') ? 'is-invalid' : '' }}" type="text" name="verified_at" id="verified_at" value="{{ old('verified_at', $courseUser->verified_at) }}">
                @if($errors->has('verified_at'))
                    <span class="text-danger">{{ $errors->first('verified_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.verified_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verification_remark">{{ trans('cruds.courseUser.fields.verification_remark') }}</label>
                <textarea class="form-control {{ $errors->has('verification_remark') ? 'is-invalid' : '' }}" name="verification_remark" id="verification_remark">{{ old('verification_remark', $courseUser->verification_remark) }}</textarea>
                @if($errors->has('verification_remark'))
                    <span class="text-danger">{{ $errors->first('verification_remark') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.verification_remark_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.courseUser.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $courseUser->status) }}" step="1">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.courseUser.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $courseUser->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseUser.fields.remarks_helper') }}</span>
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