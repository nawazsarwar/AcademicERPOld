@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hallStudent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hall-students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="hall_id">{{ trans('cruds.hallStudent.fields.hall') }}</label>
                <select class="form-control select2 {{ $errors->has('hall') ? 'is-invalid' : '' }}" name="hall_id" id="hall_id" required>
                    @foreach($halls as $id => $entry)
                        <option value="{{ $id }}" {{ old('hall_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hall'))
                    <span class="text-danger">{{ $errors->first('hall') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.hall_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hostel_id">{{ trans('cruds.hallStudent.fields.hostel') }}</label>
                <select class="form-control select2 {{ $errors->has('hostel') ? 'is-invalid' : '' }}" name="hostel_id" id="hostel_id">
                    @foreach($hostels as $id => $entry)
                        <option value="{{ $id }}" {{ old('hostel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hostel'))
                    <span class="text-danger">{{ $errors->first('hostel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.hostel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="room_no">{{ trans('cruds.hallStudent.fields.room_no') }}</label>
                <input class="form-control {{ $errors->has('room_no') ? 'is-invalid' : '' }}" type="text" name="room_no" id="room_no" value="{{ old('room_no', '') }}">
                @if($errors->has('room_no'))
                    <span class="text-danger">{{ $errors->first('room_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.room_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.hallStudent.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <span class="text-danger">{{ $errors->first('student') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="allotment_date">{{ trans('cruds.hallStudent.fields.allotment_date') }}</label>
                <input class="form-control date {{ $errors->has('allotment_date') ? 'is-invalid' : '' }}" type="text" name="allotment_date" id="allotment_date" value="{{ old('allotment_date') }}">
                @if($errors->has('allotment_date'))
                    <span class="text-danger">{{ $errors->first('allotment_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.allotment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="allotted_by_id">{{ trans('cruds.hallStudent.fields.allotted_by') }}</label>
                <select class="form-control select2 {{ $errors->has('allotted_by') ? 'is-invalid' : '' }}" name="allotted_by_id" id="allotted_by_id">
                    @foreach($allotted_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('allotted_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('allotted_by'))
                    <span class="text-danger">{{ $errors->first('allotted_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.allotted_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="allotted_on">{{ trans('cruds.hallStudent.fields.allotted_on') }}</label>
                <input class="form-control date {{ $errors->has('allotted_on') ? 'is-invalid' : '' }}" type="text" name="allotted_on" id="allotted_on" value="{{ old('allotted_on') }}">
                @if($errors->has('allotted_on'))
                    <span class="text-danger">{{ $errors->first('allotted_on') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.allotted_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.hallStudent.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.hallStudent.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hallStudent.fields.remarks_helper') }}</span>
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