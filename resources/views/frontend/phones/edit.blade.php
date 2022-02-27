@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.phone.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.phones.update", [$phone->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.phone.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $phone->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.phone.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="dialing_code_id">{{ trans('cruds.phone.fields.dialing_code') }}</label>
                            <select class="form-control select2" name="dialing_code_id" id="dialing_code_id" required>
                                @foreach($dialing_codes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('dialing_code_id') ? old('dialing_code_id') : $phone->dialing_code->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dialing_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dialing_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.phone.fields.dialing_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="number">{{ trans('cruds.phone.fields.number') }}</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', $phone->number) }}" required>
                            @if($errors->has('number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.phone.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.phone.fields.category') }}</label>
                            <select class="form-control" name="category" id="category">
                                <option value disabled {{ old('category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Phone::CATEGORY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('category', $phone->category) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.phone.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.phone.fields.type') }}</label>
                            <select class="form-control" name="type" id="type">
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Phone::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $phone->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.phone.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.phone.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $phone->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.phone.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.phone.fields.remarks') }}</label>
                            <input class="form-control" type="text" name="remarks" id="remarks" value="{{ old('remarks', $phone->remarks) }}">
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.phone.fields.remarks_helper') }}</span>
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