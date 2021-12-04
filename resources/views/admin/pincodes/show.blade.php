@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pincode.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pincodes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pincode.fields.id') }}
                        </th>
                        <td>
                            {{ $pincode->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pincode.fields.name') }}
                        </th>
                        <td>
                            {{ $pincode->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pincode.fields.locality') }}
                        </th>
                        <td>
                            {{ $pincode->locality }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pincode.fields.pincode') }}
                        </th>
                        <td>
                            {{ $pincode->pincode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pincode.fields.sub_district') }}
                        </th>
                        <td>
                            {{ $pincode->sub_district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pincode.fields.district') }}
                        </th>
                        <td>
                            {{ $pincode->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pincode.fields.province') }}
                        </th>
                        <td>
                            {{ $pincode->province->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pincodes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection