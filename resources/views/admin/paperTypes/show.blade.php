@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paperType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.paper-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.id') }}
                        </th>
                        <td>
                            {{ $paperType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.code') }}
                        </th>
                        <td>
                            {{ $paperType->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.name') }}
                        </th>
                        <td>
                            {{ $paperType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.status') }}
                        </th>
                        <td>
                            {{ $paperType->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.remarks') }}
                        </th>
                        <td>
                            {{ $paperType->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.paper-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#paper_type_papers" role="tab" data-toggle="tab">
                {{ trans('cruds.paper.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="paper_type_papers">
            @includeIf('admin.paperTypes.relationships.paperTypePapers', ['papers' => $paperType->paperTypePapers])
        </div>
    </div>
</div>

@endsection