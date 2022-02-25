@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.address.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.addresses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $address->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.person') }}
                                    </th>
                                    <td>
                                        {{ $address->person->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Address::TYPE_SELECT[$address->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.country') }}
                                    </th>
                                    <td>
                                        {{ $address->country->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $address->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.postal_code') }}
                                    </th>
                                    <td>
                                        {{ $address->postal_code->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.details') }}
                                    </th>
                                    <td>
                                        {{ $address->details }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.street') }}
                                    </th>
                                    <td>
                                        {{ $address->street }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.landmark') }}
                                    </th>
                                    <td>
                                        {{ $address->landmark }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.locality') }}
                                    </th>
                                    <td>
                                        {{ $address->locality }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $address->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.province') }}
                                    </th>
                                    <td>
                                        {{ $address->province->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $address->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.address.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $address->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.addresses.index') }}">
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