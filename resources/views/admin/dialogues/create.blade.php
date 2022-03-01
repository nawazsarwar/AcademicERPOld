@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dialogue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dialogues.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="merchant_id">{{ trans('cruds.dialogue.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id" required>
                    @foreach($merchants as $id => $entry)
                        <option value="{{ $id }}" {{ old('merchant_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <span class="text-danger">{{ $errors->first('merchant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dialogue.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction_id">{{ trans('cruds.dialogue.fields.transaction') }}</label>
                <select class="form-control select2 {{ $errors->has('transaction') ? 'is-invalid' : '' }}" name="transaction_id" id="transaction_id">
                    @foreach($transactions as $id => $entry)
                        <option value="{{ $id }}" {{ old('transaction_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction'))
                    <span class="text-danger">{{ $errors->first('transaction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dialogue.fields.transaction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pingback_url">{{ trans('cruds.dialogue.fields.pingback_url') }}</label>
                <input class="form-control {{ $errors->has('pingback_url') ? 'is-invalid' : '' }}" type="text" name="pingback_url" id="pingback_url" value="{{ old('pingback_url', '') }}">
                @if($errors->has('pingback_url'))
                    <span class="text-danger">{{ $errors->first('pingback_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dialogue.fields.pingback_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request_type">{{ trans('cruds.dialogue.fields.request_type') }}</label>
                <input class="form-control {{ $errors->has('request_type') ? 'is-invalid' : '' }}" type="text" name="request_type" id="request_type" value="{{ old('request_type', '') }}">
                @if($errors->has('request_type'))
                    <span class="text-danger">{{ $errors->first('request_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dialogue.fields.request_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="raw_response">{{ trans('cruds.dialogue.fields.raw_response') }}</label>
                <textarea class="form-control {{ $errors->has('raw_response') ? 'is-invalid' : '' }}" name="raw_response" id="raw_response">{{ old('raw_response') }}</textarea>
                @if($errors->has('raw_response'))
                    <span class="text-danger">{{ $errors->first('raw_response') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dialogue.fields.raw_response_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="response">{{ trans('cruds.dialogue.fields.response') }}</label>
                <textarea class="form-control {{ $errors->has('response') ? 'is-invalid' : '' }}" name="response" id="response">{{ old('response') }}</textarea>
                @if($errors->has('response'))
                    <span class="text-danger">{{ $errors->first('response') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dialogue.fields.response_helper') }}</span>
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