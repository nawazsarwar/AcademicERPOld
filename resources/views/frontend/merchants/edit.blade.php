@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.merchant.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.merchants.update", [$merchant->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="uid">{{ trans('cruds.merchant.fields.uid') }}</label>
                            <input class="form-control" type="text" name="uid" id="uid" value="{{ old('uid', $merchant->uid) }}" required>
                            @if($errors->has('uid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('uid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchant.fields.uid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.merchant.fields.mode') }}</label>
                            <select class="form-control" name="mode" id="mode" required>
                                <option value disabled {{ old('mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Merchant::MODE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mode', $merchant->mode) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchant.fields.mode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.merchant.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $merchant->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchant.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="parameters">{{ trans('cruds.merchant.fields.parameters') }}</label>
                            <textarea class="form-control" name="parameters" id="parameters" required>{{ old('parameters', $merchant->parameters) }}</textarea>
                            @if($errors->has('parameters'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parameters') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchant.fields.parameters_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="account">{{ trans('cruds.merchant.fields.account') }}</label>
                            <input class="form-control" type="text" name="account" id="account" value="{{ old('account', $merchant->account) }}" required>
                            @if($errors->has('account'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchant.fields.account_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.merchant.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $merchant->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchant.fields.remarks_helper') }}</span>
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