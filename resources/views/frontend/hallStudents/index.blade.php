@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('hall_student_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.hall-students.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.hallStudent.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'HallStudent', 'route' => 'admin.hall-students.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.hallStudent.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-HallStudent">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.hall') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hall.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.hostel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.room_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.student') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.allotment_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.allotted_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.allotted_on') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hallStudent.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hallStudents as $key => $hallStudent)
                                    <tr data-entry-id="{{ $hallStudent->id }}">
                                        <td>
                                            {{ $hallStudent->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->hall->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->hall->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->hostel->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->room_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->student->enrolment_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->allotment_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->allotted_by->username ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->allotted_on ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hallStudent->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('hall_student_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.hall-students.show', $hallStudent->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('hall_student_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.hall-students.edit', $hallStudent->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('hall_student_delete')
                                                <form action="{{ route('frontend.hall-students.destroy', $hallStudent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hall_student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.hall-students.massDestroy') }}",
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
  let table = $('.datatable-HallStudent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection