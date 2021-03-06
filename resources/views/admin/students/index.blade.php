@extends('layouts.admin')
@section('content')
@can('student_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.students.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Student', 'route' => 'admin.students.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.student.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Student">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.student.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.person') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.enrolment') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.enrolment_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.mobile_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.guardians_mobile_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.emergency_mobile_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.verification_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.verified_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.verified_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.verification_remark') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.detained') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.detention_reason') }}
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
@can('student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.students.massDestroy') }}",
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
    ajax: "{{ route('admin.students.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'person_first_name', name: 'person.first_name' },
{ data: 'enrolment_number', name: 'enrolment.number' },
{ data: 'enrolment_no', name: 'enrolment_no' },
{ data: 'mobile_no', name: 'mobile_no' },
{ data: 'guardians_mobile_no', name: 'guardians_mobile_no' },
{ data: 'emergency_mobile_no', name: 'emergency_mobile_no' },
{ data: 'verification_status_name', name: 'verification_status.name' },
{ data: 'verified_by_name', name: 'verified_by.name' },
{ data: 'verified_at', name: 'verified_at' },
{ data: 'verification_remark', name: 'verification_remark' },
{ data: 'detained', name: 'detained' },
{ data: 'detention_reason', name: 'detention_reason' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Student').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection