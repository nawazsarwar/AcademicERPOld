@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('admission_entrance_type_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.admission-entrance-types.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.admissionEntranceType.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.admissionEntranceType.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AdmissionEntranceType">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.admissionEntranceType.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionEntranceType.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionEntranceType.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionEntranceType.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admissionEntranceTypes as $key => $admissionEntranceType)
                                    <tr data-entry-id="{{ $admissionEntranceType->id }}">
                                        <td>
                                            {{ $admissionEntranceType->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionEntranceType->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionEntranceType->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionEntranceType->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('admission_entrance_type_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.admission-entrance-types.show', $admissionEntranceType->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('admission_entrance_type_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.admission-entrance-types.edit', $admissionEntranceType->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('admission_entrance_type_delete')
                                                <form action="{{ route('frontend.admission-entrance-types.destroy', $admissionEntranceType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('admission_entrance_type_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.admission-entrance-types.massDestroy') }}",
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
  let table = $('.datatable-AdmissionEntranceType:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection