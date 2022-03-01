@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('clients_merchant_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.clients-merchants.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.clientsMerchant.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.clientsMerchant.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ClientsMerchant">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.client') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.merchant') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.key') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.secret') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.head') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.sub_head') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientsMerchants as $key => $clientsMerchant)
                                    <tr data-entry-id="{{ $clientsMerchant->id }}">
                                        <td>
                                            {{ $clientsMerchant->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->client->uid ?? '' }}
                                        </td>
                                        <td>
                                            @if($clientsMerchant->client)
                                                {{ $clientsMerchant->client::MODE_SELECT[$clientsMerchant->client->mode] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->client->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->merchant->uid ?? '' }}
                                        </td>
                                        <td>
                                            @if($clientsMerchant->merchant)
                                                {{ $clientsMerchant->merchant::MODE_SELECT[$clientsMerchant->merchant->mode] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->merchant->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->key ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->secret ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->head ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->sub_head ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientsMerchant->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('clients_merchant_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.clients-merchants.show', $clientsMerchant->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('clients_merchant_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.clients-merchants.edit', $clientsMerchant->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('clients_merchant_delete')
                                                <form action="{{ route('frontend.clients-merchants.destroy', $clientsMerchant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('clients_merchant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.clients-merchants.massDestroy') }}",
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
  let table = $('.datatable-ClientsMerchant:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection