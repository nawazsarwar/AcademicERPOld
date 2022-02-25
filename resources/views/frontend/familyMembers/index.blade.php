@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('family_member_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.family-members.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.familyMember.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'FamilyMember', 'route' => 'admin.family-members.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.familyMember.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-FamilyMember">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.employee') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.submission_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.family_member_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.dob') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.relationship') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.gender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.marital_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.familyMember.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($familyMembers as $key => $familyMember)
                                    <tr data-entry-id="{{ $familyMember->id }}">
                                        <td>
                                            {{ $familyMember->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyMember->employee->employee_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyMember->submission_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyMember->family_member_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyMember->dob ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyMember->relationship ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\FamilyMember::GENDER_SELECT[$familyMember->gender] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyMember->marital_status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyMember->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $familyMember->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('family_member_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.family-members.show', $familyMember->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('family_member_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.family-members.edit', $familyMember->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('family_member_delete')
                                                <form action="{{ route('frontend.family-members.destroy', $familyMember->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('family_member_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.family-members.massDestroy') }}",
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
  let table = $('.datatable-FamilyMember:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection