@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('course_student_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.course-students.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.courseStudent.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.courseStudent.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CourseStudent">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.course') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.student') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.faculty_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.session_admitted') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.admitted_on') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.duration_extension') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.verification_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.verified_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.verified_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.verification_remark') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.courseStudent.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courseStudents as $key => $courseStudent)
                                    <tr data-entry-id="{{ $courseStudent->id }}">
                                        <td>
                                            {{ $courseStudent->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->course->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->course->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->student->guardian_mobile_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->faculty_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->session_admitted->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->admitted_on ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->duration_extension ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->verification_status->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->verified_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->verified_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->verification_remark ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $courseStudent->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('course_student_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.course-students.show', $courseStudent->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('course_student_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.course-students.edit', $courseStudent->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('course_student_delete')
                                                <form action="{{ route('frontend.course-students.destroy', $courseStudent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('course_student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.course-students.massDestroy') }}",
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
  let table = $('.datatable-CourseStudent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection