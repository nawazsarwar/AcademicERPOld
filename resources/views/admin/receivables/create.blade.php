@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.receivable.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.receivables.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.receivable.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="narration">{{ trans('cruds.receivable.fields.narration') }}</label>
                <input class="form-control {{ $errors->has('narration') ? 'is-invalid' : '' }}" type="text" name="narration" id="narration" value="{{ old('narration', '') }}" required>
                @if($errors->has('narration'))
                    <span class="text-danger">{{ $errors->first('narration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.narration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.receivable.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.receivable.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="raised_on">{{ trans('cruds.receivable.fields.raised_on') }}</label>
                <input class="form-control datetime {{ $errors->has('raised_on') ? 'is-invalid' : '' }}" type="text" name="raised_on" id="raised_on" value="{{ old('raised_on') }}">
                @if($errors->has('raised_on'))
                    <span class="text-danger">{{ $errors->first('raised_on') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.raised_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="raised_by_id">{{ trans('cruds.receivable.fields.raised_by') }}</label>
                <select class="form-control select2 {{ $errors->has('raised_by') ? 'is-invalid' : '' }}" name="raised_by_id" id="raised_by_id">
                    @foreach($raised_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('raised_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('raised_by'))
                    <span class="text-danger">{{ $errors->first('raised_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.raised_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="settlement_status">{{ trans('cruds.receivable.fields.settlement_status') }}</label>
                <input class="form-control {{ $errors->has('settlement_status') ? 'is-invalid' : '' }}" type="text" name="settlement_status" id="settlement_status" value="{{ old('settlement_status', '') }}">
                @if($errors->has('settlement_status'))
                    <span class="text-danger">{{ $errors->first('settlement_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.settlement_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="settled_on">{{ trans('cruds.receivable.fields.settled_on') }}</label>
                <input class="form-control datetime {{ $errors->has('settled_on') ? 'is-invalid' : '' }}" type="text" name="settled_on" id="settled_on" value="{{ old('settled_on') }}">
                @if($errors->has('settled_on'))
                    <span class="text-danger">{{ $errors->first('settled_on') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.settled_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.receivable.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.receivable.fields.remarks_helper') }}</span>
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