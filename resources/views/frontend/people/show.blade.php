@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.person.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.people.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $person->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $person->user->username ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $person->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.middle_name') }}
                                    </th>
                                    <td>
                                        {{ $person->middle_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $person->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.fathers_first_name') }}
                                    </th>
                                    <td>
                                        {{ $person->fathers_first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.fathers_middle_name') }}
                                    </th>
                                    <td>
                                        {{ $person->fathers_middle_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.fathers_last_name') }}
                                    </th>
                                    <td>
                                        {{ $person->fathers_last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.mothers_first_name') }}
                                    </th>
                                    <td>
                                        {{ $person->mothers_first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.mothers_middle_name') }}
                                    </th>
                                    <td>
                                        {{ $person->mothers_middle_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.mothers_last_name') }}
                                    </th>
                                    <td>
                                        {{ $person->mothers_last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.dob') }}
                                    </th>
                                    <td>
                                        {{ $person->dob }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Person::GENDER_SELECT[$person->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.blood_group') }}
                                    </th>
                                    <td>
                                        {{ $person->blood_group->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.disability') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Person::DISABILITY_SELECT[$person->disability] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.disability_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Person::DISABILITY_TYPE_SELECT[$person->disability_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.aadhaar_no') }}
                                    </th>
                                    <td>
                                        {{ $person->aadhaar_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.religion') }}
                                    </th>
                                    <td>
                                        {{ $person->religion->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.caste') }}
                                    </th>
                                    <td>
                                        {{ $person->caste->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.sub_caste') }}
                                    </th>
                                    <td>
                                        {{ $person->sub_caste }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.nationality') }}
                                    </th>
                                    <td>
                                        {{ $person->nationality->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.domicile_province') }}
                                    </th>
                                    <td>
                                        {{ $person->domicile_province->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.identity_marks') }}
                                    </th>
                                    <td>
                                        {{ $person->identity_marks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.dob_proof') }}
                                    </th>
                                    <td>
                                        {{ $person->dob_proof }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.marital_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Person::MARITAL_STATUS_SELECT[$person->marital_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.spouse_name') }}
                                    </th>
                                    <td>
                                        {{ $person->spouse_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.pan_no') }}
                                    </th>
                                    <td>
                                        {{ $person->pan_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.passport_no') }}
                                    </th>
                                    <td>
                                        {{ $person->passport_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $person->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $person->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.people.index') }}">
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