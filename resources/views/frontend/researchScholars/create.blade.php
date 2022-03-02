@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.researchScholar.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.research-scholars.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="registration_id">{{ trans('cruds.researchScholar.fields.registration') }}</label>
                            <select class="form-control select2" name="registration_id" id="registration_id" required>
                                @foreach($registrations as $id => $entry)
                                    <option value="{{ $id }}" {{ old('registration_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('registration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('registration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.registration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.researchScholar.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ResearchScholar::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="admission_date">{{ trans('cruds.researchScholar.fields.admission_date') }}</label>
                            <input class="form-control date" type="text" name="admission_date" id="admission_date" value="{{ old('admission_date') }}">
                            @if($errors->has('admission_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('admission_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.admission_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="supervisor_id">{{ trans('cruds.researchScholar.fields.supervisor') }}</label>
                            <select class="form-control select2" name="supervisor_id" id="supervisor_id" required>
                                @foreach($supervisors as $id => $entry)
                                    <option value="{{ $id }}" {{ old('supervisor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('supervisor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('supervisor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.supervisor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="supervisor_name">{{ trans('cruds.researchScholar.fields.supervisor_name') }}</label>
                            <input class="form-control" type="text" name="supervisor_name" id="supervisor_name" value="{{ old('supervisor_name', '') }}">
                            @if($errors->has('supervisor_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('supervisor_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.supervisor_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="co_supervisor_name">{{ trans('cruds.researchScholar.fields.co_supervisor_name') }}</label>
                            <input class="form-control" type="text" name="co_supervisor_name" id="co_supervisor_name" value="{{ old('co_supervisor_name', '') }}">
                            @if($errors->has('co_supervisor_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('co_supervisor_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.co_supervisor_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="co_supervisor_address">{{ trans('cruds.researchScholar.fields.co_supervisor_address') }}</label>
                            <textarea class="form-control" name="co_supervisor_address" id="co_supervisor_address">{{ old('co_supervisor_address') }}</textarea>
                            @if($errors->has('co_supervisor_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('co_supervisor_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.co_supervisor_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="research_topic">{{ trans('cruds.researchScholar.fields.research_topic') }}</label>
                            <input class="form-control" type="text" name="research_topic" id="research_topic" value="{{ old('research_topic', '') }}" required>
                            @if($errors->has('research_topic'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('research_topic') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.research_topic_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.researchScholar.fields.net_jrf') }}</label>
                            <select class="form-control" name="net_jrf" id="net_jrf">
                                <option value disabled {{ old('net_jrf', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ResearchScholar::NET_JRF_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('net_jrf', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('net_jrf'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('net_jrf') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.net_jrf_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bos_date">{{ trans('cruds.researchScholar.fields.bos_date') }}</label>
                            <input class="form-control date" type="text" name="bos_date" id="bos_date" value="{{ old('bos_date') }}">
                            @if($errors->has('bos_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bos_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.bos_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="casr_date">{{ trans('cruds.researchScholar.fields.casr_date') }}</label>
                            <input class="form-control date" type="text" name="casr_date" id="casr_date" value="{{ old('casr_date') }}">
                            @if($errors->has('casr_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('casr_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.casr_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.researchScholar.fields.paper_1') }}</label>
                            <select class="form-control" name="paper_1" id="paper_1">
                                <option value disabled {{ old('paper_1', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ResearchScholar::PAPER_1_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('paper_1', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.researchScholar.fields.paper_1_result') }}</label>
                            <select class="form-control" name="paper_1_result" id="paper_1_result">
                                <option value disabled {{ old('paper_1_result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ResearchScholar::PAPER_1_RESULT_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('paper_1_result', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper_1_result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_1_result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_1_result_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paper_2">{{ trans('cruds.researchScholar.fields.paper_2') }}</label>
                            <input class="form-control" type="text" name="paper_2" id="paper_2" value="{{ old('paper_2', '') }}">
                            @if($errors->has('paper_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.researchScholar.fields.paper_2_result') }}</label>
                            <select class="form-control" name="paper_2_result" id="paper_2_result">
                                <option value disabled {{ old('paper_2_result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ResearchScholar::PAPER_2_RESULT_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('paper_2_result', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper_2_result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_2_result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_2_result_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paper_3">{{ trans('cruds.researchScholar.fields.paper_3') }}</label>
                            <input class="form-control" type="text" name="paper_3" id="paper_3" value="{{ old('paper_3', '') }}">
                            @if($errors->has('paper_3'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_3') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_3_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.researchScholar.fields.paper_3_result') }}</label>
                            <select class="form-control" name="paper_3_result" id="paper_3_result">
                                <option value disabled {{ old('paper_3_result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ResearchScholar::PAPER_3_RESULT_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('paper_3_result', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper_3_result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_3_result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_3_result_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paper_4">{{ trans('cruds.researchScholar.fields.paper_4') }}</label>
                            <input class="form-control" type="text" name="paper_4" id="paper_4" value="{{ old('paper_4', '') }}">
                            @if($errors->has('paper_4'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_4') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_4_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.researchScholar.fields.paper_4_result') }}</label>
                            <select class="form-control" name="paper_4_result" id="paper_4_result">
                                <option value disabled {{ old('paper_4_result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ResearchScholar::PAPER_4_RESULT_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('paper_4_result', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper_4_result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_4_result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.paper_4_result_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pre_submission_date">{{ trans('cruds.researchScholar.fields.pre_submission_date') }}</label>
                            <input class="form-control date" type="text" name="pre_submission_date" id="pre_submission_date" value="{{ old('pre_submission_date') }}">
                            @if($errors->has('pre_submission_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pre_submission_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.researchScholar.fields.pre_submission_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="submission_date">{{ trans('cruds.researchScholar.fields.submission_date') }}</label>
                            <input class="form-control date" type="text" name="submission_date" id="submission_date" value="{{ old('submission_date') }}">
                            @if($errors->has('submission_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('submission_date') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection