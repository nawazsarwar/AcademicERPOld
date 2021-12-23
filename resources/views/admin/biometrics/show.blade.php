@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.biometric.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.biometrics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.biometric.fields.id') }}
                        </th>
                        <td>
                            {{ $biometric->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.biometric.fields.user') }}
                        </th>
                        <td>
                            {{ $biometric->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.biometric.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Biometric::TYPE_SELECT[$biometric->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.biometric.fields.name') }}
                        </th>
                        <td>
                            @if($biometric->name)
                                <a href="{{ $biometric->name->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $biometric->name->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.biometric.fields.path') }}
                        </th>
                        <td>
                            {{ $biometric->path }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.biometric.fields.cdn_url') }}
                        </th>
                        <td>
                            {{ $biometric->cdn_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.biometrics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection