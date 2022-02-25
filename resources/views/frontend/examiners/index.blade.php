@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('examiner_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.examiners.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.examiner.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.examiner.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Examiner">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.examiner.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.institute') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.department') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.mobile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.paper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.paper.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.answerscripts_file') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.otp') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.otp_validity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.otp_verified') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.start') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.end') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.examiner.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($examiners as $key => $examiner)
                                    <tr data-entry-id="{{ $examiner->id }}">
                                        <td>
                                            {{ $examiner->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Examiner::TYPE_SELECT[$examiner->type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->institute ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->department ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->mobile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->paper->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->paper->title ?? '' }}
                                        </td>
                                        <td>
                                            @if($examiner->answerscripts_file)
                                                <a href="{{ $examiner->answerscripts_file->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $examiner->otp ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->otp_validity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->otp_verified ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->start ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->end ?? '' }}
                                        </td>
                                        <td>
                                            {{ $examiner->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('examiner_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.examiners.show', $examiner->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('examiner_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.examiners.edit', $examiner->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('examiner_delete')
                                                <form action="{{ route('frontend.examiners.destroy', $examiner->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('examiner_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.examiners.massDestroy') }}",
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
  let table = $('.datatable-Examiner:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection