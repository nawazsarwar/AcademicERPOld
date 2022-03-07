@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.organizationUnit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.organization-units.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.organizationUnit.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationUnit.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.organizationUnit.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}">
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationUnit.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_hindi">{{ trans('cruds.organizationUnit.fields.title_hindi') }}</label>
                <input class="form-control {{ $errors->has('title_hindi') ? 'is-invalid' : '' }}" type="text" name="title_hindi" id="title_hindi" value="{{ old('title_hindi', '') }}">
                @if($errors->has('title_hindi'))
                    <span class="text-danger">{{ $errors->first('title_hindi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationUnit.fields.title_hindi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_urdu">{{ trans('cruds.organizationUnit.fields.title_urdu') }}</label>
                <input class="form-control {{ $errors->has('title_urdu') ? 'is-invalid' : '' }}" type="text" name="title_urdu" id="title_urdu" value="{{ old('title_urdu', '') }}">
                @if($errors->has('title_urdu'))
                    <span class="text-danger">{{ $errors->first('title_urdu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationUnit.fields.title_urdu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category">{{ trans('cruds.organizationUnit.fields.category') }}</label>
                <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category" id="category" value="{{ old('category', '') }}">
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationUnit.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.organizationUnit.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organizationUnit.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.organizationUnit.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection