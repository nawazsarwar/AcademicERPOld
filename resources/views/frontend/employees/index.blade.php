@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('employee_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.employees.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Employee">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.person') }}
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
                                        {{ trans('cruds.employee.fields.verification_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.verified_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.verified_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.verification_remark') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $key => $employee)
                                    <tr data-entry-id="{{ $employee->id }}">
                                        <td>
                                            {{ $employee->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->person->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->employee_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->service_book_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->application_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->highest_qualification ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->employment_status->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->status_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Employee::GROUP_SELECT[$employee->group] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Employee::RETIREMENT_SCHEME_SELECT[$employee->retirement_scheme] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Employee::EMPLOYMENT_TYPE_SELECT[$employee->employment_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->leave_account_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->pf_account_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->personal_file_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->remarks ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->verification_status->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->verified_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->verified_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->verification_remark ?? '' }}
                                        </td>
                                        <td>
                                            @can('employee_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.employees.show', $employee->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('employee_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.employees.edit', $employee->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('employee_delete')
                                                <form action="{{ route('frontend.employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('employee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.employees.massDestroy') }}",
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
  let table = $('.datatable-Employee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection