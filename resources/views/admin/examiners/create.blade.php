@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.examiner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.examiners.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.examiner.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Examiner::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.examiner.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="institute">{{ trans('cruds.examiner.fields.institute') }}</label>
                <input class="form-control {{ $errors->has('institute') ? 'is-invalid' : '' }}" type="text" name="institute" id="institute" value="{{ old('institute', '') }}" required>
                @if($errors->has('institute'))
                    <span class="text-danger">{{ $errors->first('institute') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.institute_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department">{{ trans('cruds.examiner.fields.department') }}</label>
                <input class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" type="text" name="department" id="department" value="{{ old('department', '') }}">
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.examiner.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.examiner.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paper_id">{{ trans('cruds.examiner.fields.paper') }}</label>
                <select class="form-control select2 {{ $errors->has('paper') ? 'is-invalid' : '' }}" name="paper_id" id="paper_id" required>
                    @foreach($papers as $id => $entry)
                        <option value="{{ $id }}" {{ old('paper_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper'))
                    <span class="text-danger">{{ $errors->first('paper') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.paper_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="answerscripts_file">{{ trans('cruds.examiner.fields.answerscripts_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('answerscripts_file') ? 'is-invalid' : '' }}" id="answerscripts_file-dropzone">
                </div>
                @if($errors->has('answerscripts_file'))
                    <span class="text-danger">{{ $errors->first('answerscripts_file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.answerscripts_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otp">{{ trans('cruds.examiner.fields.otp') }}</label>
                <input class="form-control {{ $errors->has('otp') ? 'is-invalid' : '' }}" type="text" name="otp" id="otp" value="{{ old('otp', '') }}">
                @if($errors->has('otp'))
                    <span class="text-danger">{{ $errors->first('otp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.otp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otp_validity">{{ trans('cruds.examiner.fields.otp_validity') }}</label>
                <input class="form-control {{ $errors->has('otp_validity') ? 'is-invalid' : '' }}" type="text" name="otp_validity" id="otp_validity" value="{{ old('otp_validity', '') }}">
                @if($errors->has('otp_validity'))
                    <span class="text-danger">{{ $errors->first('otp_validity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.otp_validity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otp_verified">{{ trans('cruds.examiner.fields.otp_verified') }}</label>
                <input class="form-control {{ $errors->has('otp_verified') ? 'is-invalid' : '' }}" type="number" name="otp_verified" id="otp_verified" value="{{ old('otp_verified', '') }}" step="1">
                @if($errors->has('otp_verified'))
                    <span class="text-danger">{{ $errors->first('otp_verified') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.otp_verified_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.examiner.fields.start') }}</label>
                <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start') }}">
                @if($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end">{{ trans('cruds.examiner.fields.end') }}</label>
                <input class="form-control datetime {{ $errors->has('end') ? 'is-invalid' : '' }}" type="text" name="end" id="end" value="{{ old('end') }}">
                @if($errors->has('end'))
                    <span class="text-danger">{{ $errors->first('end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.examiner.fields.end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.examiner.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
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



@endsection

@section('scripts')
<script>
    Dropzone.options.answerscriptsFileDropzone = {
    url: '{{ route('admin.examiners.storeMedia') }}',
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