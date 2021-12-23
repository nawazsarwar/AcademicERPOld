@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.academicQualification.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.academic-qualifications.update", [$academicQualification->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.academicQualification.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $academicQualification->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qualification_level_id">{{ trans('cruds.academicQualification.fields.qualification_level') }}</label>
                <select class="form-control select2 {{ $errors->has('qualification_level') ? 'is-invalid' : '' }}" name="qualification_level_id" id="qualification_level_id" required>
                    @foreach($qualification_levels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('qualification_level_id') ? old('qualification_level_id') : $academicQualification->qualification_level->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('qualification_level'))
                    <span class="text-danger">{{ $errors->first('qualification_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.qualification_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.academicQualification.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $academicQualification->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="year">{{ trans('cruds.academicQualification.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="number" name="year" id="year" value="{{ old('year', $academicQualification->year) }}" step="1" required>
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="roll_no">{{ trans('cruds.academicQualification.fields.roll_no') }}</label>
                <input class="form-control {{ $errors->has('roll_no') ? 'is-invalid' : '' }}" type="text" name="roll_no" id="roll_no" value="{{ old('roll_no', $academicQualification->roll_no) }}">
                @if($errors->has('roll_no'))
                    <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.roll_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="board_id">{{ trans('cruds.academicQualification.fields.board') }}</label>
                <select class="form-control select2 {{ $errors->has('board') ? 'is-invalid' : '' }}" name="board_id" id="board_id" required>
                    @foreach($boards as $id => $entry)
                        <option value="{{ $id }}" {{ (old('board_id') ? old('board_id') : $academicQualification->board->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('board'))
                    <span class="text-danger">{{ $errors->first('board') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.board_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="result">{{ trans('cruds.academicQualification.fields.result') }}</label>
                <input class="form-control {{ $errors->has('result') ? 'is-invalid' : '' }}" type="text" name="result" id="result" value="{{ old('result', $academicQualification->result) }}" required>
                @if($errors->has('result'))
                    <span class="text-danger">{{ $errors->first('result') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.result_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="percentage">{{ trans('cruds.academicQualification.fields.percentage') }}</label>
                <input class="form-control {{ $errors->has('percentage') ? 'is-invalid' : '' }}" type="text" name="percentage" id="percentage" value="{{ old('percentage', $academicQualification->percentage) }}">
                @if($errors->has('percentage'))
                    <span class="text-danger">{{ $errors->first('percentage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.percentage_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cdn_url">{{ trans('cruds.academicQualification.fields.cdn_url') }}</label>
                <input class="form-control {{ $errors->has('cdn_url') ? 'is-invalid' : '' }}" type="text" name="cdn_url" id="cdn_url" value="{{ old('cdn_url', $academicQualification->cdn_url) }}">
                @if($errors->has('cdn_url'))
                    <span class="text-danger">{{ $errors->first('cdn_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.cdn_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.academicQualification.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $academicQualification->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.academicQualification.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $academicQualification->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.academicQualification.fields.remarks_helper') }}</span>
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