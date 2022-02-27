@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.nominee.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.nominees.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.nominee.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.nominee.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="relationship">{{ trans('cruds.nominee.fields.relationship') }}</label>
                            <input class="form-control" type="text" name="relationship" id="relationship" value="{{ old('relationship', '') }}">
                            @if($errors->has('relationship'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('relationship') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.relationship_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="age">{{ trans('cruds.nominee.fields.age') }}</label>
                            <input class="form-control" type="text" name="age" id="age" value="{{ old('age', '') }}">
                            @if($errors->has('age'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('age') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.age_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="witness_name_1">{{ trans('cruds.nominee.fields.witness_name_1') }}</label>
                            <input class="form-control" type="text" name="witness_name_1" id="witness_name_1" value="{{ old('witness_name_1', '') }}">
                            @if($errors->has('witness_name_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('witness_name_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.witness_name_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="designation_witness_1">{{ trans('cruds.nominee.fields.designation_witness_1') }}</label>
                            <input class="form-control" type="text" name="designation_witness_1" id="designation_witness_1" value="{{ old('designation_witness_1', '') }}">
                            @if($errors->has('designation_witness_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('designation_witness_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.designation_witness_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="department_witness_1">{{ trans('cruds.nominee.fields.department_witness_1') }}</label>
                            <input class="form-control" type="text" name="department_witness_1" id="department_witness_1" value="{{ old('department_witness_1', '') }}">
                            @if($errors->has('department_witness_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department_witness_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.department_witness_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="witness_name_2">{{ trans('cruds.nominee.fields.witness_name_2') }}</label>
                            <input class="form-control" type="text" name="witness_name_2" id="witness_name_2" value="{{ old('witness_name_2', '') }}">
                            @if($errors->has('witness_name_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('witness_name_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.witness_name_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="designation_witness_2">{{ trans('cruds.nominee.fields.designation_witness_2') }}</label>
                            <input class="form-control" type="text" name="designation_witness_2" id="designation_witness_2" value="{{ old('designation_witness_2', '') }}">
                            @if($errors->has('designation_witness_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('designation_witness_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.designation_witness_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="department_witness_2">{{ trans('cruds.nominee.fields.department_witness_2') }}</label>
                            <input class="form-control" type="text" name="department_witness_2" id="department_witness_2" value="{{ old('department_witness_2', '') }}">
                            @if($errors->has('department_witness_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department_witness_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.department_witness_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="employee_id">{{ trans('cruds.nominee.fields.employee') }}</label>
                            <select class="form-control select2" name="employee_id" id="employee_id" required>
                                @foreach($employees as $id => $entry)
                                    <option value="{{ $id }}" {{ old('employee_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('employee'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employee') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.employee_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.nominee.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nominee.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.nominee.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection