@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.supportCategory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.support-categories.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.supportCategory.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportCategory.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="color">{{ trans('cruds.supportCategory.fields.color') }}</label>
                            <input class="form-control" type="text" name="color" id="color" value="{{ old('color', '') }}" required>
                            @if($errors->has('color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('color') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportCategory.fields.color_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.supportCategory.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportCategory.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.supportCategory.fields.remarks') }}</label>
                            <input class="form-control" type="text" name="remarks" id="remarks" value="{{ old('remarks', '') }}">
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportCategory.fields.remarks_helper') }}</span>
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