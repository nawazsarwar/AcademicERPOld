@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.examRegistration.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.exam-registrations.update", [$examRegistration->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.examRegistration.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $examRegistration->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('student'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('student') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.student_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.examRegistration.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                @foreach($courses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $examRegistration->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="subsidiary_one_id">{{ trans('cruds.examRegistration.fields.subsidiary_one') }}</label>
                            <select class="form-control select2" name="subsidiary_one_id" id="subsidiary_one_id">
                                @foreach($subsidiary_ones as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('subsidiary_one_id') ? old('subsidiary_one_id') : $examRegistration->subsidiary_one->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subsidiary_one'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subsidiary_one') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.subsidiary_one_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="subsidiary_two_id">{{ trans('cruds.examRegistration.fields.subsidiary_two') }}</label>
                            <select class="form-control select2" name="subsidiary_two_id" id="subsidiary_two_id">
                                @foreach($subsidiary_twos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('subsidiary_two_id') ? old('subsidiary_two_id') : $examRegistration->subsidiary_two->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subsidiary_two'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subsidiary_two') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.subsidiary_two_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.examRegistration.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ExamRegistration::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $examRegistration->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="academic_session_id">{{ trans('cruds.examRegistration.fields.academic_session') }}</label>
                            <select class="form-control select2" name="academic_session_id" id="academic_session_id" required>
                                @foreach($academic_sessions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('academic_session_id') ? old('academic_session_id') : $examRegistration->academic_session->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_session'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('academic_session') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.academic_session_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="season">{{ trans('cruds.examRegistration.fields.season') }}</label>
                            <input class="form-control" type="text" name="season" id="season" value="{{ old('season', $examRegistration->season) }}" required>
                            @if($errors->has('season'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('season') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.season_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="faculty_no">{{ trans('cruds.examRegistration.fields.faculty_no') }}</label>
                            <input class="form-control" type="text" name="faculty_no" id="faculty_no" value="{{ old('faculty_no', $examRegistration->faculty_no) }}" required>
                            @if($errors->has('faculty_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faculty_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.faculty_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fraction">{{ trans('cruds.examRegistration.fields.fraction') }}</label>
                            <input class="form-control" type="number" name="fraction" id="fraction" value="{{ old('fraction', $examRegistration->fraction) }}" step="1" required>
                            @if($errors->has('fraction'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fraction') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.fraction_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="hall_id">{{ trans('cruds.examRegistration.fields.hall') }}</label>
                            <select class="form-control select2" name="hall_id" id="hall_id" required>
                                @foreach($halls as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('hall_id') ? old('hall_id') : $examRegistration->hall->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hall'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hall') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.hall_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="hostel_id">{{ trans('cruds.examRegistration.fields.hostel') }}</label>
                            <select class="form-control select2" name="hostel_id" id="hostel_id" required>
                                @foreach($hostels as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('hostel_id') ? old('hostel_id') : $examRegistration->hostel->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hostel'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hostel') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.hostel_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="room_no">{{ trans('cruds.examRegistration.fields.room_no') }}</label>
                            <input class="form-control" type="text" name="room_no" id="room_no" value="{{ old('room_no', $examRegistration->room_no) }}">
                            @if($errors->has('room_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('room_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.room_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verification_status_id">{{ trans('cruds.examRegistration.fields.verification_status') }}</label>
                            <select class="form-control select2" name="verification_status_id" id="verification_status_id">
                                @foreach($verification_statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('verification_status_id') ? old('verification_status_id') : $examRegistration->verification_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verification_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verification_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.verification_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_by_id">{{ trans('cruds.examRegistration.fields.verified_by') }}</label>
                            <select class="form-control select2" name="verified_by_id" id="verified_by_id">
                                @foreach($verified_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('verified_by_id') ? old('verified_by_id') : $examRegistration->verified_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verified_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.verified_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_at">{{ trans('cruds.examRegistration.fields.verified_at') }}</label>
                            <input class="form-control datetime" type="text" name="verified_at" id="verified_at" value="{{ old('verified_at', $examRegistration->verified_at) }}">
                            @if($errors->has('verified_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.verified_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verification_remark">{{ trans('cruds.examRegistration.fields.verification_remark') }}</label>
                            <textarea class="form-control" name="verification_remark" id="verification_remark">{{ old('verification_remark', $examRegistration->verification_remark) }}</textarea>
                            @if($errors->has('verification_remark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verification_remark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.verification_remark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.examRegistration.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $examRegistration->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.examRegistration.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $examRegistration->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examRegistration.fields.remarks_helper') }}</span>
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