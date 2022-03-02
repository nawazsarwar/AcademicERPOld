@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.notificable.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.notificables.update", [$notificable->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="notification_id">{{ trans('cruds.notificable.fields.notification') }}</label>
                            <select class="form-control select2" name="notification_id" id="notification_id" required>
                                @foreach($notifications as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('notification_id') ? old('notification_id') : $notificable->notification->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('notification'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notification') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notificable.fields.notification_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="notificable">{{ trans('cruds.notificable.fields.notificable') }}</label>
                            <input class="form-control" type="number" name="notificable" id="notificable" value="{{ old('notificable', $notificable->notificable) }}" step="1" required>
                            @if($errors->has('notificable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notificable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notificable.fields.notificable_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="notificable_type">{{ trans('cruds.notificable.fields.notificable_type') }}</label>
                            <input class="form-control" type="text" name="notificable_type" id="notificable_type" value="{{ old('notificable_type', $notificable->notificable_type) }}" required>
                            @if($errors->has('notificable_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notificable_type') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection