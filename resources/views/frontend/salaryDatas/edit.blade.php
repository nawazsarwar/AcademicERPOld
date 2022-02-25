@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.salaryData.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.salary-datas.update", [$salaryData->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.salaryData.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $salaryData->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="ecode">{{ trans('cruds.salaryData.fields.ecode') }}</label>
                            <input class="form-control" type="text" name="ecode" id="ecode" value="{{ old('ecode', $salaryData->ecode) }}" required>
                            @if($errors->has('ecode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ecode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.ecode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="emp_name">{{ trans('cruds.salaryData.fields.emp_name') }}</label>
                            <input class="form-control" type="text" name="emp_name" id="emp_name" value="{{ old('emp_name', $salaryData->emp_name) }}" required>
                            @if($errors->has('emp_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('emp_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.emp_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="first_name">{{ trans('cruds.salaryData.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $salaryData->first_name) }}">
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">{{ trans('cruds.salaryData.fields.middle_name') }}</label>
                            <input class="form-control" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $salaryData->middle_name) }}">
                            @if($errors->has('middle_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('middle_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.middle_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="last_name">{{ trans('cruds.salaryData.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $salaryData->last_name) }}">
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pay_grade">{{ trans('cruds.salaryData.fields.pay_grade') }}</label>
                            <input class="form-control" type="text" name="pay_grade" id="pay_grade" value="{{ old('pay_grade', $salaryData->pay_grade) }}">
                            @if($errors->has('pay_grade'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pay_grade') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.pay_grade_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="basic">{{ trans('cruds.salaryData.fields.basic') }}</label>
                            <input class="form-control" type="number" name="basic" id="basic" value="{{ old('basic', $salaryData->basic) }}" step="0.01">
                            @if($errors->has('basic'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('basic') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.basic_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pan_no">{{ trans('cruds.salaryData.fields.pan_no') }}</label>
                            <input class="form-control" type="text" name="pan_no" id="pan_no" value="{{ old('pan_no', $salaryData->pan_no) }}">
                            @if($errors->has('pan_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pan_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.pan_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="desig_name">{{ trans('cruds.salaryData.fields.desig_name') }}</label>
                            <input class="form-control" type="text" name="desig_name" id="desig_name" value="{{ old('desig_name', $salaryData->desig_name) }}">
                            @if($errors->has('desig_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('desig_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.desig_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dept_name">{{ trans('cruds.salaryData.fields.dept_name') }}</label>
                            <input class="form-control" type="text" name="dept_name" id="dept_name" value="{{ old('dept_name', $salaryData->dept_name) }}">
                            @if($errors->has('dept_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dept_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.dept_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="emp_status">{{ trans('cruds.salaryData.fields.emp_status') }}</label>
                            <input class="form-control" type="text" name="emp_status" id="emp_status" value="{{ old('emp_status', $salaryData->emp_status) }}">
                            @if($errors->has('emp_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('emp_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.emp_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_of_join">{{ trans('cruds.salaryData.fields.date_of_join') }}</label>
                            <input class="form-control" type="text" name="date_of_join" id="date_of_join" value="{{ old('date_of_join', $salaryData->date_of_join) }}">
                            @if($errors->has('date_of_join'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_join') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.date_of_join_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sex">{{ trans('cruds.salaryData.fields.sex') }}</label>
                            <input class="form-control" type="text" name="sex" id="sex" value="{{ old('sex', $salaryData->sex) }}">
                            @if($errors->has('sex'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sex') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.sex_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">{{ trans('cruds.salaryData.fields.date_of_birth') }}</label>
                            <input class="form-control" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $salaryData->date_of_birth) }}">
                            @if($errors->has('date_of_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_birth') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.date_of_birth_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="retire_date">{{ trans('cruds.salaryData.fields.retire_date') }}</label>
                            <input class="form-control" type="text" name="retire_date" id="retire_date" value="{{ old('retire_date', $salaryData->retire_date) }}">
                            @if($errors->has('retire_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('retire_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.retire_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pf_type">{{ trans('cruds.salaryData.fields.pf_type') }}</label>
                            <input class="form-control" type="text" name="pf_type" id="pf_type" value="{{ old('pf_type', $salaryData->pf_type) }}">
                            @if($errors->has('pf_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pf_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.pf_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="emp_grop">{{ trans('cruds.salaryData.fields.emp_grop') }}</label>
                            <input class="form-control" type="text" name="emp_grop" id="emp_grop" value="{{ old('emp_grop', $salaryData->emp_grop) }}">
                            @if($errors->has('emp_grop'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('emp_grop') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.emp_grop_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="leave">{{ trans('cruds.salaryData.fields.leave') }}</label>
                            <input class="form-control" type="text" name="leave" id="leave" value="{{ old('leave', $salaryData->leave) }}">
                            @if($errors->has('leave'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('leave') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.leave_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="designation_category">{{ trans('cruds.salaryData.fields.designation_category') }}</label>
                            <input class="form-control" type="text" name="designation_category" id="designation_category" value="{{ old('designation_category', $salaryData->designation_category) }}">
                            @if($errors->has('designation_category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('designation_category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.designation_category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exists_cc">{{ trans('cruds.salaryData.fields.exists_cc') }}</label>
                            <input class="form-control" type="number" name="exists_cc" id="exists_cc" value="{{ old('exists_cc', $salaryData->exists_cc) }}" step="1">
                            @if($errors->has('exists_cc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('exists_cc') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.exists_cc_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="import_date">{{ trans('cruds.salaryData.fields.import_date') }}</label>
                            <input class="form-control date" type="text" name="import_date" id="import_date" value="{{ old('import_date', $salaryData->import_date) }}" required>
                            @if($errors->has('import_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('import_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salaryData.fields.import_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="salary_month">{{ trans('cruds.salaryData.fields.salary_month') }}</label>
                            <input class="form-control" type="text" name="salary_month" id="salary_month" value="{{ old('salary_month', $salaryData->salary_month) }}">
                            @if($errors->has('salary_month'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('salary_month') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection