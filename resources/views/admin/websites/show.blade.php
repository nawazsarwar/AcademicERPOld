@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.website.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.websites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.id') }}
                        </th>
                        <td>
                            {{ $website->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.title') }}
                        </th>
                        <td>
                            {{ $website->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.domain') }}
                        </th>
                        <td>
                            {{ $website->domain }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.websites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection