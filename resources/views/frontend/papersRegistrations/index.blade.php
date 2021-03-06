@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('papers_registration_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.papers-registrations.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.papersRegistration.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'PapersRegistration', 'route' => 'admin.papers-registrations.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.papersRegistration.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PapersRegistration">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.paper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.registration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.student') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.profile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.faculty') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.department') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.department_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.paper_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.paper_title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.part') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.credits') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.papersRegistration.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($papersRegistrations as $key => $papersRegistration)
                                    <tr data-entry-id="{{ $papersRegistration->id }}">
                                        <td>
                                            {{ $papersRegistration->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->paper->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->registration->type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->student->enrolment_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\PapersRegistration::MODE_RADIO[$papersRegistration->mode] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->profile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->faculty ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->department ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->department_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->paper_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->paper_title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->part ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->credits ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $papersRegistration->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('papers_registration_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.papers-registrations.show', $papersRegistration->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('papers_registration_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.papers-registrations.edit', $papersRegistration->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('papers_registration_delete')
                                                <form action="{{ route('frontend.papers-registrations.destroy', $papersRegistration->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('papers_registration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.papers-registrations.massDestroy') }}",
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
  let table = $('.datatable-PapersRegistration:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection