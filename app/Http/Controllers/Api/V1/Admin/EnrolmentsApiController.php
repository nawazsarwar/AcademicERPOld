<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnrolmentRequest;
use App\Http\Requests\UpdateEnrolmentRequest;
use App\Http\Resources\Admin\EnrolmentResource;
use App\Models\Enrolment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnrolmentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enrolment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EnrolmentResource(Enrolment::with(['student'])->get());
    }

    public function store(StoreEnrolmentRequest $request)
    {
        $enrolment = Enrolment::create($request->all());

        return (new EnrolmentResource($enrolment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Enrolment $enrolment)
    {
        abort_if(Gate::denies('enrolment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EnrolmentResource($enrolment->load(['student']));
    }

    public function update(UpdateEnrolmentRequest $request, Enrolment $enrolment)
    {
        $enrolment->update($request->all());

        return (new EnrolmentResource($enrolment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Enrolment $enrolment)
    {
        abort_if(Gate::denies('enrolment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrolment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
