@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.researchScholar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.research-scholars.update", [$researchScholar->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="registration_id">{{ trans('cruds.researchScholar.fields.registration') }}</label>
                <select class="form-control select2 {{ $errors->has('registration') ? 'is-invalid' : '' }}" name="registration_id" id="registration_id" required>
                    @foreach($registrations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('registration_id') ? old('registration_id') : $researchScholar->registration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('registration'))
                    <span class="text-danger">{{ $errors->first('registration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.registration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.researchScholar.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ResearchScholar::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $researchScholar->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="admission_date">{{ trans('cruds.researchScholar.fields.admission_date') }}</label>
                <input class="form-control date {{ $errors->has('admission_date') ? 'is-invalid' : '' }}" type="text" name="admission_date" id="admission_date" value="{{ old('admission_date', $researchScholar->admission_date) }}">
                @if($errors->has('admission_date'))
                    <span class="text-danger">{{ $errors->first('admission_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.admission_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="supervisor_id">{{ trans('cruds.researchScholar.fields.supervisor') }}</label>
                <select class="form-control select2 {{ $errors->has('supervisor') ? 'is-invalid' : '' }}" name="supervisor_id" id="supervisor_id" required>
                    @foreach($supervisors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('supervisor_id') ? old('supervisor_id') : $researchScholar->supervisor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('supervisor'))
                    <span class="text-danger">{{ $errors->first('supervisor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.supervisor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="supervisor_name">{{ trans('cruds.researchScholar.fields.supervisor_name') }}</label>
                <input class="form-control {{ $errors->has('supervisor_name') ? 'is-invalid' : '' }}" type="text" name="supervisor_name" id="supervisor_name" value="{{ old('supervisor_name', $researchScholar->supervisor_name) }}">
                @if($errors->has('supervisor_name'))
                    <span class="text-danger">{{ $errors->first('supervisor_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.supervisor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="co_supervisor_name">{{ trans('cruds.researchScholar.fields.co_supervisor_name') }}</label>
                <input class="form-control {{ $errors->has('co_supervisor_name') ? 'is-invalid' : '' }}" type="text" name="co_supervisor_name" id="co_supervisor_name" value="{{ old('co_supervisor_name', $researchScholar->co_supervisor_name) }}">
                @if($errors->has('co_supervisor_name'))
                    <span class="text-danger">{{ $errors->first('co_supervisor_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.co_supervisor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="co_supervisor_address">{{ trans('cruds.researchScholar.fields.co_supervisor_address') }}</label>
                <textarea class="form-control {{ $errors->has('co_supervisor_address') ? 'is-invalid' : '' }}" name="co_supervisor_address" id="co_supervisor_address">{{ old('co_supervisor_address', $researchScholar->co_supervisor_address) }}</textarea>
                @if($errors->has('co_supervisor_address'))
                    <span class="text-danger">{{ $errors->first('co_supervisor_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.co_supervisor_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="research_topic">{{ trans('cruds.researchScholar.fields.research_topic') }}</label>
                <input class="form-control {{ $errors->has('research_topic') ? 'is-invalid' : '' }}" type="text" name="research_topic" id="research_topic" value="{{ old('research_topic', $researchScholar->research_topic) }}" required>
                @if($errors->has('research_topic'))
                    <span class="text-danger">{{ $errors->first('research_topic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.research_topic_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.researchScholar.fields.net_jrf') }}</label>
                <select class="form-control {{ $errors->has('net_jrf') ? 'is-invalid' : '' }}" name="net_jrf" id="net_jrf">
                    <option value disabled {{ old('net_jrf', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ResearchScholar::NET_JRF_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('net_jrf', $researchScholar->net_jrf) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('net_jrf'))
                    <span class="text-danger">{{ $errors->first('net_jrf') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.net_jrf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bos_date">{{ trans('cruds.researchScholar.fields.bos_date') }}</label>
                <input class="form-control date {{ $errors->has('bos_date') ? 'is-invalid' : '' }}" type="text" name="bos_date" id="bos_date" value="{{ old('bos_date', $researchScholar->bos_date) }}">
                @if($errors->has('bos_date'))
                    <span class="text-danger">{{ $errors->first('bos_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.bos_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="casr_date">{{ trans('cruds.researchScholar.fields.casr_date') }}</label>
                <input class="form-control date {{ $errors->has('casr_date') ? 'is-invalid' : '' }}" type="text" name="casr_date" id="casr_date" value="{{ old('casr_date', $researchScholar->casr_date) }}">
                @if($errors->has('casr_date'))
                    <span class="text-danger">{{ $errors->first('casr_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.casr_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.researchScholar.fields.paper_1') }}</label>
                <select class="form-control {{ $errors->has('paper_1') ? 'is-invalid' : '' }}" name="paper_1" id="paper_1" required>
                    <option value disabled {{ old('paper_1', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ResearchScholar::PAPER_1_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('paper_1', $researchScholar->paper_1) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper_1'))
                    <span class="text-danger">{{ $errors->first('paper_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.researchScholar.fields.paper_1_result') }}</label>
                <select class="form-control {{ $errors->has('paper_1_result') ? 'is-invalid' : '' }}" name="paper_1_result" id="paper_1_result" required>
                    <option value disabled {{ old('paper_1_result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ResearchScholar::PAPER_1_RESULT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('paper_1_result', $researchScholar->paper_1_result) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper_1_result'))
                    <span class="text-danger">{{ $errors->first('paper_1_result') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_1_result_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paper_2">{{ trans('cruds.researchScholar.fields.paper_2') }}</label>
                <input class="form-control {{ $errors->has('paper_2') ? 'is-invalid' : '' }}" type="text" name="paper_2" id="paper_2" value="{{ old('paper_2', $researchScholar->paper_2) }}">
                @if($errors->has('paper_2'))
                    <span class="text-danger">{{ $errors->first('paper_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.researchScholar.fields.paper_2_result') }}</label>
                <select class="form-control {{ $errors->has('paper_2_result') ? 'is-invalid' : '' }}" name="paper_2_result" id="paper_2_result">
                    <option value disabled {{ old('paper_2_result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ResearchScholar::PAPER_2_RESULT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('paper_2_result', $researchScholar->paper_2_result) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper_2_result'))
                    <span class="text-danger">{{ $errors->first('paper_2_result') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_2_result_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paper_3">{{ trans('cruds.researchScholar.fields.paper_3') }}</label>
                <input class="form-control {{ $errors->has('paper_3') ? 'is-invalid' : '' }}" type="text" name="paper_3" id="paper_3" value="{{ old('paper_3', $researchScholar->paper_3) }}">
                @if($errors->has('paper_3'))
                    <span class="text-danger">{{ $errors->first('paper_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.researchScholar.fields.paper_3_result') }}</label>
                <select class="form-control {{ $errors->has('paper_3_result') ? 'is-invalid' : '' }}" name="paper_3_result" id="paper_3_result">
                    <option value disabled {{ old('paper_3_result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ResearchScholar::PAPER_3_RESULT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('paper_3_result', $researchScholar->paper_3_result) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper_3_result'))
                    <span class="text-danger">{{ $errors->first('paper_3_result') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_3_result_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paper_4">{{ trans('cruds.researchScholar.fields.paper_4') }}</label>
                <input class="form-control {{ $errors->has('paper_4') ? 'is-invalid' : '' }}" type="text" name="paper_4" id="paper_4" value="{{ old('paper_4', $researchScholar->paper_4) }}">
                @if($errors->has('paper_4'))
                    <span class="text-danger">{{ $errors->first('paper_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.researchScholar.fields.paper_4_result') }}</label>
                <select class="form-control {{ $errors->has('paper_4_result') ? 'is-invalid' : '' }}" name="paper_4_result" id="paper_4_result">
                    <option value disabled {{ old('paper_4_result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ResearchScholar::PAPER_4_RESULT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('paper_4_result', $researchScholar->paper_4_result) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper_4_result'))
                    <span class="text-danger">{{ $errors->first('paper_4_result') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_4_result_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pre_submission_date">{{ trans('cruds.researchScholar.fields.pre_submission_date') }}</label>
                <input class="form-control date {{ $errors->has('pre_submission_date') ? 'is-invalid' : '' }}" type="text" name="pre_submission_date" id="pre_submission_date" value="{{ old('pre_submission_date', $researchScholar->pre_submission_date) }}">
                @if($errors->has('pre_submission_date'))
                    <span class="text-danger">{{ $errors->first('pre_submission_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.pre_submission_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="submission_date">{{ trans('cruds.researchScholar.fields.submission_date') }}</label>
                <input class="form-control date {{ $errors->has('submission_date') ? 'is-invalid' : '' }}" type="text" name="submission_date" id="submission_date" value="{{ old('submission_date', $researchScholar->submission_date) }}">
                @if($errors->has('submission_date'))
                    <span class="text-danger">{{ $errors->first('submission_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.researchScholar.fields.submission_date_helper') }}</span>
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