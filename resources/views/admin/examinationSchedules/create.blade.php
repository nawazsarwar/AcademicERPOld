@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.examinationSchedule.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.examination-schedules.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="academic_session_id">{{ trans('cruds.examinationSchedule.fields.academic_session') }}</label>
                <select class="form-control select2 {{ $errors->has('academic_session') ? 'is-invalid' : '' }}" name="academic_session_id" id="academic_session_id" required>
                    @foreach($academic_sessions as $id => $entry)
                        <option value="{{ $id }}" {{ old('academic_session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic_session'))
                    <span class="text-danger">{{ $errors->first('academic_session') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationSchedule.fields.academic_session_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paper_id">{{ trans('cruds.examinationSchedule.fields.paper') }}</label>
                <select class="form-control select2 {{ $errors->has('paper') ? 'is-invalid' : '' }}" name="paper_id" id="paper_id" required>
                    @foreach($papers as $id => $entry)
                        <option value="{{ $id }}" {{ old('paper_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper'))
                    <span class="text-danger">{{ $errors->first('paper') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationSchedule.fields.paper_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.examinationSchedule.fields.mode') }}</label>
                <select class="form-control {{ $errors->has('mode') ? 'is-invalid' : '' }}" name="mode" id="mode" required>
                    <option value disabled {{ old('mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ExaminationSchedule::MODE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mode', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mode'))
                    <span class="text-danger">{{ $errors->first('mode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationSchedule.fields.mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="centre">{{ trans('cruds.examinationSchedule.fields.centre') }}</label>
                <input class="form-control {{ $errors->has('centre') ? 'is-invalid' : '' }}" type="text" name="centre" id="centre" value="{{ old('centre', '') }}">
                @if($errors->has('centre'))
                    <span class="text-danger">{{ $errors->first('centre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationSchedule.fields.centre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start">{{ trans('cruds.examinationSchedule.fields.start') }}</label>
                <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start') }}" required>
                @if($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationSchedule.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end">{{ trans('cruds.examinationSchedule.fields.end') }}</label>
                <input class="form-control datetime {{ $errors->has('end') ? 'is-invalid' : '' }}" type="text" name="end" id="end" value="{{ old('end') }}" required>
                @if($errors->has('end'))
                    <span class="text-danger">{{ $errors->first('end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationSchedule.fields.end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="booklet_pages">{{ trans('cruds.examinationSchedule.fields.booklet_pages') }}</label>
                <input class="form-control {{ $errors->has('booklet_pages') ? 'is-invalid' : '' }}" type="number" name="booklet_pages" id="booklet_pages" value="{{ old('booklet_pages', '') }}" step="1">
                @if($errors->has('booklet_pages'))
                    <span class="text-danger">{{ $errors->first('booklet_pages') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationSchedule.fields.booklet_pages_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="season">{{ trans('cruds.examinationSchedule.fields.season') }}</label>
                <input class="form-control {{ $errors->has('season') ? 'is-invalid' : '' }}" type="text" name="season" id="season" value="{{ old('season', '') }}">
                @if($errors->has('season'))
                    <span class="text-danger">{{ $errors->first('season') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examinationSchedule.fields.season_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.examinationSchedule.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection