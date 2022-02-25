@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('centre_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.centres.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.centre.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Centre', 'route' => 'admin.centres.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.centre.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Centre">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.centre.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.centre.fields.faculty') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.centre.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.centre.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.centre.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.centre.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($centres as $key => $centre)
                                    <tr data-entry-id="{{ $centre->id }}">
                                        <td>
                                            {{ $centre->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $centre->faculty->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $centre->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $centre->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $centre->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $centre->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('centre_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.centres.show', $centre->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('centre_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.centres.edit', $centre->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('centre_delete')
                                                <form action="{{ route('frontend.centres.destroy', $centre->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('centre_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.centres.massDestroy') }}",
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
  let table = $('.datatable-Centre:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection