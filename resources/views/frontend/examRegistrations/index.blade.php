@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('exam_registration_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.exam-registrations.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.examRegistration.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.examRegistration.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ExamRegistration">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.student') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.course') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.subsidiary_one') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.subsidiary_two') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.academic_session') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.season') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.faculty_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.fraction') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.hall') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.hostel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.room_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.verification_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.verified_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.verified_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.verification_remark') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examRegistration.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($examRegistrations as $key => $examRegistration)
                                    <tr data-entry-id="{{ $examRegistration->id }}">
                                        <td>
                                            {{ $examRegistration->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->student->guardian_mobile_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->course->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->subsidiary_one->internal_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->subsidiary_two->internal_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ExamRegistration::TYPE_SELECT[$examRegistration->type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->academic_session->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->season ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->faculty_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->fraction ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->hall->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->hostel->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->room_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->verification_status->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->verified_by->username ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->verified_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->verification_remark ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examRegistration->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('exam_registration_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.exam-registrations.show', $examRegistration->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('exam_registration_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.exam-registrations.edit', $examRegistration->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('exam_registration_delete')
                                                <form action="{{ route('frontend.exam-registrations.destroy', $examRegistration->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('exam_registration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.exam-registrations.massDestroy') }}",
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
  let table = $('.datatable-ExamRegistration:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection