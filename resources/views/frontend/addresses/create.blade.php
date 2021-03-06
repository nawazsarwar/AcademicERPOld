@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.address.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.addresses.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="country_id">{{ trans('cruds.address.fields.country') }}</label>
                            <select class="form-control select2" name="country_id" id="country_id" required>
                                @foreach($countries as $id => $entry)
                                    <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="province_id">{{ trans('cruds.address.fields.province') }}</label>
                            <select class="form-control select2" name="province_id" id="province_id">
                                @foreach($provinces as $id => $entry)
                                    <option value="{{ $id }}" {{ old('province_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.province_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="postal_code_id">{{ trans('cruds.address.fields.postal_code') }}</label>
                            <select class="form-control select2" name="postal_code_id" id="postal_code_id">
                                @foreach($postal_codes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('postal_code_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('postal_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('postal_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.postal_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="person_id">{{ trans('cruds.address.fields.person') }}</label>
                            <select class="form-control select2" name="person_id" id="person_id">
                                @foreach($people as $id => $entry)
                                    <option value="{{ $id }}" {{ old('person_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('person'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('person') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.person_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.address.fields.user') }}</label>
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
                            <span class="help-block">{{ trans('cruds.address.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.address.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Address::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">{{ trans('cruds.address.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="details">{{ trans('cruds.address.fields.details') }}</label>
                            <input class="form-control" type="text" name="details" id="details" value="{{ old('details', '') }}" required>
                            @if($errors->has('details'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('details') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.details_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="street">{{ trans('cruds.address.fields.street') }}</label>
                            <input class="form-control" type="text" name="street" id="street" value="{{ old('street', '') }}">
                            @if($errors->has('street'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('street') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.street_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="landmark">{{ trans('cruds.address.fields.landmark') }}</label>
                            <input class="form-control" type="text" name="landmark" id="landmark" value="{{ old('landmark', '') }}">
                            @if($errors->has('landmark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('landmark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.landmark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="locality">{{ trans('cruds.address.fields.locality') }}</label>
                            <input class="form-control" type="text" name="locality" id="locality" value="{{ old('locality', '') }}" required>
                            @if($errors->has('locality'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('locality') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.locality_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="city">{{ trans('cruds.address.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                            @if($errors->has('city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.address.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.address.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection