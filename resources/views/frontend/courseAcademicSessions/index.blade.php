@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('course_academic_session_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.course-academic-sessions.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.courseAcademicSession.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'CourseAcademicSession', 'route' => 'admin.course-academic-sessions.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.courseAcademicSession.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CourseAcademicSession">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.academic_session') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.course') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseAcademicSession.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courseAcademicSessions as $key => $courseAcademicSession)
                                    <tr data-entry-id="{{ $courseAcademicSession->id }}">
                                        <td>
                                            {{ $courseAcademicSession->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseAcademicSession->academic_session->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseAcademicSession->course->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseAcademicSession->course->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseAcademicSession->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseAcademicSession->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('course_academic_session_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.course-academic-sessions.show', $courseAcademicSession->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('course_academic_session_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.course-academic-sessions.edit', $courseAcademicSession->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('course_academic_session_delete')
                                                <form action="{{ route('frontend.course-academic-sessions.destroy', $courseAcademicSession->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('course_academic_session_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.course-academic-sessions.massDestroy') }}",
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
  let table = $('.datatable-CourseAcademicSession:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection