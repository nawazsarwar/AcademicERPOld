@extends('layouts.admin')
@section('content')
@can('qualification_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.qualifications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.qualification.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Qualification', 'route' => 'admin.qualifications.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.qualification.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Qualification">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.qualification_level') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.year') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.roll_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.board') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.result') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.percentage') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.cdn_url') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.qualification.fields.remarks') }}
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
@can('qualification_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.qualifications.massDestroy') }}",
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
    ajax: "{{ route('admin.qualifications.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_name', name: 'user.name' },
{ data: 'qualification_level_name', name: 'qualification_level.name' },
{ data: 'name', name: 'name' },
{ data: 'year', name: 'year' },
{ data: 'roll_no', name: 'roll_no' },
{ data: 'board_name', name: 'board.name' },
{ data: 'result', name: 'result' },
{ data: 'percentage', name: 'percentage' },
{ data: 'cdn_url', name: 'cdn_url' },
{ data: 'status', name: 'status' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Qualification').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection