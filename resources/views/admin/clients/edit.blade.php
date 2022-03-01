@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="uid">{{ trans('cruds.client.fields.uid') }}</label>
                <input class="form-control {{ $errors->has('uid') ? 'is-invalid' : '' }}" type="text" name="uid" id="uid" value="{{ old('uid', $client->uid) }}" required>
                @if($errors->has('uid'))
                    <span class="text-danger">{{ $errors->first('uid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.uid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.client.fields.mode') }}</label>
                <select class="form-control {{ $errors->has('mode') ? 'is-invalid' : '' }}" name="mode" id="mode" required>
                    <option value disabled {{ old('mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Client::MODE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mode', $client->mode) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mode'))
                    <span class="text-danger">{{ $errors->first('mode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.client.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $client->description) }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="return_url">{{ trans('cruds.client.fields.return_url') }}</label>
                <input class="form-control {{ $errors->has('return_url') ? 'is-invalid' : '' }}" type="text" name="return_url" id="return_url" value="{{ old('return_url', $client->return_url) }}" required>
                @if($errors->has('return_url'))
                    <span class="text-danger">{{ $errors->first('return_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.return_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="timeout">{{ trans('cruds.client.fields.timeout') }}</label>
                <input class="form-control {{ $errors->has('timeout') ? 'is-invalid' : '' }}" type="number" name="timeout" id="timeout" value="{{ old('timeout', $client->timeout) }}" step="1" required>
                @if($errors->has('timeout'))
                    <span class="text-danger">{{ $errors->first('timeout') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.timeout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.client.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $client->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.remarks_helper') }}</span>
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