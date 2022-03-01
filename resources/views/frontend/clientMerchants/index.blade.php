@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('client_merchant_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.client-merchants.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.clientMerchant.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.clientMerchant.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ClientMerchant">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.client') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.merchant') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchant.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.key') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.secret') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.head') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.sub_head') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientMerchants as $key => $clientMerchant)
                                    <tr data-entry-id="{{ $clientMerchant->id }}">
                                        <td>
                                            {{ $clientMerchant->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientMerchant->client->uid ?? '' }}
                                        </td>
                                        <td>
                                            @if($clientMerchant->client)
                                                {{ $clientMerchant->client::MODE_SELECT[$clientMerchant->client->mode] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $clientMerchant->client->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientMerchant->merchant->uid ?? '' }}
                                        </td>
                                        <td>
                                            @if($clientMerchant->merchant)
                                                {{ $clientMerchant->merchant::MODE_SELECT[$clientMerchant->merchant->mode] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $clientMerchant->merchant->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientMerchant->key ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientMerchant->secret ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientMerchant->head ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientMerchant->sub_head ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clientMerchant->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('client_merchant_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.client-merchants.show', $clientMerchant->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('client_merchant_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.client-merchants.edit', $clientMerchant->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('client_merchant_delete')
                                                <form action="{{ route('frontend.client-merchants.destroy', $clientMerchant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('client_merchant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.client-merchants.massDestroy') }}",
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
  let table = $('.datatable-ClientMerchant:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection