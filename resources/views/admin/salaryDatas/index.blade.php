@extends('layouts.admin')
@section('content')
@can('salary_data_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.salary-datas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salaryData.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SalaryData', 'route' => 'admin.salary-datas.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salaryData.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SalaryData">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.ecode') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.emp_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.middle_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.pay_grade') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.basic') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.pan_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.desig_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.dept_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.emp_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.date_of_join') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.sex') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.date_of_birth') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.retire_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.pf_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.emp_grop') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.leave') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.designation_category') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.exists_cc') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.import_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.salaryData.fields.salary_month') }}
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
@can('salary_data_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salary-datas.massDestroy') }}",
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
    ajax: "{{ route('admin.salary-datas.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_name', name: 'user.name' },
{ data: 'ecode', name: 'ecode' },
{ data: 'emp_name', name: 'emp_name' },
{ data: 'first_name', name: 'first_name' },
{ data: 'middle_name', name: 'middle_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'pay_grade', name: 'pay_grade' },
{ data: 'basic', name: 'basic' },
{ data: 'pan_no', name: 'pan_no' },
{ data: 'desig_name', name: 'desig_name' },
{ data: 'dept_name', name: 'dept_name' },
{ data: 'emp_status', name: 'emp_status' },
{ data: 'date_of_join', name: 'date_of_join' },
{ data: 'sex', name: 'sex' },
{ data: 'date_of_birth', name: 'date_of_birth' },
{ data: 'retire_date', name: 'retire_date' },
{ data: 'pf_type', name: 'pf_type' },
{ data: 'emp_grop', name: 'emp_grop' },
{ data: 'leave', name: 'leave' },
{ data: 'designation_category', name: 'designation_category' },
{ data: 'exists_cc', name: 'exists_cc' },
{ data: 'import_date', name: 'import_date' },
{ data: 'salary_month', name: 'salary_month' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-SalaryData').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection