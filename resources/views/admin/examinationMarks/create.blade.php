@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.examinationMark.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.examination-marks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.examinationMark.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <span class="text-danger">{{ $errors->first('student') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="academic_session_id">{{ trans('cruds.examinationMark.fields.academic_session') }}</label>
                <select class="form-control select2 {{ $errors->has('academic_session') ? 'is-invalid' : '' }}" name="academic_session_id" id="academic_session_id" required>
                    @foreach($academic_sessions as $id => $entry)
                        <option value="{{ $id }}" {{ old('academic_session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic_session'))
                    <span class="text-danger">{{ $errors->first('academic_session') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.academic_session_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="season">{{ trans('cruds.examinationMark.fields.season') }}</label>
                <input class="form-control {{ $errors->has('season') ? 'is-invalid' : '' }}" type="text" name="season" id="season" value="{{ old('season', '') }}">
                @if($errors->has('season'))
                    <span class="text-danger">{{ $errors->first('season') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.season_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="registration_id">{{ trans('cruds.examinationMark.fields.registration') }}</label>
                <select class="form-control select2 {{ $errors->has('registration') ? 'is-invalid' : '' }}" name="registration_id" id="registration_id">
                    @foreach($registrations as $id => $entry)
                        <option value="{{ $id }}" {{ old('registration_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('registration'))
                    <span class="text-danger">{{ $errors->first('registration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.registration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paper_id">{{ trans('cruds.examinationMark.fields.paper') }}</label>
                <select class="form-control select2 {{ $errors->has('paper') ? 'is-invalid' : '' }}" name="paper_id" id="paper_id" required>
                    @foreach($papers as $id => $entry)
                        <option value="{{ $id }}" {{ old('paper_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper'))
                    <span class="text-danger">{{ $errors->first('paper') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.paper_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sessional">{{ trans('cruds.examinationMark.fields.sessional') }}</label>
                <input class="form-control {{ $errors->has('sessional') ? 'is-invalid' : '' }}" type="number" name="sessional" id="sessional" value="{{ old('sessional', '') }}" step="1">
                @if($errors->has('sessional'))
                    <span class="text-danger">{{ $errors->first('sessional') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.sessional_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="theory">{{ trans('cruds.examinationMark.fields.theory') }}</label>
                <input class="form-control {{ $errors->has('theory') ? 'is-invalid' : '' }}" type="number" name="theory" id="theory" value="{{ old('theory', '') }}" step="1">
                @if($errors->has('theory'))
                    <span class="text-danger">{{ $errors->first('theory') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.theory_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.examinationMark.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="1">
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grade">{{ trans('cruds.examinationMark.fields.grade') }}</label>
                <input class="form-control {{ $errors->has('grade') ? 'is-invalid' : '' }}" type="text" name="grade" id="grade" value="{{ old('grade', '') }}">
                @if($errors->has('grade'))
                    <span class="text-danger">{{ $errors->first('grade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grade_point">{{ trans('cruds.examinationMark.fields.grade_point') }}</label>
                <input class="form-control {{ $errors->has('grade_point') ? 'is-invalid' : '' }}" type="number" name="grade_point" id="grade_point" value="{{ old('grade_point', '') }}" step="1">
                @if($errors->has('grade_point'))
                    <span class="text-danger">{{ $errors->first('grade_point') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.grade_point_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="result">{{ trans('cruds.examinationMark.fields.result') }}</label>
                <input class="form-control {{ $errors->has('result') ? 'is-invalid' : '' }}" type="text" name="result" id="result" value="{{ old('result', '') }}">
                @if($errors->has('result'))
                    <span class="text-danger">{{ $errors->first('result') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.result_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="part">{{ trans('cruds.examinationMark.fields.part') }}</label>
                <input class="form-control {{ $errors->has('part') ? 'is-invalid' : '' }}" type="number" name="part" id="part" value="{{ old('part', '') }}" step="1" required>
                @if($errors->has('part'))
                    <span class="text-danger">{{ $errors->first('part') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.part_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.examinationMark.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="final_result">{{ trans('cruds.examinationMark.fields.final_result') }}</label>
                <input class="form-control {{ $errors->has('final_result') ? 'is-invalid' : '' }}" type="text" name="final_result" id="final_result" value="{{ old('final_result', '') }}">
                @if($errors->has('final_result'))
                    <span class="text-danger">{{ $errors->first('final_result') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.final_result_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="entered_by_id">{{ trans('cruds.examinationMark.fields.entered_by') }}</label>
                <select class="form-control select2 {{ $errors->has('entered_by') ? 'is-invalid' : '' }}" name="entered_by_id" id="entered_by_id" required>
                    @foreach($entered_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('entered_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('entered_by'))
                    <span class="text-danger">{{ $errors->first('entered_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.entered_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="entered_at">{{ trans('cruds.examinationMark.fields.entered_at') }}</label>
                <input class="form-control datetime {{ $errors->has('entered_at') ? 'is-invalid' : '' }}" type="text" name="entered_at" id="entered_at" value="{{ old('entered_at') }}" required>
                @if($errors->has('entered_at'))
                    <span class="text-danger">{{ $errors->first('entered_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.entered_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_by_id">{{ trans('cruds.examinationMark.fields.verified_by') }}</label>
                <select class="form-control select2 {{ $errors->has('verified_by') ? 'is-invalid' : '' }}" name="verified_by_id" id="verified_by_id">
                    @foreach($verified_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('verified_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('verified_by'))
                    <span class="text-danger">{{ $errors->first('verified_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.verified_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_at">{{ trans('cruds.examinationMark.fields.verified_at') }}</label>
                <input class="form-control datetime {{ $errors->has('verified_at') ? 'is-invalid' : '' }}" type="text" name="verified_at" id="verified_at" value="{{ old('verified_at') }}">
                @if($errors->has('verified_at'))
                    <span class="text-danger">{{ $errors->first('verified_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.verified_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="result_declaration_date">{{ trans('cruds.examinationMark.fields.result_declaration_date') }}</label>
                <input class="form-control date {{ $errors->has('result_declaration_date') ? 'is-invalid' : '' }}" type="text" name="result_declaration_date" id="result_declaration_date" value="{{ old('result_declaration_date') }}">
                @if($errors->has('result_declaration_date'))
                    <span class="text-danger">{{ $errors->first('result_declaration_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationMark.fields.result_declaration_date_helper') }}</span>
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