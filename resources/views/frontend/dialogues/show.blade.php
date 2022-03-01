@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.dialogue.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.dialogues.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dialogue.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $dialogue->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dialogue.fields.merchant') }}
                                    </th>
                                    <td>
                                        {{ $dialogue->merchant->uid ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dialogue.fields.transaction') }}
                                    </th>
                                    <td>
                                        {{ $dialogue->transaction->amount ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dialogue.fields.pingback_url') }}
                                    </th>
                                    <td>
                                        {{ $dialogue->pingback_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dialogue.fields.request_type') }}
                                    </th>
                                    <td>
                                        {{ $dialogue->request_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dialogue.fields.raw_response') }}
                                    </th>
                                    <td>
                                        {{ $dialogue->raw_response }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dialogue.fields.response') }}
                                    </th>
                                    <td>
                                        {{ $dialogue->response }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.dialogues.index') }}">
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