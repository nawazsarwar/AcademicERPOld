@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.notification.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.notifications.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.notification.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mode">{{ trans('cruds.notification.fields.mode') }}</label>
                            <input class="form-control" type="text" name="mode" id="mode" value="{{ old('mode', '') }}" required>
                            @if($errors->has('mode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.mode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="type">{{ trans('cruds.notification.fields.type') }}</label>
                            <input class="form-control" type="text" name="type" id="type" value="{{ old('type', '') }}" required>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status">{{ trans('cruds.notification.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}" required>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="json">{{ trans('cruds.notification.fields.json') }}</label>
                            <textarea class="form-control" name="json" id="json" required>{{ old('json') }}</textarea>
                            @if($errors->has('json'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('json') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.json_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="created_by_id">{{ trans('cruds.notification.fields.created_by') }}</label>
                            <select class="form-control select2" name="created_by_id" id="created_by_id" required>
                                @foreach($created_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('created_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('created_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.created_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="try_count">{{ trans('cruds.notification.fields.try_count') }}</label>
                            <input class="form-control" type="number" name="try_count" id="try_count" value="{{ old('try_count', '') }}" step="1">
                            @if($errors->has('try_count'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('try_count') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.try_count_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="done">{{ trans('cruds.notification.fields.done') }}</label>
                            <input class="form-control" type="number" name="done" id="done" value="{{ old('done', '') }}" step="1">
                            @if($errors->has('done'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('done') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.done_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.notification.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notification.fields.remarks_helper') }}</span>
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