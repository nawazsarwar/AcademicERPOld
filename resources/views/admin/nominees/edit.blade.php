@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.nominee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.nominees.update", [$nominee->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.nominee.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $nominee->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.nominee.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $nominee->address) }}" required>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="relationship">{{ trans('cruds.nominee.fields.relationship') }}</label>
                <input class="form-control {{ $errors->has('relationship') ? 'is-invalid' : '' }}" type="text" name="relationship" id="relationship" value="{{ old('relationship', $nominee->relationship) }}">
                @if($errors->has('relationship'))
                    <span class="text-danger">{{ $errors->first('relationship') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.relationship_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="age">{{ trans('cruds.nominee.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('age', $nominee->age) }}">
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="witness_name_1">{{ trans('cruds.nominee.fields.witness_name_1') }}</label>
                <input class="form-control {{ $errors->has('witness_name_1') ? 'is-invalid' : '' }}" type="text" name="witness_name_1" id="witness_name_1" value="{{ old('witness_name_1', $nominee->witness_name_1) }}">
                @if($errors->has('witness_name_1'))
                    <span class="text-danger">{{ $errors->first('witness_name_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.witness_name_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation_witness_1">{{ trans('cruds.nominee.fields.designation_witness_1') }}</label>
                <input class="form-control {{ $errors->has('designation_witness_1') ? 'is-invalid' : '' }}" type="text" name="designation_witness_1" id="designation_witness_1" value="{{ old('designation_witness_1', $nominee->designation_witness_1) }}">
                @if($errors->has('designation_witness_1'))
                    <span class="text-danger">{{ $errors->first('designation_witness_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.designation_witness_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_witness_1">{{ trans('cruds.nominee.fields.department_witness_1') }}</label>
                <input class="form-control {{ $errors->has('department_witness_1') ? 'is-invalid' : '' }}" type="text" name="department_witness_1" id="department_witness_1" value="{{ old('department_witness_1', $nominee->department_witness_1) }}">
                @if($errors->has('department_witness_1'))
                    <span class="text-danger">{{ $errors->first('department_witness_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.department_witness_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="witness_name_2">{{ trans('cruds.nominee.fields.witness_name_2') }}</label>
                <input class="form-control {{ $errors->has('witness_name_2') ? 'is-invalid' : '' }}" type="text" name="witness_name_2" id="witness_name_2" value="{{ old('witness_name_2', $nominee->witness_name_2) }}">
                @if($errors->has('witness_name_2'))
                    <span class="text-danger">{{ $errors->first('witness_name_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.witness_name_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation_witness_2">{{ trans('cruds.nominee.fields.designation_witness_2') }}</label>
                <input class="form-control {{ $errors->has('designation_witness_2') ? 'is-invalid' : '' }}" type="text" name="designation_witness_2" id="designation_witness_2" value="{{ old('designation_witness_2', $nominee->designation_witness_2) }}">
                @if($errors->has('designation_witness_2'))
                    <span class="text-danger">{{ $errors->first('designation_witness_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.designation_witness_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_witness_2">{{ trans('cruds.nominee.fields.department_witness_2') }}</label>
                <input class="form-control {{ $errors->has('department_witness_2') ? 'is-invalid' : '' }}" type="text" name="department_witness_2" id="department_witness_2" value="{{ old('department_witness_2', $nominee->department_witness_2) }}">
                @if($errors->has('department_witness_2'))
                    <span class="text-danger">{{ $errors->first('department_witness_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.department_witness_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employee_id">{{ trans('cruds.nominee.fields.employee') }}</label>
                <select class="form-control select2 {{ $errors->has('employee') ? 'is-invalid' : '' }}" name="employee_id" id="employee_id" required>
                    @foreach($employees as $id => $entry)
                        <option value="{{ $id }}" {{ (old('employee_id') ? old('employee_id') : $nominee->employee->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee'))
                    <span class="text-danger">{{ $errors->first('employee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.employee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.nominee.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $nominee->status) }}" step="1">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.nominee.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $nominee->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nominee.fields.remarks_helper') }}</span>
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