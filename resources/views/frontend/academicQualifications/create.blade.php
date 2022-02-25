@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.academicQualification.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.academic-qualifications.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.academicQualification.fields.user') }}</label>
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
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="qualification_level_id">{{ trans('cruds.academicQualification.fields.qualification_level') }}</label>
                            <select class="form-control select2" name="qualification_level_id" id="qualification_level_id" required>
                                @foreach($qualification_levels as $id => $entry)
                                    <option value="{{ $id }}" {{ old('qualification_level_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('qualification_level'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qualification_level') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.qualification_level_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.academicQualification.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="year">{{ trans('cruds.academicQualification.fields.year') }}</label>
                            <input class="form-control" type="number" name="year" id="year" value="{{ old('year', '') }}" step="1" required>
                            @if($errors->has('year'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('year') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.year_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="roll_no">{{ trans('cruds.academicQualification.fields.roll_no') }}</label>
                            <input class="form-control" type="text" name="roll_no" id="roll_no" value="{{ old('roll_no', '') }}">
                            @if($errors->has('roll_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roll_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.roll_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="board_id">{{ trans('cruds.academicQualification.fields.board') }}</label>
                            <select class="form-control select2" name="board_id" id="board_id" required>
                                @foreach($boards as $id => $entry)
                                    <option value="{{ $id }}" {{ old('board_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('board'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('board') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.board_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.academicQualification.fields.result') }}</label>
                            <select class="form-control" name="result" id="result" required>
                                <option value disabled {{ old('result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\AcademicQualification::RESULT_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('result', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.result_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.academicQualification.fields.grading_type') }}</label>
                            <select class="form-control" name="grading_type" id="grading_type" required>
                                <option value disabled {{ old('grading_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\AcademicQualification::GRADING_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('grading_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('grading_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grading_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.grading_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="grade">{{ trans('cruds.academicQualification.fields.grade') }}</label>
                            <input class="form-control" type="text" name="grade" id="grade" value="{{ old('grade', '') }}">
                            @if($errors->has('grade'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('grade') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.grade_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="certificate">{{ trans('cruds.academicQualification.fields.certificate') }}</label>
                            <div class="needsclick dropzone" id="certificate-dropzone">
                            </div>
                            @if($errors->has('certificate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('certificate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.certificate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cdn_url">{{ trans('cruds.academicQualification.fields.cdn_url') }}</label>
                            <input class="form-control" type="text" name="cdn_url" id="cdn_url" value="{{ old('cdn_url', '') }}">
                            @if($errors->has('cdn_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cdn_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.cdn_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.academicQualification.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.academicQualification.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicQualification.fields.remarks_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.certificateDropzone = {
    url: '{{ route('frontend.academic-qualifications.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="certificate"]').remove()
      $('form').append('<input type="hidden" name="certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($academicQualification) && $academicQualification->certificate)
      var file = {!! json_encode($academicQualification->certificate) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="certificate" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection