<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Http\Resources\Admin\HallResource;
use App\Models\Hall;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HallsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hall_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HallResource(Hall::with(['campus'])->get());
    }

    public function store(StoreHallRequest $request)
    {
        $hall = Hall::create($request->all());

        return (new HallResource($hall))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hall $hall)
    {
        abort_if(Gate::denies('hall_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HallResource($hall->load(['campus']));
    }

    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $hall->update($request->all());

        return (new HallResource($hall))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hall $hall)
    {
        abort_if(Gate::denies('hall_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hall->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
