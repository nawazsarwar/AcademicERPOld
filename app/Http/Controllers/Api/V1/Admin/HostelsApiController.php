<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHostelRequest;
use App\Http\Requests\UpdateHostelRequest;
use App\Http\Resources\Admin\HostelResource;
use App\Models\Hostel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HostelsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hostel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HostelResource(Hostel::with(['hall'])->get());
    }

    public function store(StoreHostelRequest $request)
    {
        $hostel = Hostel::create($request->all());

        return (new HostelResource($hostel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hostel $hostel)
    {
        abort_if(Gate::denies('hostel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HostelResource($hostel->load(['hall']));
    }

    public function update(UpdateHostelRequest $request, Hostel $hostel)
    {
        $hostel->update($request->all());

        return (new HostelResource($hostel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hostel $hostel)
    {
        abort_if(Gate::denies('hostel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
