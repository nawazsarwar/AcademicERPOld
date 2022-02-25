@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.organizationalEmail.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.organizational-emails.update", [$organizationalEmail->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.organizationalEmail.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $organizationalEmail->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.organizationalEmail.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $organizationalEmail->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.organizationalEmail.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\OrganizationalEmail::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $organizationalEmail->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="alias">{{ trans('cruds.organizationalEmail.fields.alias') }}</label>
                            <input class="form-control" type="email" name="alias" id="alias" value="{{ old('alias', $organizationalEmail->alias) }}">
                            @if($errors->has('alias'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alias') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.alias_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="first_password">{{ trans('cruds.organizationalEmail.fields.first_password') }}</label>
                            <input class="form-control" type="text" name="first_password" id="first_password" value="{{ old('first_password', $organizationalEmail->first_password) }}">
                            @if($errors->has('first_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.first_password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="avatar_url">{{ trans('cruds.organizationalEmail.fields.avatar_url') }}</label>
                            <input class="form-control" type="text" name="avatar_url" id="avatar_url" value="{{ old('avatar_url', $organizationalEmail->avatar_url) }}">
                            @if($errors->has('avatar_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('avatar_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.avatar_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="recovery_email">{{ trans('cruds.organizationalEmail.fields.recovery_email') }}</label>
                            <input class="form-control" type="email" name="recovery_email" id="recovery_email" value="{{ old('recovery_email', $organizationalEmail->recovery_email) }}">
                            @if($errors->has('recovery_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('recovery_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.recovery_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="recovery_phone">{{ trans('cruds.organizationalEmail.fields.recovery_phone') }}</label>
                            <input class="form-control" type="text" name="recovery_phone" id="recovery_phone" value="{{ old('recovery_phone', $organizationalEmail->recovery_phone) }}">
                            @if($errors->has('recovery_phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('recovery_phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.recovery_phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gender">{{ trans('cruds.organizationalEmail.fields.gender') }}</label>
                            <input class="form-control" type="text" name="gender" id="gender" value="{{ old('gender', $organizationalEmail->gender) }}">
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="office_365">{{ trans('cruds.organizationalEmail.fields.office_365') }}</label>
                            <input class="form-control" type="number" name="office_365" id="office_365" value="{{ old('office_365', $organizationalEmail->office_365) }}" step="1">
                            @if($errors->has('office_365'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('office_365') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.office_365_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="office_365_uid">{{ trans('cruds.organizationalEmail.fields.office_365_uid') }}</label>
                            <input class="form-control" type="text" name="office_365_uid" id="office_365_uid" value="{{ old('office_365_uid', $organizationalEmail->office_365_uid) }}">
                            @if($errors->has('office_365_uid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('office_365_uid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.office_365_uid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="office_365_object_uid">{{ trans('cruds.organizationalEmail.fields.office_365_object_uid') }}</label>
                            <input class="form-control" type="text" name="office_365_object_uid" id="office_365_object_uid" value="{{ old('office_365_object_uid', $organizationalEmail->office_365_object_uid) }}">
                            @if($errors->has('office_365_object_uid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('office_365_object_uid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.office_365_object_uid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="office_365_deployed_at">{{ trans('cruds.organizationalEmail.fields.office_365_deployed_at') }}</label>
                            <input class="form-control datetime" type="text" name="office_365_deployed_at" id="office_365_deployed_at" value="{{ old('office_365_deployed_at', $organizationalEmail->office_365_deployed_at) }}">
                            @if($errors->has('office_365_deployed_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('office_365_deployed_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.office_365_deployed_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gsuite">{{ trans('cruds.organizationalEmail.fields.gsuite') }}</label>
                            <input class="form-control" type="number" name="gsuite" id="gsuite" value="{{ old('gsuite', $organizationalEmail->gsuite) }}" step="1">
                            @if($errors->has('gsuite'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gsuite') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.gsuite_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gsuite_uid">{{ trans('cruds.organizationalEmail.fields.gsuite_uid') }}</label>
                            <input class="form-control" type="text" name="gsuite_uid" id="gsuite_uid" value="{{ old('gsuite_uid', $organizationalEmail->gsuite_uid) }}">
                            @if($errors->has('gsuite_uid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gsuite_uid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.gsuite_uid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gsuite_deployed_at">{{ trans('cruds.organizationalEmail.fields.gsuite_deployed_at') }}</label>
                            <input class="form-control datetime" type="text" name="gsuite_deployed_at" id="gsuite_deployed_at" value="{{ old('gsuite_deployed_at', $organizationalEmail->gsuite_deployed_at) }}">
                            @if($errors->has('gsuite_deployed_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gsuite_deployed_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationalEmail.fields.gsuite_deployed_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.organizationalEmail.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $organizationalEmail->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection