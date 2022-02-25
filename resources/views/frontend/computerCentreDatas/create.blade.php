@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.computerCentreData.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.computer-centre-datas.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="uri">{{ trans('cruds.computerCentreData.fields.uri') }}</label>
                            <input class="form-control" type="text" name="uri" id="uri" value="{{ old('uri', '') }}" required>
                            @if($errors->has('uri'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('uri') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.computerCentreData.fields.uri_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="slug">{{ trans('cruds.computerCentreData.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                            @if($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.computerCentreData.fields.slug_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="type">{{ trans('cruds.computerCentreData.fields.type') }}</label>
                            <input class="form-control" type="text" name="type" id="type" value="{{ old('type', '') }}">
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.computerCentreData.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="parser">{{ trans('cruds.computerCentreData.fields.parser') }}</label>
                            <input class="form-control" type="text" name="parser" id="parser" value="{{ old('parser', '') }}">
                            @if($errors->has('parser'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parser') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.computerCentreData.fields.parser_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="data">{{ trans('cruds.computerCentreData.fields.data') }}</label>
                            <textarea class="form-control" name="data" id="data">{{ old('data') }}</textarea>
                            @if($errors->has('data'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('data') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.computerCentreData.fields.data_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="parent">{{ trans('cruds.computerCentreData.fields.parent') }}</label>
                            <input class="form-control" type="number" name="parent" id="parent" value="{{ old('parent', '') }}" step="1">
                            @if($errors->has('parent'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parent') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.computerCentreData.fields.parent_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="crawled">{{ trans('cruds.computerCentreData.fields.crawled') }}</label>
                            <input class="form-control" type="number" name="crawled" id="crawled" value="{{ old('crawled', '') }}" step="1">
                            @if($errors->has('crawled'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('crawled') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.computerCentreData.fields.crawled_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="crawled_at">{{ trans('cruds.computerCentreData.fields.crawled_at') }}</label>
                            <input class="form-control datetime" type="text" name="crawled_at" id="crawled_at" value="{{ old('crawled_at') }}">
                            @if($errors->has('crawled_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('crawled_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.computerCentreData.fields.crawled_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.computerCentreData.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection