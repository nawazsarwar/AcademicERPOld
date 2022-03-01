@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.clientsMerchant.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.clients-merchants.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="client_id">{{ trans('cruds.clientsMerchant.fields.client') }}</label>
                            <select class="form-control select2" name="client_id" id="client_id" required>
                                @foreach($clients as $id => $entry)
                                    <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('client') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientsMerchant.fields.client_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="merchant_id">{{ trans('cruds.clientsMerchant.fields.merchant') }}</label>
                            <select class="form-control select2" name="merchant_id" id="merchant_id" required>
                                @foreach($merchants as $id => $entry)
                                    <option value="{{ $id }}" {{ old('merchant_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('merchant'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('merchant') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientsMerchant.fields.merchant_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="key">{{ trans('cruds.clientsMerchant.fields.key') }}</label>
                            <input class="form-control" type="text" name="key" id="key" value="{{ old('key', '') }}" required>
                            @if($errors->has('key'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('key') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientsMerchant.fields.key_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="secret">{{ trans('cruds.clientsMerchant.fields.secret') }}</label>
                            <input class="form-control" type="text" name="secret" id="secret" value="{{ old('secret', '') }}" required>
                            @if($errors->has('secret'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('secret') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientsMerchant.fields.secret_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="head">{{ trans('cruds.clientsMerchant.fields.head') }}</label>
                            <input class="form-control" type="text" name="head" id="head" value="{{ old('head', '') }}" required>
                            @if($errors->has('head'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('head') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientsMerchant.fields.head_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_head">{{ trans('cruds.clientsMerchant.fields.sub_head') }}</label>
                            <input class="form-control" type="text" name="sub_head" id="sub_head" value="{{ old('sub_head', '') }}">
                            @if($errors->has('sub_head'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_head') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientsMerchant.fields.sub_head_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.clientsMerchant.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientsMerchant.fields.remarks_helper') }}</span>
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