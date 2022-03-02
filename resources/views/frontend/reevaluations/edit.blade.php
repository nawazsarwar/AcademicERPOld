@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.reevaluation.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.reevaluations.update", [$reevaluation->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="exam_registration_id">{{ trans('cruds.reevaluation.fields.exam_registration') }}</label>
                            <select class="form-control select2" name="exam_registration_id" id="exam_registration_id" required>
                                @foreach($exam_registrations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('exam_registration_id') ? old('exam_registration_id') : $reevaluation->exam_registration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('exam_registration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('exam_registration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.exam_registration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.reevaluation.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $reevaluation->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('student'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('student') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.student_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.reevaluation.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                @foreach($courses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $reevaluation->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="examination_name">{{ trans('cruds.reevaluation.fields.examination_name') }}</label>
                            <input class="form-control" type="text" name="examination_name" id="examination_name" value="{{ old('examination_name', $reevaluation->examination_name) }}">
                            @if($errors->has('examination_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('examination_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.examination_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="examination_year">{{ trans('cruds.reevaluation.fields.examination_year') }}</label>
                            <input class="form-control" type="text" name="examination_year" id="examination_year" value="{{ old('examination_year', $reevaluation->examination_year) }}">
                            @if($errors->has('examination_year'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('examination_year') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.examination_year_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="examination_part">{{ trans('cruds.reevaluation.fields.examination_part') }}</label>
                            <input class="form-control" type="number" name="examination_part" id="examination_part" value="{{ old('examination_part', $reevaluation->examination_part) }}" step="1">
                            @if($errors->has('examination_part'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('examination_part') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.examination_part_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="result_declaration_date">{{ trans('cruds.reevaluation.fields.result_declaration_date') }}</label>
                            <input class="form-control date" type="text" name="result_declaration_date" id="result_declaration_date" value="{{ old('result_declaration_date', $reevaluation->result_declaration_date) }}" required>
                            @if($errors->has('result_declaration_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('result_declaration_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.result_declaration_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="submitted">{{ trans('cruds.reevaluation.fields.submitted') }}</label>
                            <input class="form-control" type="number" name="submitted" id="submitted" value="{{ old('submitted', $reevaluation->submitted) }}" step="1">
                            @if($errors->has('submitted'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('submitted') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.submitted_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.reevaluation.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $reevaluation->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.reevaluation.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $reevaluation->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluation.fields.remarks_helper') }}</span>
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