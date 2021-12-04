<div class="m-3">
    @can('paper_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.papers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.paper.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.paper.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-paperTypePapers">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.code') }}
                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.paper_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.paperType.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.part') }}
                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.teaching_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.credits') }}
                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.paper.fields.remarks') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($papers as $key => $paper)
                            <tr data-entry-id="{{ $paper->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $paper->id ?? '' }}
                                </td>
                                <td>
                                    {{ $paper->code ?? '' }}
                                </td>
                                <td>
                                    {{ $paper->name ?? '' }}
                                </td>
                                <td>
                                    {{ $paper->paper_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $paper->paper_type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $paper->part ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Paper::TEACHING_STATUS_SELECT[$paper->teaching_status] ?? '' }}
                                </td>
                                <td>
                                    {{ $paper->credits ?? '' }}
                                </td>
                                <td>
                                    {{ $paper->status ?? '' }}
                                </td>
                                <td>
                                    {{ $paper->remarks ?? '' }}
                                </td>
                                <td>
                                    @can('paper_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.papers.show', $paper->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('paper_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.papers.edit', $paper->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('paper_delete')
                                        <form action="{{ route('admin.papers.destroy', $paper->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('paper_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.papers.massDestroy') }}",
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
  let table = $('.datatable-paperTypePapers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection