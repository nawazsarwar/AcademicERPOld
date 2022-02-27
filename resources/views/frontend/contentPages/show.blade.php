@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.contentPage.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.content-pages.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->website->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.slug') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->slug }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ContentPage::TYPE_SELECT[$contentPage->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.content') }}
                                    </th>
                                    <td>
                                        {!! $contentPage->content !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.excerpt') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->excerpt }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.featured_image') }}
                                    </th>
                                    <td>
                                        @if($contentPage->featured_image)
                                            <a href="{{ $contentPage->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $contentPage->featured_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.link') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->link }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.file') }}
                                    </th>
                                    <td>
                                        @if($contentPage->file)
                                            <a href="{{ $contentPage->file->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.category') }}
                                    </th>
                                    <td>
                                        @foreach($contentPage->categories as $key => $category)
                                            <span class="label label-info">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.tag') }}
                                    </th>
                                    <td>
                                        @foreach($contentPage->tags as $key => $tag)
                                            <span class="label label-info">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.approved') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->approved }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.approved_by') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->approved_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.deleted_by') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->deleted_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contentPage.fields.publish_at') }}
                                    </th>
                                    <td>
                                        {{ $contentPage->publish_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.content-pages.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection