@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paper.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.papers.update", [$paper->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.paper.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $paper->code) }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paper.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.paper.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $paper->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paper.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paper_type_id">{{ trans('cruds.paper.fields.paper_type') }}</label>
                <select class="form-control select2 {{ $errors->has('paper_type') ? 'is-invalid' : '' }}" name="paper_type_id" id="paper_type_id" required>
                    @foreach($paper_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('paper_type_id') ? old('paper_type_id') : $paper->paper_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper_type'))
                    <span class="text-danger">{{ $errors->first('paper_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paper.fields.paper_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="part">{{ trans('cruds.paper.fields.part') }}</label>
                <input class="form-control {{ $errors->has('part') ? 'is-invalid' : '' }}" type="text" name="part" id="part" value="{{ old('part', $paper->part) }}">
                @if($errors->has('part'))
                    <span class="text-danger">{{ $errors->first('part') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paper.fields.part_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.paper.fields.teaching_status') }}</label>
                <select class="form-control {{ $errors->has('teaching_status') ? 'is-invalid' : '' }}" name="teaching_status" id="teaching_status">
                    <option value disabled {{ old('teaching_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Paper::TEACHING_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('teaching_status', $paper->teaching_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('teaching_status'))
                    <span class="text-danger">{{ $errors->first('teaching_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paper.fields.teaching_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="credits">{{ trans('cruds.paper.fields.credits') }}</label>
                <input class="form-control {{ $errors->has('credits') ? 'is-invalid' : '' }}" type="text" name="credits" id="credits" value="{{ old('credits', $paper->credits) }}">
                @if($errors->has('credits'))
                    <span class="text-danger">{{ $errors->first('credits') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paper.fields.credits_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.paper.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $paper->status) }}" step="1">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paper.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.paper.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', $paper->remarks) }}">
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paper.fields.remarks_helper') }}</span>
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