@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reevaluationPaper.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reevaluation-papers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluationPaper.fields.id') }}
                        </th>
                        <td>
                            {{ $reevaluationPaper->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluationPaper.fields.reevaluation') }}
                        </th>
                        <td>
                            {{ $reevaluationPaper->reevaluation->examination_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluationPaper.fields.examination_mark') }}
                        </th>
                        <td>
                            {{ $reevaluationPaper->examination_mark->sessional ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluationPaper.fields.paper') }}
                        </th>
                        <td>
                            {{ $reevaluationPaper->paper->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluationPaper.fields.paper_code') }}
                        </th>
                        <td>
                            {{ $reevaluationPaper->paper_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reevaluationPaper.fields.status') }}
                        </th>
                        <td>
                            {{ $reevaluationPaper->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reevaluation-papers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection