@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.examinationSchedule.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.examination-schedules.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="academic_session_id">{{ trans('cruds.examinationSchedule.fields.academic_session') }}</label>
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
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.academic_session_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="paper_id">{{ trans('cruds.examinationSchedule.fields.paper') }}</label>
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
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.paper_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.examinationSchedule.fields.mode') }}</label>
                            <select class="form-control" name="mode" id="mode" required>
                                <option value disabled {{ old('mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ExaminationSchedule::MODE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mode', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.mode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="centre">{{ trans('cruds.examinationSchedule.fields.centre') }}</label>
                            <input class="form-control" type="text" name="centre" id="centre" value="{{ old('centre', '') }}">
                            @if($errors->has('centre'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('centre') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.centre_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="start">{{ trans('cruds.examinationSchedule.fields.start') }}</label>
                            <input class="form-control datetime" type="text" name="start" id="start" value="{{ old('start') }}" required>
                            @if($errors->has('start'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('start') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.start_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="end">{{ trans('cruds.examinationSchedule.fields.end') }}</label>
                            <input class="form-control datetime" type="text" name="end" id="end" value="{{ old('end') }}" required>
                            @if($errors->has('end'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.end_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="booklet_pages">{{ trans('cruds.examinationSchedule.fields.booklet_pages') }}</label>
                            <input class="form-control" type="number" name="booklet_pages" id="booklet_pages" value="{{ old('booklet_pages', '') }}" step="1">
                            @if($errors->has('booklet_pages'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('booklet_pages') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.booklet_pages_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="season">{{ trans('cruds.examinationSchedule.fields.season') }}</label>
                            <input class="form-control" type="text" name="season" id="season" value="{{ old('season', '') }}">
                            @if($errors->has('season'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('season') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.season_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.examinationSchedule.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examinationSchedule.fields.remarks_helper') }}</span>
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