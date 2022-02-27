@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.board.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.boards.update", [$board->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.board.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $board->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.board.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.board.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $board->code) }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.board.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.board.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $board->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.board.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.board.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $board->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.board.fields.remarks_helper') }}</span>
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