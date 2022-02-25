@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.computerCentreData.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.computer-centre-datas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="uri">{{ trans('cruds.computerCentreData.fields.uri') }}</label>
                <input class="form-control {{ $errors->has('uri') ? 'is-invalid' : '' }}" type="text" name="uri" id="uri" value="{{ old('uri', '') }}" required>
                @if($errors->has('uri'))
                    <span class="text-danger">{{ $errors->first('uri') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.uri_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.computerCentreData.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">{{ trans('cruds.computerCentreData.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', '') }}">
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parser">{{ trans('cruds.computerCentreData.fields.parser') }}</label>
                <input class="form-control {{ $errors->has('parser') ? 'is-invalid' : '' }}" type="text" name="parser" id="parser" value="{{ old('parser', '') }}">
                @if($errors->has('parser'))
                    <span class="text-danger">{{ $errors->first('parser') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.parser_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data">{{ trans('cruds.computerCentreData.fields.data') }}</label>
                <textarea class="form-control {{ $errors->has('data') ? 'is-invalid' : '' }}" name="data" id="data">{{ old('data') }}</textarea>
                @if($errors->has('data'))
                    <span class="text-danger">{{ $errors->first('data') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.data_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parent">{{ trans('cruds.computerCentreData.fields.parent') }}</label>
                <input class="form-control {{ $errors->has('parent') ? 'is-invalid' : '' }}" type="number" name="parent" id="parent" value="{{ old('parent', '') }}" step="1">
                @if($errors->has('parent'))
                    <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.parent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="crawled">{{ trans('cruds.computerCentreData.fields.crawled') }}</label>
                <input class="form-control {{ $errors->has('crawled') ? 'is-invalid' : '' }}" type="number" name="crawled" id="crawled" value="{{ old('crawled', '') }}" step="1">
                @if($errors->has('crawled'))
                    <span class="text-danger">{{ $errors->first('crawled') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.crawled_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_crawled_at">{{ trans('cruds.computerCentreData.fields.last_crawled_at') }}</label>
                <input class="form-control datetime {{ $errors->has('last_crawled_at') ? 'is-invalid' : '' }}" type="text" name="last_crawled_at" id="last_crawled_at" value="{{ old('last_crawled_at') }}">
                @if($errors->has('last_crawled_at'))
                    <span class="text-danger">{{ $errors->first('last_crawled_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.last_crawled_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.computerCentreData.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.computerCentreData.fields.remarks_helper') }}</span>
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