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
                <label class="required" for="degree_id">{{ trans('cruds.course.fields.degree') }}</label>
                <select class="form-control select2 {{ $errors->has('degree') ? 'is-invalid' : '' }}" name="degree_id" id="degree_id" required>
                    @foreach($degrees as $id => $entry)
                        <option value="{{ $id }}" {{ (old('degree_id') ? old('degree_id') : $course->degree->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('degree'))
                    <span class="text-danger">{{ $errors->first('degree') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.degree_helper') }}</span>
            </div>
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
                <label class="required" for="title">{{ trans('cruds.course.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $course->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_hindi">{{ trans('cruds.course.fields.title_hindi') }}</label>
                <input class="form-control {{ $errors->has('title_hindi') ? 'is-invalid' : '' }}" type="text" name="title_hindi" id="title_hindi" value="{{ old('title_hindi', $course->title_hindi) }}">
                @if($errors->has('title_hindi'))
                    <span class="text-danger">{{ $errors->first('title_hindi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_hindi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_urdu">{{ trans('cruds.course.fields.title_urdu') }}</label>
                <input class="form-control {{ $errors->has('title_urdu') ? 'is-invalid' : '' }}" type="text" name="title_urdu" id="title_urdu" value="{{ old('title_urdu', $course->title_urdu) }}">
                @if($errors->has('title_urdu'))
                    <span class="text-danger">{{ $errors->first('title_urdu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_urdu_helper') }}</span>
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
                <label for="level_id">{{ trans('cruds.course.fields.level') }}</label>
                <select class="form-control select2 {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level_id" id="level_id">
                    @foreach($levels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('level_id') ? old('level_id') : $course->level->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('level'))
                    <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="entrance_type_id">{{ trans('cruds.course.fields.entrance_type') }}</label>
                <select class="form-control select2 {{ $errors->has('entrance_type') ? 'is-invalid' : '' }}" name="entrance_type_id" id="entrance_type_id" required>
                    @foreach($entrance_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('entrance_type_id') ? old('entrance_type_id') : $course->entrance_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('entrance_type'))
                    <span class="text-danger">{{ $errors->first('entrance_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.entrance_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mode_id">{{ trans('cruds.course.fields.mode') }}</label>
                <select class="form-control select2 {{ $errors->has('mode') ? 'is-invalid' : '' }}" name="mode_id" id="mode_id" required>
                    @foreach($modes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('mode_id') ? old('mode_id') : $course->mode->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('mode'))
                    <span class="text-danger">{{ $errors->first('mode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duration_type_id">{{ trans('cruds.course.fields.duration_type') }}</label>
                <select class="form-control select2 {{ $errors->has('duration_type') ? 'is-invalid' : '' }}" name="duration_type_id" id="duration_type_id" required>
                    @foreach($duration_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('duration_type_id') ? old('duration_type_id') : $course->duration_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('duration_type'))
                    <span class="text-danger">{{ $errors->first('duration_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.duration_type_helper') }}</span>
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
                <label for="total_intake">{{ trans('cruds.course.fields.total_intake') }}</label>
                <input class="form-control {{ $errors->has('total_intake') ? 'is-invalid' : '' }}" type="number" name="total_intake" id="total_intake" value="{{ old('total_intake', $course->total_intake) }}" step="1">
                @if($errors->has('total_intake'))
                    <span class="text-danger">{{ $errors->first('total_intake') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.total_intake_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.course.fields.subsidiarizable') }}</label>
                @foreach(App\Models\Course::SUBSIDIARIZABLE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('subsidiarizable') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="subsidiarizable_{{ $key }}" name="subsidiarizable" value="{{ $key }}" {{ old('subsidiarizable', $course->subsidiarizable) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="subsidiarizable_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('subsidiarizable'))
                    <span class="text-danger">{{ $errors->first('subsidiarizable') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.subsidiarizable_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="administrable_id">{{ trans('cruds.course.fields.administrable') }}</label>
                <select class="form-control select2 {{ $errors->has('administrable') ? 'is-invalid' : '' }}" name="administrable_id" id="administrable_id" required>
                    @foreach($administrables as $id => $entry)
                        <option value="{{ $id }}" {{ (old('administrable_id') ? old('administrable_id') : $course->administrable->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('administrable'))
                    <span class="text-danger">{{ $errors->first('administrable') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.administrable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="administrable_type">{{ trans('cruds.course.fields.administrable_type') }}</label>
                <input class="form-control {{ $errors->has('administrable_type') ? 'is-invalid' : '' }}" type="text" name="administrable_type" id="administrable_type" value="{{ old('administrable_type', $course->administrable_type) }}">
                @if($errors->has('administrable_type'))
                    <span class="text-danger">{{ $errors->first('administrable_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.administrable_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.course.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $course->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.remarks_helper') }}</span>
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