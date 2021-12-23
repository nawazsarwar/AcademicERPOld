@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hostelRoom.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hostel-rooms.update", [$hostelRoom->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="hostel_id">{{ trans('cruds.hostelRoom.fields.hostel') }}</label>
                <select class="form-control select2 {{ $errors->has('hostel') ? 'is-invalid' : '' }}" name="hostel_id" id="hostel_id" required>
                    @foreach($hostels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('hostel_id') ? old('hostel_id') : $hostelRoom->hostel->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hostel'))
                    <span class="text-danger">{{ $errors->first('hostel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostelRoom.fields.hostel_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.hostelRoom.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', $hostelRoom->number) }}" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostelRoom.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vacancy">{{ trans('cruds.hostelRoom.fields.vacancy') }}</label>
                <input class="form-control {{ $errors->has('vacancy') ? 'is-invalid' : '' }}" type="number" name="vacancy" id="vacancy" value="{{ old('vacancy', $hostelRoom->vacancy) }}" step="1" required>
                @if($errors->has('vacancy'))
                    <span class="text-danger">{{ $errors->first('vacancy') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostelRoom.fields.vacancy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.hostelRoom.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $hostelRoom->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hostelRoom.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.hostelRoom.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $hostelRoom->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection