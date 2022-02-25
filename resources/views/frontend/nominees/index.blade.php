@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('nominee_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.nominees.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.nominee.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Nominee', 'route' => 'admin.nominees.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.nominee.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Nominee">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nominee.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.relationship') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.age') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.witness_name_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.designation_witness_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.department_witness_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.witness_name_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.designation_witness_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.department_witness_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.employee') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.nominee.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nominees as $key => $nominee)
                                    <tr data-entry-id="{{ $nominee->id }}">
                                        <td>
                                            {{ $nominee->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->relationship ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->age ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->witness_name_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->designation_witness_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->department_witness_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->witness_name_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->designation_witness_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->department_witness_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->employee->employee_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $nominee->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('nominee_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.nominees.show', $nominee->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('nominee_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.nominees.edit', $nominee->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('nominee_delete')
                                                <form action="{{ route('frontend.nominees.destroy', $nominee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('nominee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.nominees.massDestroy') }}",
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
  let table = $('.datatable-Nominee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection