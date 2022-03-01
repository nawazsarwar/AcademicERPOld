@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.clientMerchant.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.client-merchants.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $clientMerchant->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.client') }}
                                    </th>
                                    <td>
                                        {{ $clientMerchant->client->uid ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.merchant') }}
                                    </th>
                                    <td>
                                        {{ $clientMerchant->merchant->uid ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.key') }}
                                    </th>
                                    <td>
                                        {{ $clientMerchant->key }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.secret') }}
                                    </th>
                                    <td>
                                        {{ $clientMerchant->secret }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.head') }}
                                    </th>
                                    <td>
                                        {{ $clientMerchant->head }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.sub_head') }}
                                    </th>
                                    <td>
                                        {{ $clientMerchant->sub_head }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientMerchant.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $clientMerchant->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.client-merchants.index') }}">
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