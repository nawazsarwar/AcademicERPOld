<div class="m-3">
    @can('postal_code_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.postal-codes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.postalCode.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.postalCode.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-provincePostalCodes">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.postalCode.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.postalCode.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.postalCode.fields.locality') }}
                            </th>
                            <th>
                                {{ trans('cruds.postalCode.fields.code') }}
                            </th>
                            <th>
                                {{ trans('cruds.postalCode.fields.sub_district') }}
                            </th>
                            <th>
                                {{ trans('cruds.postalCode.fields.district') }}
                            </th>
                            <th>
                                {{ trans('cruds.postalCode.fields.province') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postalCodes as $key => $postalCode)
                            <tr data-entry-id="{{ $postalCode->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $postalCode->id ?? '' }}
                                </td>
                                <td>
                                    {{ $postalCode->name ?? '' }}
                                </td>
                                <td>
                                    {{ $postalCode->locality ?? '' }}
                                </td>
                                <td>
                                    {{ $postalCode->code ?? '' }}
                                </td>
                                <td>
                                    {{ $postalCode->sub_district ?? '' }}
                                </td>
                                <td>
                                    {{ $postalCode->district ?? '' }}
                                </td>
                                <td>
                                    {{ $postalCode->province->name ?? '' }}
                                </td>
                                <td>
                                    @can('postal_code_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.postal-codes.show', $postalCode->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('postal_code_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.postal-codes.edit', $postalCode->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('postal_code_delete')
                                        <form action="{{ route('admin.postal-codes.destroy', $postalCode->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('postal_code_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.postal-codes.massDestroy') }}",
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
  let table = $('.datatable-provincePostalCodes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection