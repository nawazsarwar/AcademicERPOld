@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('salary_data_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.salary-datas.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-SalaryData">
                            <thead>
                                <tr>
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
                            <tbody>
                                @foreach($salaryDatas as $key => $salaryData)
                                    <tr data-entry-id="{{ $salaryData->id }}">
                                        <td>
                                            {{ $salaryData->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->ecode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->emp_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->middle_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->pay_grade ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->basic ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->pan_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->desig_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->dept_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->emp_status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->date_of_join ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->sex ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->date_of_birth ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->retire_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->pf_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->emp_grop ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->leave ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->designation_category ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->exists_cc ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->import_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salaryData->salary_month ?? '' }}
                                        </td>
                                        <td>
                                            @can('salary_data_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.salary-datas.show', $salaryData->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('salary_data_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.salary-datas.edit', $salaryData->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('salary_data_delete')
                                                <form action="{{ route('frontend.salary-datas.destroy', $salaryData->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('salary_data_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.salary-datas.massDestroy') }}",
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
  let table = $('.datatable-SalaryData:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection