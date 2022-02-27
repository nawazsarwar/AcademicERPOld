@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.admissionCharge.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.admission-charges.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.admissionCharge.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.admissionCharge.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}">
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="boys_nr_external">{{ trans('cruds.admissionCharge.fields.boys_nr_external') }}</label>
                <input class="form-control {{ $errors->has('boys_nr_external') ? 'is-invalid' : '' }}" type="number" name="boys_nr_external" id="boys_nr_external" value="{{ old('boys_nr_external', '') }}" step="0.01">
                @if($errors->has('boys_nr_external'))
                    <span class="text-danger">{{ $errors->first('boys_nr_external') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.boys_nr_external_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="boys_nr_internal">{{ trans('cruds.admissionCharge.fields.boys_nr_internal') }}</label>
                <input class="form-control {{ $errors->has('boys_nr_internal') ? 'is-invalid' : '' }}" type="number" name="boys_nr_internal" id="boys_nr_internal" value="{{ old('boys_nr_internal', '') }}" step="0.01">
                @if($errors->has('boys_nr_internal'))
                    <span class="text-danger">{{ $errors->first('boys_nr_internal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.boys_nr_internal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="boys_resident_external">{{ trans('cruds.admissionCharge.fields.boys_resident_external') }}</label>
                <input class="form-control {{ $errors->has('boys_resident_external') ? 'is-invalid' : '' }}" type="number" name="boys_resident_external" id="boys_resident_external" value="{{ old('boys_resident_external', '') }}" step="0.01">
                @if($errors->has('boys_resident_external'))
                    <span class="text-danger">{{ $errors->first('boys_resident_external') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.boys_resident_external_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="boys_resident_internal">{{ trans('cruds.admissionCharge.fields.boys_resident_internal') }}</label>
                <input class="form-control {{ $errors->has('boys_resident_internal') ? 'is-invalid' : '' }}" type="number" name="boys_resident_internal" id="boys_resident_internal" value="{{ old('boys_resident_internal', '') }}" step="0.01">
                @if($errors->has('boys_resident_internal'))
                    <span class="text-danger">{{ $errors->first('boys_resident_internal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.boys_resident_internal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="girls_nr_external">{{ trans('cruds.admissionCharge.fields.girls_nr_external') }}</label>
                <input class="form-control {{ $errors->has('girls_nr_external') ? 'is-invalid' : '' }}" type="number" name="girls_nr_external" id="girls_nr_external" value="{{ old('girls_nr_external', '') }}" step="0.01">
                @if($errors->has('girls_nr_external'))
                    <span class="text-danger">{{ $errors->first('girls_nr_external') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.girls_nr_external_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="girls_nr_internal">{{ trans('cruds.admissionCharge.fields.girls_nr_internal') }}</label>
                <input class="form-control {{ $errors->has('girls_nr_internal') ? 'is-invalid' : '' }}" type="number" name="girls_nr_internal" id="girls_nr_internal" value="{{ old('girls_nr_internal', '') }}" step="0.01">
                @if($errors->has('girls_nr_internal'))
                    <span class="text-danger">{{ $errors->first('girls_nr_internal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.girls_nr_internal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="girls_resident_external">{{ trans('cruds.admissionCharge.fields.girls_resident_external') }}</label>
                <input class="form-control {{ $errors->has('girls_resident_external') ? 'is-invalid' : '' }}" type="number" name="girls_resident_external" id="girls_resident_external" value="{{ old('girls_resident_external', '') }}" step="0.01">
                @if($errors->has('girls_resident_external'))
                    <span class="text-danger">{{ $errors->first('girls_resident_external') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.girls_resident_external_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="girls_resident_internal">{{ trans('cruds.admissionCharge.fields.girls_resident_internal') }}</label>
                <input class="form-control {{ $errors->has('girls_resident_internal') ? 'is-invalid' : '' }}" type="number" name="girls_resident_internal" id="girls_resident_internal" value="{{ old('girls_resident_internal', '') }}" step="0.01">
                @if($errors->has('girls_resident_internal'))
                    <span class="text-danger">{{ $errors->first('girls_resident_internal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.girls_resident_internal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.admissionCharge.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.admissionCharge.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.admissionCharge.fields.remarks_helper') }}</span>
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