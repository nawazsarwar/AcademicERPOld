@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('examination_mark_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.examination-marks.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.examinationMark.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.examinationMark.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ExaminationMark">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.student') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.academic_session') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.season') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.registration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.paper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paper.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.sessional') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.theory') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.total') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.grade') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.grade_point') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.part') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.final_result') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.entered_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.entered_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.verified_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.verified_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examinationMark.fields.result_declaration_date') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($examinationMarks as $key => $examinationMark)
                                    <tr data-entry-id="{{ $examinationMark->id }}">
                                        <td>
                                            {{ $examinationMark->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->student->enrolment_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->academic_session->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->season ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->registration->faculty_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->paper->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->paper->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->sessional ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->theory ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->total ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->grade ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->grade_point ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->result ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->part ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->final_result ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->entered_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->entered_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->verified_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->verified_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examinationMark->result_declaration_date ?? '' }}
                                        </td>
                                        <td>
                                            @can('examination_mark_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.examination-marks.show', $examinationMark->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('examination_mark_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.examination-marks.edit', $examinationMark->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('examination_mark_delete')
                                                <form action="{{ route('frontend.examination-marks.destroy', $examinationMark->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('examination_mark_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.examination-marks.massDestroy') }}",
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
  let table = $('.datatable-ExaminationMark:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection