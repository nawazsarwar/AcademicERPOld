@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.examiner.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.examiners.update", [$examiner->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.examiner.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Examiner::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $examiner->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.examiner.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $examiner->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="institute">{{ trans('cruds.examiner.fields.institute') }}</label>
                            <input class="form-control" type="text" name="institute" id="institute" value="{{ old('institute', $examiner->institute) }}" required>
                            @if($errors->has('institute'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('institute') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.institute_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="department">{{ trans('cruds.examiner.fields.department') }}</label>
                            <input class="form-control" type="text" name="department" id="department" value="{{ old('department', $examiner->department) }}">
                            @if($errors->has('department'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.department_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">{{ trans('cruds.examiner.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', $examiner->mobile) }}">
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.examiner.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $examiner->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="paper_id">{{ trans('cruds.examiner.fields.paper') }}</label>
                            <select class="form-control select2" name="paper_id" id="paper_id" required>
                                @foreach($papers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('paper_id') ? old('paper_id') : $examiner->paper->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paper') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.paper_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="answerscripts_file">{{ trans('cruds.examiner.fields.answerscripts_file') }}</label>
                            <div class="needsclick dropzone" id="answerscripts_file-dropzone">
                            </div>
                            @if($errors->has('answerscripts_file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('answerscripts_file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.answerscripts_file_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="otp">{{ trans('cruds.examiner.fields.otp') }}</label>
                            <input class="form-control" type="text" name="otp" id="otp" value="{{ old('otp', $examiner->otp) }}">
                            @if($errors->has('otp'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('otp') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.otp_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="otp_validity">{{ trans('cruds.examiner.fields.otp_validity') }}</label>
                            <input class="form-control" type="text" name="otp_validity" id="otp_validity" value="{{ old('otp_validity', $examiner->otp_validity) }}">
                            @if($errors->has('otp_validity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('otp_validity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.otp_validity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="otp_verified">{{ trans('cruds.examiner.fields.otp_verified') }}</label>
                            <input class="form-control" type="number" name="otp_verified" id="otp_verified" value="{{ old('otp_verified', $examiner->otp_verified) }}" step="1">
                            @if($errors->has('otp_verified'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('otp_verified') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.otp_verified_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="start">{{ trans('cruds.examiner.fields.start') }}</label>
                            <input class="form-control datetime" type="text" name="start" id="start" value="{{ old('start', $examiner->start) }}">
                            @if($errors->has('start'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('start') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.start_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="end">{{ trans('cruds.examiner.fields.end') }}</label>
                            <input class="form-control datetime" type="text" name="end" id="end" value="{{ old('end', $examiner->end) }}">
                            @if($errors->has('end'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.end_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="remarks">{{ trans('cruds.examiner.fields.remarks') }}</label>
                            <textarea class="form-control" name="remarks" id="remarks">{{ old('remarks', $examiner->remarks) }}</textarea>
                            @if($errors->has('remarks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remarks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.examiner.fields.remarks_helper') }}</span>
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
    Dropzone.options.answerscriptsFileDropzone = {
    url: '{{ route('frontend.examiners.storeMedia') }}',
    maxFilesize: 200, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200
    },
    success: function (file, response) {
      $('form').find('input[name="answerscripts_file"]').remove()
      $('form').append('<input type="hidden" name="answerscripts_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="answerscripts_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($examiner) && $examiner->answerscripts_file)
      var file = {!! json_encode($examiner->answerscripts_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="answerscripts_file" value="' + file.file_name + '">')
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