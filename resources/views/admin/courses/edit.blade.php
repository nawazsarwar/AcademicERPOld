@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.course.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.courses.update", [$course->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="campus_id">{{ trans('cruds.course.fields.campus') }}</label>
                <select class="form-control select2 {{ $errors->has('campus') ? 'is-invalid' : '' }}" name="campus_id" id="campus_id" required>
                    @foreach($campuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('campus_id') ? old('campus_id') : $course->campus->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('campus'))
                    <span class="text-danger">{{ $errors->first('campus') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.campus_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.course.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $course->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.course.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $course->code) }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="course_code">{{ trans('cruds.course.fields.course_code') }}</label>
                <input class="form-control {{ $errors->has('course_code') ? 'is-invalid' : '' }}" type="text" name="course_code" id="course_code" value="{{ old('course_code', $course->course_code) }}">
                @if($errors->has('course_code'))
                    <span class="text-danger">{{ $errors->first('course_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.course_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="internal_code">{{ trans('cruds.course.fields.internal_code') }}</label>
                <input class="form-control {{ $errors->has('internal_code') ? 'is-invalid' : '' }}" type="text" name="internal_code" id="internal_code" value="{{ old('internal_code', $course->internal_code) }}">
                @if($errors->has('internal_code'))
                    <span class="text-danger">{{ $errors->first('internal_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.internal_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mode">{{ trans('cruds.course.fields.mode') }}</label>
                <input class="form-control {{ $errors->has('mode') ? 'is-invalid' : '' }}" type="text" name="mode" id="mode" value="{{ old('mode', $course->mode) }}">
                @if($errors->has('mode'))
                    <span class="text-danger">{{ $errors->first('mode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="course_type">{{ trans('cruds.course.fields.course_type') }}</label>
                <input class="form-control {{ $errors->has('course_type') ? 'is-invalid' : '' }}" type="text" name="course_type" id="course_type" value="{{ old('course_type', $course->course_type) }}">
                @if($errors->has('course_type'))
                    <span class="text-danger">{{ $errors->first('course_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.course_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="test_type">{{ trans('cruds.course.fields.test_type') }}</label>
                <input class="form-control {{ $errors->has('test_type') ? 'is-invalid' : '' }}" type="text" name="test_type" id="test_type" value="{{ old('test_type', $course->test_type) }}">
                @if($errors->has('test_type'))
                    <span class="text-danger">{{ $errors->first('test_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.test_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="duration">{{ trans('cruds.course.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', $course->duration) }}" step="1">
                @if($errors->has('duration'))
                    <span class="text-danger">{{ $errors->first('duration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="duration_type">{{ trans('cruds.course.fields.duration_type') }}</label>
                <input class="form-control {{ $errors->has('duration_type') ? 'is-invalid' : '' }}" type="text" name="duration_type" id="duration_type" value="{{ old('duration_type', $course->duration_type) }}">
                @if($errors->has('duration_type'))
                    <span class="text-danger">{{ $errors->first('duration_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.duration_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_intake">{{ trans('cruds.course.fields.total_intake') }}</label>
                <input class="form-control {{ $errors->has('total_intake') ? 'is-invalid' : '' }}" type="number" name="total_intake" id="total_intake" value="{{ old('total_intake', $course->total_intake) }}" step="1">
                @if($errors->has('total_intake'))
                    <span class="text-danger">{{ $errors->first('total_intake') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.total_intake_helper') }}</span>
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