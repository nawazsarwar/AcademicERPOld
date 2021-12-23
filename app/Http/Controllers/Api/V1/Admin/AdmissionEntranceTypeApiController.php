<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmissionEntranceTypeRequest;
use App\Http\Requests\UpdateAdmissionEntranceTypeRequest;
use App\Http\Resources\Admin\AdmissionEntranceTypeResource;
use App\Models\AdmissionEntranceType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdmissionEntranceTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admission_entrance_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdmissionEntranceTypeResource(AdmissionEntranceType::all());
    }

    public function store(StoreAdmissionEntranceTypeRequest $request)
    {
        $admissionEntranceType = AdmissionEntranceType::create($request->all());

        return (new AdmissionEntranceTypeResource($admissionEntranceType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AdmissionEntranceType $admissionEntranceType)
    {
        abort_if(Gate::denies('admission_entrance_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdmissionEntranceTypeResource($admissionEntranceType);
    }

    public function update(UpdateAdmissionEntranceTypeRequest $request, AdmissionEntranceType $admissionEntranceType)
    {
        $admissionEntranceType->update($request->all());

        return (new AdmissionEntranceTypeResource($admissionEntranceType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AdmissionEntranceType $admissionEntranceType)
    {
        abort_if(Gate::denies('admission_entrance_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionEntranceType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
