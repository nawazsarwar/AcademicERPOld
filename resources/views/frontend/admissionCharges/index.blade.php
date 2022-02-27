@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('admission_charge_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.admission-charges.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.admissionCharge.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'AdmissionCharge', 'route' => 'admin.admission-charges.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.admissionCharge.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AdmissionCharge">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.course') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.boys_nr_external') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.boys_nr_internal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.boys_resident_external') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.boys_resident_internal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.girls_nr_external') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.girls_nr_internal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.girls_resident_external') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.girls_resident_internal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.admissionCharge.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admissionCharges as $key => $admissionCharge)
                                    <tr data-entry-id="{{ $admissionCharge->id }}">
                                        <td>
                                            {{ $admissionCharge->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->course->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->course->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->boys_nr_external ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->boys_nr_internal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->boys_resident_external ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->boys_resident_internal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->girls_nr_external ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->girls_nr_internal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->girls_resident_external ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->girls_resident_internal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admissionCharge->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('admission_charge_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.admission-charges.show', $admissionCharge->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('admission_charge_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.admission-charges.edit', $admissionCharge->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('admission_charge_delete')
                                                <form action="{{ route('frontend.admission-charges.destroy', $admissionCharge->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('admission_charge_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.admission-charges.massDestroy') }}",
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
  let table = $('.datatable-AdmissionCharge:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection