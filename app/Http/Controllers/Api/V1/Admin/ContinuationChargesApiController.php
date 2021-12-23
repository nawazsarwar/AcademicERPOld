<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContinuationChargeRequest;
use App\Http\Requests\UpdateContinuationChargeRequest;
use App\Http\Resources\Admin\ContinuationChargeResource;
use App\Models\ContinuationCharge;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContinuationChargesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('continuation_charge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContinuationChargeResource(ContinuationCharge::with(['course'])->get());
    }

    public function store(StoreContinuationChargeRequest $request)
    {
        $continuationCharge = ContinuationCharge::create($request->all());

        return (new ContinuationChargeResource($continuationCharge))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ContinuationCharge $continuationCharge)
    {
        abort_if(Gate::denies('continuation_charge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContinuationChargeResource($continuationCharge->load(['course']));
    }

    public function update(UpdateContinuationChargeRequest $request, ContinuationCharge $continuationCharge)
    {
        $continuationCharge->update($request->all());

        return (new ContinuationChargeResource($continuationCharge))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ContinuationCharge $continuationCharge)
    {
        abort_if(Gate::denies('continuation_charge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $continuationCharge->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
