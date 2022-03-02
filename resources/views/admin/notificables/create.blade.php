@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.notificable.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notificables.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="notification_id">{{ trans('cruds.notificable.fields.notification') }}</label>
                <select class="form-control select2 {{ $errors->has('notification') ? 'is-invalid' : '' }}" name="notification_id" id="notification_id" required>
                    @foreach($notifications as $id => $entry)
                        <option value="{{ $id }}" {{ old('notification_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('notification'))
                    <span class="text-danger">{{ $errors->first('notification') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notificable.fields.notification_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="notificable">{{ trans('cruds.notificable.fields.notificable') }}</label>
                <input class="form-control {{ $errors->has('notificable') ? 'is-invalid' : '' }}" type="number" name="notificable" id="notificable" value="{{ old('notificable', '') }}" step="1" required>
                @if($errors->has('notificable'))
                    <span class="text-danger">{{ $errors->first('notificable') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notificable.fields.notificable_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="notificable_type">{{ trans('cruds.notificable.fields.notificable_type') }}</label>
                <input class="form-control {{ $errors->has('notificable_type') ? 'is-invalid' : '' }}" type="text" name="notificable_type" id="notificable_type" value="{{ old('notificable_type', '') }}" required>
                @if($errors->has('notificable_type'))
                    <span class="text-danger">{{ $errors->first('notificable_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.notificable.fields.notificable_type_helper') }}</span>
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