@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.coursePaper.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-papers.update", [$coursePaper->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.coursePaper.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $coursePaper->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coursePaper.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paper_id">{{ trans('cruds.coursePaper.fields.paper') }}</label>
                <select class="form-control select2 {{ $errors->has('paper') ? 'is-invalid' : '' }}" name="paper_id" id="paper_id" required>
                    @foreach($papers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('paper_id') ? old('paper_id') : $coursePaper->paper->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper'))
                    <span class="text-danger">{{ $errors->first('paper') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coursePaper.fields.paper_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fraction">{{ trans('cruds.coursePaper.fields.fraction') }}</label>
                <input class="form-control {{ $errors->has('fraction') ? 'is-invalid' : '' }}" type="number" name="fraction" id="fraction" value="{{ old('fraction', $coursePaper->fraction) }}" step="1">
                @if($errors->has('fraction'))
                    <span class="text-danger">{{ $errors->first('fraction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coursePaper.fields.fraction_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="academic_session_id">{{ trans('cruds.coursePaper.fields.academic_session') }}</label>
                <select class="form-control select2 {{ $errors->has('academic_session') ? 'is-invalid' : '' }}" name="academic_session_id" id="academic_session_id" required>
                    @foreach($academic_sessions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('academic_session_id') ? old('academic_session_id') : $coursePaper->academic_session->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic_session'))
                    <span class="text-danger">{{ $errors->first('academic_session') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coursePaper.fields.academic_session_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.coursePaper.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $coursePaper->status) }}" step="1">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coursePaper.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.coursePaper.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $coursePaper->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coursePaper.fields.remarks_helper') }}</span>
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