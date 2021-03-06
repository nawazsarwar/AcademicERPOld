@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('student_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.students.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Student', 'route' => 'admin.students.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.student.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Student">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.person') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.enrolment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.enrolment_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.mobile_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.guardians_mobile_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.emergency_mobile_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.verification_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.verified_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.verified_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.verification_remark') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.detained') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.student.fields.detention_reason') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $key => $student)
                                    <tr data-entry-id="{{ $student->id }}">
                                        <td>
                                            {{ $student->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->person->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->enrolment->number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->enrolment_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->mobile_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->guardians_mobile_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->emergency_mobile_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->verification_status->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->verified_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->verified_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->verification_remark ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->detained ?? '' }}
                                        </td>
                                        <td>
                                            {{ $student->detention_reason ?? '' }}
                                        </td>
                                        <td>
                                            @can('student_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.students.show', $student->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('student_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.students.edit', $student->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('student_delete')
                                                <form action="{{ route('frontend.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.students.massDestroy') }}",
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
  let table = $('.datatable-Student:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection