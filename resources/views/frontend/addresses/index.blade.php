@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('address_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.addresses.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.address.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Address', 'route' => 'admin.addresses.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.address.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Address">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.person') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.country') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.mobile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.postal_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.details') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.street') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.landmark') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.locality') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.province') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.address.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($addresses as $key => $address)
                                    <tr data-entry-id="{{ $address->id }}">
                                        <td>
                                            {{ $address->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->person->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Address::TYPE_SELECT[$address->type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->country->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->mobile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->postal_code->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->details ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->street ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->landmark ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->locality ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->province->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $address->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('address_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.addresses.show', $address->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('address_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.addresses.edit', $address->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('address_delete')
                                                <form action="{{ route('frontend.addresses.destroy', $address->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('address_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.addresses.massDestroy') }}",
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
  let table = $('.datatable-Address:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection