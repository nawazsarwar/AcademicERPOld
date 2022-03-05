@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.advertisement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.advertisements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisement.fields.id') }}
                        </th>
                        <td>
                            {{ $advertisement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisement.fields.title') }}
                        </th>
                        <td>
                            {{ $advertisement->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisement.fields.slug') }}
                        </th>
                        <td>
                            {{ $advertisement->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisement.fields.description') }}
                        </th>
                        <td>
                            {{ $advertisement->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisement.fields.dated') }}
                        </th>
                        <td>
                            {{ $advertisement->dated }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisement.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Advertisement::TYPE_SELECT[$advertisement->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisement.fields.advertisement_url') }}
                        </th>
                        <td>
                            {{ $advertisement->advertisement_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertisement.fields.document') }}
                        </th>
                        <td>
                            @if($advertisement->document)
                                <a href="{{ $advertisement->document->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.advertisements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection