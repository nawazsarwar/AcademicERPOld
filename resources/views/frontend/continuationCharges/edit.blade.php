@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.continuationCharge.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.continuation-charges.update", [$continuationCharge->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.continuationCharge.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                @foreach($courses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $continuationCharge->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nr_total">{{ trans('cruds.continuationCharge.fields.nr_total') }}</label>
                            <input class="form-control" type="number" name="nr_total" id="nr_total" value="{{ old('nr_total', $continuationCharge->nr_total) }}" step="0.01">
                            @if($errors->has('nr_total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nr_total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.nr_total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nr_first_installment">{{ trans('cruds.continuationCharge.fields.nr_first_installment') }}</label>
                            <input class="form-control" type="number" name="nr_first_installment" id="nr_first_installment" value="{{ old('nr_first_installment', $continuationCharge->nr_first_installment) }}" step="0.01">
                            @if($errors->has('nr_first_installment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nr_first_installment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.nr_first_installment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nr_second_installment">{{ trans('cruds.continuationCharge.fields.nr_second_installment') }}</label>
                            <input class="form-control" type="number" name="nr_second_installment" id="nr_second_installment" value="{{ old('nr_second_installment', $continuationCharge->nr_second_installment) }}" step="0.01">
                            @if($errors->has('nr_second_installment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nr_second_installment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.nr_second_installment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="resident_total">{{ trans('cruds.continuationCharge.fields.resident_total') }}</label>
                            <input class="form-control" type="number" name="resident_total" id="resident_total" value="{{ old('resident_total', $continuationCharge->resident_total) }}" step="0.01">
                            @if($errors->has('resident_total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('resident_total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.resident_total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="resident_first_installment">{{ trans('cruds.continuationCharge.fields.resident_first_installment') }}</label>
                            <input class="form-control" type="number" name="resident_first_installment" id="resident_first_installment" value="{{ old('resident_first_installment', $continuationCharge->resident_first_installment) }}" step="0.01">
                            @if($errors->has('resident_first_installment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('resident_first_installment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.resident_first_installment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="resident_second_installment">{{ trans('cruds.continuationCharge.fields.resident_second_installment') }}</label>
                            <input class="form-control" type="number" name="resident_second_installment" id="resident_second_installment" value="{{ old('resident_second_installment', $continuationCharge->resident_second_installment) }}" step="0.01">
                            @if($errors->has('resident_second_installment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('resident_second_installment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.resident_second_installment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.continuationCharge.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', $continuationCharge->status) }}" step="1">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.continuationCharge.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $continuationCharge->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.continuationCharge.fields.remarks_helper') }}</span>
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