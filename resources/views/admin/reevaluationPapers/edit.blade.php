@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reevaluationPaper.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reevaluation-papers.update", [$reevaluationPaper->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="reevaluation_id">{{ trans('cruds.reevaluationPaper.fields.reevaluation') }}</label>
                <select class="form-control select2 {{ $errors->has('reevaluation') ? 'is-invalid' : '' }}" name="reevaluation_id" id="reevaluation_id" required>
                    @foreach($reevaluations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('reevaluation_id') ? old('reevaluation_id') : $reevaluationPaper->reevaluation->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('reevaluation'))
                    <span class="text-danger">{{ $errors->first('reevaluation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.reevaluation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="examination_mark_id">{{ trans('cruds.reevaluationPaper.fields.examination_mark') }}</label>
                <select class="form-control select2 {{ $errors->has('examination_mark') ? 'is-invalid' : '' }}" name="examination_mark_id" id="examination_mark_id" required>
                    @foreach($examination_marks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('examination_mark_id') ? old('examination_mark_id') : $reevaluationPaper->examination_mark->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('examination_mark'))
                    <span class="text-danger">{{ $errors->first('examination_mark') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.examination_mark_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paper_id">{{ trans('cruds.reevaluationPaper.fields.paper') }}</label>
                <select class="form-control select2 {{ $errors->has('paper') ? 'is-invalid' : '' }}" name="paper_id" id="paper_id" required>
                    @foreach($papers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('paper_id') ? old('paper_id') : $reevaluationPaper->paper->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper'))
                    <span class="text-danger">{{ $errors->first('paper') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.paper_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paper_code">{{ trans('cruds.reevaluationPaper.fields.paper_code') }}</label>
                <input class="form-control {{ $errors->has('paper_code') ? 'is-invalid' : '' }}" type="text" name="paper_code" id="paper_code" value="{{ old('paper_code', $reevaluationPaper->paper_code) }}" required>
                @if($errors->has('paper_code'))
                    <span class="text-danger">{{ $errors->first('paper_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reevaluationPaper.fields.paper_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.reevaluationPaper.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $reevaluationPaper->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
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



@endsection