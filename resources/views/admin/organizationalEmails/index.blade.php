@extends('layouts.admin')
@section('content')
@can('organizational_email_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.organizational-emails.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.organizationalEmail.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'OrganizationalEmail', 'route' => 'admin.organizational-emails.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.organizationalEmail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-OrganizationalEmail">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.alias') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.first_password') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.avatar_url') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.recovery_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.recovery_phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.gender') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.office_365') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.office_365_uid') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.office_365_object_uid') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.office_365_deployed_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.gsuite') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.gsuite_uid') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.gsuite_deployed_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizationalEmail.fields.remarks') }}
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
@can('organizational_email_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.organizational-emails.massDestroy') }}",
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
    ajax: "{{ route('admin.organizational-emails.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_name', name: 'user.name' },
{ data: 'email', name: 'email' },
{ data: 'type', name: 'type' },
{ data: 'alias', name: 'alias' },
{ data: 'first_password', name: 'first_password' },
{ data: 'avatar_url', name: 'avatar_url' },
{ data: 'recovery_email', name: 'recovery_email' },
{ data: 'recovery_phone', name: 'recovery_phone' },
{ data: 'gender', name: 'gender' },
{ data: 'office_365', name: 'office_365' },
{ data: 'office_365_uid', name: 'office_365_uid' },
{ data: 'office_365_object_uid', name: 'office_365_object_uid' },
{ data: 'office_365_deployed_at', name: 'office_365_deployed_at' },
{ data: 'gsuite', name: 'gsuite' },
{ data: 'gsuite_uid', name: 'gsuite_uid' },
{ data: 'gsuite_deployed_at', name: 'gsuite_deployed_at' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-OrganizationalEmail').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection