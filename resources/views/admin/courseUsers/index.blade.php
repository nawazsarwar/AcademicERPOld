@extends('layouts.admin')
@section('content')
@can('course_user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.course-users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.courseUser.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.courseUser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CourseUser">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.faculty_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.admitted_in') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.admitted_on') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.duration_extension') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.verification_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.verified_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.verified_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.verification_remark') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseUser.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courseUsers as $key => $courseUser)
                        <tr data-entry-id="{{ $courseUser->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $courseUser->id ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->course->title ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->course->code ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->faculty_no ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->admitted_in->name ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->admitted_on ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->duration_extension ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->verification_status->name ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->verified_by->name ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->verified_at ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->verification_remark ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->status ?? '' }}
                            </td>
                            <td>
                                {{ $courseUser->remarks ?? '' }}
                            </td>
                            <td>
                                @can('course_user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.course-users.show', $courseUser->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('course_user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.course-users.edit', $courseUser->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('course_user_delete')
                                    <form action="{{ route('admin.course-users.destroy', $courseUser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('course_user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.course-users.massDestroy') }}",
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
  let table = $('.datatable-CourseUser:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection