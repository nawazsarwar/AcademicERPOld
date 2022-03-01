@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.receivable.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.receivables.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.id') }}
                        </th>
                        <td>
                            {{ $receivable->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.user') }}
                        </th>
                        <td>
                            {{ $receivable->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.narration') }}
                        </th>
                        <td>
                            {{ $receivable->narration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.description') }}
                        </th>
                        <td>
                            {{ $receivable->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.amount') }}
                        </th>
                        <td>
                            {{ $receivable->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.raised_on') }}
                        </th>
                        <td>
                            {{ $receivable->raised_on }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.raised_by') }}
                        </th>
                        <td>
                            {{ $receivable->raised_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.settlement_status') }}
                        </th>
                        <td>
                            {{ $receivable->settlement_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.settled_on') }}
                        </th>
                        <td>
                            {{ $receivable->settled_on }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receivable.fields.remarks') }}
                        </th>
                        <td>
                            {{ $receivable->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.receivables.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection