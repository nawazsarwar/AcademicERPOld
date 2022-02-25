@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.answerScript.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.answer-scripts.update", [$answerScript->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.answerScript.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $answerScript->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paper_id">{{ trans('cruds.answerScript.fields.paper') }}</label>
                <select class="form-control select2 {{ $errors->has('paper') ? 'is-invalid' : '' }}" name="paper_id" id="paper_id" required>
                    @foreach($papers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('paper_id') ? old('paper_id') : $answerScript->paper->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('paper'))
                    <span class="text-danger">{{ $errors->first('paper') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.paper_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="page_no">{{ trans('cruds.answerScript.fields.page_no') }}</label>
                <input class="form-control {{ $errors->has('page_no') ? 'is-invalid' : '' }}" type="number" name="page_no" id="page_no" value="{{ old('page_no', $answerScript->page_no) }}" step="1" required>
                @if($errors->has('page_no'))
                    <span class="text-danger">{{ $errors->first('page_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.page_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo_path">{{ trans('cruds.answerScript.fields.photo_path') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo_path') ? 'is-invalid' : '' }}" id="photo_path-dropzone">
                </div>
                @if($errors->has('photo_path'))
                    <span class="text-danger">{{ $errors->first('photo_path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.photo_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file_name">{{ trans('cruds.answerScript.fields.file_name') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file_name') ? 'is-invalid' : '' }}" id="file_name-dropzone">
                </div>
                @if($errors->has('file_name'))
                    <span class="text-danger">{{ $errors->first('file_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.file_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="file_path">{{ trans('cruds.answerScript.fields.file_path') }}</label>
                <input class="form-control {{ $errors->has('file_path') ? 'is-invalid' : '' }}" type="text" name="file_path" id="file_path" value="{{ old('file_path', $answerScript->file_path) }}" required>
                @if($errors->has('file_path'))
                    <span class="text-danger">{{ $errors->first('file_path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.file_path_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="extension">{{ trans('cruds.answerScript.fields.extension') }}</label>
                <input class="form-control {{ $errors->has('extension') ? 'is-invalid' : '' }}" type="text" name="extension" id="extension" value="{{ old('extension', $answerScript->extension) }}" required>
                @if($errors->has('extension'))
                    <span class="text-danger">{{ $errors->first('extension') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.extension_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file_url">{{ trans('cruds.answerScript.fields.file_url') }}</label>
                <input class="form-control {{ $errors->has('file_url') ? 'is-invalid' : '' }}" type="text" name="file_url" id="file_url" value="{{ old('file_url', $answerScript->file_url) }}">
                @if($errors->has('file_url'))
                    <span class="text-danger">{{ $errors->first('file_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.file_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cdn_url">{{ trans('cruds.answerScript.fields.cdn_url') }}</label>
                <input class="form-control {{ $errors->has('cdn_url') ? 'is-invalid' : '' }}" type="text" name="cdn_url" id="cdn_url" value="{{ old('cdn_url', $answerScript->cdn_url) }}">
                @if($errors->has('cdn_url'))
                    <span class="text-danger">{{ $errors->first('cdn_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.cdn_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.answerScript.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $answerScript->status) }}" step="1">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.answerScript.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $answerScript->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.answerScript.fields.remarks_helper') }}</span>
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
    Dropzone.options.photoPathDropzone = {
    url: '{{ route('admin.answer-scripts.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo_path"]').remove()
      $('form').append('<input type="hidden" name="photo_path" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo_path"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($answerScript) && $answerScript->photo_path)
      var file = {!! json_encode($answerScript->photo_path) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo_path" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.fileNameDropzone = {
    url: '{{ route('admin.answer-scripts.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="file_name"]').remove()
      $('form').append('<input type="hidden" name="file_name" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file_name"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($answerScript) && $answerScript->file_name)
      var file = {!! json_encode($answerScript->file_name) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file_name" value="' + file.file_name + '">')
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