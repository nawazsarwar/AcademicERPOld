@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('content_page_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.content-pages.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.contentPage.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.contentPage.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ContentPage">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.website') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.website.fields.domain') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.slug') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.excerpt') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.featured_image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.link') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.file') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.tag') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.approved') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.approved_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.deleted_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.publish_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contentPages as $key => $contentPage)
                                    <tr data-entry-id="{{ $contentPage->id }}">
                                        <td>
                                            {{ $contentPage->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->website->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->website->domain ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->slug ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ContentPage::TYPE_SELECT[$contentPage->type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->excerpt ?? '' }}
                                        </td>
                                        <td>
                                            @if($contentPage->featured_image)
                                                <a href="{{ $contentPage->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $contentPage->featured_image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $contentPage->link ?? '' }}
                                        </td>
                                        <td>
                                            @if($contentPage->file)
                                                <a href="{{ $contentPage->file->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($contentPage->categories as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($contentPage->tags as $key => $item)
                                                <span>{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $contentPage->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->approved ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->approved_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->deleted_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contentPage->publish_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('content_page_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.content-pages.show', $contentPage->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('content_page_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.content-pages.edit', $contentPage->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('content_page_delete')
                                                <form action="{{ route('frontend.content-pages.destroy', $contentPage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('content_page_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.content-pages.massDestroy') }}",
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
  let table = $('.datatable-ContentPage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection