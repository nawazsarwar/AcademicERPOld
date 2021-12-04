<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use App\Http\Resources\Admin\CampusResource;
use App\Models\Campus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CampusesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('campus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CampusResource(Campus::all());
    }

    public function store(StoreCampusRequest $request)
    {
        $campus = Campus::create($request->all());

        return (new CampusResource($campus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Campus $campus)
    {
        abort_if(Gate::denies('campus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CampusResource($campus);
    }

    public function update(UpdateCampusRequest $request, Campus $campus)
    {
        $campus->update($request->all());

        return (new CampusResource($campus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Campus $campus)
    {
        abort_if(Gate::denies('campus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
