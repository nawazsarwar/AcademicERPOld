@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('examination_schedule_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.examination-schedules.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.examinationSchedule.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'ExaminationSchedule', 'route' => 'admin.examination-schedules.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.examinationSchedule.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ExaminationSchedule">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.academic_session') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.paper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paper.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.centre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.start') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.end') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.booklet_pages') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.season') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationSchedule.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($examinationSchedules as $key => $examinationSchedule)
                                    <tr data-entry-id="{{ $examinationSchedule->id }}">
                                        <td>
                                            {{ $examinationSchedule->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->academic_session->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->paper->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->paper->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ExaminationSchedule::MODE_SELECT[$examinationSchedule->mode] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->centre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->start ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->end ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->booklet_pages ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->season ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationSchedule->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('examination_schedule_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.examination-schedules.show', $examinationSchedule->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('examination_schedule_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.examination-schedules.edit', $examinationSchedule->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('examination_schedule_delete')
                                                <form action="{{ route('frontend.examination-schedules.destroy', $examinationSchedule->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('examination_schedule_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.examination-schedules.massDestroy') }}",
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
  let table = $('.datatable-ExaminationSchedule:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection