@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.examRegistration.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exam-registrations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.examRegistration.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <span class="text-danger">{{ $errors->first('student') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.examRegistration.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subsidiary_one_id">{{ trans('cruds.examRegistration.fields.subsidiary_one') }}</label>
                <select class="form-control select2 {{ $errors->has('subsidiary_one') ? 'is-invalid' : '' }}" name="subsidiary_one_id" id="subsidiary_one_id">
                    @foreach($subsidiary_ones as $id => $entry)
                        <option value="{{ $id }}" {{ old('subsidiary_one_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subsidiary_one'))
                    <span class="text-danger">{{ $errors->first('subsidiary_one') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.subsidiary_one_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subsidiary_two_id">{{ trans('cruds.examRegistration.fields.subsidiary_two') }}</label>
                <select class="form-control select2 {{ $errors->has('subsidiary_two') ? 'is-invalid' : '' }}" name="subsidiary_two_id" id="subsidiary_two_id">
                    @foreach($subsidiary_twos as $id => $entry)
                        <option value="{{ $id }}" {{ old('subsidiary_two_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subsidiary_two'))
                    <span class="text-danger">{{ $errors->first('subsidiary_two') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.subsidiary_two_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.examRegistration.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ExamRegistration::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="academic_session_id">{{ trans('cruds.examRegistration.fields.academic_session') }}</label>
                <select class="form-control select2 {{ $errors->has('academic_session') ? 'is-invalid' : '' }}" name="academic_session_id" id="academic_session_id" required>
                    @foreach($academic_sessions as $id => $entry)
                        <option value="{{ $id }}" {{ old('academic_session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic_session'))
                    <span class="text-danger">{{ $errors->first('academic_session') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.academic_session_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="season">{{ trans('cruds.examRegistration.fields.season') }}</label>
                <input class="form-control {{ $errors->has('season') ? 'is-invalid' : '' }}" type="text" name="season" id="season" value="{{ old('season', '') }}" required>
                @if($errors->has('season'))
                    <span class="text-danger">{{ $errors->first('season') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.season_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="faculty_no">{{ trans('cruds.examRegistration.fields.faculty_no') }}</label>
                <input class="form-control {{ $errors->has('faculty_no') ? 'is-invalid' : '' }}" type="text" name="faculty_no" id="faculty_no" value="{{ old('faculty_no', '') }}" required>
                @if($errors->has('faculty_no'))
                    <span class="text-danger">{{ $errors->first('faculty_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.faculty_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fraction">{{ trans('cruds.examRegistration.fields.fraction') }}</label>
                <input class="form-control {{ $errors->has('fraction') ? 'is-invalid' : '' }}" type="number" name="fraction" id="fraction" value="{{ old('fraction', '') }}" step="1" required>
                @if($errors->has('fraction'))
                    <span class="text-danger">{{ $errors->first('fraction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.fraction_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hall_id">{{ trans('cruds.examRegistration.fields.hall') }}</label>
                <select class="form-control select2 {{ $errors->has('hall') ? 'is-invalid' : '' }}" name="hall_id" id="hall_id" required>
                    @foreach($halls as $id => $entry)
                        <option value="{{ $id }}" {{ old('hall_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hall'))
                    <span class="text-danger">{{ $errors->first('hall') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.hall_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hostel_id">{{ trans('cruds.examRegistration.fields.hostel') }}</label>
                <select class="form-control select2 {{ $errors->has('hostel') ? 'is-invalid' : '' }}" name="hostel_id" id="hostel_id" required>
                    @foreach($hostels as $id => $entry)
                        <option value="{{ $id }}" {{ old('hostel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hostel'))
                    <span class="text-danger">{{ $errors->first('hostel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.hostel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="room_no">{{ trans('cruds.examRegistration.fields.room_no') }}</label>
                <input class="form-control {{ $errors->has('room_no') ? 'is-invalid' : '' }}" type="text" name="room_no" id="room_no" value="{{ old('room_no', '') }}">
                @if($errors->has('room_no'))
                    <span class="text-danger">{{ $errors->first('room_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.room_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.examRegistration.fields.reviewed') }}</label>
                <select class="form-control {{ $errors->has('reviewed') ? 'is-invalid' : '' }}" name="reviewed" id="reviewed">
                    <option value disabled {{ old('reviewed', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ExamRegistration::REVIEWED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('reviewed', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('reviewed'))
                    <span class="text-danger">{{ $errors->first('reviewed') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.reviewed_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reviewed_by_id">{{ trans('cruds.examRegistration.fields.reviewed_by') }}</label>
                <select class="form-control select2 {{ $errors->has('reviewed_by') ? 'is-invalid' : '' }}" name="reviewed_by_id" id="reviewed_by_id">
                    @foreach($reviewed_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('reviewed_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('reviewed_by'))
                    <span class="text-danger">{{ $errors->first('reviewed_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.reviewed_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reviewed_at">{{ trans('cruds.examRegistration.fields.reviewed_at') }}</label>
                <input class="form-control datetime {{ $errors->has('reviewed_at') ? 'is-invalid' : '' }}" type="text" name="reviewed_at" id="reviewed_at" value="{{ old('reviewed_at') }}">
                @if($errors->has('reviewed_at'))
                    <span class="text-danger">{{ $errors->first('reviewed_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.reviewed_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.examRegistration.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examRegistration.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.examRegistration.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection