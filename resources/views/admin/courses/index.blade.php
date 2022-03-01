@extends('layouts.admin')
@section('content')
@can('course_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.courses.create') }}">
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Course">
            <thead>
                <tr>
                    <th width="10">

                    </th>
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
                        {{ trans('cruds.course.fields.creditizable') }}
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('course_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.courses.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.courses.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'degree_name', name: 'degree.name' },
{ data: 'campus_name', name: 'campus.name' },
{ data: 'title', name: 'title' },
{ data: 'title_hindi', name: 'title_hindi' },
{ data: 'title_urdu', name: 'title_urdu' },
{ data: 'code', name: 'code' },
{ data: 'course_code', name: 'course_code' },
{ data: 'internal_code', name: 'internal_code' },
{ data: 'level_name', name: 'level.name' },
{ data: 'entrance_type_title', name: 'entrance_type.title' },
{ data: 'mode_title', name: 'mode.title' },
{ data: 'duration_type_title', name: 'duration_type.title' },
{ data: 'duration', name: 'duration' },
{ data: 'total_intake', name: 'total_intake' },
{ data: 'subsidiarizable', name: 'subsidiarizable' },
{ data: 'creditizable', name: 'creditizable' },
{ data: 'administrable_name', name: 'administrable.name' },
{ data: 'administrable_type', name: 'administrable_type' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Course').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection