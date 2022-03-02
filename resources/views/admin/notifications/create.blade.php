@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.notification.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notifications.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.notification.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mode">{{ trans('cruds.notification.fields.mode') }}</label>
                <input class="form-control {{ $errors->has('mode') ? 'is-invalid' : '' }}" type="text" name="mode" id="mode" value="{{ old('mode', '') }}" required>
                @if($errors->has('mode'))
                    <span class="text-danger">{{ $errors->first('mode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type">{{ trans('cruds.notification.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', '') }}" required>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.notification.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="json">{{ trans('cruds.notification.fields.json') }}</label>
                <textarea class="form-control {{ $errors->has('json') ? 'is-invalid' : '' }}" name="json" id="json" required>{{ old('json') }}</textarea>
                @if($errors->has('json'))
                    <span class="text-danger">{{ $errors->first('json') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.json_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="created_by_id">{{ trans('cruds.notification.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <span class="text-danger">{{ $errors->first('created_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="try_count">{{ trans('cruds.notification.fields.try_count') }}</label>
                <input class="form-control {{ $errors->has('try_count') ? 'is-invalid' : '' }}" type="number" name="try_count" id="try_count" value="{{ old('try_count', '') }}" step="1">
                @if($errors->has('try_count'))
                    <span class="text-danger">{{ $errors->first('try_count') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.try_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="done">{{ trans('cruds.notification.fields.done') }}</label>
                <input class="form-control {{ $errors->has('done') ? 'is-invalid' : '' }}" type="number" name="done" id="done" value="{{ old('done', '') }}" step="1">
                @if($errors->has('done'))
                    <span class="text-danger">{{ $errors->first('done') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notification.fields.done_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.notification.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection