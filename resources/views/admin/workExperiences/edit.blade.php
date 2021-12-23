@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.workExperience.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.work-experiences.update", [$workExperience->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="employer">{{ trans('cruds.workExperience.fields.employer') }}</label>
                <input class="form-control {{ $errors->has('employer') ? 'is-invalid' : '' }}" type="text" name="employer" id="employer" value="{{ old('employer', $workExperience->employer) }}" required>
                @if($errors->has('employer'))
                    <span class="text-danger">{{ $errors->first('employer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.employer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.workExperience.fields.employer_type') }}</label>
                <select class="form-control {{ $errors->has('employer_type') ? 'is-invalid' : '' }}" name="employer_type" id="employer_type" required>
                    <option value disabled {{ old('employer_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\WorkExperience::EMPLOYER_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('employer_type', $workExperience->employer_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('employer_type'))
                    <span class="text-danger">{{ $errors->first('employer_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.employer_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="designation">{{ trans('cruds.workExperience.fields.designation') }}</label>
                <input class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}" type="text" name="designation" id="designation" value="{{ old('designation', $workExperience->designation) }}" required>
                @if($errors->has('designation'))
                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.designation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employed_from">{{ trans('cruds.workExperience.fields.employed_from') }}</label>
                <input class="form-control date {{ $errors->has('employed_from') ? 'is-invalid' : '' }}" type="text" name="employed_from" id="employed_from" value="{{ old('employed_from', $workExperience->employed_from) }}" required>
                @if($errors->has('employed_from'))
                    <span class="text-danger">{{ $errors->first('employed_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.employed_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employed_to">{{ trans('cruds.workExperience.fields.employed_to') }}</label>
                <input class="form-control date {{ $errors->has('employed_to') ? 'is-invalid' : '' }}" type="text" name="employed_to" id="employed_to" value="{{ old('employed_to', $workExperience->employed_to) }}">
                @if($errors->has('employed_to'))
                    <span class="text-danger">{{ $errors->first('employed_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.employed_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="responsibilities">{{ trans('cruds.workExperience.fields.responsibilities') }}</label>
                <input class="form-control {{ $errors->has('responsibilities') ? 'is-invalid' : '' }}" type="text" name="responsibilities" id="responsibilities" value="{{ old('responsibilities', $workExperience->responsibilities) }}" required>
                @if($errors->has('responsibilities'))
                    <span class="text-danger">{{ $errors->first('responsibilities') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.responsibilities_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason_for_leaving">{{ trans('cruds.workExperience.fields.reason_for_leaving') }}</label>
                <input class="form-control {{ $errors->has('reason_for_leaving') ? 'is-invalid' : '' }}" type="text" name="reason_for_leaving" id="reason_for_leaving" value="{{ old('reason_for_leaving', $workExperience->reason_for_leaving) }}">
                @if($errors->has('reason_for_leaving'))
                    <span class="text-danger">{{ $errors->first('reason_for_leaving') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.reason_for_leaving_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pay_band">{{ trans('cruds.workExperience.fields.pay_band') }}</label>
                <input class="form-control {{ $errors->has('pay_band') ? 'is-invalid' : '' }}" type="text" name="pay_band" id="pay_band" value="{{ old('pay_band', $workExperience->pay_band) }}">
                @if($errors->has('pay_band'))
                    <span class="text-danger">{{ $errors->first('pay_band') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.pay_band_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="basic_pay">{{ trans('cruds.workExperience.fields.basic_pay') }}</label>
                <input class="form-control {{ $errors->has('basic_pay') ? 'is-invalid' : '' }}" type="text" name="basic_pay" id="basic_pay" value="{{ old('basic_pay', $workExperience->basic_pay) }}">
                @if($errors->has('basic_pay'))
                    <span class="text-danger">{{ $errors->first('basic_pay') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.basic_pay_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gross_pay">{{ trans('cruds.workExperience.fields.gross_pay') }}</label>
                <input class="form-control {{ $errors->has('gross_pay') ? 'is-invalid' : '' }}" type="text" name="gross_pay" id="gross_pay" value="{{ old('gross_pay', $workExperience->gross_pay) }}">
                @if($errors->has('gross_pay'))
                    <span class="text-danger">{{ $errors->first('gross_pay') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.gross_pay_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.workExperience.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $workExperience->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.workExperience.fields.user_helper') }}</span>
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