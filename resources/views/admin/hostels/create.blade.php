@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hostel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hostels.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="hall_id">{{ trans('cruds.hostel.fields.hall') }}</label>
                <select class="form-control select2 {{ $errors->has('hall') ? 'is-invalid' : '' }}" name="hall_id" id="hall_id" required>
                    @foreach($halls as $id => $entry)
                        <option value="{{ $id }}" {{ old('hall_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hall'))
                    <span class="text-danger">{{ $errors->first('hall') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostel.fields.hall_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.hostel.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostel.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.hostel.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostel.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="residential_status">{{ trans('cruds.hostel.fields.residential_status') }}</label>
                <input class="form-control {{ $errors->has('residential_status') ? 'is-invalid' : '' }}" type="number" name="residential_status" id="residential_status" value="{{ old('residential_status', '') }}" step="1">
                @if($errors->has('residential_status'))
                    <span class="text-danger">{{ $errors->first('residential_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostel.fields.residential_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.hostel.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostel.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.hostel.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostel.fields.remarks_helper') }}</span>
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