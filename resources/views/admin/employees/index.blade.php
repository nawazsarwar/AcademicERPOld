@extends('layouts.admin')
@section('content')
@can('employee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.employees.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.employee.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Employee', 'route' => 'admin.employees.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.employee.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.employee_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.service_book_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.application_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.highest_qualification') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.employment_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.status_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.group') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.retirement_scheme') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.employment_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.leave_account_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.pf_account_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.personal_file_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.remarks') }}
                    </th>
                    <th>
                        {{ trans('cruds.employee.fields.person') }}
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
@can('employee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.employees.massDestroy') }}",
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
    ajax: "{{ route('admin.employees.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'employee_no', name: 'employee_no' },
{ data: 'service_book_no', name: 'service_book_no' },
{ data: 'application_no', name: 'application_no' },
{ data: 'highest_qualification', name: 'highest_qualification' },
{ data: 'employment_status_title', name: 'employment_status.title' },
{ data: 'status_date', name: 'status_date' },
{ data: 'group', name: 'group' },
{ data: 'retirement_scheme', name: 'retirement_scheme' },
{ data: 'employment_type', name: 'employment_type' },
{ data: 'leave_account_no', name: 'leave_account_no' },
{ data: 'pf_account_no', name: 'pf_account_no' },
{ data: 'personal_file_no', name: 'personal_file_no' },
{ data: 'remarks', name: 'remarks' },
{ data: 'person_first_name', name: 'person.first_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Employee').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection