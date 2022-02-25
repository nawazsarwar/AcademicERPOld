@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.person.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.people.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.person.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.person.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">{{ trans('cruds.person.fields.middle_name') }}</label>
                            <input class="form-control" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', '') }}">
                            @if($errors->has('middle_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('middle_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.middle_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="last_name">{{ trans('cruds.person.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fathers_first_name">{{ trans('cruds.person.fields.fathers_first_name') }}</label>
                            <input class="form-control" type="text" name="fathers_first_name" id="fathers_first_name" value="{{ old('fathers_first_name', '') }}" required>
                            @if($errors->has('fathers_first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fathers_first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.fathers_first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fathers_middle_name">{{ trans('cruds.person.fields.fathers_middle_name') }}</label>
                            <input class="form-control" type="text" name="fathers_middle_name" id="fathers_middle_name" value="{{ old('fathers_middle_name', '') }}">
                            @if($errors->has('fathers_middle_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fathers_middle_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.fathers_middle_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fathers_last_name">{{ trans('cruds.person.fields.fathers_last_name') }}</label>
                            <input class="form-control" type="text" name="fathers_last_name" id="fathers_last_name" value="{{ old('fathers_last_name', '') }}">
                            @if($errors->has('fathers_last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fathers_last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.fathers_last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mothers_first_name">{{ trans('cruds.person.fields.mothers_first_name') }}</label>
                            <input class="form-control" type="text" name="mothers_first_name" id="mothers_first_name" value="{{ old('mothers_first_name', '') }}" required>
                            @if($errors->has('mothers_first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mothers_first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.mothers_first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mothers_middle_name">{{ trans('cruds.person.fields.mothers_middle_name') }}</label>
                            <input class="form-control" type="text" name="mothers_middle_name" id="mothers_middle_name" value="{{ old('mothers_middle_name', '') }}">
                            @if($errors->has('mothers_middle_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mothers_middle_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.mothers_middle_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mothers_last_name">{{ trans('cruds.person.fields.mothers_last_name') }}</label>
                            <input class="form-control" type="text" name="mothers_last_name" id="mothers_last_name" value="{{ old('mothers_last_name', '') }}">
                            @if($errors->has('mothers_last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mothers_last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.mothers_last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dob">{{ trans('cruds.person.fields.dob') }}</label>
                            <input class="form-control date" type="text" name="dob" id="dob" value="{{ old('dob') }}">
                            @if($errors->has('dob'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dob') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.dob_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.person.fields.gender') }}</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Person::GENDER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="blood_group_id">{{ trans('cruds.person.fields.blood_group') }}</label>
                            <select class="form-control select2" name="blood_group_id" id="blood_group_id" required>
                                @foreach($blood_groups as $id => $entry)
                                    <option value="{{ $id }}" {{ old('blood_group_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('blood_group'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('blood_group') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.blood_group_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.person.fields.disability') }}</label>
                            <select class="form-control" name="disability" id="disability">
                                <option value disabled {{ old('disability', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Person::DISABILITY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('disability', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('disability'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('disability') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.disability_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.person.fields.disability_type') }}</label>
                            <select class="form-control" name="disability_type" id="disability_type">
                                <option value disabled {{ old('disability_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Person::DISABILITY_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('disability_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('disability_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('disability_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.disability_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="aadhaar_no">{{ trans('cruds.person.fields.aadhaar_no') }}</label>
                            <input class="form-control" type="number" name="aadhaar_no" id="aadhaar_no" value="{{ old('aadhaar_no', '') }}" step="1">
                            @if($errors->has('aadhaar_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('aadhaar_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.aadhaar_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="religion_id">{{ trans('cruds.person.fields.religion') }}</label>
                            <select class="form-control select2" name="religion_id" id="religion_id">
                                @foreach($religions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('religion_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('religion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('religion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.religion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="caste_id">{{ trans('cruds.person.fields.caste') }}</label>
                            <select class="form-control select2" name="caste_id" id="caste_id">
                                @foreach($castes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('caste_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('caste'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('caste') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.caste_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_caste">{{ trans('cruds.person.fields.sub_caste') }}</label>
                            <input class="form-control" type="text" name="sub_caste" id="sub_caste" value="{{ old('sub_caste', '') }}">
                            @if($errors->has('sub_caste'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_caste') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.sub_caste_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nationality_id">{{ trans('cruds.person.fields.nationality') }}</label>
                            <select class="form-control select2" name="nationality_id" id="nationality_id">
                                @foreach($nationalities as $id => $entry)
                                    <option value="{{ $id }}" {{ old('nationality_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nationality'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nationality') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.nationality_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="domicile_province_id">{{ trans('cruds.person.fields.domicile_province') }}</label>
                            <select class="form-control select2" name="domicile_province_id" id="domicile_province_id">
                                @foreach($domicile_provinces as $id => $entry)
                                    <option value="{{ $id }}" {{ old('domicile_province_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('domicile_province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('domicile_province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.domicile_province_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="identity_marks">{{ trans('cruds.person.fields.identity_marks') }}</label>
                            <input class="form-control" type="text" name="identity_marks" id="identity_marks" value="{{ old('identity_marks', '') }}">
                            @if($errors->has('identity_marks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('identity_marks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.identity_marks_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dob_proof">{{ trans('cruds.person.fields.dob_proof') }}</label>
                            <input class="form-control" type="text" name="dob_proof" id="dob_proof" value="{{ old('dob_proof', '') }}">
                            @if($errors->has('dob_proof'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dob_proof') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.dob_proof_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.person.fields.marital_status') }}</label>
                            <select class="form-control" name="marital_status" id="marital_status">
                                <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Person::MARITAL_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('marital_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('marital_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('marital_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.marital_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="spouse_name">{{ trans('cruds.person.fields.spouse_name') }}</label>
                            <input class="form-control" type="text" name="spouse_name" id="spouse_name" value="{{ old('spouse_name', '') }}">
                            @if($errors->has('spouse_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('spouse_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.spouse_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pan_no">{{ trans('cruds.person.fields.pan_no') }}</label>
                            <input class="form-control" type="text" name="pan_no" id="pan_no" value="{{ old('pan_no', '') }}">
                            @if($errors->has('pan_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pan_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.pan_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="passport_no">{{ trans('cruds.person.fields.passport_no') }}</label>
                            <input class="form-control" type="text" name="passport_no" id="passport_no" value="{{ old('passport_no', '') }}">
                            @if($errors->has('passport_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('passport_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.passport_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.person.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.person.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.person.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection