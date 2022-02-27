@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contentPage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.content-pages.update", [$contentPage->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="website_id">{{ trans('cruds.contentPage.fields.website') }}</label>
                <select class="form-control select2 {{ $errors->has('website') ? 'is-invalid' : '' }}" name="website_id" id="website_id" required>
                    @foreach($websites as $id => $entry)
                        <option value="{{ $id }}" {{ (old('website_id') ? old('website_id') : $contentPage->website->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('website'))
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.contentPage.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $contentPage->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.contentPage.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $contentPage->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.contentPage.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $contentPage->description) }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.contentPage.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $contentPage->slug) }}" required>
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.contentPage.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ContentPage::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $contentPage->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.contentPage.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', $contentPage->content) !!}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="excerpt">{{ trans('cruds.contentPage.fields.excerpt') }}</label>
                <textarea class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" name="excerpt" id="excerpt">{{ old('excerpt', $contentPage->excerpt) }}</textarea>
                @if($errors->has('excerpt'))
                    <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.excerpt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="featured_image">{{ trans('cruds.contentPage.fields.featured_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                </div>
                @if($errors->has('featured_image'))
                    <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.featured_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.contentPage.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $contentPage->link) }}">
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.contentPage.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categories">{{ trans('cruds.contentPage.fields.category') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $contentPage->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.contentPage.fields.tag') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $contentPage->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.tag_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.contentPage.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $contentPage->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="approved">{{ trans('cruds.contentPage.fields.approved') }}</label>
                <input class="form-control {{ $errors->has('approved') ? 'is-invalid' : '' }}" type="number" name="approved" id="approved" value="{{ old('approved', $contentPage->approved) }}" step="1" required>
                @if($errors->has('approved'))
                    <span class="text-danger">{{ $errors->first('approved') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.approved_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved_by_id">{{ trans('cruds.contentPage.fields.approved_by') }}</label>
                <select class="form-control select2 {{ $errors->has('approved_by') ? 'is-invalid' : '' }}" name="approved_by_id" id="approved_by_id">
                    @foreach($approved_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('approved_by_id') ? old('approved_by_id') : $contentPage->approved_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('approved_by'))
                    <span class="text-danger">{{ $errors->first('approved_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.approved_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deleted_by_id">{{ trans('cruds.contentPage.fields.deleted_by') }}</label>
                <select class="form-control select2 {{ $errors->has('deleted_by') ? 'is-invalid' : '' }}" name="deleted_by_id" id="deleted_by_id">
                    @foreach($deleted_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('deleted_by_id') ? old('deleted_by_id') : $contentPage->deleted_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('deleted_by'))
                    <span class="text-danger">{{ $errors->first('deleted_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.deleted_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="publish_at">{{ trans('cruds.contentPage.fields.publish_at') }}</label>
                <input class="form-control datetime {{ $errors->has('publish_at') ? 'is-invalid' : '' }}" type="text" name="publish_at" id="publish_at" value="{{ old('publish_at', $contentPage->publish_at) }}">
                @if($errors->has('publish_at'))
                    <span class="text-danger">{{ $errors->first('publish_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentPage.fields.publish_at_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.content-pages.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $contentPage->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.content-pages.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="featured_image"]').remove()
      $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="featured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contentPage) && $contentPage->featured_image)
      var file = {!! json_encode($contentPage->featured_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
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
    Dropzone.options.fileDropzone = {
    url: '{{ route('admin.content-pages.storeMedia') }}',
    maxFilesize: 100, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100
    },
    success: function (file, response) {
      $('form').find('input[name="file"]').remove()
      $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contentPage) && $contentPage->file)
      var file = {!! json_encode($contentPage->file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
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