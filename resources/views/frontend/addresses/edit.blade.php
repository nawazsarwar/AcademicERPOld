@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.address.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.addresses.update", [$address->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="person_id">{{ trans('cruds.address.fields.person') }}</label>
                            <select class="form-control select2" name="person_id" id="person_id" required>
                                @foreach($people as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('person_id') ? old('person_id') : $address->person->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <label class="required">{{ trans('cruds.address.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Address::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $address->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                            <label class="required" for="country_id">{{ trans('cruds.address.fields.country') }}</label>
                            <select class="form-control select2" name="country_id" id="country_id" required>
                                @foreach($countries as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $address->country->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <label class="required" for="mobile">{{ trans('cruds.address.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', $address->mobile) }}" required>
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="postal_code_id">{{ trans('cruds.address.fields.postal_code') }}</label>
                            <select class="form-control select2" name="postal_code_id" id="postal_code_id" required>
                                @foreach($postal_codes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('postal_code_id') ? old('postal_code_id') : $address->postal_code->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <label class="required" for="details">{{ trans('cruds.address.fields.details') }}</label>
                            <input class="form-control" type="text" name="details" id="details" value="{{ old('details', $address->details) }}" required>
                            @if($errors->has('details'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('details') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.details_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="street">{{ trans('cruds.address.fields.street') }}</label>
                            <input class="form-control" type="text" name="street" id="street" value="{{ old('street', $address->street) }}">
                            @if($errors->has('street'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('street') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.street_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="landmark">{{ trans('cruds.address.fields.landmark') }}</label>
                            <input class="form-control" type="text" name="landmark" id="landmark" value="{{ old('landmark', $address->landmark) }}">
                            @if($errors->has('landmark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('landmark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.landmark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="locality">{{ trans('cruds.address.fields.locality') }}</label>
                            <input class="form-control" type="text" name="locality" id="locality" value="{{ old('locality', $address->locality) }}" required>
                            @if($errors->has('locality'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('locality') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.locality_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="city">{{ trans('cruds.address.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', $address->city) }}" required>
                            @if($errors->has('city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="province_id">{{ trans('cruds.address.fields.province') }}</label>
                            <select class="form-control select2" name="province_id" id="province_id">
                                @foreach($provinces as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('province_id') ? old('province_id') : $address->province->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <label for="status">{{ trans('cruds.address.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $address->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.address.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.address.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $address->remarks) }}</textarea>
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