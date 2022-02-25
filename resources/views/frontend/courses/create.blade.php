@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.course.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.courses.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="degree_id">{{ trans('cruds.course.fields.degree') }}</label>
                            <select class="form-control select2" name="degree_id" id="degree_id" required>
                                @foreach($degrees as $id => $entry)
                                    <option value="{{ $id }}" {{ old('degree_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('degree'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('degree') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.degree_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="campus_id">{{ trans('cruds.course.fields.campus') }}</label>
                            <select class="form-control select2" name="campus_id" id="campus_id" required>
                                @foreach($campuses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('campus_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('campus'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('campus') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.campus_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.course.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_hindi">{{ trans('cruds.course.fields.title_hindi') }}</label>
                            <input class="form-control" type="text" name="title_hindi" id="title_hindi" value="{{ old('title_hindi', '') }}">
                            @if($errors->has('title_hindi'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_hindi') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.title_hindi_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_urdu">{{ trans('cruds.course.fields.title_urdu') }}</label>
                            <input class="form-control" type="text" name="title_urdu" id="title_urdu" value="{{ old('title_urdu', '') }}">
                            @if($errors->has('title_urdu'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_urdu') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.title_urdu_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.course.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="course_code">{{ trans('cruds.course.fields.course_code') }}</label>
                            <input class="form-control" type="text" name="course_code" id="course_code" value="{{ old('course_code', '') }}">
                            @if($errors->has('course_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.course_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="internal_code">{{ trans('cruds.course.fields.internal_code') }}</label>
                            <input class="form-control" type="text" name="internal_code" id="internal_code" value="{{ old('internal_code', '') }}">
                            @if($errors->has('internal_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('internal_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.internal_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="level_id">{{ trans('cruds.course.fields.level') }}</label>
                            <select class="form-control select2" name="level_id" id="level_id">
                                @foreach($levels as $id => $entry)
                                    <option value="{{ $id }}" {{ old('level_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('level') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.level_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="entrance_type_id">{{ trans('cruds.course.fields.entrance_type') }}</label>
                            <select class="form-control select2" name="entrance_type_id" id="entrance_type_id" required>
                                @foreach($entrance_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('entrance_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('entrance_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entrance_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.entrance_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mode_id">{{ trans('cruds.course.fields.mode') }}</label>
                            <select class="form-control select2" name="mode_id" id="mode_id" required>
                                @foreach($modes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('mode_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.mode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="duration_type_id">{{ trans('cruds.course.fields.duration_type') }}</label>
                            <select class="form-control select2" name="duration_type_id" id="duration_type_id" required>
                                @foreach($duration_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('duration_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('duration_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('duration_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.duration_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="duration">{{ trans('cruds.course.fields.duration') }}</label>
                            <input class="form-control" type="number" name="duration" id="duration" value="{{ old('duration', '') }}" step="1">
                            @if($errors->has('duration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('duration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.duration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total_intake">{{ trans('cruds.course.fields.total_intake') }}</label>
                            <input class="form-control" type="number" name="total_intake" id="total_intake" value="{{ old('total_intake', '') }}" step="1">
                            @if($errors->has('total_intake'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_intake') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.total_intake_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.course.fields.subsidiarizable') }}</label>
                            @foreach(App\Models\Course::SUBSIDIARIZABLE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="subsidiarizable_{{ $key }}" name="subsidiarizable" value="{{ $key }}" {{ old('subsidiarizable', '0') === (string) $key ? 'checked' : '' }} required>
                                    <label for="subsidiarizable_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('subsidiarizable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subsidiarizable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.subsidiarizable_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="administrable_id">{{ trans('cruds.course.fields.administrable') }}</label>
                            <select class="form-control select2" name="administrable_id" id="administrable_id" required>
                                @foreach($administrables as $id => $entry)
                                    <option value="{{ $id }}" {{ old('administrable_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('administrable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('administrable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.administrable_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="administrable_type">{{ trans('cruds.course.fields.administrable_type') }}</label>
                            <input class="form-control" type="text" name="administrable_type" id="administrable_type" value="{{ old('administrable_type', '') }}">
                            @if($errors->has('administrable_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('administrable_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.course.fields.administrable_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.course.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection