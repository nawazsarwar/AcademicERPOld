<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePapersRegistrationRequest;
use App\Http\Requests\UpdatePapersRegistrationRequest;
use App\Http\Resources\Admin\PapersRegistrationResource;
use App\Models\PapersRegistration;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PapersRegistrationsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('papers_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PapersRegistrationResource(PapersRegistration::with(['paper', 'registration', 'student'])->get());
    }

    public function store(StorePapersRegistrationRequest $request)
    {
        $papersRegistration = PapersRegistration::create($request->all());

        return (new PapersRegistrationResource($papersRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PapersRegistration $papersRegistration)
    {
        abort_if(Gate::denies('papers_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PapersRegistrationResource($papersRegistration->load(['paper', 'registration', 'student']));
    }

    public function update(UpdatePapersRegistrationRequest $request, PapersRegistration $papersRegistration)
    {
        $papersRegistration->update($request->all());

        return (new PapersRegistrationResource($papersRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PapersRegistration $papersRegistration)
    {
        abort_if(Gate::denies('papers_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papersRegistration->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
