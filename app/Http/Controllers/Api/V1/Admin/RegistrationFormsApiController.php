<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationFormRequest;
use App\Http\Requests\UpdateRegistrationFormRequest;
use App\Http\Resources\Admin\RegistrationFormResource;
use App\Models\RegistrationForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationFormsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('registration_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegistrationFormResource(RegistrationForm::with(['course', 'academic_session', 'programme_duration_type'])->get());
    }

    public function store(StoreRegistrationFormRequest $request)
    {
        $registrationForm = RegistrationForm::create($request->all());

        return (new RegistrationFormResource($registrationForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RegistrationForm $registrationForm)
    {
        abort_if(Gate::denies('registration_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegistrationFormResource($registrationForm->load(['course', 'academic_session', 'programme_duration_type']));
    }

    public function update(UpdateRegistrationFormRequest $request, RegistrationForm $registrationForm)
    {
        $registrationForm->update($request->all());

        return (new RegistrationFormResource($registrationForm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RegistrationForm $registrationForm)
    {
        abort_if(Gate::denies('registration_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationForm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
