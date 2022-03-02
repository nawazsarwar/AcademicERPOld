<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationPaperRequest;
use App\Http\Requests\UpdateRegistrationPaperRequest;
use App\Http\Resources\Admin\RegistrationPaperResource;
use App\Models\RegistrationPaper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationPapersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('registration_paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegistrationPaperResource(RegistrationPaper::with(['paper', 'registration', 'student'])->get());
    }

    public function store(StoreRegistrationPaperRequest $request)
    {
        $registrationPaper = RegistrationPaper::create($request->all());

        return (new RegistrationPaperResource($registrationPaper))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RegistrationPaper $registrationPaper)
    {
        abort_if(Gate::denies('registration_paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegistrationPaperResource($registrationPaper->load(['paper', 'registration', 'student']));
    }

    public function update(UpdateRegistrationPaperRequest $request, RegistrationPaper $registrationPaper)
    {
        $registrationPaper->update($request->all());

        return (new RegistrationPaperResource($registrationPaper))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RegistrationPaper $registrationPaper)
    {
        abort_if(Gate::denies('registration_paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationPaper->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
