@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.hostelRoom.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.hostel-rooms.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="hostel_id">{{ trans('cruds.hostelRoom.fields.hostel') }}</label>
                            <select class="form-control select2" name="hostel_id" id="hostel_id" required>
                                @foreach($hostels as $id => $entry)
                                    <option value="{{ $id }}" {{ old('hostel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hostel'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hostel') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostelRoom.fields.hostel_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="number">{{ trans('cruds.hostelRoom.fields.number') }}</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', '') }}" required>
                            @if($errors->has('number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostelRoom.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="vacancy">{{ trans('cruds.hostelRoom.fields.vacancy') }}</label>
                            <input class="form-control" type="number" name="vacancy" id="vacancy" value="{{ old('vacancy', '0') }}" step="1" required>
                            @if($errors->has('vacancy'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vacancy') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostelRoom.fields.vacancy_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.hostelRoom.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostelRoom.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.hostelRoom.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hostelRoom.fields.remarks_helper') }}</span>
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