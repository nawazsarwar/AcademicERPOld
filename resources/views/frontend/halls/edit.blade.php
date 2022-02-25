@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.hall.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.halls.update", [$hall->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.hall.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $hall->code) }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hall.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.hall.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $hall->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hall.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.hall.fields.gender') }}</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Hall::GENDER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gender', $hall->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hall.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="campus_id">{{ trans('cruds.hall.fields.campus') }}</label>
                            <select class="form-control select2" name="campus_id" id="campus_id" required>
                                @foreach($campuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('campus_id') ? old('campus_id') : $hall->campus->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('campus'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('campus') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hall.fields.campus_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="color">{{ trans('cruds.hall.fields.color') }}</label>
                            <input class="form-control" type="text" name="color" id="color" value="{{ old('color', $hall->color) }}" required>
                            @if($errors->has('color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('color') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hall.fields.color_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.hall.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $hall->status) }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hall.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.hall.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $hall->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hall.fields.remarks_helper') }}</span>
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