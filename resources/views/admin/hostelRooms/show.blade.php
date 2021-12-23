@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hostelRoom.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hostel-rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hostelRoom.fields.id') }}
                        </th>
                        <td>
                            {{ $hostelRoom->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostelRoom.fields.hostel') }}
                        </th>
                        <td>
                            {{ $hostelRoom->hostel->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostelRoom.fields.number') }}
                        </th>
                        <td>
                            {{ $hostelRoom->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostelRoom.fields.vacancy') }}
                        </th>
                        <td>
                            {{ $hostelRoom->vacancy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostelRoom.fields.status') }}
                        </th>
                        <td>
                            {{ $hostelRoom->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hostelRoom.fields.remarks') }}
                        </th>
                        <td>
                            {{ $hostelRoom->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hostel-rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection