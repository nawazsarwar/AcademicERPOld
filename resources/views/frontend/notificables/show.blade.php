@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.notificable.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.notificables.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notificable.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $notificable->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notificable.fields.notification') }}
                                    </th>
                                    <td>
                                        {{ $notificable->notification->mode ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notificable.fields.notificable') }}
                                    </th>
                                    <td>
                                        {{ $notificable->notificable }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notificable.fields.notificable_type') }}
                                    </th>
                                    <td>
                                        {{ $notificable->notificable_type }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.notificables.index') }}">
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