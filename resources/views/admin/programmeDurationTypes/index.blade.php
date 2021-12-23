@extends('layouts.admin')
@section('content')
@can('programme_duration_type_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.programme-duration-types.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.programmeDurationType.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.programmeDurationType.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ProgrammeDurationType">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.programmeDurationType.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.programmeDurationType.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.programmeDurationType.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.programmeDurationType.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programmeDurationTypes as $key => $programmeDurationType)
                        <tr data-entry-id="{{ $programmeDurationType->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $programmeDurationType->id ?? '' }}
                            </td>
                            <td>
                                {{ $programmeDurationType->title ?? '' }}
                            </td>
                            <td>
                                {{ $programmeDurationType->status ?? '' }}
                            </td>
                            <td>
                                {{ $programmeDurationType->remarks ?? '' }}
                            </td>
                            <td>
                                @can('programme_duration_type_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.programme-duration-types.show', $programmeDurationType->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('programme_duration_type_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.programme-duration-types.edit', $programmeDurationType->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('programme_duration_type_delete')
                                    <form action="{{ route('admin.programme-duration-types.destroy', $programmeDurationType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('programme_duration_type_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.programme-duration-types.massDestroy') }}",
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
  let table = $('.datatable-ProgrammeDurationType:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection