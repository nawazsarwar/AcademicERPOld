@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('registration_paper_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.registration-papers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.registrationPaper.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'RegistrationPaper', 'route' => 'admin.registration-papers.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.registrationPaper.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RegistrationPaper">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.paper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.registration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.student') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.profile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.faculty') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.department') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.department_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.paper_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.paper_title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.part') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.credits') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationPaper.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registrationPapers as $key => $registrationPaper)
                                    <tr data-entry-id="{{ $registrationPaper->id }}">
                                        <td>
                                            {{ $registrationPaper->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->paper->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->registration->type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->student->enrolment_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\RegistrationPaper::MODE_RADIO[$registrationPaper->mode] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->profile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->faculty ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->department ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->department_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->paper_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->paper_title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->part ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->credits ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationPaper->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('registration_paper_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.registration-papers.show', $registrationPaper->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('registration_paper_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.registration-papers.edit', $registrationPaper->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('registration_paper_delete')
                                                <form action="{{ route('frontend.registration-papers.destroy', $registrationPaper->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('registration_paper_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.registration-papers.massDestroy') }}",
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
  let table = $('.datatable-RegistrationPaper:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection