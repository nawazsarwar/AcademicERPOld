<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaperTypeRequest;
use App\Http\Requests\UpdatePaperTypeRequest;
use App\Http\Resources\Admin\PaperTypeResource;
use App\Models\PaperType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaperTypesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paper_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaperTypeResource(PaperType::all());
    }

    public function store(StorePaperTypeRequest $request)
    {
        $paperType = PaperType::create($request->all());

        return (new PaperTypeResource($paperType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PaperType $paperType)
    {
        abort_if(Gate::denies('paper_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaperTypeResource($paperType);
    }

    public function update(UpdatePaperTypeRequest $request, PaperType $paperType)
    {
        $paperType->update($request->all());

        return (new PaperTypeResource($paperType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PaperType $paperType)
    {
        abort_if(Gate::denies('paper_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paperType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
