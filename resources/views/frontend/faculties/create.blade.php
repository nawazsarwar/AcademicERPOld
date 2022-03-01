@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.faculty.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.faculties.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="code">{{ trans('cruds.faculty.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', '') }}">
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.faculty.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.faculty.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.faculty.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="color">{{ trans('cruds.faculty.fields.color') }}</label>
                            <input class="form-control" type="text" name="color" id="color" value="{{ old('color', '') }}">
                            @if($errors->has('color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('color') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.faculty.fields.color_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.faculty.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.faculty.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.faculty.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.faculty.fields.remarks_helper') }}</span>
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