@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.paper.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.papers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.paper.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.paper.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="paper_type_id">{{ trans('cruds.paper.fields.paper_type') }}</label>
                            <select class="form-control select2" name="paper_type_id" id="paper_type_id" required>
                                @foreach($paper_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('paper_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.paper_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="part">{{ trans('cruds.paper.fields.part') }}</label>
                            <input class="form-control" type="number" name="part" id="part" value="{{ old('part', '') }}" step="1">
                            @if($errors->has('part'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('part') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.part_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.paper.fields.teaching_status') }}</label>
                            <select class="form-control" name="teaching_status" id="teaching_status">
                                <option value disabled {{ old('teaching_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Paper::TEACHING_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('teaching_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('teaching_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('teaching_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.teaching_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="credits">{{ trans('cruds.paper.fields.credits') }}</label>
                            <input class="form-control" type="text" name="credits" id="credits" value="{{ old('credits', '') }}">
                            @if($errors->has('credits'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('credits') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.credits_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.paper.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.paper.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.remarks_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="administrable_id">{{ trans('cruds.paper.fields.administrable') }}</label>
                            <select class="form-control select2" name="administrable_id" id="administrable_id">
                                @foreach($administrables as $id => $entry)
                                    <option value="{{ $id }}" {{ old('administrable_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('administrable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('administrable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.administrable_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="administrable_type">{{ trans('cruds.paper.fields.administrable_type') }}</label>
                            <input class="form-control" type="text" name="administrable_type" id="administrable_type" value="{{ old('administrable_type', '') }}">
                            @if($errors->has('administrable_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('administrable_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.administrable_type_helper') }}</span>
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