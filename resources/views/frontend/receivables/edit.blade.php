@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.receivable.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.receivables.update", [$receivable->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.receivable.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $receivable->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.receivable.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="narration">{{ trans('cruds.receivable.fields.narration') }}</label>
                            <input class="form-control" type="text" name="narration" id="narration" value="{{ old('narration', $receivable->narration) }}" required>
                            @if($errors->has('narration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('narration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.receivable.fields.narration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.receivable.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $receivable->description) }}">
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.receivable.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.receivable.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', $receivable->amount) }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.receivable.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="raised_on">{{ trans('cruds.receivable.fields.raised_on') }}</label>
                            <input class="form-control datetime" type="text" name="raised_on" id="raised_on" value="{{ old('raised_on', $receivable->raised_on) }}">
                            @if($errors->has('raised_on'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('raised_on') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.receivable.fields.raised_on_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="raised_by_id">{{ trans('cruds.receivable.fields.raised_by') }}</label>
                            <select class="form-control select2" name="raised_by_id" id="raised_by_id">
                                @foreach($raised_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('raised_by_id') ? old('raised_by_id') : $receivable->raised_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('raised_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('raised_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.receivable.fields.raised_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="settlement_status">{{ trans('cruds.receivable.fields.settlement_status') }}</label>
                            <input class="form-control" type="text" name="settlement_status" id="settlement_status" value="{{ old('settlement_status', $receivable->settlement_status) }}">
                            @if($errors->has('settlement_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('settlement_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.receivable.fields.settlement_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="settled_on">{{ trans('cruds.receivable.fields.settled_on') }}</label>
                            <input class="form-control datetime" type="text" name="settled_on" id="settled_on" value="{{ old('settled_on', $receivable->settled_on) }}">
                            @if($errors->has('settled_on'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('settled_on') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.receivable.fields.settled_on_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.receivable.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $receivable->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection