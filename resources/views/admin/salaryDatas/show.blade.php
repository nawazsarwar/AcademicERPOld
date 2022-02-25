@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryData.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salary-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryData->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.user') }}
                        </th>
                        <td>
                            {{ $salaryData->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.ecode') }}
                        </th>
                        <td>
                            {{ $salaryData->ecode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.emp_name') }}
                        </th>
                        <td>
                            {{ $salaryData->emp_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.first_name') }}
                        </th>
                        <td>
                            {{ $salaryData->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.middle_name') }}
                        </th>
                        <td>
                            {{ $salaryData->middle_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.last_name') }}
                        </th>
                        <td>
                            {{ $salaryData->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.pay_grade') }}
                        </th>
                        <td>
                            {{ $salaryData->pay_grade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.basic') }}
                        </th>
                        <td>
                            {{ $salaryData->basic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.pan_no') }}
                        </th>
                        <td>
                            {{ $salaryData->pan_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.desig_name') }}
                        </th>
                        <td>
                            {{ $salaryData->desig_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.dept_name') }}
                        </th>
                        <td>
                            {{ $salaryData->dept_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.emp_status') }}
                        </th>
                        <td>
                            {{ $salaryData->emp_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.date_of_join') }}
                        </th>
                        <td>
                            {{ $salaryData->date_of_join }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.sex') }}
                        </th>
                        <td>
                            {{ $salaryData->sex }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $salaryData->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.retire_date') }}
                        </th>
                        <td>
                            {{ $salaryData->retire_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.pf_type') }}
                        </th>
                        <td>
                            {{ $salaryData->pf_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.emp_grop') }}
                        </th>
                        <td>
                            {{ $salaryData->emp_grop }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.leave') }}
                        </th>
                        <td>
                            {{ $salaryData->leave }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.designation_category') }}
                        </th>
                        <td>
                            {{ $salaryData->designation_category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.exists_cc') }}
                        </th>
                        <td>
                            {{ $salaryData->exists_cc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.import_date') }}
                        </th>
                        <td>
                            {{ $salaryData->import_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryData.fields.salary_month') }}
                        </th>
                        <td>
                            {{ $salaryData->salary_month }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salary-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection