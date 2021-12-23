@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.student.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="enrolment_id">{{ trans('cruds.student.fields.enrolment') }}</label>
                <select class="form-control select2 {{ $errors->has('enrolment') ? 'is-invalid' : '' }}" name="enrolment_id" id="enrolment_id" required>
                    @foreach($enrolments as $id => $entry)
                        <option value="{{ $id }}" {{ old('enrolment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('enrolment'))
                    <span class="text-danger">{{ $errors->first('enrolment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.enrolment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guardian_mobile_no">{{ trans('cruds.student.fields.guardian_mobile_no') }}</label>
                <input class="form-control {{ $errors->has('guardian_mobile_no') ? 'is-invalid' : '' }}" type="text" name="guardian_mobile_no" id="guardian_mobile_no" value="{{ old('guardian_mobile_no', '') }}">
                @if($errors->has('guardian_mobile_no'))
                    <span class="text-danger">{{ $errors->first('guardian_mobile_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.guardian_mobile_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="person_id">{{ trans('cruds.student.fields.person') }}</label>
                <select class="form-control select2 {{ $errors->has('person') ? 'is-invalid' : '' }}" name="person_id" id="person_id" required>
                    @foreach($people as $id => $entry)
                        <option value="{{ $id }}" {{ old('person_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('person'))
                    <span class="text-danger">{{ $errors->first('person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.person_helper') }}</span>
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