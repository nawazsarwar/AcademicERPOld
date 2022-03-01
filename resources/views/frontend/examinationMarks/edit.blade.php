@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.examinationMark.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.examination-marks.update", [$examinationMark->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.examinationMark.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $examinationMark->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('student'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('student') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.student_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="academic_session_id">{{ trans('cruds.examinationMark.fields.academic_session') }}</label>
                            <select class="form-control select2" name="academic_session_id" id="academic_session_id" required>
                                @foreach($academic_sessions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('academic_session_id') ? old('academic_session_id') : $examinationMark->academic_session->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_session'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('academic_session') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.academic_session_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="season">{{ trans('cruds.examinationMark.fields.season') }}</label>
                            <input class="form-control" type="text" name="season" id="season" value="{{ old('season', $examinationMark->season) }}">
                            @if($errors->has('season'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('season') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.season_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="registration_id">{{ trans('cruds.examinationMark.fields.registration') }}</label>
                            <select class="form-control select2" name="registration_id" id="registration_id">
                                @foreach($registrations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('registration_id') ? old('registration_id') : $examinationMark->registration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('registration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('registration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.registration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="paper_id">{{ trans('cruds.examinationMark.fields.paper') }}</label>
                            <select class="form-control select2" name="paper_id" id="paper_id" required>
                                @foreach($papers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('paper_id') ? old('paper_id') : $examinationMark->paper->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.paper_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sessional">{{ trans('cruds.examinationMark.fields.sessional') }}</label>
                            <input class="form-control" type="number" name="sessional" id="sessional" value="{{ old('sessional', $examinationMark->sessional) }}" step="1">
                            @if($errors->has('sessional'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sessional') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.sessional_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="theory">{{ trans('cruds.examinationMark.fields.theory') }}</label>
                            <input class="form-control" type="number" name="theory" id="theory" value="{{ old('theory', $examinationMark->theory) }}" step="1">
                            @if($errors->has('theory'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('theory') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.theory_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total">{{ trans('cruds.examinationMark.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', $examinationMark->total) }}" step="1">
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="grade">{{ trans('cruds.examinationMark.fields.grade') }}</label>
                            <input class="form-control" type="text" name="grade" id="grade" value="{{ old('grade', $examinationMark->grade) }}">
                            @if($errors->has('grade'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grade') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.grade_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="grade_point">{{ trans('cruds.examinationMark.fields.grade_point') }}</label>
                            <input class="form-control" type="number" name="grade_point" id="grade_point" value="{{ old('grade_point', $examinationMark->grade_point) }}" step="1">
                            @if($errors->has('grade_point'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grade_point') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.grade_point_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="result">{{ trans('cruds.examinationMark.fields.result') }}</label>
                            <input class="form-control" type="text" name="result" id="result" value="{{ old('result', $examinationMark->result) }}">
                            @if($errors->has('result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.result_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="part">{{ trans('cruds.examinationMark.fields.part') }}</label>
                            <input class="form-control" type="number" name="part" id="part" value="{{ old('part', $examinationMark->part) }}" step="1" required>
                            @if($errors->has('part'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('part') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.part_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.examinationMark.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $examinationMark->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="final_result">{{ trans('cruds.examinationMark.fields.final_result') }}</label>
                            <input class="form-control" type="text" name="final_result" id="final_result" value="{{ old('final_result', $examinationMark->final_result) }}">
                            @if($errors->has('final_result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('final_result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.final_result_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="entered_by_id">{{ trans('cruds.examinationMark.fields.entered_by') }}</label>
                            <select class="form-control select2" name="entered_by_id" id="entered_by_id" required>
                                @foreach($entered_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('entered_by_id') ? old('entered_by_id') : $examinationMark->entered_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('entered_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entered_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.entered_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="entered_at">{{ trans('cruds.examinationMark.fields.entered_at') }}</label>
                            <input class="form-control datetime" type="text" name="entered_at" id="entered_at" value="{{ old('entered_at', $examinationMark->entered_at) }}" required>
                            @if($errors->has('entered_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entered_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.entered_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_by_id">{{ trans('cruds.examinationMark.fields.verified_by') }}</label>
                            <select class="form-control select2" name="verified_by_id" id="verified_by_id">
                                @foreach($verified_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('verified_by_id') ? old('verified_by_id') : $examinationMark->verified_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verified_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.verified_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_at">{{ trans('cruds.examinationMark.fields.verified_at') }}</label>
                            <input class="form-control datetime" type="text" name="verified_at" id="verified_at" value="{{ old('verified_at', $examinationMark->verified_at) }}">
                            @if($errors->has('verified_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.verified_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="result_declaration_date">{{ trans('cruds.examinationMark.fields.result_declaration_date') }}</label>
                            <input class="form-control date" type="text" name="result_declaration_date" id="result_declaration_date" value="{{ old('result_declaration_date', $examinationMark->result_declaration_date) }}">
                            @if($errors->has('result_declaration_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('result_declaration_date') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection