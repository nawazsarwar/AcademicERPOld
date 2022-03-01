@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reevaluation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reevaluations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="exam_registration_id">{{ trans('cruds.reevaluation.fields.exam_registration') }}</label>
                <select class="form-control select2 {{ $errors->has('exam_registration') ? 'is-invalid' : '' }}" name="exam_registration_id" id="exam_registration_id" required>
                    @foreach($exam_registrations as $id => $entry)
                        <option value="{{ $id }}" {{ old('exam_registration_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('exam_registration'))
                    <span class="text-danger">{{ $errors->first('exam_registration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.exam_registration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.reevaluation.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <span class="text-danger">{{ $errors->first('student') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.reevaluation.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="examination_name">{{ trans('cruds.reevaluation.fields.examination_name') }}</label>
                <input class="form-control {{ $errors->has('examination_name') ? 'is-invalid' : '' }}" type="text" name="examination_name" id="examination_name" value="{{ old('examination_name', '') }}">
                @if($errors->has('examination_name'))
                    <span class="text-danger">{{ $errors->first('examination_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.examination_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="examination_year">{{ trans('cruds.reevaluation.fields.examination_year') }}</label>
                <input class="form-control {{ $errors->has('examination_year') ? 'is-invalid' : '' }}" type="text" name="examination_year" id="examination_year" value="{{ old('examination_year', '') }}">
                @if($errors->has('examination_year'))
                    <span class="text-danger">{{ $errors->first('examination_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.examination_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="examination_part">{{ trans('cruds.reevaluation.fields.examination_part') }}</label>
                <input class="form-control {{ $errors->has('examination_part') ? 'is-invalid' : '' }}" type="text" name="examination_part" id="examination_part" value="{{ old('examination_part', '') }}">
                @if($errors->has('examination_part'))
                    <span class="text-danger">{{ $errors->first('examination_part') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.examination_part_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="result_declaration_date">{{ trans('cruds.reevaluation.fields.result_declaration_date') }}</label>
                <input class="form-control date {{ $errors->has('result_declaration_date') ? 'is-invalid' : '' }}" type="text" name="result_declaration_date" id="result_declaration_date" value="{{ old('result_declaration_date') }}" required>
                @if($errors->has('result_declaration_date'))
                    <span class="text-danger">{{ $errors->first('result_declaration_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.result_declaration_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="submitted">{{ trans('cruds.reevaluation.fields.submitted') }}</label>
                <input class="form-control {{ $errors->has('submitted') ? 'is-invalid' : '' }}" type="number" name="submitted" id="submitted" value="{{ old('submitted', '') }}" step="1">
                @if($errors->has('submitted'))
                    <span class="text-danger">{{ $errors->first('submitted') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.submitted_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.reevaluation.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluation.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.reevaluation.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection