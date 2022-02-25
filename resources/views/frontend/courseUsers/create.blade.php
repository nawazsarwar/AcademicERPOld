@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.courseUser.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.course-users.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.courseUser.fields.course') }}</label>
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
                            <span class="help-block">{{ trans('cruds.courseUser.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.courseUser.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="faculty_no">{{ trans('cruds.courseUser.fields.faculty_no') }}</label>
                            <input class="form-control" type="text" name="faculty_no" id="faculty_no" value="{{ old('faculty_no', '') }}" required>
                            @if($errors->has('faculty_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faculty_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.faculty_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="admitted_in_id">{{ trans('cruds.courseUser.fields.admitted_in') }}</label>
                            <select class="form-control select2" name="admitted_in_id" id="admitted_in_id" required>
                                @foreach($admitted_ins as $id => $entry)
                                    <option value="{{ $id }}" {{ old('admitted_in_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('admitted_in'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('admitted_in') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.admitted_in_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="admitted_on">{{ trans('cruds.courseUser.fields.admitted_on') }}</label>
                            <input class="form-control date" type="text" name="admitted_on" id="admitted_on" value="{{ old('admitted_on') }}">
                            @if($errors->has('admitted_on'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('admitted_on') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.admitted_on_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="duration_extension">{{ trans('cruds.courseUser.fields.duration_extension') }}</label>
                            <input class="form-control" type="text" name="duration_extension" id="duration_extension" value="{{ old('duration_extension', '') }}">
                            @if($errors->has('duration_extension'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('duration_extension') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.duration_extension_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verification_status_id">{{ trans('cruds.courseUser.fields.verification_status') }}</label>
                            <select class="form-control select2" name="verification_status_id" id="verification_status_id">
                                @foreach($verification_statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('verification_status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verification_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verification_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.verification_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_by_id">{{ trans('cruds.courseUser.fields.verified_by') }}</label>
                            <select class="form-control select2" name="verified_by_id" id="verified_by_id">
                                @foreach($verified_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('verified_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verified_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.verified_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_at">{{ trans('cruds.courseUser.fields.verified_at') }}</label>
                            <input class="form-control date" type="text" name="verified_at" id="verified_at" value="{{ old('verified_at') }}">
                            @if($errors->has('verified_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.verified_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verification_remark">{{ trans('cruds.courseUser.fields.verification_remark') }}</label>
                            <textarea class="form-control" name="verification_remark" id="verification_remark">{{ old('verification_remark') }}</textarea>
                            @if($errors->has('verification_remark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verification_remark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.verification_remark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.courseUser.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.courseUser.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.courseUser.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection