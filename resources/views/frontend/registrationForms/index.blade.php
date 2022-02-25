@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('registration_form_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.registration-forms.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.registrationForm.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'RegistrationForm', 'route' => 'admin.registration-forms.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.registrationForm.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RegistrationForm">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.course') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.course.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.opening_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.closing_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.academic_session') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.programme_duration_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.fillable_current') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.fillable_backlog') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registrationForm.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registrationForms as $key => $registrationForm)
                                    <tr data-entry-id="{{ $registrationForm->id }}">
                                        <td>
                                            {{ $registrationForm->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->course->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->course->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->opening_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->closing_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->academic_session->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->programme_duration_type->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\RegistrationForm::FILLABLE_CURRENT_RADIO[$registrationForm->fillable_current] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\RegistrationForm::FILLABLE_BACKLOG_RADIO[$registrationForm->fillable_backlog] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registrationForm->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('registration_form_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.registration-forms.show', $registrationForm->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('registration_form_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.registration-forms.edit', $registrationForm->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('registration_form_delete')
                                                <form action="{{ route('frontend.registration-forms.destroy', $registrationForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('registration_form_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.registration-forms.massDestroy') }}",
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
  let table = $('.datatable-RegistrationForm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection