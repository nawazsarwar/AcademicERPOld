@extends('layouts.admin')
@section('content')
@can('person_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.people.create') }}">
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Person">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.person.fields.id') }}
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
                        {{ trans('cruds.person.fields.status') }}
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
                        {{ trans('cruds.person.fields.verified') }}
                    </th>
                    <th>
                        {{ trans('cruds.person.fields.verified_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.person.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.person.fields.remarks') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('person_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.people.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.people.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'first_name', name: 'first_name' },
{ data: 'middle_name', name: 'middle_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'fathers_first_name', name: 'fathers_first_name' },
{ data: 'fathers_middle_name', name: 'fathers_middle_name' },
{ data: 'fathers_last_name', name: 'fathers_last_name' },
{ data: 'mothers_first_name', name: 'mothers_first_name' },
{ data: 'mothers_middle_name', name: 'mothers_middle_name' },
{ data: 'mothers_last_name', name: 'mothers_last_name' },
{ data: 'dob', name: 'dob' },
{ data: 'gender', name: 'gender' },
{ data: 'blood_group', name: 'blood_group' },
{ data: 'disability', name: 'disability' },
{ data: 'disability_type', name: 'disability_type' },
{ data: 'aadhaar_no', name: 'aadhaar_no' },
{ data: 'religion_name', name: 'religion.name' },
{ data: 'caste_name', name: 'caste.name' },
{ data: 'sub_caste', name: 'sub_caste' },
{ data: 'nationality_name', name: 'nationality.name' },
{ data: 'domicile_province_name', name: 'domicile_province.name' },
{ data: 'identity_marks', name: 'identity_marks' },
{ data: 'status', name: 'status' },
{ data: 'dob_proof', name: 'dob_proof' },
{ data: 'marital_status', name: 'marital_status' },
{ data: 'spouse_name', name: 'spouse_name' },
{ data: 'pan_no', name: 'pan_no' },
{ data: 'passport_no', name: 'passport_no' },
{ data: 'verified', name: 'verified' },
{ data: 'verified_by_name', name: 'verified_by.name' },
{ data: 'user_username', name: 'user.username' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Person').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection