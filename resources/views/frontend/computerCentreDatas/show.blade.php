@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.computerCentreData.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.computer-centre-datas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.uri') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->uri }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.slug') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->slug }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.type') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.parser') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->parser }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.data') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->data }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.parent') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->parent }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.crawled') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->crawled }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.crawled_at') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->crawled_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.computerCentreData.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $computerCentreData->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.computer-centre-datas.index') }}">
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