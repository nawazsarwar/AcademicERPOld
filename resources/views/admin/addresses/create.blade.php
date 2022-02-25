@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="person_id">{{ trans('cruds.address.fields.person') }}</label>
                <select class="form-control select2 {{ $errors->has('person') ? 'is-invalid' : '' }}" name="person_id" id="person_id" required>
                    @foreach($people as $id => $entry)
                        <option value="{{ $id }}" {{ old('person_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('person'))
                    <span class="text-danger">{{ $errors->first('person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.person_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.address.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Address::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country_id">{{ trans('cruds.address.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required>
                    @foreach($countries as $id => $entry)
                        <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile">{{ trans('cruds.address.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}" required>
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="postal_code_id">{{ trans('cruds.address.fields.postal_code') }}</label>
                <select class="form-control select2 {{ $errors->has('postal_code') ? 'is-invalid' : '' }}" name="postal_code_id" id="postal_code_id" required>
                    @foreach($postal_codes as $id => $entry)
                        <option value="{{ $id }}" {{ old('postal_code_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('postal_code'))
                    <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.postal_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="details">{{ trans('cruds.address.fields.details') }}</label>
                <input class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" type="text" name="details" id="details" value="{{ old('details', '') }}" required>
                @if($errors->has('details'))
                    <span class="text-danger">{{ $errors->first('details') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street">{{ trans('cruds.address.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', '') }}">
                @if($errors->has('street'))
                    <span class="text-danger">{{ $errors->first('street') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="landmark">{{ trans('cruds.address.fields.landmark') }}</label>
                <input class="form-control {{ $errors->has('landmark') ? 'is-invalid' : '' }}" type="text" name="landmark" id="landmark" value="{{ old('landmark', '') }}">
                @if($errors->has('landmark'))
                    <span class="text-danger">{{ $errors->first('landmark') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.landmark_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="locality">{{ trans('cruds.address.fields.locality') }}</label>
                <input class="form-control {{ $errors->has('locality') ? 'is-invalid' : '' }}" type="text" name="locality" id="locality" value="{{ old('locality', '') }}" required>
                @if($errors->has('locality'))
                    <span class="text-danger">{{ $errors->first('locality') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.locality_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.address.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="province_id">{{ trans('cruds.address.fields.province') }}</label>
                <select class="form-control select2 {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province_id" id="province_id">
                    @foreach($provinces as $id => $entry)
                        <option value="{{ $id }}" {{ old('province_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('province'))
                    <span class="text-danger">{{ $errors->first('province') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.province_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.address.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.address.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.remarks_helper') }}</span>
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