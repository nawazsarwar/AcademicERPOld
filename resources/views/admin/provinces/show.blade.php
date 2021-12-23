@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.province.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.id') }}
                        </th>
                        <td>
                            {{ $province->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.country') }}
                        </th>
                        <td>
                            {{ $province->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.type') }}
                        </th>
                        <td>
                            {{ $province->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.name') }}
                        </th>
                        <td>
                            {{ $province->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.iso_3166_2_in') }}
                        </th>
                        <td>
                            {{ $province->iso_3166_2_in }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.vehicle_code') }}
                        </th>
                        <td>
                            {{ $province->vehicle_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.zone') }}
                        </th>
                        <td>
                            {{ $province->zone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.capital') }}
                        </th>
                        <td>
                            {{ $province->capital }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.largest_city') }}
                        </th>
                        <td>
                            {{ $province->largest_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.statehood') }}
                        </th>
                        <td>
                            {{ $province->statehood }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.population') }}
                        </th>
                        <td>
                            {{ $province->population }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.area') }}
                        </th>
                        <td>
                            {{ $province->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.official_languages') }}
                        </th>
                        <td>
                            {{ $province->official_languages }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.additional_official_languages') }}
                        </th>
                        <td>
                            {{ $province->additional_official_languages }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.status') }}
                        </th>
                        <td>
                            {{ $province->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.remarks') }}
                        </th>
                        <td>
                            {{ $province->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
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
            <a class="nav-link" href="#province_postal_codes" role="tab" data-toggle="tab">
                {{ trans('cruds.postalCode.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="province_postal_codes">
            @includeIf('admin.provinces.relationships.provincePostalCodes', ['postalCodes' => $province->provincePostalCodes])
        </div>
    </div>
</div>

@endsection