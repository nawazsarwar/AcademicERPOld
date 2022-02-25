@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('course_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.courses.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.course.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Course', 'route' => 'admin.courses.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.course.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Course">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.course.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.degree') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.campus') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.title_hindi') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.title_urdu') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.course_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.internal_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.level') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.entrance_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.duration_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.duration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.total_intake') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.subsidiarizable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.administrable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.administrable_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $key => $course)
                                    <tr data-entry-id="{{ $course->id }}">
                                        <td>
                                            {{ $course->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->degree->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->campus->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->title_hindi ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->title_urdu ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->course_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->internal_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->level->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->entrance_type->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->mode->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->duration_type->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->duration ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->total_intake ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Course::SUBSIDIARIZABLE_RADIO[$course->subsidiarizable] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->administrable->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->administrable_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $course->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('course_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.courses.show', $course->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('course_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.courses.edit', $course->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('course_delete')
                                                <form action="{{ route('frontend.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('course_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.courses.massDestroy') }}",
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
  let table = $('.datatable-Course:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection