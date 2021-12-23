@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.designation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.designations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.designation.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.designation.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pay_grade">{{ trans('cruds.designation.fields.pay_grade') }}</label>
                <input class="form-control {{ $errors->has('pay_grade') ? 'is-invalid' : '' }}" type="text" name="pay_grade" id="pay_grade" value="{{ old('pay_grade', '') }}">
                @if($errors->has('pay_grade'))
                    <span class="text-danger">{{ $errors->first('pay_grade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.pay_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type_id">{{ trans('cruds.designation.fields.type') }}</label>
                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id" id="type_id" required>
                    @foreach($types as $id => $entry)
                        <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="retirement_age">{{ trans('cruds.designation.fields.retirement_age') }}</label>
                <input class="form-control {{ $errors->has('retirement_age') ? 'is-invalid' : '' }}" type="number" name="retirement_age" id="retirement_age" value="{{ old('retirement_age', '') }}" step="1" required>
                @if($errors->has('retirement_age'))
                    <span class="text-danger">{{ $errors->first('retirement_age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.retirement_age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.designation.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designation.fields.remarks_helper') }}</span>
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