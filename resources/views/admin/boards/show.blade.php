@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.board.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.id') }}
                        </th>
                        <td>
                            {{ $board->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.name') }}
                        </th>
                        <td>
                            {{ $board->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.code') }}
                        </th>
                        <td>
                            {{ $board->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.status') }}
                        </th>
                        <td>
                            {{ $board->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.remarks') }}
                        </th>
                        <td>
                            {{ $board->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection