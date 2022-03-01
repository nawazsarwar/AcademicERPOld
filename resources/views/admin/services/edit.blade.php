@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services.update", [$service->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="uid">{{ trans('cruds.service.fields.uid') }}</label>
                <input class="form-control {{ $errors->has('uid') ? 'is-invalid' : '' }}" type="text" name="uid" id="uid" value="{{ old('uid', $service->uid) }}" required>
                @if($errors->has('uid'))
                    <span class="text-danger">{{ $errors->first('uid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.uid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.service.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.service.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $service->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="merchant_id">{{ trans('cruds.service.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id" required>
                    @foreach($merchants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('merchant_id') ? old('merchant_id') : $service->merchant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <span class="text-danger">{{ $errors->first('merchant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="key">{{ trans('cruds.service.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', $service->key) }}" required>
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.key_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="secret">{{ trans('cruds.service.fields.secret') }}</label>
                <input class="form-control {{ $errors->has('secret') ? 'is-invalid' : '' }}" type="text" name="secret" id="secret" value="{{ old('secret', $service->secret) }}" required>
                @if($errors->has('secret'))
                    <span class="text-danger">{{ $errors->first('secret') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.secret_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="head">{{ trans('cruds.service.fields.head') }}</label>
                <input class="form-control {{ $errors->has('head') ? 'is-invalid' : '' }}" type="text" name="head" id="head" value="{{ old('head', $service->head) }}" required>
                @if($errors->has('head'))
                    <span class="text-danger">{{ $errors->first('head') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.head_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_head">{{ trans('cruds.service.fields.sub_head') }}</label>
                <input class="form-control {{ $errors->has('sub_head') ? 'is-invalid' : '' }}" type="text" name="sub_head" id="sub_head" value="{{ old('sub_head', $service->sub_head) }}">
                @if($errors->has('sub_head'))
                    <span class="text-danger">{{ $errors->first('sub_head') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.sub_head_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.service.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $service->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.remarks_helper') }}</span>
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