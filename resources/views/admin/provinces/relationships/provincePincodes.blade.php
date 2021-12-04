<div class="m-3">
    @can('pincode_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.pincodes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.pincode.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.pincode.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-provincePincodes">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.pincode.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.pincode.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.pincode.fields.locality') }}
                            </th>
                            <th>
                                {{ trans('cruds.pincode.fields.pincode') }}
                            </th>
                            <th>
                                {{ trans('cruds.pincode.fields.sub_district') }}
                            </th>
                            <th>
                                {{ trans('cruds.pincode.fields.district') }}
                            </th>
                            <th>
                                {{ trans('cruds.pincode.fields.province') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pincodes as $key => $pincode)
                            <tr data-entry-id="{{ $pincode->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $pincode->id ?? '' }}
                                </td>
                                <td>
                                    {{ $pincode->name ?? '' }}
                                </td>
                                <td>
                                    {{ $pincode->locality ?? '' }}
                                </td>
                                <td>
                                    {{ $pincode->pincode ?? '' }}
                                </td>
                                <td>
                                    {{ $pincode->sub_district ?? '' }}
                                </td>
                                <td>
                                    {{ $pincode->district ?? '' }}
                                </td>
                                <td>
                                    {{ $pincode->province->name ?? '' }}
                                </td>
                                <td>
                                    @can('pincode_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.pincodes.show', $pincode->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('pincode_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.pincodes.edit', $pincode->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('pincode_delete')
                                        <form action="{{ route('admin.pincodes.destroy', $pincode->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('pincode_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pincodes.massDestroy') }}",
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
  let table = $('.datatable-provincePincodes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection