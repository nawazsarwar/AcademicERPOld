@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.website.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.websites.update", [$website->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.website.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $website->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.website.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="domain">{{ trans('cruds.website.fields.domain') }}</label>
                            <input class="form-control" type="text" name="domain" id="domain" value="{{ old('domain', $website->domain) }}">
                            @if($errors->has('domain'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('domain') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.website.fields.domain_helper') }}</span>
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