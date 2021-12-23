@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.programmeDeliveryMode.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programme-delivery-modes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.programmeDeliveryMode.fields.id') }}
                        </th>
                        <td>
                            {{ $programmeDeliveryMode->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programmeDeliveryMode.fields.title') }}
                        </th>
                        <td>
                            {{ $programmeDeliveryMode->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programmeDeliveryMode.fields.status') }}
                        </th>
                        <td>
                            {{ $programmeDeliveryMode->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programmeDeliveryMode.fields.remarks') }}
                        </th>
                        <td>
                            {{ $programmeDeliveryMode->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programme-delivery-modes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection