@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.organizationalEmail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.organizational-emails.update", [$organizationalEmail->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.organizationalEmail.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $organizationalEmail->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.organizationalEmail.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $organizationalEmail->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.organizationalEmail.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\OrganizationalEmail::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $organizationalEmail->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alias">{{ trans('cruds.organizationalEmail.fields.alias') }}</label>
                <input class="form-control {{ $errors->has('alias') ? 'is-invalid' : '' }}" type="email" name="alias" id="alias" value="{{ old('alias', $organizationalEmail->alias) }}">
                @if($errors->has('alias'))
                    <span class="text-danger">{{ $errors->first('alias') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.alias_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_password">{{ trans('cruds.organizationalEmail.fields.first_password') }}</label>
                <input class="form-control {{ $errors->has('first_password') ? 'is-invalid' : '' }}" type="text" name="first_password" id="first_password" value="{{ old('first_password', $organizationalEmail->first_password) }}">
                @if($errors->has('first_password'))
                    <span class="text-danger">{{ $errors->first('first_password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.first_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="avatar_url">{{ trans('cruds.organizationalEmail.fields.avatar_url') }}</label>
                <input class="form-control {{ $errors->has('avatar_url') ? 'is-invalid' : '' }}" type="text" name="avatar_url" id="avatar_url" value="{{ old('avatar_url', $organizationalEmail->avatar_url) }}">
                @if($errors->has('avatar_url'))
                    <span class="text-danger">{{ $errors->first('avatar_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.avatar_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recovery_email">{{ trans('cruds.organizationalEmail.fields.recovery_email') }}</label>
                <input class="form-control {{ $errors->has('recovery_email') ? 'is-invalid' : '' }}" type="email" name="recovery_email" id="recovery_email" value="{{ old('recovery_email', $organizationalEmail->recovery_email) }}">
                @if($errors->has('recovery_email'))
                    <span class="text-danger">{{ $errors->first('recovery_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.recovery_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recovery_phone">{{ trans('cruds.organizationalEmail.fields.recovery_phone') }}</label>
                <input class="form-control {{ $errors->has('recovery_phone') ? 'is-invalid' : '' }}" type="text" name="recovery_phone" id="recovery_phone" value="{{ old('recovery_phone', $organizationalEmail->recovery_phone) }}">
                @if($errors->has('recovery_phone'))
                    <span class="text-danger">{{ $errors->first('recovery_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.recovery_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gender">{{ trans('cruds.organizationalEmail.fields.gender') }}</label>
                <input class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" type="text" name="gender" id="gender" value="{{ old('gender', $organizationalEmail->gender) }}">
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_365">{{ trans('cruds.organizationalEmail.fields.office_365') }}</label>
                <input class="form-control {{ $errors->has('office_365') ? 'is-invalid' : '' }}" type="number" name="office_365" id="office_365" value="{{ old('office_365', $organizationalEmail->office_365) }}" step="1">
                @if($errors->has('office_365'))
                    <span class="text-danger">{{ $errors->first('office_365') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.office_365_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_365_uid">{{ trans('cruds.organizationalEmail.fields.office_365_uid') }}</label>
                <input class="form-control {{ $errors->has('office_365_uid') ? 'is-invalid' : '' }}" type="text" name="office_365_uid" id="office_365_uid" value="{{ old('office_365_uid', $organizationalEmail->office_365_uid) }}">
                @if($errors->has('office_365_uid'))
                    <span class="text-danger">{{ $errors->first('office_365_uid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.office_365_uid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_365_object_uid">{{ trans('cruds.organizationalEmail.fields.office_365_object_uid') }}</label>
                <input class="form-control {{ $errors->has('office_365_object_uid') ? 'is-invalid' : '' }}" type="text" name="office_365_object_uid" id="office_365_object_uid" value="{{ old('office_365_object_uid', $organizationalEmail->office_365_object_uid) }}">
                @if($errors->has('office_365_object_uid'))
                    <span class="text-danger">{{ $errors->first('office_365_object_uid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.office_365_object_uid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_365_deployed_at">{{ trans('cruds.organizationalEmail.fields.office_365_deployed_at') }}</label>
                <input class="form-control datetime {{ $errors->has('office_365_deployed_at') ? 'is-invalid' : '' }}" type="text" name="office_365_deployed_at" id="office_365_deployed_at" value="{{ old('office_365_deployed_at', $organizationalEmail->office_365_deployed_at) }}">
                @if($errors->has('office_365_deployed_at'))
                    <span class="text-danger">{{ $errors->first('office_365_deployed_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.office_365_deployed_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gsuite">{{ trans('cruds.organizationalEmail.fields.gsuite') }}</label>
                <input class="form-control {{ $errors->has('gsuite') ? 'is-invalid' : '' }}" type="number" name="gsuite" id="gsuite" value="{{ old('gsuite', $organizationalEmail->gsuite) }}" step="1">
                @if($errors->has('gsuite'))
                    <span class="text-danger">{{ $errors->first('gsuite') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.gsuite_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gsuite_uid">{{ trans('cruds.organizationalEmail.fields.gsuite_uid') }}</label>
                <input class="form-control {{ $errors->has('gsuite_uid') ? 'is-invalid' : '' }}" type="text" name="gsuite_uid" id="gsuite_uid" value="{{ old('gsuite_uid', $organizationalEmail->gsuite_uid) }}">
                @if($errors->has('gsuite_uid'))
                    <span class="text-danger">{{ $errors->first('gsuite_uid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.gsuite_uid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gsuite_deployed_at">{{ trans('cruds.organizationalEmail.fields.gsuite_deployed_at') }}</label>
                <input class="form-control datetime {{ $errors->has('gsuite_deployed_at') ? 'is-invalid' : '' }}" type="text" name="gsuite_deployed_at" id="gsuite_deployed_at" value="{{ old('gsuite_deployed_at', $organizationalEmail->gsuite_deployed_at) }}">
                @if($errors->has('gsuite_deployed_at'))
                    <span class="text-danger">{{ $errors->first('gsuite_deployed_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.gsuite_deployed_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.organizationalEmail.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $organizationalEmail->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationalEmail.fields.remarks_helper') }}</span>
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