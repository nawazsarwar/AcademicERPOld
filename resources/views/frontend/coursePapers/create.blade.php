@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.coursePaper.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.course-papers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="course_id">{{ trans('cruds.coursePaper.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                @foreach($courses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coursePaper.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="paper_id">{{ trans('cruds.coursePaper.fields.paper') }}</label>
                            <select class="form-control select2" name="paper_id" id="paper_id" required>
                                @foreach($papers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('paper_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coursePaper.fields.paper_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fraction">{{ trans('cruds.coursePaper.fields.fraction') }}</label>
                            <input class="form-control" type="number" name="fraction" id="fraction" value="{{ old('fraction', '') }}" step="1">
                            @if($errors->has('fraction'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fraction') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coursePaper.fields.fraction_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="academic_session_id">{{ trans('cruds.coursePaper.fields.academic_session') }}</label>
                            <select class="form-control select2" name="academic_session_id" id="academic_session_id" required>
                                @foreach($academic_sessions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('academic_session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_session'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('academic_session') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coursePaper.fields.academic_session_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.coursePaper.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coursePaper.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.coursePaper.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection