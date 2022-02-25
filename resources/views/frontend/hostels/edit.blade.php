@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.hostel.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.hostels.update", [$hostel->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="hall_id">{{ trans('cruds.hostel.fields.hall') }}</label>
                            <select class="form-control select2" name="hall_id" id="hall_id" required>
                                @foreach($halls as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('hall_id') ? old('hall_id') : $hostel->hall->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hall'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hall') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostel.fields.hall_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.hostel.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $hostel->code) }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostel.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.hostel.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $hostel->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostel.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="residential_status">{{ trans('cruds.hostel.fields.residential_status') }}</label>
                            <input class="form-control" type="number" name="residential_status" id="residential_status" value="{{ old('residential_status', $hostel->residential_status) }}" step="1">
                            @if($errors->has('residential_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('residential_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostel.fields.residential_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.hostel.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $hostel->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostel.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.hostel.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $hostel->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection