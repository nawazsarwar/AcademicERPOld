@extends('layouts.admin')
@section('content')
@can('continuation_charge_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.continuation-charges.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.continuationCharge.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ContinuationCharge', 'route' => 'admin.continuation-charges.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.continuationCharge.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ContinuationCharge">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.course') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.nr_total') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.nr_first_installment') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.nr_second_installment') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.resident_total') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.resident_first_installment') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.resident_second_installment') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.continuationCharge.fields.remarks') }}
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
@can('continuation_charge_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.continuation-charges.massDestroy') }}",
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
    ajax: "{{ route('admin.continuation-charges.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'course_title', name: 'course.title' },
{ data: 'course.code', name: 'course.code' },
{ data: 'code', name: 'code' },
{ data: 'nr_total', name: 'nr_total' },
{ data: 'nr_first_installment', name: 'nr_first_installment' },
{ data: 'nr_second_installment', name: 'nr_second_installment' },
{ data: 'resident_total', name: 'resident_total' },
{ data: 'resident_first_installment', name: 'resident_first_installment' },
{ data: 'resident_second_installment', name: 'resident_second_installment' },
{ data: 'status', name: 'status' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-ContinuationCharge').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection