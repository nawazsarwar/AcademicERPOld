@extends('layouts.admin')
@section('content')
@can('receivable_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.receivables.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.receivable.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Receivable', 'route' => 'admin.receivables.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.receivable.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Receivable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.narration') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.raised_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.raised_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.settlement_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.settled_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.receivable.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receivables as $key => $receivable)
                        <tr data-entry-id="{{ $receivable->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $receivable->id ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->narration ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->description ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->amount ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->raised_on ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->raised_by->name ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->settlement_status ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->settled_on ?? '' }}
                            </td>
                            <td>
                                {{ $receivable->remarks ?? '' }}
                            </td>
                            <td>
                                @can('receivable_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.receivables.show', $receivable->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('receivable_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.receivables.edit', $receivable->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('receivable_delete')
                                    <form action="{{ route('admin.receivables.destroy', $receivable->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('receivable_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.receivables.massDestroy') }}",
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
  let table = $('.datatable-Receivable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection