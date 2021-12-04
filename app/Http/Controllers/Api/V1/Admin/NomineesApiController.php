<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNomineeRequest;
use App\Http\Requests\UpdateNomineeRequest;
use App\Http\Resources\Admin\NomineeResource;
use App\Models\Nominee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NomineesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nominee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NomineeResource(Nominee::with(['employee'])->get());
    }

    public function store(StoreNomineeRequest $request)
    {
        $nominee = Nominee::create($request->all());

        return (new NomineeResource($nominee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Nominee $nominee)
    {
        abort_if(Gate::denies('nominee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NomineeResource($nominee->load(['employee']));
    }

    public function update(UpdateNomineeRequest $request, Nominee $nominee)
    {
        $nominee->update($request->all());

        return (new NomineeResource($nominee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Nominee $nominee)
    {
        abort_if(Gate::denies('nominee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nominee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
