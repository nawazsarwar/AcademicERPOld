@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.examiner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.examiners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.id') }}
                        </th>
                        <td>
                            {{ $examiner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Examiner::TYPE_SELECT[$examiner->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.name') }}
                        </th>
                        <td>
                            {{ $examiner->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.institute') }}
                        </th>
                        <td>
                            {{ $examiner->institute }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.department') }}
                        </th>
                        <td>
                            {{ $examiner->department }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.mobile') }}
                        </th>
                        <td>
                            {{ $examiner->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.email') }}
                        </th>
                        <td>
                            {{ $examiner->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.paper') }}
                        </th>
                        <td>
                            {{ $examiner->paper->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.answerscripts_file') }}
                        </th>
                        <td>
                            @if($examiner->answerscripts_file)
                                <a href="{{ $examiner->answerscripts_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.otp') }}
                        </th>
                        <td>
                            {{ $examiner->otp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.otp_validity') }}
                        </th>
                        <td>
                            {{ $examiner->otp_validity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.otp_verified') }}
                        </th>
                        <td>
                            {{ $examiner->otp_verified }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.start') }}
                        </th>
                        <td>
                            {{ $examiner->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.end') }}
                        </th>
                        <td>
                            {{ $examiner->end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examiner.fields.remarks') }}
                        </th>
                        <td>
                            {{ $examiner->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.examiners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection