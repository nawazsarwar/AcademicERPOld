@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.admissionCharge.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.admission-charges.update", [$admissionCharge->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.admissionCharge.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                @foreach($courses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $admissionCharge->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="code">{{ trans('cruds.admissionCharge.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $admissionCharge->code) }}">
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="boys_nr_external">{{ trans('cruds.admissionCharge.fields.boys_nr_external') }}</label>
                            <input class="form-control" type="number" name="boys_nr_external" id="boys_nr_external" value="{{ old('boys_nr_external', $admissionCharge->boys_nr_external) }}" step="0.01">
                            @if($errors->has('boys_nr_external'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('boys_nr_external') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.boys_nr_external_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="boys_nr_internal">{{ trans('cruds.admissionCharge.fields.boys_nr_internal') }}</label>
                            <input class="form-control" type="number" name="boys_nr_internal" id="boys_nr_internal" value="{{ old('boys_nr_internal', $admissionCharge->boys_nr_internal) }}" step="0.01">
                            @if($errors->has('boys_nr_internal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('boys_nr_internal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.boys_nr_internal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="boys_resident_external">{{ trans('cruds.admissionCharge.fields.boys_resident_external') }}</label>
                            <input class="form-control" type="number" name="boys_resident_external" id="boys_resident_external" value="{{ old('boys_resident_external', $admissionCharge->boys_resident_external) }}" step="0.01">
                            @if($errors->has('boys_resident_external'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('boys_resident_external') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.boys_resident_external_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="boys_resident_internal">{{ trans('cruds.admissionCharge.fields.boys_resident_internal') }}</label>
                            <input class="form-control" type="number" name="boys_resident_internal" id="boys_resident_internal" value="{{ old('boys_resident_internal', $admissionCharge->boys_resident_internal) }}" step="0.01">
                            @if($errors->has('boys_resident_internal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('boys_resident_internal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.boys_resident_internal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="girls_nr_external">{{ trans('cruds.admissionCharge.fields.girls_nr_external') }}</label>
                            <input class="form-control" type="number" name="girls_nr_external" id="girls_nr_external" value="{{ old('girls_nr_external', $admissionCharge->girls_nr_external) }}" step="0.01">
                            @if($errors->has('girls_nr_external'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('girls_nr_external') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.girls_nr_external_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="girls_nr_internal">{{ trans('cruds.admissionCharge.fields.girls_nr_internal') }}</label>
                            <input class="form-control" type="number" name="girls_nr_internal" id="girls_nr_internal" value="{{ old('girls_nr_internal', $admissionCharge->girls_nr_internal) }}" step="0.01">
                            @if($errors->has('girls_nr_internal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('girls_nr_internal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.girls_nr_internal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="girls_resident_external">{{ trans('cruds.admissionCharge.fields.girls_resident_external') }}</label>
                            <input class="form-control" type="number" name="girls_resident_external" id="girls_resident_external" value="{{ old('girls_resident_external', $admissionCharge->girls_resident_external) }}" step="0.01">
                            @if($errors->has('girls_resident_external'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('girls_resident_external') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.girls_resident_external_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="girls_resident_internal">{{ trans('cruds.admissionCharge.fields.girls_resident_internal') }}</label>
                            <input class="form-control" type="number" name="girls_resident_internal" id="girls_resident_internal" value="{{ old('girls_resident_internal', $admissionCharge->girls_resident_internal) }}" step="0.01">
                            @if($errors->has('girls_resident_internal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('girls_resident_internal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.girls_resident_internal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.admissionCharge.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $admissionCharge->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.admissionCharge.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.admissionCharge.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $admissionCharge->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection