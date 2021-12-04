@extends('layouts.admin')
@section('content')
@can('nominee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.nominees.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.nominee.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Nominee', 'route' => 'admin.nominees.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.nominee.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Nominee">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.relationship_employee') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.age') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.witness_name_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.designation_witness_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.department_witness_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.witness_name_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.designation_witness_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.department_witness_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.employee') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.nominee.fields.remarks') }}
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
@can('nominee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.nominees.massDestroy') }}",
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
    ajax: "{{ route('admin.nominees.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'address', name: 'address' },
{ data: 'relationship_employee', name: 'relationship_employee' },
{ data: 'age', name: 'age' },
{ data: 'witness_name_1', name: 'witness_name_1' },
{ data: 'designation_witness_1', name: 'designation_witness_1' },
{ data: 'department_witness_1', name: 'department_witness_1' },
{ data: 'witness_name_2', name: 'witness_name_2' },
{ data: 'designation_witness_2', name: 'designation_witness_2' },
{ data: 'department_witness_2', name: 'department_witness_2' },
{ data: 'employee_employee_no', name: 'employee.employee_no' },
{ data: 'status', name: 'status' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Nominee').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection