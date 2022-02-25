@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('person_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.people.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.person.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Person', 'route' => 'admin.people.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.person.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Person">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.person.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.middle_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.fathers_first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.fathers_middle_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.fathers_last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.mothers_first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.mothers_middle_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.mothers_last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.dob') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.gender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.blood_group') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.disability') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.disability_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.aadhaar_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.religion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.caste') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.sub_caste') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.nationality') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.domicile_province') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.identity_marks') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.dob_proof') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.marital_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.spouse_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.pan_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.passport_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.person.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($people as $key => $person)
                                    <tr data-entry-id="{{ $person->id }}">
                                        <td>
                                            {{ $person->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->user->username ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->middle_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->fathers_first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->fathers_middle_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->fathers_last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->mothers_first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->mothers_middle_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->mothers_last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->dob ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Person::GENDER_SELECT[$person->gender] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->blood_group->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Person::DISABILITY_SELECT[$person->disability] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Person::DISABILITY_TYPE_SELECT[$person->disability_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->aadhaar_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->religion->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->caste->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->sub_caste ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->nationality->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->domicile_province->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->identity_marks ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->dob_proof ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Person::MARITAL_STATUS_SELECT[$person->marital_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->spouse_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->pan_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->passport_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $person->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('person_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.people.show', $person->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('person_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.people.edit', $person->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('person_delete')
                                                <form action="{{ route('frontend.people.destroy', $person->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('person_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.people.massDestroy') }}",
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
  let table = $('.datatable-Person:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection