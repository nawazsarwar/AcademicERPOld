@extends('layouts.admin')
@section('content')
@can('admission_charge_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.admission-charges.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.admissionCharge.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'AdmissionCharge', 'route' => 'admin.admission-charges.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.admissionCharge.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AdmissionCharge">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.course') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.boys_nr_external') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.boys_nr_internal') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.boys_resident_external') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.boys_resident_internal') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.girls_nr_external') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.girls_nr_internal') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.girls_resident_external') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.girls_resident_internal') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.admissionCharge.fields.remarks') }}
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
@can('admission_charge_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.admission-charges.massDestroy') }}",
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
    ajax: "{{ route('admin.admission-charges.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'course_name', name: 'course.name' },
{ data: 'course.code', name: 'course.code' },
{ data: 'boys_nr_external', name: 'boys_nr_external' },
{ data: 'boys_nr_internal', name: 'boys_nr_internal' },
{ data: 'boys_resident_external', name: 'boys_resident_external' },
{ data: 'boys_resident_internal', name: 'boys_resident_internal' },
{ data: 'girls_nr_external', name: 'girls_nr_external' },
{ data: 'girls_nr_internal', name: 'girls_nr_internal' },
{ data: 'girls_resident_external', name: 'girls_resident_external' },
{ data: 'girls_resident_internal', name: 'girls_resident_internal' },
{ data: 'status', name: 'status' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AdmissionCharge').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection