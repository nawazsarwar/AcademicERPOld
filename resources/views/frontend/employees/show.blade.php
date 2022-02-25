@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.employee.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.employees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $employee->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.person') }}
                                    </th>
                                    <td>
                                        {{ $employee->person->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.employee_no') }}
                                    </th>
                                    <td>
                                        {{ $employee->employee_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.service_book_no') }}
                                    </th>
                                    <td>
                                        {{ $employee->service_book_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.application_no') }}
                                    </th>
                                    <td>
                                        {{ $employee->application_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.highest_qualification') }}
                                    </th>
                                    <td>
                                        {{ $employee->highest_qualification }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.employment_status') }}
                                    </th>
                                    <td>
                                        {{ $employee->employment_status->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.status_date') }}
                                    </th>
                                    <td>
                                        {{ $employee->status_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.group') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Employee::GROUP_SELECT[$employee->group] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.retirement_scheme') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Employee::RETIREMENT_SCHEME_SELECT[$employee->retirement_scheme] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.employment_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Employee::EMPLOYMENT_TYPE_SELECT[$employee->employment_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.leave_account_no') }}
                                    </th>
                                    <td>
                                        {{ $employee->leave_account_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.pf_account_no') }}
                                    </th>
                                    <td>
                                        {{ $employee->pf_account_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.personal_file_no') }}
                                    </th>
                                    <td>
                                        {{ $employee->personal_file_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $employee->remarks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.verification_status') }}
                                    </th>
                                    <td>
                                        {{ $employee->verification_status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.verified_by') }}
                                    </th>
                                    <td>
                                        {{ $employee->verified_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.verified_at') }}
                                    </th>
                                    <td>
                                        {{ $employee->verified_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.verification_remark') }}
                                    </th>
                                    <td>
                                        {{ $employee->verification_remark }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.employees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection