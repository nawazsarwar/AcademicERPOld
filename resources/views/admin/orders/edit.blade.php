@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="service_id">{{ trans('cruds.order.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ (old('service_id') ? old('service_id') : $order->service->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <span class="text-danger">{{ $errors->first('service') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parameters">{{ trans('cruds.order.fields.parameters') }}</label>
                <textarea class="form-control {{ $errors->has('parameters') ? 'is-invalid' : '' }}" name="parameters" id="parameters">{{ old('parameters', $order->parameters) }}</textarea>
                @if($errors->has('parameters'))
                    <span class="text-danger">{{ $errors->first('parameters') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.parameters_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.order.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $order->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency">{{ trans('cruds.order.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', $order->currency) }}" required>
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="return_url">{{ trans('cruds.order.fields.return_url') }}</label>
                <input class="form-control {{ $errors->has('return_url') ? 'is-invalid' : '' }}" type="text" name="return_url" id="return_url" value="{{ old('return_url', $order->return_url) }}" required>
                @if($errors->has('return_url'))
                    <span class="text-danger">{{ $errors->first('return_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.return_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.order.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $order->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.order.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $order->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.remarks_helper') }}</span>
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