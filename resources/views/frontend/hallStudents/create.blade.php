@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.hallStudent.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.hall-students.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="hall_id">{{ trans('cruds.hallStudent.fields.hall') }}</label>
                            <select class="form-control select2" name="hall_id" id="hall_id" required>
                                @foreach($halls as $id => $entry)
                                    <option value="{{ $id }}" {{ old('hall_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hall'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hall') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hallStudent.fields.hall_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="hostel_id">{{ trans('cruds.hallStudent.fields.hostel') }}</label>
                            <select class="form-control select2" name="hostel_id" id="hostel_id">
                                @foreach($hostels as $id => $entry)
                                    <option value="{{ $id }}" {{ old('hostel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hostel'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hostel') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hallStudent.fields.hostel_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="room_no">{{ trans('cruds.hallStudent.fields.room_no') }}</label>
                            <input class="form-control" type="text" name="room_no" id="room_no" value="{{ old('room_no', '') }}">
                            @if($errors->has('room_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('room_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hallStudent.fields.room_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.hallStudent.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $entry)
                                    <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('student'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('student') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hallStudent.fields.student_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="allotment_date">{{ trans('cruds.hallStudent.fields.allotment_date') }}</label>
                            <input class="form-control date" type="text" name="allotment_date" id="allotment_date" value="{{ old('allotment_date') }}">
                            @if($errors->has('allotment_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('allotment_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hallStudent.fields.allotment_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="allotted_by_id">{{ trans('cruds.hallStudent.fields.allotted_by') }}</label>
                            <select class="form-control select2" name="allotted_by_id" id="allotted_by_id">
                                @foreach($allotted_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('allotted_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('allotted_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('allotted_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hallStudent.fields.allotted_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="allotted_on">{{ trans('cruds.hallStudent.fields.allotted_on') }}</label>
                            <input class="form-control date" type="text" name="allotted_on" id="allotted_on" value="{{ old('allotted_on') }}">
                            @if($errors->has('allotted_on'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('allotted_on') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hallStudent.fields.allotted_on_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.hallStudent.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hallStudent.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.hallStudent.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection