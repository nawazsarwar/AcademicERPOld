@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.researchScholar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.research-scholars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.id') }}
                        </th>
                        <td>
                            {{ $researchScholar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.registration') }}
                        </th>
                        <td>
                            {{ $researchScholar->registration->type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\ResearchScholar::STATUS_SELECT[$researchScholar->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.supervisor') }}
                        </th>
                        <td>
                            {{ $researchScholar->supervisor->employee_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.co_supervisor_name') }}
                        </th>
                        <td>
                            {{ $researchScholar->co_supervisor_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.co_supervisor_address') }}
                        </th>
                        <td>
                            {{ $researchScholar->co_supervisor_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.research_topic') }}
                        </th>
                        <td>
                            {{ $researchScholar->research_topic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.net_jrf') }}
                        </th>
                        <td>
                            {{ App\Models\ResearchScholar::NET_JRF_SELECT[$researchScholar->net_jrf] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.bos_date') }}
                        </th>
                        <td>
                            {{ $researchScholar->bos_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.casr_date') }}
                        </th>
                        <td>
                            {{ $researchScholar->casr_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.paper_1') }}
                        </th>
                        <td>
                            {{ App\Models\ResearchScholar::PAPER_1_SELECT[$researchScholar->paper_1] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.paper_1_result') }}
                        </th>
                        <td>
                            {{ App\Models\ResearchScholar::PAPER_1_RESULT_SELECT[$researchScholar->paper_1_result] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.paper_2') }}
                        </th>
                        <td>
                            {{ $researchScholar->paper_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.paper_2_result') }}
                        </th>
                        <td>
                            {{ App\Models\ResearchScholar::PAPER_2_RESULT_SELECT[$researchScholar->paper_2_result] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.paper_3') }}
                        </th>
                        <td>
                            {{ $researchScholar->paper_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.paper_3_result') }}
                        </th>
                        <td>
                            {{ App\Models\ResearchScholar::PAPER_3_RESULT_SELECT[$researchScholar->paper_3_result] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.paper_4') }}
                        </th>
                        <td>
                            {{ $researchScholar->paper_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.paper_4_result') }}
                        </th>
                        <td>
                            {{ App\Models\ResearchScholar::PAPER_4_RESULT_SELECT[$researchScholar->paper_4_result] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.pre_submission_date') }}
                        </th>
                        <td>
                            {{ $researchScholar->pre_submission_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.researchScholar.fields.submission_date') }}
                        </th>
                        <td>
                            {{ $researchScholar->submission_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.research-scholars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection