@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('merchant_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.merchants.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.merchant.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.merchant.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Merchant">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.merchant.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.uid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.parameters') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.account') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($merchants as $key => $merchant)
                                    <tr data-entry-id="{{ $merchant->id }}">
                                        <td>
                                            {{ $merchant->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchant->uid ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Merchant::MODE_SELECT[$merchant->mode] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchant->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchant->parameters ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchant->account ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchant->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('merchant_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.merchants.show', $merchant->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('merchant_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.merchants.edit', $merchant->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('merchant_delete')
                                                <form action="{{ route('frontend.merchants.destroy', $merchant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('merchant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.merchants.massDestroy') }}",
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
  let table = $('.datatable-Merchant:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection