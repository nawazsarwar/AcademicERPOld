@extends('layouts.admin')
@section('content')
@can('family_member_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.family-members.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.familyMember.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'FamilyMember', 'route' => 'admin.family-members.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.familyMember.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-FamilyMember">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.employee') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.submission_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.family_member_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.dob') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.relationship') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.gender') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.marital_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.familyMember.fields.remarks') }}
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
@can('family_member_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.family-members.massDestroy') }}",
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
    ajax: "{{ route('admin.family-members.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'employee_employee_no', name: 'employee.employee_no' },
{ data: 'submission_date', name: 'submission_date' },
{ data: 'family_member_name', name: 'family_member_name' },
{ data: 'dob', name: 'dob' },
{ data: 'relationship', name: 'relationship' },
{ data: 'gender', name: 'gender' },
{ data: 'marital_status', name: 'marital_status' },
{ data: 'status', name: 'status' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-FamilyMember').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection