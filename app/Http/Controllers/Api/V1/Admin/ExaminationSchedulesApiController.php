<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExaminationScheduleRequest;
use App\Http\Requests\UpdateExaminationScheduleRequest;
use App\Http\Resources\Admin\ExaminationScheduleResource;
use App\Models\ExaminationSchedule;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExaminationSchedulesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('examination_schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExaminationScheduleResource(ExaminationSchedule::with(['academic_session', 'paper'])->get());
    }

    public function store(StoreExaminationScheduleRequest $request)
    {
        $examinationSchedule = ExaminationSchedule::create($request->all());

        return (new ExaminationScheduleResource($examinationSchedule))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExaminationSchedule $examinationSchedule)
    {
        abort_if(Gate::denies('examination_schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExaminationScheduleResource($examinationSchedule->load(['academic_session', 'paper']));
    }

    public function update(UpdateExaminationScheduleRequest $request, ExaminationSchedule $examinationSchedule)
    {
        $examinationSchedule->update($request->all());

        return (new ExaminationScheduleResource($examinationSchedule))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExaminationSchedule $examinationSchedule)
    {
        abort_if(Gate::denies('examination_schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examinationSchedule->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
