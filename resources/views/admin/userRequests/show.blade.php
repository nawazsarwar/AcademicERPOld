@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $userRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userRequest.fields.user') }}
                        </th>
                        <td>
                            {{ $userRequest->user->username ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userRequest.fields.type') }}
                        </th>
                        <td>
                            {{ $userRequest->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userRequest.fields.ip') }}
                        </th>
                        <td>
                            {{ $userRequest->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userRequest.fields.url') }}
                        </th>
                        <td>
                            {{ $userRequest->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection