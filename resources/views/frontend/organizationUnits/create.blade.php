@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.organizationUnit.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.organization-units.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.organizationUnit.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationUnit.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="code">{{ trans('cruds.organizationUnit.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', '') }}">
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationUnit.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_hindi">{{ trans('cruds.organizationUnit.fields.title_hindi') }}</label>
                            <input class="form-control" type="text" name="title_hindi" id="title_hindi" value="{{ old('title_hindi', '') }}">
                            @if($errors->has('title_hindi'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_hindi') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationUnit.fields.title_hindi_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_urdu">{{ trans('cruds.organizationUnit.fields.title_urdu') }}</label>
                            <input class="form-control" type="text" name="title_urdu" id="title_urdu" value="{{ old('title_urdu', '') }}">
                            @if($errors->has('title_urdu'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_urdu') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationUnit.fields.title_urdu_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="category">{{ trans('cruds.organizationUnit.fields.category') }}</label>
                            <input class="form-control" type="text" name="category" id="category" value="{{ old('category', '') }}">
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationUnit.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.organizationUnit.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationUnit.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.organizationUnit.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.organizationUnit.fields.remarks_helper') }}</span>
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