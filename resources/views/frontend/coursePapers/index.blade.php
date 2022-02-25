@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('course_paper_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.course-papers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.coursePaper.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.coursePaper.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CoursePaper">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coursePaper.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.coursePaper.fields.course') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.coursePaper.fields.paper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paper.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.coursePaper.fields.fraction') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.coursePaper.fields.academic_session') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.coursePaper.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.coursePaper.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coursePapers as $key => $coursePaper)
                                    <tr data-entry-id="{{ $coursePaper->id }}">
                                        <td>
                                            {{ $coursePaper->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $coursePaper->course->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $coursePaper->course->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $coursePaper->paper->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $coursePaper->paper->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $coursePaper->fraction ?? '' }}
                                        </td>
                                        <td>
                                            {{ $coursePaper->academic_session->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $coursePaper->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $coursePaper->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('course_paper_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.course-papers.show', $coursePaper->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('course_paper_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.course-papers.edit', $coursePaper->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('course_paper_delete')
                                                <form action="{{ route('frontend.course-papers.destroy', $coursePaper->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('course_paper_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.course-papers.massDestroy') }}",
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
  let table = $('.datatable-CoursePaper:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection