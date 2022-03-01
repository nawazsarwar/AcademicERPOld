@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.merchant.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.merchants.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="uid">{{ trans('cruds.merchant.fields.uid') }}</label>
                <input class="form-control {{ $errors->has('uid') ? 'is-invalid' : '' }}" type="text" name="uid" id="uid" value="{{ old('uid', '') }}" required>
                @if($errors->has('uid'))
                    <span class="text-danger">{{ $errors->first('uid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.merchant.fields.uid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.merchant.fields.mode') }}</label>
                <select class="form-control {{ $errors->has('mode') ? 'is-invalid' : '' }}" name="mode" id="mode" required>
                    <option value disabled {{ old('mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Merchant::MODE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mode', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mode'))
                    <span class="text-danger">{{ $errors->first('mode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.merchant.fields.mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.merchant.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.merchant.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="parameters">{{ trans('cruds.merchant.fields.parameters') }}</label>
                <textarea class="form-control {{ $errors->has('parameters') ? 'is-invalid' : '' }}" name="parameters" id="parameters" required>{{ old('parameters') }}</textarea>
                @if($errors->has('parameters'))
                    <span class="text-danger">{{ $errors->first('parameters') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.merchant.fields.parameters_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account">{{ trans('cruds.merchant.fields.account') }}</label>
                <input class="form-control {{ $errors->has('account') ? 'is-invalid' : '' }}" type="text" name="account" id="account" value="{{ old('account', '') }}" required>
                @if($errors->has('account'))
                    <span class="text-danger">{{ $errors->first('account') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.merchant.fields.account_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.merchant.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection