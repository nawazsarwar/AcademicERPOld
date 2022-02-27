@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.student.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.students.update", [$student->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="person_id">{{ trans('cruds.student.fields.person') }}</label>
                            <select class="form-control select2" name="person_id" id="person_id" required>
                                @foreach($people as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('person_id') ? old('person_id') : $student->person->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('person'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('person') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.person_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="enrolment_id">{{ trans('cruds.student.fields.enrolment') }}</label>
                            <select class="form-control select2" name="enrolment_id" id="enrolment_id" required>
                                @foreach($enrolments as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('enrolment_id') ? old('enrolment_id') : $student->enrolment->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('enrolment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('enrolment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.enrolment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="enrolment_no">{{ trans('cruds.student.fields.enrolment_no') }}</label>
                            <input class="form-control" type="text" name="enrolment_no" id="enrolment_no" value="{{ old('enrolment_no', $student->enrolment_no) }}" required>
                            @if($errors->has('enrolment_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('enrolment_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.enrolment_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="guardian_mobile_no">{{ trans('cruds.student.fields.guardian_mobile_no') }}</label>
                            <input class="form-control" type="text" name="guardian_mobile_no" id="guardian_mobile_no" value="{{ old('guardian_mobile_no', $student->guardian_mobile_no) }}">
                            @if($errors->has('guardian_mobile_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('guardian_mobile_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.guardian_mobile_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verification_status_id">{{ trans('cruds.student.fields.verification_status') }}</label>
                            <select class="form-control select2" name="verification_status_id" id="verification_status_id">
                                @foreach($verification_statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('verification_status_id') ? old('verification_status_id') : $student->verification_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verification_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verification_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.verification_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_by_id">{{ trans('cruds.student.fields.verified_by') }}</label>
                            <select class="form-control select2" name="verified_by_id" id="verified_by_id">
                                @foreach($verified_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('verified_by_id') ? old('verified_by_id') : $student->verified_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('verified_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.verified_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verified_at">{{ trans('cruds.student.fields.verified_at') }}</label>
                            <input class="form-control date" type="text" name="verified_at" id="verified_at" value="{{ old('verified_at', $student->verified_at) }}">
                            @if($errors->has('verified_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verified_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.verified_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="verification_remark">{{ trans('cruds.student.fields.verification_remark') }}</label>
                            <textarea class="form-control" name="verification_remark" id="verification_remark">{{ old('verification_remark', $student->verification_remark) }}</textarea>
                            @if($errors->has('verification_remark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('verification_remark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.verification_remark_helper') }}</span>
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