@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.clientsMerchant.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients-merchants.update", [$clientsMerchant->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.clientsMerchant.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $clientsMerchant->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientsMerchant.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="merchant_id">{{ trans('cruds.clientsMerchant.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id" required>
                    @foreach($merchants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('merchant_id') ? old('merchant_id') : $clientsMerchant->merchant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <span class="text-danger">{{ $errors->first('merchant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientsMerchant.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="key">{{ trans('cruds.clientsMerchant.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', $clientsMerchant->key) }}" required>
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientsMerchant.fields.key_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="secret">{{ trans('cruds.clientsMerchant.fields.secret') }}</label>
                <input class="form-control {{ $errors->has('secret') ? 'is-invalid' : '' }}" type="text" name="secret" id="secret" value="{{ old('secret', $clientsMerchant->secret) }}" required>
                @if($errors->has('secret'))
                    <span class="text-danger">{{ $errors->first('secret') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientsMerchant.fields.secret_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="head">{{ trans('cruds.clientsMerchant.fields.head') }}</label>
                <input class="form-control {{ $errors->has('head') ? 'is-invalid' : '' }}" type="text" name="head" id="head" value="{{ old('head', $clientsMerchant->head) }}" required>
                @if($errors->has('head'))
                    <span class="text-danger">{{ $errors->first('head') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientsMerchant.fields.head_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_head">{{ trans('cruds.clientsMerchant.fields.sub_head') }}</label>
                <input class="form-control {{ $errors->has('sub_head') ? 'is-invalid' : '' }}" type="text" name="sub_head" id="sub_head" value="{{ old('sub_head', $clientsMerchant->sub_head) }}">
                @if($errors->has('sub_head'))
                    <span class="text-danger">{{ $errors->first('sub_head') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientsMerchant.fields.sub_head_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.clientsMerchant.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $clientsMerchant->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection