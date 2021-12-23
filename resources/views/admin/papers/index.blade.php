@extends('layouts.admin')
@section('content')
@can('paper_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.papers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.paper.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Paper', 'route' => 'admin.papers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.paper.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Paper">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.paper_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.paperType.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.fraction') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.teaching_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.credits') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.remarks') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.administrable') }}
                    </th>
                    <th>
                        {{ trans('cruds.paper.fields.administrable_type') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('paper_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.papers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.papers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'code', name: 'code' },
{ data: 'title', name: 'title' },
{ data: 'paper_type_name', name: 'paper_type.name' },
{ data: 'paper_type.name', name: 'paper_type.name' },
{ data: 'fraction', name: 'fraction' },
{ data: 'teaching_status', name: 'teaching_status' },
{ data: 'credits', name: 'credits' },
{ data: 'status', name: 'status' },
{ data: 'remarks', name: 'remarks' },
{ data: 'administrable_name', name: 'administrable.name' },
{ data: 'administrable_type', name: 'administrable_type' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Paper').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection