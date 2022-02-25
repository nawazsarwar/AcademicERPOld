@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('research_scholar_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.research-scholars.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.researchScholar.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'ResearchScholar', 'route' => 'admin.research-scholars.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.researchScholar.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ResearchScholar">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.registration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.supervisor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.co_supervisor_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.co_supervisor_address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.research_topic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.net_jrf') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.bos_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.casr_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.paper_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.paper_1_result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.paper_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.paper_2_result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.paper_3') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.paper_3_result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.paper_4') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.paper_4_result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.pre_submission_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.researchScholar.fields.submission_date') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($researchScholars as $key => $researchScholar)
                                    <tr data-entry-id="{{ $researchScholar->id }}">
                                        <td>
                                            {{ $researchScholar->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->registration->type ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ResearchScholar::STATUS_SELECT[$researchScholar->status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->supervisor->employee_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->co_supervisor_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->co_supervisor_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->research_topic ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ResearchScholar::NET_JRF_SELECT[$researchScholar->net_jrf] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->bos_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->casr_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ResearchScholar::PAPER_1_SELECT[$researchScholar->paper_1] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ResearchScholar::PAPER_1_RESULT_SELECT[$researchScholar->paper_1_result] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->paper_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ResearchScholar::PAPER_2_RESULT_SELECT[$researchScholar->paper_2_result] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->paper_3 ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ResearchScholar::PAPER_3_RESULT_SELECT[$researchScholar->paper_3_result] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->paper_4 ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ResearchScholar::PAPER_4_RESULT_SELECT[$researchScholar->paper_4_result] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->pre_submission_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $researchScholar->submission_date ?? '' }}
                                        </td>
                                        <td>
                                            @can('research_scholar_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.research-scholars.show', $researchScholar->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('research_scholar_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.research-scholars.edit', $researchScholar->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('research_scholar_delete')
                                                <form action="{{ route('frontend.research-scholars.destroy', $researchScholar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('research_scholar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.research-scholars.massDestroy') }}",
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
  let table = $('.datatable-ResearchScholar:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection