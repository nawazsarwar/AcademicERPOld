<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResearchScholarRequest;
use App\Http\Requests\UpdateResearchScholarRequest;
use App\Http\Resources\Admin\ResearchScholarResource;
use App\Models\ResearchScholar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResearchScholarsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('research_scholar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResearchScholarResource(ResearchScholar::with(['registration', 'supervisor'])->get());
    }

    public function store(StoreResearchScholarRequest $request)
    {
        $researchScholar = ResearchScholar::create($request->all());

        return (new ResearchScholarResource($researchScholar))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ResearchScholar $researchScholar)
    {
        abort_if(Gate::denies('research_scholar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResearchScholarResource($researchScholar->load(['registration', 'supervisor']));
    }

    public function update(UpdateResearchScholarRequest $request, ResearchScholar $researchScholar)
    {
        $researchScholar->update($request->all());

        return (new ResearchScholarResource($researchScholar))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ResearchScholar $researchScholar)
    {
        abort_if(Gate::denies('research_scholar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $researchScholar->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
