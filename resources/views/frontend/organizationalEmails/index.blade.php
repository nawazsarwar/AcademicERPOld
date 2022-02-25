@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('organizational_email_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.organizational-emails.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-OrganizationalEmail">
                            <thead>
                                <tr>
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
                            <tbody>
                                @foreach($organizationalEmails as $key => $organizationalEmail)
                                    <tr data-entry-id="{{ $organizationalEmail->id }}">
                                        <td>
                                            {{ $organizationalEmail->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\OrganizationalEmail::TYPE_SELECT[$organizationalEmail->type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->alias ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->first_password ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->avatar_url ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->recovery_email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->recovery_phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->gender ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->office_365 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->office_365_uid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->office_365_object_uid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->office_365_deployed_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->gsuite ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->gsuite_uid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->gsuite_deployed_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $organizationalEmail->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('organizational_email_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.organizational-emails.show', $organizationalEmail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('organizational_email_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.organizational-emails.edit', $organizationalEmail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('organizational_email_delete')
                                                <form action="{{ route('frontend.organizational-emails.destroy', $organizationalEmail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('organizational_email_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.organizational-emails.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-OrganizationalEmail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection