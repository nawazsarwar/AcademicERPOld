@extends('layouts.admin')
@section('content')
@can('reevaluation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.reevaluations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reevaluation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.reevaluation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Reevaluation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.exam_registration') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.student') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.examination_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.examination_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.examination_part') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.result_declaration_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.submitted') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.reevaluation.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reevaluations as $key => $reevaluation)
                        <tr data-entry-id="{{ $reevaluation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reevaluation->id ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->exam_registration->type ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->student->enrolment_no ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->course->title ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->examination_name ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->examination_year ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->examination_part ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->result_declaration_date ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->submitted ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->status ?? '' }}
                            </td>
                            <td>
                                {{ $reevaluation->remarks ?? '' }}
                            </td>
                            <td>
                                @can('reevaluation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.reevaluations.show', $reevaluation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('reevaluation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.reevaluations.edit', $reevaluation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('reevaluation_delete')
                                    <form action="{{ route('admin.reevaluations.destroy', $reevaluation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('reevaluation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reevaluations.massDestroy') }}",
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
  let table = $('.datatable-Reevaluation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection