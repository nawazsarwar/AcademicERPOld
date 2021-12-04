<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Http\Resources\Admin\PaperResource;
use App\Models\Paper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PapersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaperResource(Paper::with(['paper_type'])->get());
    }

    public function store(StorePaperRequest $request)
    {
        $paper = Paper::create($request->all());

        return (new PaperResource($paper))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Paper $paper)
    {
        abort_if(Gate::denies('paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaperResource($paper->load(['paper_type']));
    }

    public function update(UpdatePaperRequest $request, Paper $paper)
    {
        $paper->update($request->all());

        return (new PaperResource($paper))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Paper $paper)
    {
        abort_if(Gate::denies('paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
