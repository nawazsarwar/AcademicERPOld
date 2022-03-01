@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.reevaluationPaper.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.reevaluation-papers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="reevaluation_id">{{ trans('cruds.reevaluationPaper.fields.reevaluation') }}</label>
                            <select class="form-control select2" name="reevaluation_id" id="reevaluation_id" required>
                                @foreach($reevaluations as $id => $entry)
                                    <option value="{{ $id }}" {{ old('reevaluation_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reevaluation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reevaluation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.reevaluation_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="examination_mark_id">{{ trans('cruds.reevaluationPaper.fields.examination_mark') }}</label>
                            <select class="form-control select2" name="examination_mark_id" id="examination_mark_id" required>
                                @foreach($examination_marks as $id => $entry)
                                    <option value="{{ $id }}" {{ old('examination_mark_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('examination_mark'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('examination_mark') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.examination_mark_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="paper_id">{{ trans('cruds.reevaluationPaper.fields.paper') }}</label>
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
                            <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.paper_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="paper_code">{{ trans('cruds.reevaluationPaper.fields.paper_code') }}</label>
                            <input class="form-control" type="text" name="paper_code" id="paper_code" value="{{ old('paper_code', '') }}" required>
                            @if($errors->has('paper_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.paper_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.reevaluationPaper.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.status_helper') }}</span>
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