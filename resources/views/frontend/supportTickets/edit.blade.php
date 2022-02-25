@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.supportTicket.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.support-tickets.update", [$supportTicket->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.supportTicket.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $supportTicket->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="content">{{ trans('cruds.supportTicket.fields.content') }}</label>
                            <input class="form-control" type="text" name="content" id="content" value="{{ old('content', $supportTicket->content) }}">
                            @if($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.content_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="attachments">{{ trans('cruds.supportTicket.fields.attachments') }}</label>
                            <div class="needsclick dropzone" id="attachments-dropzone">
                            </div>
                            @if($errors->has('attachments'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attachments') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.attachments_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status_id">{{ trans('cruds.supportTicket.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $supportTicket->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="priority_id">{{ trans('cruds.supportTicket.fields.priority') }}</label>
                            <select class="form-control select2" name="priority_id" id="priority_id" required>
                                @foreach($priorities as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('priority_id') ? old('priority_id') : $supportTicket->priority->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('priority'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('priority') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.priority_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="category_id">{{ trans('cruds.supportTicket.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id" required>
                                @foreach($categories as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $supportTicket->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="auther_name">{{ trans('cruds.supportTicket.fields.auther_name') }}</label>
                            <input class="form-control" type="text" name="auther_name" id="auther_name" value="{{ old('auther_name', $supportTicket->auther_name) }}" required>
                            @if($errors->has('auther_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('auther_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.auther_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="author_email">{{ trans('cruds.supportTicket.fields.author_email') }}</label>
                            <input class="form-control" type="text" name="author_email" id="author_email" value="{{ old('author_email', $supportTicket->author_email) }}" required>
                            @if($errors->has('author_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('author_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.author_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.supportTicket.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $supportTicket->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.supportTicket.fields.user_helper') }}</span>
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
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('frontend.support-tickets.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($supportTicket) && $supportTicket->attachments)
          var files =
            {!! json_encode($supportTicket->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
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