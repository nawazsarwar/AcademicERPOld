@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.familyMember.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.family-members.update", [$familyMember->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="employee_id">{{ trans('cruds.familyMember.fields.employee') }}</label>
                            <select class="form-control select2" name="employee_id" id="employee_id" required>
                                @foreach($employees as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('employee_id') ? old('employee_id') : $familyMember->employee->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('employee'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employee') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.employee_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="submission_date">{{ trans('cruds.familyMember.fields.submission_date') }}</label>
                            <input class="form-control" type="text" name="submission_date" id="submission_date" value="{{ old('submission_date', $familyMember->submission_date) }}">
                            @if($errors->has('submission_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('submission_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.submission_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="family_member_name">{{ trans('cruds.familyMember.fields.family_member_name') }}</label>
                            <input class="form-control" type="text" name="family_member_name" id="family_member_name" value="{{ old('family_member_name', $familyMember->family_member_name) }}" required>
                            @if($errors->has('family_member_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('family_member_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.family_member_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dob">{{ trans('cruds.familyMember.fields.dob') }}</label>
                            <input class="form-control date" type="text" name="dob" id="dob" value="{{ old('dob', $familyMember->dob) }}">
                            @if($errors->has('dob'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dob') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.dob_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="relationship">{{ trans('cruds.familyMember.fields.relationship') }}</label>
                            <input class="form-control" type="text" name="relationship" id="relationship" value="{{ old('relationship', $familyMember->relationship) }}" required>
                            @if($errors->has('relationship'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('relationship') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.relationship_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.familyMember.fields.gender') }}</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\FamilyMember::GENDER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gender', $familyMember->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="marital_status">{{ trans('cruds.familyMember.fields.marital_status') }}</label>
                            <input class="form-control" type="text" name="marital_status" id="marital_status" value="{{ old('marital_status', $familyMember->marital_status) }}">
                            @if($errors->has('marital_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('marital_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.marital_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.familyMember.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $familyMember->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.familyMember.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $familyMember->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.familyMember.fields.remarks_helper') }}</span>
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