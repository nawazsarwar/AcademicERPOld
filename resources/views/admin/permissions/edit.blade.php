@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.permissions.update", [$permission->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.permission.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $permission->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guard_name">{{ trans('cruds.permission.fields.guard_name') }}</label>
                <input class="form-control {{ $errors->has('guard_name') ? 'is-invalid' : '' }}" type="text" name="guard_name" id="guard_name" value="{{ old('guard_name', $permission->guard_name) }}">
                @if($errors->has('guard_name'))
                    <span class="text-danger">{{ $errors->first('guard_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.guard_name_helper') }}</span>
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