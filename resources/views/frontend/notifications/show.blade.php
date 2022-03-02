@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.notification.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.notifications.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $notification->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $notification->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.mode') }}
                                    </th>
                                    <td>
                                        {{ $notification->mode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.type') }}
                                    </th>
                                    <td>
                                        {{ $notification->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $notification->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.json') }}
                                    </th>
                                    <td>
                                        {{ $notification->json }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.created_by') }}
                                    </th>
                                    <td>
                                        {{ $notification->created_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.try_count') }}
                                    </th>
                                    <td>
                                        {{ $notification->try_count }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.done') }}
                                    </th>
                                    <td>
                                        {{ $notification->done }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $notification->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.notifications.index') }}">
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