@extends('layouts.admin')
@section('content')
@can('computer_centre_data_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.computer-centre-datas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.computerCentreData.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.computerCentreData.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ComputerCentreData">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.uri') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.parser') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.data') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.parent') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.crawled') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.last_crawled_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.computerCentreData.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($computerCentreDatas as $key => $computerCentreData)
                        <tr data-entry-id="{{ $computerCentreData->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $computerCentreData->id ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->uri ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->slug ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->type ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->parser ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->data ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->parent ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->crawled ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->last_crawled_at ?? '' }}
                            </td>
                            <td>
                                {{ $computerCentreData->remarks ?? '' }}
                            </td>
                            <td>
                                @can('computer_centre_data_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.computer-centre-datas.show', $computerCentreData->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('computer_centre_data_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.computer-centre-datas.edit', $computerCentreData->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('computer_centre_data_delete')
                                    <form action="{{ route('admin.computer-centre-datas.destroy', $computerCentreData->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('computer_centre_data_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.computer-centre-datas.massDestroy') }}",
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
  let table = $('.datatable-ComputerCentreData:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection