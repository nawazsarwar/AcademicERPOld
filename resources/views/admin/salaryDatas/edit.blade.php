@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salaryData.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.salary-datas.update", [$salaryData->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.salaryData.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $salaryData->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ecode">{{ trans('cruds.salaryData.fields.ecode') }}</label>
                <input class="form-control {{ $errors->has('ecode') ? 'is-invalid' : '' }}" type="text" name="ecode" id="ecode" value="{{ old('ecode', $salaryData->ecode) }}" required>
                @if($errors->has('ecode'))
                    <span class="text-danger">{{ $errors->first('ecode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.ecode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_name">{{ trans('cruds.salaryData.fields.emp_name') }}</label>
                <input class="form-control {{ $errors->has('emp_name') ? 'is-invalid' : '' }}" type="text" name="emp_name" id="emp_name" value="{{ old('emp_name', $salaryData->emp_name) }}" required>
                @if($errors->has('emp_name'))
                    <span class="text-danger">{{ $errors->first('emp_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.emp_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.salaryData.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $salaryData->first_name) }}">
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="middle_name">{{ trans('cruds.salaryData.fields.middle_name') }}</label>
                <input class="form-control {{ $errors->has('middle_name') ? 'is-invalid' : '' }}" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $salaryData->middle_name) }}">
                @if($errors->has('middle_name'))
                    <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.middle_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.salaryData.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $salaryData->last_name) }}">
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pay_grade">{{ trans('cruds.salaryData.fields.pay_grade') }}</label>
                <input class="form-control {{ $errors->has('pay_grade') ? 'is-invalid' : '' }}" type="text" name="pay_grade" id="pay_grade" value="{{ old('pay_grade', $salaryData->pay_grade) }}">
                @if($errors->has('pay_grade'))
                    <span class="text-danger">{{ $errors->first('pay_grade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.pay_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="basic">{{ trans('cruds.salaryData.fields.basic') }}</label>
                <input class="form-control {{ $errors->has('basic') ? 'is-invalid' : '' }}" type="number" name="basic" id="basic" value="{{ old('basic', $salaryData->basic) }}" step="0.01">
                @if($errors->has('basic'))
                    <span class="text-danger">{{ $errors->first('basic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.basic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pan_no">{{ trans('cruds.salaryData.fields.pan_no') }}</label>
                <input class="form-control {{ $errors->has('pan_no') ? 'is-invalid' : '' }}" type="text" name="pan_no" id="pan_no" value="{{ old('pan_no', $salaryData->pan_no) }}">
                @if($errors->has('pan_no'))
                    <span class="text-danger">{{ $errors->first('pan_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.pan_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desig_name">{{ trans('cruds.salaryData.fields.desig_name') }}</label>
                <input class="form-control {{ $errors->has('desig_name') ? 'is-invalid' : '' }}" type="text" name="desig_name" id="desig_name" value="{{ old('desig_name', $salaryData->desig_name) }}">
                @if($errors->has('desig_name'))
                    <span class="text-danger">{{ $errors->first('desig_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.desig_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dept_name">{{ trans('cruds.salaryData.fields.dept_name') }}</label>
                <input class="form-control {{ $errors->has('dept_name') ? 'is-invalid' : '' }}" type="text" name="dept_name" id="dept_name" value="{{ old('dept_name', $salaryData->dept_name) }}">
                @if($errors->has('dept_name'))
                    <span class="text-danger">{{ $errors->first('dept_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.dept_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="emp_status">{{ trans('cruds.salaryData.fields.emp_status') }}</label>
                <input class="form-control {{ $errors->has('emp_status') ? 'is-invalid' : '' }}" type="text" name="emp_status" id="emp_status" value="{{ old('emp_status', $salaryData->emp_status) }}">
                @if($errors->has('emp_status'))
                    <span class="text-danger">{{ $errors->first('emp_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.emp_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_join">{{ trans('cruds.salaryData.fields.date_of_join') }}</label>
                <input class="form-control {{ $errors->has('date_of_join') ? 'is-invalid' : '' }}" type="text" name="date_of_join" id="date_of_join" value="{{ old('date_of_join', $salaryData->date_of_join) }}">
                @if($errors->has('date_of_join'))
                    <span class="text-danger">{{ $errors->first('date_of_join') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.date_of_join_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sex">{{ trans('cruds.salaryData.fields.sex') }}</label>
                <input class="form-control {{ $errors->has('sex') ? 'is-invalid' : '' }}" type="text" name="sex" id="sex" value="{{ old('sex', $salaryData->sex) }}">
                @if($errors->has('sex'))
                    <span class="text-danger">{{ $errors->first('sex') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.sex_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_birth">{{ trans('cruds.salaryData.fields.date_of_birth') }}</label>
                <input class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $salaryData->date_of_birth) }}">
                @if($errors->has('date_of_birth'))
                    <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="retire_date">{{ trans('cruds.salaryData.fields.retire_date') }}</label>
                <input class="form-control {{ $errors->has('retire_date') ? 'is-invalid' : '' }}" type="text" name="retire_date" id="retire_date" value="{{ old('retire_date', $salaryData->retire_date) }}">
                @if($errors->has('retire_date'))
                    <span class="text-danger">{{ $errors->first('retire_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.retire_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pf_type">{{ trans('cruds.salaryData.fields.pf_type') }}</label>
                <input class="form-control {{ $errors->has('pf_type') ? 'is-invalid' : '' }}" type="text" name="pf_type" id="pf_type" value="{{ old('pf_type', $salaryData->pf_type) }}">
                @if($errors->has('pf_type'))
                    <span class="text-danger">{{ $errors->first('pf_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.pf_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="emp_grop">{{ trans('cruds.salaryData.fields.emp_grop') }}</label>
                <input class="form-control {{ $errors->has('emp_grop') ? 'is-invalid' : '' }}" type="text" name="emp_grop" id="emp_grop" value="{{ old('emp_grop', $salaryData->emp_grop) }}">
                @if($errors->has('emp_grop'))
                    <span class="text-danger">{{ $errors->first('emp_grop') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.emp_grop_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="leave">{{ trans('cruds.salaryData.fields.leave') }}</label>
                <input class="form-control {{ $errors->has('leave') ? 'is-invalid' : '' }}" type="text" name="leave" id="leave" value="{{ old('leave', $salaryData->leave) }}">
                @if($errors->has('leave'))
                    <span class="text-danger">{{ $errors->first('leave') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.leave_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation_category">{{ trans('cruds.salaryData.fields.designation_category') }}</label>
                <input class="form-control {{ $errors->has('designation_category') ? 'is-invalid' : '' }}" type="text" name="designation_category" id="designation_category" value="{{ old('designation_category', $salaryData->designation_category) }}">
                @if($errors->has('designation_category'))
                    <span class="text-danger">{{ $errors->first('designation_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.designation_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="exists_cc">{{ trans('cruds.salaryData.fields.exists_cc') }}</label>
                <input class="form-control {{ $errors->has('exists_cc') ? 'is-invalid' : '' }}" type="number" name="exists_cc" id="exists_cc" value="{{ old('exists_cc', $salaryData->exists_cc) }}" step="1">
                @if($errors->has('exists_cc'))
                    <span class="text-danger">{{ $errors->first('exists_cc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.exists_cc_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="import_date">{{ trans('cruds.salaryData.fields.import_date') }}</label>
                <input class="form-control date {{ $errors->has('import_date') ? 'is-invalid' : '' }}" type="text" name="import_date" id="import_date" value="{{ old('import_date', $salaryData->import_date) }}" required>
                @if($errors->has('import_date'))
                    <span class="text-danger">{{ $errors->first('import_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.import_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="salary_month">{{ trans('cruds.salaryData.fields.salary_month') }}</label>
                <input class="form-control {{ $errors->has('salary_month') ? 'is-invalid' : '' }}" type="text" name="salary_month" id="salary_month" value="{{ old('salary_month', $salaryData->salary_month) }}">
                @if($errors->has('salary_month'))
                    <span class="text-danger">{{ $errors->first('salary_month') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salaryData.fields.salary_month_helper') }}</span>
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