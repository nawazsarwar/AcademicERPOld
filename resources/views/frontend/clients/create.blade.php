@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.clients.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="uid">{{ trans('cruds.client.fields.uid') }}</label>
                            <input class="form-control" type="text" name="uid" id="uid" value="{{ old('uid', '') }}" required>
                            @if($errors->has('uid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('uid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.uid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.client.fields.mode') }}</label>
                            <select class="form-control" name="mode" id="mode" required>
                                <option value disabled {{ old('mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Client::MODE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mode', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.mode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.client.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}">
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="return_url">{{ trans('cruds.client.fields.return_url') }}</label>
                            <input class="form-control" type="text" name="return_url" id="return_url" value="{{ old('return_url', '') }}" required>
                            @if($errors->has('return_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('return_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.return_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="timeout">{{ trans('cruds.client.fields.timeout') }}</label>
                            <input class="form-control" type="number" name="timeout" id="timeout" value="{{ old('timeout', '') }}" step="1" required>
                            @if($errors->has('timeout'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('timeout') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.timeout_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.client.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection