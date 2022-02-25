@extends('layouts.admin')
@section('content')
@can('answer_script_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.answer-scripts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.answerScript.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.answerScript.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AnswerScript">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.paper') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.page_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.photo_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.file_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.file_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.extension') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.file_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.cdn_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.answerScript.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($answerScripts as $key => $answerScript)
                        <tr data-entry-id="{{ $answerScript->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $answerScript->id ?? '' }}
                            </td>
                            <td>
                                {{ $answerScript->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $answerScript->paper->code ?? '' }}
                            </td>
                            <td>
                                {{ $answerScript->page_no ?? '' }}
                            </td>
                            <td>
                                @if($answerScript->photo_path)
                                    <a href="{{ $answerScript->photo_path->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $answerScript->photo_path->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($answerScript->file_name)
                                    <a href="{{ $answerScript->file_name->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $answerScript->file_path ?? '' }}
                            </td>
                            <td>
                                {{ $answerScript->extension ?? '' }}
                            </td>
                            <td>
                                {{ $answerScript->file_url ?? '' }}
                            </td>
                            <td>
                                {{ $answerScript->cdn_url ?? '' }}
                            </td>
                            <td>
                                {{ $answerScript->status ?? '' }}
                            </td>
                            <td>
                                {{ $answerScript->remarks ?? '' }}
                            </td>
                            <td>
                                @can('answer_script_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.answer-scripts.show', $answerScript->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('answer_script_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.answer-scripts.edit', $answerScript->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('answer_script_delete')
                                    <form action="{{ route('admin.answer-scripts.destroy', $answerScript->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('answer_script_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.answer-scripts.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-AnswerScript:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection