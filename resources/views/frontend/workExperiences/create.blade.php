@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.workExperience.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.work-experiences.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.workExperience.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="employer">{{ trans('cruds.workExperience.fields.employer') }}</label>
                            <input class="form-control" type="text" name="employer" id="employer" value="{{ old('employer', '') }}" required>
                            @if($errors->has('employer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.employer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.workExperience.fields.employer_type') }}</label>
                            <select class="form-control" name="employer_type" id="employer_type" required>
                                <option value disabled {{ old('employer_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\WorkExperience::EMPLOYER_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('employer_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('employer_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employer_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.employer_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="designation">{{ trans('cruds.workExperience.fields.designation') }}</label>
                            <input class="form-control" type="text" name="designation" id="designation" value="{{ old('designation', '') }}" required>
                            @if($errors->has('designation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('designation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.designation_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="employed_from">{{ trans('cruds.workExperience.fields.employed_from') }}</label>
                            <input class="form-control date" type="text" name="employed_from" id="employed_from" value="{{ old('employed_from') }}" required>
                            @if($errors->has('employed_from'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employed_from') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.employed_from_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="employed_to">{{ trans('cruds.workExperience.fields.employed_to') }}</label>
                            <input class="form-control date" type="text" name="employed_to" id="employed_to" value="{{ old('employed_to') }}">
                            @if($errors->has('employed_to'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employed_to') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.employed_to_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="responsibilities">{{ trans('cruds.workExperience.fields.responsibilities') }}</label>
                            <input class="form-control" type="text" name="responsibilities" id="responsibilities" value="{{ old('responsibilities', '') }}" required>
                            @if($errors->has('responsibilities'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('responsibilities') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.responsibilities_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="reason_for_leaving">{{ trans('cruds.workExperience.fields.reason_for_leaving') }}</label>
                            <input class="form-control" type="text" name="reason_for_leaving" id="reason_for_leaving" value="{{ old('reason_for_leaving', '') }}">
                            @if($errors->has('reason_for_leaving'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reason_for_leaving') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.reason_for_leaving_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pay_band">{{ trans('cruds.workExperience.fields.pay_band') }}</label>
                            <input class="form-control" type="text" name="pay_band" id="pay_band" value="{{ old('pay_band', '') }}">
                            @if($errors->has('pay_band'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pay_band') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.pay_band_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="basic_pay">{{ trans('cruds.workExperience.fields.basic_pay') }}</label>
                            <input class="form-control" type="text" name="basic_pay" id="basic_pay" value="{{ old('basic_pay', '') }}">
                            @if($errors->has('basic_pay'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('basic_pay') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.basic_pay_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gross_pay">{{ trans('cruds.workExperience.fields.gross_pay') }}</label>
                            <input class="form-control" type="text" name="gross_pay" id="gross_pay" value="{{ old('gross_pay', '') }}">
                            @if($errors->has('gross_pay'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gross_pay') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.workExperience.fields.gross_pay_helper') }}</span>
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