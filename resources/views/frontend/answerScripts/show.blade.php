@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.answerScript.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.answer-scripts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.paper') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->paper->code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.page_no') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->page_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.photo_path') }}
                                    </th>
                                    <td>
                                        @if($answerScript->photo_path)
                                            <a href="{{ $answerScript->photo_path->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $answerScript->photo_path->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.file_name') }}
                                    </th>
                                    <td>
                                        @if($answerScript->file_name)
                                            <a href="{{ $answerScript->file_name->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.file_path') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->file_path }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.extension') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->extension }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.file_url') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->file_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.cdn_url') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->cdn_url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.answerScript.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $answerScript->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.answer-scripts.index') }}">
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