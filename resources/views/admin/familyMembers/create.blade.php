@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.familyMember.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.family-members.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="employee_id">{{ trans('cruds.familyMember.fields.employee') }}</label>
                <select class="form-control select2 {{ $errors->has('employee') ? 'is-invalid' : '' }}" name="employee_id" id="employee_id" required>
                    @foreach($employees as $id => $entry)
                        <option value="{{ $id }}" {{ old('employee_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee'))
                    <span class="text-danger">{{ $errors->first('employee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.familyMember.fields.employee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="submission_date">{{ trans('cruds.familyMember.fields.submission_date') }}</label>
                <input class="form-control {{ $errors->has('submission_date') ? 'is-invalid' : '' }}" type="text" name="submission_date" id="submission_date" value="{{ old('submission_date', '') }}">
                @if($errors->has('submission_date'))
                    <span class="text-danger">{{ $errors->first('submission_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.familyMember.fields.submission_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="family_member_name">{{ trans('cruds.familyMember.fields.family_member_name') }}</label>
                <input class="form-control {{ $errors->has('family_member_name') ? 'is-invalid' : '' }}" type="text" name="family_member_name" id="family_member_name" value="{{ old('family_member_name', '') }}" required>
                @if($errors->has('family_member_name'))
                    <span class="text-danger">{{ $errors->first('family_member_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.familyMember.fields.family_member_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.familyMember.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}">
                @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.familyMember.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="relationship">{{ trans('cruds.familyMember.fields.relationship') }}</label>
                <input class="form-control {{ $errors->has('relationship') ? 'is-invalid' : '' }}" type="text" name="relationship" id="relationship" value="{{ old('relationship', '') }}" required>
                @if($errors->has('relationship'))
                    <span class="text-danger">{{ $errors->first('relationship') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.familyMember.fields.relationship_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.familyMember.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\FamilyMember::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.familyMember.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="marital_status">{{ trans('cruds.familyMember.fields.marital_status') }}</label>
                <input class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" type="text" name="marital_status" id="marital_status" value="{{ old('marital_status', '') }}">
                @if($errors->has('marital_status'))
                    <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.familyMember.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.familyMember.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.familyMember.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.familyMember.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', '') }}">
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection