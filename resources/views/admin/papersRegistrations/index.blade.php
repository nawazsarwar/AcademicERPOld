@extends('layouts.admin')
@section('content')
@can('papers_registration_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.papers-registrations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.papersRegistration.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PapersRegistration', 'route' => 'admin.papers-registrations.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.papersRegistration.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PapersRegistration">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.paper') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.registration') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.student') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.registration_mode') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.profile') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.faculty') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.department') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.department_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.paper_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.paper_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.fraction') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.credits') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.papersRegistration.fields.remarks') }}
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
@can('papers_registration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.papers-registrations.massDestroy') }}",
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
    ajax: "{{ route('admin.papers-registrations.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'paper_code', name: 'paper.code' },
{ data: 'registration_type', name: 'registration.type' },
{ data: 'student_guardian_mobile_no', name: 'student.guardian_mobile_no' },
{ data: 'registration_mode', name: 'registration_mode' },
{ data: 'profile', name: 'profile' },
{ data: 'faculty', name: 'faculty' },
{ data: 'department', name: 'department' },
{ data: 'department_code', name: 'department_code' },
{ data: 'paper_code', name: 'paper_code' },
{ data: 'paper_title', name: 'paper_title' },
{ data: 'fraction', name: 'fraction' },
{ data: 'credits', name: 'credits' },
{ data: 'status', name: 'status' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-PapersRegistration').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection