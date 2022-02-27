@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.examinationMark.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.examination-marks.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.examinationMark.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $entry)
                                    <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                                    <option value="{{ $id }}" {{ old('academic_session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <label for="sessional">{{ trans('cruds.examinationMark.fields.sessional') }}</label>
                            <input class="form-control" type="number" name="sessional" id="sessional" value="{{ old('sessional', '') }}" step="1">
                            @if($errors->has('sessional'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sessional') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.sessional_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="theory">{{ trans('cruds.examinationMark.fields.theory') }}</label>
                            <input class="form-control" type="number" name="theory" id="theory" value="{{ old('theory', '') }}" step="1">
                            @if($errors->has('theory'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('theory') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.theory_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total">{{ trans('cruds.examinationMark.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', '') }}" step="1">
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="grade">{{ trans('cruds.examinationMark.fields.grade') }}</label>
                            <input class="form-control" type="text" name="grade" id="grade" value="{{ old('grade', '') }}">
                            @if($errors->has('grade'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grade') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.grade_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="grade_point">{{ trans('cruds.examinationMark.fields.grade_point') }}</label>
                            <input class="form-control" type="number" name="grade_point" id="grade_point" value="{{ old('grade_point', '') }}" step="1">
                            @if($errors->has('grade_point'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grade_point') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.grade_point_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="result">{{ trans('cruds.examinationMark.fields.result') }}</label>
                            <input class="form-control" type="text" name="result" id="result" value="{{ old('result', '') }}">
                            @if($errors->has('result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.result_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="part">{{ trans('cruds.examinationMark.fields.part') }}</label>
                            <input class="form-control" type="number" name="part" id="part" value="{{ old('part', '') }}" step="1" required>
                            @if($errors->has('part'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('part') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.part_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.examinationMark.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="final_result">{{ trans('cruds.examinationMark.fields.final_result') }}</label>
                            <input class="form-control" type="text" name="final_result" id="final_result" value="{{ old('final_result', '') }}">
                            @if($errors->has('final_result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('final_result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationMark.fields.final_result_helper') }}</span>
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