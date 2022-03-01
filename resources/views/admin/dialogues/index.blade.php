@extends('layouts.admin')
@section('content')
@can('dialogue_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.dialogues.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dialogue.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dialogue.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Dialogue">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dialogue.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dialogue.fields.merchant') }}
                        </th>
                        <th>
                            {{ trans('cruds.merchant.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.dialogue.fields.transaction') }}
                        </th>
                        <th>
                            {{ trans('cruds.dialogue.fields.pingback_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.dialogue.fields.request_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.dialogue.fields.raw_response') }}
                        </th>
                        <th>
                            {{ trans('cruds.dialogue.fields.response') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dialogues as $key => $dialogue)
                        <tr data-entry-id="{{ $dialogue->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dialogue->id ?? '' }}
                            </td>
                            <td>
                                {{ $dialogue->merchant->uid ?? '' }}
                            </td>
                            <td>
                                {{ $dialogue->merchant->name ?? '' }}
                            </td>
                            <td>
                                {{ $dialogue->transaction->amount ?? '' }}
                            </td>
                            <td>
                                {{ $dialogue->pingback_url ?? '' }}
                            </td>
                            <td>
                                {{ $dialogue->request_type ?? '' }}
                            </td>
                            <td>
                                {{ $dialogue->raw_response ?? '' }}
                            </td>
                            <td>
                                {{ $dialogue->response ?? '' }}
                            </td>
                            <td>
                                @can('dialogue_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dialogues.show', $dialogue->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('dialogue_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dialogues.edit', $dialogue->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('dialogue_delete')
                                    <form action="{{ route('admin.dialogues.destroy', $dialogue->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('dialogue_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dialogues.massDestroy') }}",
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
  let table = $('.datatable-Dialogue:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection