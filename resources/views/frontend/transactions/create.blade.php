@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.transactions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="order_id">{{ trans('cruds.transaction.fields.order') }}</label>
                            <select class="form-control select2" name="order_id" id="order_id" required>
                                @foreach($orders as $id => $entry)
                                    <option value="{{ $id }}" {{ old('order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="service_id">{{ trans('cruds.transaction.fields.service') }}</label>
                            <select class="form-control select2" name="service_id" id="service_id" required>
                                @foreach($services as $id => $entry)
                                    <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('service'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('service') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.service_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="client_id">{{ trans('cruds.transaction.fields.client') }}</label>
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
                            <span class="help-block">{{ trans('cruds.transaction.fields.client_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="merchant_id">{{ trans('cruds.transaction.fields.merchant') }}</label>
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
                            <span class="help-block">{{ trans('cruds.transaction.fields.merchant_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.transaction.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="currency">{{ trans('cruds.transaction.fields.currency') }}</label>
                            <input class="form-control" type="text" name="currency" id="currency" value="{{ old('currency', '') }}" required>
                            @if($errors->has('currency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('currency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.currency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.transaction.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', 'INITIALIZED') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="narration">{{ trans('cruds.transaction.fields.narration') }}</label>
                            <input class="form-control" type="text" name="narration" id="narration" value="{{ old('narration', '') }}">
                            @if($errors->has('narration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('narration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.narration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="response">{{ trans('cruds.transaction.fields.response') }}</label>
                            <textarea class="form-control" name="response" id="response">{{ old('response') }}</textarea>
                            @if($errors->has('response'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('response') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.response_helper') }}</span>
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