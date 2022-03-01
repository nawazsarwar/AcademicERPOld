@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('reevaluation_paper_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.reevaluation-papers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.reevaluationPaper.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.reevaluationPaper.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ReevaluationPaper">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reevaluationPaper.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reevaluationPaper.fields.reevaluation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reevaluationPaper.fields.examination_mark') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reevaluationPaper.fields.paper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paper.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reevaluationPaper.fields.paper_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reevaluationPaper.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reevaluationPapers as $key => $reevaluationPaper)
                                    <tr data-entry-id="{{ $reevaluationPaper->id }}">
                                        <td>
                                            {{ $reevaluationPaper->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reevaluationPaper->reevaluation->examination_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reevaluationPaper->examination_mark->sessional ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reevaluationPaper->paper->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reevaluationPaper->paper->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reevaluationPaper->paper_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reevaluationPaper->status ?? '' }}
                                        </td>
                                        <td>
                                            @can('reevaluation_paper_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.reevaluation-papers.show', $reevaluationPaper->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('reevaluation_paper_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.reevaluation-papers.edit', $reevaluationPaper->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('reevaluation_paper_delete')
                                                <form action="{{ route('frontend.reevaluation-papers.destroy', $reevaluationPaper->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('reevaluation_paper_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.reevaluation-papers.massDestroy') }}",
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
  let table = $('.datatable-ReevaluationPaper:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection