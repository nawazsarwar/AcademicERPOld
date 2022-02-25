@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.person.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.people.update", [$person->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.person.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $person->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.person.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $person->first_name) }}" required>
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="middle_name">{{ trans('cruds.person.fields.middle_name') }}</label>
                <input class="form-control {{ $errors->has('middle_name') ? 'is-invalid' : '' }}" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $person->middle_name) }}">
                @if($errors->has('middle_name'))
                    <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.middle_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.person.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $person->last_name) }}">
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fathers_first_name">{{ trans('cruds.person.fields.fathers_first_name') }}</label>
                <input class="form-control {{ $errors->has('fathers_first_name') ? 'is-invalid' : '' }}" type="text" name="fathers_first_name" id="fathers_first_name" value="{{ old('fathers_first_name', $person->fathers_first_name) }}" required>
                @if($errors->has('fathers_first_name'))
                    <span class="text-danger">{{ $errors->first('fathers_first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.fathers_first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fathers_middle_name">{{ trans('cruds.person.fields.fathers_middle_name') }}</label>
                <input class="form-control {{ $errors->has('fathers_middle_name') ? 'is-invalid' : '' }}" type="text" name="fathers_middle_name" id="fathers_middle_name" value="{{ old('fathers_middle_name', $person->fathers_middle_name) }}">
                @if($errors->has('fathers_middle_name'))
                    <span class="text-danger">{{ $errors->first('fathers_middle_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.fathers_middle_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fathers_last_name">{{ trans('cruds.person.fields.fathers_last_name') }}</label>
                <input class="form-control {{ $errors->has('fathers_last_name') ? 'is-invalid' : '' }}" type="text" name="fathers_last_name" id="fathers_last_name" value="{{ old('fathers_last_name', $person->fathers_last_name) }}">
                @if($errors->has('fathers_last_name'))
                    <span class="text-danger">{{ $errors->first('fathers_last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.fathers_last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mothers_first_name">{{ trans('cruds.person.fields.mothers_first_name') }}</label>
                <input class="form-control {{ $errors->has('mothers_first_name') ? 'is-invalid' : '' }}" type="text" name="mothers_first_name" id="mothers_first_name" value="{{ old('mothers_first_name', $person->mothers_first_name) }}" required>
                @if($errors->has('mothers_first_name'))
                    <span class="text-danger">{{ $errors->first('mothers_first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.mothers_first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mothers_middle_name">{{ trans('cruds.person.fields.mothers_middle_name') }}</label>
                <input class="form-control {{ $errors->has('mothers_middle_name') ? 'is-invalid' : '' }}" type="text" name="mothers_middle_name" id="mothers_middle_name" value="{{ old('mothers_middle_name', $person->mothers_middle_name) }}">
                @if($errors->has('mothers_middle_name'))
                    <span class="text-danger">{{ $errors->first('mothers_middle_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.mothers_middle_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mothers_last_name">{{ trans('cruds.person.fields.mothers_last_name') }}</label>
                <input class="form-control {{ $errors->has('mothers_last_name') ? 'is-invalid' : '' }}" type="text" name="mothers_last_name" id="mothers_last_name" value="{{ old('mothers_last_name', $person->mothers_last_name) }}">
                @if($errors->has('mothers_last_name'))
                    <span class="text-danger">{{ $errors->first('mothers_last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.mothers_last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.person.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $person->dob) }}">
                @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.person.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Person::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', $person->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="blood_group_id">{{ trans('cruds.person.fields.blood_group') }}</label>
                <select class="form-control select2 {{ $errors->has('blood_group') ? 'is-invalid' : '' }}" name="blood_group_id" id="blood_group_id" required>
                    @foreach($blood_groups as $id => $entry)
                        <option value="{{ $id }}" {{ (old('blood_group_id') ? old('blood_group_id') : $person->blood_group->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('blood_group'))
                    <span class="text-danger">{{ $errors->first('blood_group') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.blood_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.person.fields.disability') }}</label>
                <select class="form-control {{ $errors->has('disability') ? 'is-invalid' : '' }}" name="disability" id="disability">
                    <option value disabled {{ old('disability', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Person::DISABILITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('disability', $person->disability) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('disability'))
                    <span class="text-danger">{{ $errors->first('disability') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.disability_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.person.fields.disability_type') }}</label>
                <select class="form-control {{ $errors->has('disability_type') ? 'is-invalid' : '' }}" name="disability_type" id="disability_type">
                    <option value disabled {{ old('disability_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Person::DISABILITY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('disability_type', $person->disability_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('disability_type'))
                    <span class="text-danger">{{ $errors->first('disability_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.disability_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="aadhaar_no">{{ trans('cruds.person.fields.aadhaar_no') }}</label>
                <input class="form-control {{ $errors->has('aadhaar_no') ? 'is-invalid' : '' }}" type="number" name="aadhaar_no" id="aadhaar_no" value="{{ old('aadhaar_no', $person->aadhaar_no) }}" step="1">
                @if($errors->has('aadhaar_no'))
                    <span class="text-danger">{{ $errors->first('aadhaar_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.aadhaar_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="religion_id">{{ trans('cruds.person.fields.religion') }}</label>
                <select class="form-control select2 {{ $errors->has('religion') ? 'is-invalid' : '' }}" name="religion_id" id="religion_id">
                    @foreach($religions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('religion_id') ? old('religion_id') : $person->religion->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('religion'))
                    <span class="text-danger">{{ $errors->first('religion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.religion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="caste_id">{{ trans('cruds.person.fields.caste') }}</label>
                <select class="form-control select2 {{ $errors->has('caste') ? 'is-invalid' : '' }}" name="caste_id" id="caste_id">
                    @foreach($castes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('caste_id') ? old('caste_id') : $person->caste->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('caste'))
                    <span class="text-danger">{{ $errors->first('caste') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.caste_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_caste">{{ trans('cruds.person.fields.sub_caste') }}</label>
                <input class="form-control {{ $errors->has('sub_caste') ? 'is-invalid' : '' }}" type="text" name="sub_caste" id="sub_caste" value="{{ old('sub_caste', $person->sub_caste) }}">
                @if($errors->has('sub_caste'))
                    <span class="text-danger">{{ $errors->first('sub_caste') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.sub_caste_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nationality_id">{{ trans('cruds.person.fields.nationality') }}</label>
                <select class="form-control select2 {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality_id" id="nationality_id">
                    @foreach($nationalities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('nationality_id') ? old('nationality_id') : $person->nationality->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('nationality'))
                    <span class="text-danger">{{ $errors->first('nationality') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="domicile_province_id">{{ trans('cruds.person.fields.domicile_province') }}</label>
                <select class="form-control select2 {{ $errors->has('domicile_province') ? 'is-invalid' : '' }}" name="domicile_province_id" id="domicile_province_id">
                    @foreach($domicile_provinces as $id => $entry)
                        <option value="{{ $id }}" {{ (old('domicile_province_id') ? old('domicile_province_id') : $person->domicile_province->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('domicile_province'))
                    <span class="text-danger">{{ $errors->first('domicile_province') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.domicile_province_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identity_marks">{{ trans('cruds.person.fields.identity_marks') }}</label>
                <input class="form-control {{ $errors->has('identity_marks') ? 'is-invalid' : '' }}" type="text" name="identity_marks" id="identity_marks" value="{{ old('identity_marks', $person->identity_marks) }}">
                @if($errors->has('identity_marks'))
                    <span class="text-danger">{{ $errors->first('identity_marks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.identity_marks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob_proof">{{ trans('cruds.person.fields.dob_proof') }}</label>
                <input class="form-control {{ $errors->has('dob_proof') ? 'is-invalid' : '' }}" type="text" name="dob_proof" id="dob_proof" value="{{ old('dob_proof', $person->dob_proof) }}">
                @if($errors->has('dob_proof'))
                    <span class="text-danger">{{ $errors->first('dob_proof') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.dob_proof_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.person.fields.marital_status') }}</label>
                <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status">
                    <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Person::MARITAL_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('marital_status', $person->marital_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_name">{{ trans('cruds.person.fields.spouse_name') }}</label>
                <input class="form-control {{ $errors->has('spouse_name') ? 'is-invalid' : '' }}" type="text" name="spouse_name" id="spouse_name" value="{{ old('spouse_name', $person->spouse_name) }}">
                @if($errors->has('spouse_name'))
                    <span class="text-danger">{{ $errors->first('spouse_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.spouse_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pan_no">{{ trans('cruds.person.fields.pan_no') }}</label>
                <input class="form-control {{ $errors->has('pan_no') ? 'is-invalid' : '' }}" type="text" name="pan_no" id="pan_no" value="{{ old('pan_no', $person->pan_no) }}">
                @if($errors->has('pan_no'))
                    <span class="text-danger">{{ $errors->first('pan_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.pan_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="passport_no">{{ trans('cruds.person.fields.passport_no') }}</label>
                <input class="form-control {{ $errors->has('passport_no') ? 'is-invalid' : '' }}" type="text" name="passport_no" id="passport_no" value="{{ old('passport_no', $person->passport_no) }}">
                @if($errors->has('passport_no'))
                    <span class="text-danger">{{ $errors->first('passport_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.passport_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.person.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $person->status) }}" step="1">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.person.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $person->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.remarks_helper') }}</span>
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