<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use App\Http\Resources\Admin\DegreeResource;
use App\Models\Degree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DegreesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('degree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DegreeResource(Degree::all());
    }

    public function store(StoreDegreeRequest $request)
    {
        $degree = Degree::create($request->all());

        return (new DegreeResource($degree))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Degree $degree)
    {
        abort_if(Gate::denies('degree_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DegreeResource($degree);
    }

    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $degree->update($request->all());

        return (new DegreeResource($degree))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Degree $degree)
    {
        abort_if(Gate::denies('degree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
