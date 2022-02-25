@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('hall_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.halls.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.hall.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Hall', 'route' => 'admin.halls.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.hall.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Hall">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hall.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hall.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hall.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hall.fields.gender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hall.fields.campus') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hall.fields.color') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hall.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hall.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($halls as $key => $hall)
                                    <tr data-entry-id="{{ $hall->id }}">
                                        <td>
                                            {{ $hall->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hall->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hall->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Hall::GENDER_SELECT[$hall->gender] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hall->campus->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hall->color ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hall->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hall->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('hall_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.halls.show', $hall->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('hall_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.halls.edit', $hall->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('hall_delete')
                                                <form action="{{ route('frontend.halls.destroy', $hall->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hall_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.halls.massDestroy') }}",
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
  let table = $('.datatable-Hall:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection