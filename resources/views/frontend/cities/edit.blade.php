@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.city.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.cities.update", [$city->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="province_id">{{ trans('cruds.city.fields.province') }}</label>
                            <select class="form-control select2" name="province_id" id="province_id">
                                @foreach($provinces as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('province_id') ? old('province_id') : $city->province->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.province_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.city.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $city->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.city.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $city->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.city.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $city->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.remarks_helper') }}</span>
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