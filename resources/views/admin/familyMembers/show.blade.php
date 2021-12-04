@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.familyMember.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.family-members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.id') }}
                        </th>
                        <td>
                            {{ $familyMember->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.employee') }}
                        </th>
                        <td>
                            {{ $familyMember->employee->employee_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.submission_date') }}
                        </th>
                        <td>
                            {{ $familyMember->submission_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.family_member_name') }}
                        </th>
                        <td>
                            {{ $familyMember->family_member_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.dob') }}
                        </th>
                        <td>
                            {{ $familyMember->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.relationship') }}
                        </th>
                        <td>
                            {{ $familyMember->relationship }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\FamilyMember::GENDER_SELECT[$familyMember->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.marital_status') }}
                        </th>
                        <td>
                            {{ $familyMember->marital_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.status') }}
                        </th>
                        <td>
                            {{ $familyMember->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyMember.fields.remarks') }}
                        </th>
                        <td>
                            {{ $familyMember->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.family-members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection