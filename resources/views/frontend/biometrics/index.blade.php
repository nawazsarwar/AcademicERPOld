@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('biometric_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.biometrics.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.biometric.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.biometric.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Biometric">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biometric.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biometric.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biometric.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biometric.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biometric.fields.path') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biometric.fields.cdn_url') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($biometrics as $key => $biometric)
                                    <tr data-entry-id="{{ $biometric->id }}">
                                        <td>
                                            {{ $biometric->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $biometric->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Biometric::TYPE_SELECT[$biometric->type] ?? '' }}
                                        </td>
                                        <td>
                                            @if($biometric->name)
                                                <a href="{{ $biometric->name->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $biometric->name->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $biometric->path ?? '' }}
                                        </td>
                                        <td>
                                            {{ $biometric->cdn_url ?? '' }}
                                        </td>
                                        <td>
                                            @can('biometric_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.biometrics.show', $biometric->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('biometric_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.biometrics.edit', $biometric->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('biometric_delete')
                                                <form action="{{ route('frontend.biometrics.destroy', $biometric->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('biometric_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.biometrics.massDestroy') }}",
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
  let table = $('.datatable-Biometric:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection