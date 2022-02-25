@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employees.update", [$employee->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="person_id">{{ trans('cruds.employee.fields.person') }}</label>
                <select class="form-control select2 {{ $errors->has('person') ? 'is-invalid' : '' }}" name="person_id" id="person_id" required>
                    @foreach($people as $id => $entry)
                        <option value="{{ $id }}" {{ (old('person_id') ? old('person_id') : $employee->person->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('person'))
                    <span class="text-danger">{{ $errors->first('person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.person_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employee_no">{{ trans('cruds.employee.fields.employee_no') }}</label>
                <input class="form-control {{ $errors->has('employee_no') ? 'is-invalid' : '' }}" type="text" name="employee_no" id="employee_no" value="{{ old('employee_no', $employee->employee_no) }}" required>
                @if($errors->has('employee_no'))
                    <span class="text-danger">{{ $errors->first('employee_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.employee_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="service_book_no">{{ trans('cruds.employee.fields.service_book_no') }}</label>
                <input class="form-control {{ $errors->has('service_book_no') ? 'is-invalid' : '' }}" type="text" name="service_book_no" id="service_book_no" value="{{ old('service_book_no', $employee->service_book_no) }}">
                @if($errors->has('service_book_no'))
                    <span class="text-danger">{{ $errors->first('service_book_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.service_book_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="application_no">{{ trans('cruds.employee.fields.application_no') }}</label>
                <input class="form-control {{ $errors->has('application_no') ? 'is-invalid' : '' }}" type="text" name="application_no" id="application_no" value="{{ old('application_no', $employee->application_no) }}">
                @if($errors->has('application_no'))
                    <span class="text-danger">{{ $errors->first('application_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.application_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="highest_qualification">{{ trans('cruds.employee.fields.highest_qualification') }}</label>
                <input class="form-control {{ $errors->has('highest_qualification') ? 'is-invalid' : '' }}" type="text" name="highest_qualification" id="highest_qualification" value="{{ old('highest_qualification', $employee->highest_qualification) }}">
                @if($errors->has('highest_qualification'))
                    <span class="text-danger">{{ $errors->first('highest_qualification') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.highest_qualification_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employment_status_id">{{ trans('cruds.employee.fields.employment_status') }}</label>
                <select class="form-control select2 {{ $errors->has('employment_status') ? 'is-invalid' : '' }}" name="employment_status_id" id="employment_status_id">
                    @foreach($employment_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('employment_status_id') ? old('employment_status_id') : $employee->employment_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('employment_status'))
                    <span class="text-danger">{{ $errors->first('employment_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.employment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_date">{{ trans('cruds.employee.fields.status_date') }}</label>
                <input class="form-control date {{ $errors->has('status_date') ? 'is-invalid' : '' }}" type="text" name="status_date" id="status_date" value="{{ old('status_date', $employee->status_date) }}">
                @if($errors->has('status_date'))
                    <span class="text-danger">{{ $errors->first('status_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.status_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.employee.fields.group') }}</label>
                <select class="form-control {{ $errors->has('group') ? 'is-invalid' : '' }}" name="group" id="group">
                    <option value disabled {{ old('group', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employee::GROUP_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('group', $employee->group) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('group'))
                    <span class="text-danger">{{ $errors->first('group') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.group_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.employee.fields.retirement_scheme') }}</label>
                <select class="form-control {{ $errors->has('retirement_scheme') ? 'is-invalid' : '' }}" name="retirement_scheme" id="retirement_scheme">
                    <option value disabled {{ old('retirement_scheme', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employee::RETIREMENT_SCHEME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('retirement_scheme', $employee->retirement_scheme) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('retirement_scheme'))
                    <span class="text-danger">{{ $errors->first('retirement_scheme') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.retirement_scheme_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.employee.fields.employment_type') }}</label>
                <select class="form-control {{ $errors->has('employment_type') ? 'is-invalid' : '' }}" name="employment_type" id="employment_type">
                    <option value disabled {{ old('employment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employee::EMPLOYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('employment_type', $employee->employment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('employment_type'))
                    <span class="text-danger">{{ $errors->first('employment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.employment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="leave_account_no">{{ trans('cruds.employee.fields.leave_account_no') }}</label>
                <input class="form-control {{ $errors->has('leave_account_no') ? 'is-invalid' : '' }}" type="text" name="leave_account_no" id="leave_account_no" value="{{ old('leave_account_no', $employee->leave_account_no) }}">
                @if($errors->has('leave_account_no'))
                    <span class="text-danger">{{ $errors->first('leave_account_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.leave_account_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pf_account_no">{{ trans('cruds.employee.fields.pf_account_no') }}</label>
                <input class="form-control {{ $errors->has('pf_account_no') ? 'is-invalid' : '' }}" type="text" name="pf_account_no" id="pf_account_no" value="{{ old('pf_account_no', $employee->pf_account_no) }}">
                @if($errors->has('pf_account_no'))
                    <span class="text-danger">{{ $errors->first('pf_account_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.pf_account_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="personal_file_no">{{ trans('cruds.employee.fields.personal_file_no') }}</label>
                <input class="form-control {{ $errors->has('personal_file_no') ? 'is-invalid' : '' }}" type="text" name="personal_file_no" id="personal_file_no" value="{{ old('personal_file_no', $employee->personal_file_no) }}">
                @if($errors->has('personal_file_no'))
                    <span class="text-danger">{{ $errors->first('personal_file_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.personal_file_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.employee.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $employee->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verification_status_id">{{ trans('cruds.employee.fields.verification_status') }}</label>
                <select class="form-control select2 {{ $errors->has('verification_status') ? 'is-invalid' : '' }}" name="verification_status_id" id="verification_status_id">
                    @foreach($verification_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('verification_status_id') ? old('verification_status_id') : $employee->verification_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('verification_status'))
                    <span class="text-danger">{{ $errors->first('verification_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.verification_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_by_id">{{ trans('cruds.employee.fields.verified_by') }}</label>
                <select class="form-control select2 {{ $errors->has('verified_by') ? 'is-invalid' : '' }}" name="verified_by_id" id="verified_by_id">
                    @foreach($verified_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('verified_by_id') ? old('verified_by_id') : $employee->verified_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('verified_by'))
                    <span class="text-danger">{{ $errors->first('verified_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.verified_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verified_at">{{ trans('cruds.employee.fields.verified_at') }}</label>
                <input class="form-control date {{ $errors->has('verified_at') ? 'is-invalid' : '' }}" type="text" name="verified_at" id="verified_at" value="{{ old('verified_at', $employee->verified_at) }}">
                @if($errors->has('verified_at'))
                    <span class="text-danger">{{ $errors->first('verified_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.verified_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="verification_remark">{{ trans('cruds.employee.fields.verification_remark') }}</label>
                <textarea class="form-control {{ $errors->has('verification_remark') ? 'is-invalid' : '' }}" name="verification_remark" id="verification_remark">{{ old('verification_remark', $employee->verification_remark) }}</textarea>
                @if($errors->has('verification_remark'))
                    <span class="text-danger">{{ $errors->first('verification_remark') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.verification_remark_helper') }}</span>
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