@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.clientsMerchant.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.clients-merchants.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $clientsMerchant->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.client') }}
                                    </th>
                                    <td>
                                        {{ $clientsMerchant->client->uid ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.merchant') }}
                                    </th>
                                    <td>
                                        {{ $clientsMerchant->merchant->uid ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.key') }}
                                    </th>
                                    <td>
                                        {{ $clientsMerchant->key }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.secret') }}
                                    </th>
                                    <td>
                                        {{ $clientsMerchant->secret }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.head') }}
                                    </th>
                                    <td>
                                        {{ $clientsMerchant->head }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.sub_head') }}
                                    </th>
                                    <td>
                                        {{ $clientsMerchant->sub_head }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clientsMerchant.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $clientsMerchant->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.clients-merchants.index') }}">
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