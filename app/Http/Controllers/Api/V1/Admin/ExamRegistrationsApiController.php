<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRegistrationRequest;
use App\Http\Requests\UpdateExamRegistrationRequest;
use App\Http\Resources\Admin\ExamRegistrationResource;
use App\Models\ExamRegistration;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExamRegistrationsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exam_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExamRegistrationResource(ExamRegistration::with(['student', 'course', 'subsidiary_one', 'subsidiary_two', 'academic_session', 'hall', 'hostel', 'reviewed_by'])->get());
    }

    public function store(StoreExamRegistrationRequest $request)
    {
        $examRegistration = ExamRegistration::create($request->all());

        return (new ExamRegistrationResource($examRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExamRegistration $examRegistration)
    {
        abort_if(Gate::denies('exam_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExamRegistrationResource($examRegistration->load(['student', 'course', 'subsidiary_one', 'subsidiary_two', 'academic_session', 'hall', 'hostel', 'reviewed_by']));
    }

    public function update(UpdateExamRegistrationRequest $request, ExamRegistration $examRegistration)
    {
        $examRegistration->update($request->all());

        return (new ExamRegistrationResource($examRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExamRegistration $examRegistration)
    {
        abort_if(Gate::denies('exam_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examRegistration->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
